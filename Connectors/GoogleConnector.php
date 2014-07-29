<?php
namespace Phalcon\UserPlugin\Connectors;

use GoogleApi\Client;
use GoogleApi\Contrib\Oauth2Service;

/**
 * Phalcon\UserPlugin\Connectors\GoogleConnector
 *
 * This class is using google-api-php-client from https://github.com/Nyholm/google-api-php-client
 */
class GoogleConnector
{
    private $config;

    /*private $scopes = array(
        'https://www.googleapis.com/auth/plus.profile.emails.read ',
        'https://www.googleapis.com/auth/plus.login'
    );*/

    final public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function connect($di)
    {
        $session = $di->get('session');
        $response = $di->get('response');
        $request = $di->get('request');

        $client = $this->getClient();
        $oauth2 = new \Google_Service_Oauth2($client);

        if ($request->get('code')) {
            $client->authenticate($request->get('code'));
            $session->set('googleToken', $client->getAccessToken());
            $redirect = $this->config['redirect_uri'];

            return array('status' => 0, 'redirect' => filter_var($redirect, FILTER_SANITIZE_URL));
        }

        if($client->isAccessTokenExpired()){
        }

        if ($session->has('googleToken')) {
            $client->setAccessToken($session->get('googleToken'));
        }

        if ($client->getAccessToken()) {
            try{
                $userinfo = $oauth2->userinfo->get();
                $session->set('googleToken', $client->getAccessToken());

                return array('status' => 1, 'userinfo' => $userinfo);
            } catch(\Exception $ex){
                $session->remove('googleToken');
            }
        } else {
            $authUrl = $client->createAuthUrl();

            return array('status' => 0, 'redirect' => $authUrl);
        }
    }

    /**
     * Get client
     *
     * @return \Google_Client
     */
    public function getClient()
    {
        $client = new \Google_Client();

        $client->setAccessType("offline");

        $client->addScope(\Google_Service_Oauth2::PLUS_LOGIN);
        $client->addScope(\Google_Service_Oauth2::USERINFO_EMAIL);

        //$client->setScopes($this->scopes);

        $client->setApplicationName($this->config['application_name']);
        $client->setClientId($this->config['client_id']);
        $client->setClientSecret($this->config['client_secret']);
        $client->setRedirectUri($this->config['redirect_uri']);
        //$client->setDeveloperKey($this->config['developer_key']);

        return $client;
    }
}
