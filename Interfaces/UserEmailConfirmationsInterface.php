<?php
namespace Phalcon\UserPlugin\Interfaces;

interface UserEmailConfirmationsInterface
{
    /**
     * Method to set the value of field code
     *
     * @param string $code
     * @return $this
     */
    public function setCode($code);

    public function initialize();

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id);

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id);

    /**
     * Method to set the value of field confirmed
     *
     * @param integer $confirmed
     * @return $this
     */
    public function setConfirmed($confirmed);

    /**
     * Method to set the value of field modified_at
     *
     * @param string $modified_at
     * @return $this
     */
    public function setModifiedAt($modified_at);

    /**
     * Method to set the value of field created_at
     *
     * @param string $created_at
     * @return $this
     */
    public function setCreatedAt($created_at);

    /**
     * Before create the user assign a password
     */
    public function beforeValidationOnCreate();

    /**
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId();

    /**
     * Returns the value of field confirmed
     *
     * @return integer
     */
    public function getConfirmed();

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId();

    /**
     * Sets the timestamp before update the confirmation
     */
    public function beforeValidationOnUpdate();

    /**
     * Returns the value of field code
     *
     * @return string
     */
    public function getCode();

    /**
     * Send a confirmation e-mail to the user after create the account
     */
    public function afterCreate();

    /**
     * Returns the value of field modified_at
     *
     * @return string
     */
    public function getModifiedAt();

    /**
     * Returns the value of field created_at
     *
     * @return string
     */
    public function getCreatedAt();
}