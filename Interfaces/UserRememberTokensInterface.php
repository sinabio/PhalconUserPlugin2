<?php
namespace Phalcon\UserPlugin\Interfaces;


/**
 * Phalcon\UserPlugin\Models\User\UserRememberTokens
 */
interface UserRememberTokensInterface
{
    /**
     * Returns the value of field token
     *
     * @return string
     */
    public function getToken();

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id);

    /**
     * Method to set the value of field token
     *
     * @param string $token
     * @return $this
     */
    public function setToken($token);

    /**
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId();

    /**
     * Returns the value of field user_agent
     *
     * @return string
     */
    public function getUserAgent();

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
     * Method to set the value of field created_at
     *
     * @param integer $created_at
     * @return $this
     */
    public function setCreatedAt($created_at);

    /**
     * Method to set the value of field user_agent
     *
     * @param string $user_agent
     * @return $this
     */
    public function setUserAgent($user_agent);

    /**
     * Returns the value of field created_at
     *
     * @return integer
     */
    public function getCreatedAt();
}