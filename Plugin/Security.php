<?php
namespace Phalcon\UserPlugin\Plugin;

use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\User\Plugin;
use Phalcon\UserPlugin\Exception\UserPluginException as Exception;

/**
 * Phalcon\UserPlugin\Plugin\Security
 */
class Security extends Plugin
{
    /**
     * beforeDispatchLoop
     *
     * @param  Event $event
     * @param  Dispatcher $dispatcher
     * @return \Phalcon\Http\ResponseInterface
     */
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        $config = $dispatcher->getDI()->get('config');

        $actionName = $dispatcher->getActionName();
        $controllerName = $dispatcher->getControllerName();

        if ($this->auth->hasRememberMe()) {
            $this->auth->loginWithRememberMe(false);
        }

//        if ($this->auth->isUserSignedIn()) {
//            if ($controllerName == 'user' && $actionName == 'login') {
//                return $this->response->redirect($config->pup->redirect->success);
//            }
//        }

        $identity = $this->auth->getIdentity();

        if ($this->acl->isPrivate($controllerName)) {
            // If there is no identity available the user is redirected to session/login
            if (!is_array($identity)) {

                $this->flash->notice('Für diesen Bereich must du dich einloggen...');

                return $this->response->redirect($config->pup->redirect->failure);
            }

            // Check if the user have permission to the current option
            if (!$this->acl->isAllowed($identity['group'], $controllerName, $actionName)) {

                $this->flash->notice('Zu diesem Bereich hast du keinen Zugriff: ' . $controllerName . ':' . $actionName);

                return $this->response->redirect($config->pup->redirect->failure);
            }
        }

        $this->view->setVar('identity', $identity);
        $this->view->setVar('auth', $this->auth);
    }
}