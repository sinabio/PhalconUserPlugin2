<?php
namespace Phalcon\UserPlugin\Interfaces;

/**
 * Phalcon\UserPlugin\Models\User\UserPermissions
 */
interface UserPermissionsInterface
{
    /**
     * Returns the value of field group_id
     *
     * @return integer
     */
    public function getGroupId();

    /**
     * Method to set the value of field action
     *
     * @param string $action
     * @return $this
     */
    public function setAction($action);

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id);

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId();

    /**
     * Returns the value of field resource
     *
     * @return string
     */
    public function getResource();

    /**
     * Method to set the value of field resource
     *
     * @param string $resource
     * @return $this
     */
    public function setResource($resource);

    /**
     * Method to set the value of field group_id
     *
     * @param integer $group_id
     * @return $this
     */
    public function setGroupId($group_id);

    /**
     * Returns the value of field action
     *
     * @return string
     */
    public function getAction();
}