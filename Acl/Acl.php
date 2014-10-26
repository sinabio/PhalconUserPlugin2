<?php
namespace Phalcon\UserPlugin\Acl;

use Phalcon\Mvc\User\Component;
use Phalcon\Acl\Adapter\Memory as AclMemory;
use Phalcon\Acl\Role as AclRole;
use Phalcon\Acl\Resource as AclResource;
use MightyMovies\Models\Profiles;

/**
 * MightyMovies\Acl\Acl
 */
class Acl extends Component
{

    /**
     * The ACL Object
     *
     * @var \Phalcon\Acl\Adapter\Memory
     */
    private $acl;

    /**
     * The filepath of the ACL cache file from APP_DIR
     *
     * @var string
     */
    private $filePath = '/cache/acl/data.txt';

    /**
     * Define the resources that are considered "private". These controller => actions require authentication.
     *
     * @var array
     */
    private $privateResources;

    protected $_modelConfig = array();

    /**
     * Initialize Auth component
     */
    public function __construct($acl_list)
    {
        $this->privateResources = $acl_list;
        $di = $this->getDI();
        $this->_modelConfig = $di->get('config')->pup->models;
    }

    public function getType($name)
    {
        $userType = new $this->_modelConfig[$name];
        return $userType;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getPrivateResources()
    {
        return $this->privateResources;
    }

    /**
     * Human-readable descriptions of the actions used in {@see $privateResources}
     *
     * @var array
     */
    private $actionDescriptions = array(
        'index' => 'Access',
        'add' => 'Add',
        'search' => 'Search',
        'create' => 'Create',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'changePassword' => 'Change password'
    );

    /**
     * Checks if a controller is private or not
     *
     * @param string $controllerName
     * @return boolean
     */
    public function isPrivate($controllerName)
    {
        return isset($this->privateResources[$controllerName]);
    }

    /**
     * Checks if the current profile is allowed to access a resource
     *
     * @param string $user_group
     * @param string $controller
     * @param string $action
     * @return boolean
     */
    public function isAllowed($user_group, $controller, $action)
    {
        return $this->getAcl()->isAllowed($user_group, $controller, $action);
    }

    /**
     * Returns the ACL list
     *
     * @return Phalcon\Acl\Adapter\Memory
     */
    public function getAcl()
    {
        // Check if the ACL is already created
        if (is_object($this->acl)) {
            return $this->acl;
        }

        // Check if the ACL is in APC
        if (function_exists('apc_fetch')) {
            $acl = apc_fetch('mightymovies-acl');
            if (is_object($acl)) {
                $this->acl = $acl;
                return $acl;
            }
        }

        // Check if the ACL is already generated
        if (!file_exists(APP_DIR . $this->filePath)) {
            $this->acl = $this->rebuild();
            return $this->acl;
        }

        // Get the ACL from the data file
        $data = file_get_contents(APP_DIR . $this->filePath);
        $this->acl = unserialize($data);

        // Store the ACL in APC
        if (function_exists('apc_store')) {
            apc_store('mightymovies-acl', $this->acl);
        }

        return $this->acl;
    }

    /**
     * Returns the permissions assigned to a profile
     *
     * @param Profiles $profile
     * @return array
     */
    public function getPermissions($userGroup)
    {
        //TODO: check is a UserGroups Object
        $permissions = array();
        foreach ($userGroup->getPermissions() as $permission) {
            $permissions[$permission->getResource() . '.' . $permission->getAction()] = true;
        }
        return $permissions;
    }

    /**
     * Returns all the resoruces and their actions available in the application
     *
     * @return array
     */
    public function getResources()
    {
        return $this->privateResources;
    }

    /**
     * Returns the action description according to its simplified name
     *
     * @param string $action
     * @return $action
     */
    public function getActionDescription($action)
    {
        if (isset($this->actionDescriptions[$action])) {
            return $this->actionDescriptions[$action];
        } else {
            return $action;
        }
    }

    /**
     * Rebuilds the access list into a file
     *
     * @return \Phalcon\Acl\Adapter\Memory
     */
    public function rebuild()
    {
        $userGroupType = $this->getType("userGroups");

        $acl = new AclMemory();

        $acl->setDefaultAction(\Phalcon\Acl::DENY);

        // Register roles
        $user_groups = call_user_func_array(array($userGroupType, "find"), array('active = 1'));

        foreach ($user_groups as $user_group) {
            $acl->addRole(new AclRole($user_group->getName()));
        }

        foreach ($this->getPrivateResources() as $resource => $actions) {
            $acl->addResource(new AclResource($resource), $actions);
        }

        // Grant acess to private area to role Users
        foreach ($user_groups as $user_group) {
            // Grant permissions in "permissions" model
            foreach ($user_group->getPermissions() as $permission) {
                $acl->allow($user_group->getName(), $permission->getResource(), $permission->getAction());
            }

            // Always grant these permissions
            //TODO: Add all must have permission
            $acl->allow($user_group->getName(), 'users', 'changePassword');
        }

        if (touch(APP_DIR . $this->filePath) && is_writable(APP_DIR . $this->filePath)) {

            file_put_contents(APP_DIR . $this->filePath, serialize($acl));

            // Store the ACL in APC
            if (function_exists('apc_store')) {
                $uniqueName = md5(uniqid(rand(), true));
                apc_store('phalconuserplugin-'. $uniqueName . '-acl', $acl);
            }
        } else {
            $this->flash->error(
                'The user does not have write permissions to create the ACL list at ' . APP_DIR . $this->filePath
            );
        }

        return $acl;
    }
}
