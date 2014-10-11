<?php
namespace Phalcon\UserPlugin\Interfaces;
/**
 * Phalcon\UserPlugin\Models\User\UserPasswordChanges
 */
interface UserPasswordChangesInterface
{
    public function initialize();

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id);

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
     * Method to set the value of field ip_address
     *
     * @param string $ip_address
     * @return $this
     */
    public function setIpAddress($ip_address);

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId();

    /**
     * Returns the value of field ip_address
     *
     * @return string
     */
    public function getIpAddress();

    /**
     * Method to set the value of field created_at
     *
     * @param string $created_at
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
     * @return string
     */
    public function getCreatedAt();

    /**
     * Before create the user assign a password
     */
    public function beforeValidationOnCreate();
}