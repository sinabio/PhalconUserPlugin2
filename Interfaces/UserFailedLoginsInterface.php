<?php
namespace Phalcon\UserPlugin\Interfaces;

interface UserFailedLoginsInterface
{
    /**
     * Method to set the value of field attempted
     *
     * @param integer $attempted
     * @return $this
     */
    public function setAttempted($attempted);

    /**
     * Returns the value of field attempted
     *
     * @return integer
     */
    public function getAttempted();

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
}