<?php
/**
 * Created by PhpStorm.
 * User: okaufmann
 * Date: 29.07.14
 * Time: 23:37
 */
namespace Phalcon\UserPlugin\Interfaces;

interface UserInterface
{
    /**
     * Returns the value of field group_id
     *
     * @return integer
     */
    public function getGroupId();

    /**
     * Method to set the value of field must_change_password
     *
     * @param integer $must_change_password
     * @return $this
     */
    public function setMustChangePassword($must_change_password);

    /**
     * Returns the value of field gplus_id
     *
     * @return string
     */
    public function getGplusId();

    /**
     * @return User
     */
    public static function findFirst($parameters = array());

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName();

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id);

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * Send a confirmation e-mail to the user if the account is not active
     */
    public function afterSave();

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password);

    /**
     * Returns the value of field twitter_id
     *
     * @return string
     */
    public function getTwitterId();

    /**
     * Returns the value of field active
     *
     * @return integer
     */
    public function getActive();

    /**
     * Returns the value of field facebook_id
     *
     * @return string
     */
    public function getFacebookId();

    /**
     * Method to set the value of field updated_at
     *
     * @param string $updated_at
     * @return $this
     */
    public function setUpdatedAt($updated_at);

    /**
     * Method to set the value of field linkedin_data
     *
     * @param string $linkedin_data
     * @return $this
     */
    public function setLinkedinData($linkedin_data);

    /**
     * Method to set the value of field banned
     *
     * @param integer $banned
     * @return $this
     */
    public function setBanned($banned);

    /**
     * Validations and business logic
     */
    public function validation();

    /**
     * Returns the value of field must_change_password
     *
     * @return integer
     */
    public function getMustChangePassword();

    /**
     * Returns the value of field twitter_data
     *
     * @return string
     */
    public function getTwitterData();

    /**
     * Method to set the value of field group_id
     *
     * @param integer $group_id
     * @return $this
     */
    public function setGroupId($group_id);

    /**
     * Checks if the password has to be changed
     *
     * @return boolean
     */
    public function shouldPasswordBeChanged();

    /**
     * @return User[]
     */
    public static function find($parameters = array());

    /**
     * Method to set the value of field suspended
     *
     * @param integer $suspended
     * @return $this
     */
    public function setSuspended($suspended);

    /**
     * Returns the value of field profile_id
     *
     * @return integer
     */
    public function getProfileId();

    /**
     * Method to set the value of field twitter_data
     *
     * @param string $twitter_data
     * @return $this
     */
    public function setTwitterData($twitter_data);

    /**
     * Method to set the value of field linkedin_id
     *
     * @param integer $linkedin_id
     * @return $this
     */
    public function setLinkedinId($linkedin_id);

    /**
     * Checks if the user is active
     *
     * @return boolean
     */
    public function isActive();

    /**
     * Method to set the value of field facebook_id
     *
     * @param string $facebook_id
     * @return $this
     */
    public function setFacebookId($facebook_id);

    /**
     * Before create the user assign a password
     */
    public function beforeValidationOnCreate();

    /**
     * Returns the value of field linkedin_name
     *
     * @return string
     */
    public function getLinkedinName();

    /**
     * Method to set the value of field profile_id
     *
     * @param integer $profile_id
     * @return $this
     */
    public function setProfileId($profile_id);

    /**
     * Method to set the value of field twitter_id
     *
     * @param string $twitter_id
     * @return $this
     */
    public function setTwitterId($twitter_id);

    /**
     * Returns the value of field twitter_name
     *
     * @return string
     */
    public function getTwitterName();

    /**
     * Returns the value of field linkedin_id
     *
     * @return integer
     */
    public function getLinkedinId();

    /**
     * Method to set the value of field gplus_data
     *
     * @param string $gplus_data
     * @return $this
     */
    public function setGplusData($gplus_data);

    /**
     * Method to set the value of field twitter_name
     *
     * @param string $twitter_name
     * @return $this
     */
    public function setTwitterName($twitter_name);

    /**
     * Checks if the user is suspended
     *
     * @return boolean
     */
    public function isSuspended();

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword();

    /**
     * Method to set the value of field created_at
     *
     * @param string $created_at
     * @return $this
     */
    public function setCreatedAt($created_at);

    /**
     * Method to set the value of field gplus_id
     *
     * @param string $gplus_id
     * @return $this
     */
    public function setGplusId($gplus_id);

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail();

    public function beforeValidation();

    /**
     * Returns the value of field linkedin_data
     *
     * @return string
     */
    public function getLinkedinData();

    /**
     * Method to set the value of field gplus_name
     *
     * @param string $gplus_name
     * @return $this
     */
    public function setGplusName($gplus_name);

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId();

    /**
     * Method to set the value of field facebook_name
     *
     * @param string $facebook_name
     * @return $this
     */
    public function setFacebookName($facebook_name);

    /**
     * Returns the value of field gplus_name
     *
     * @return string
     */
    public function getGplusName();

    /**
     * Returns the value of field created_at
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * Returns the value of field facebook_data
     *
     * @return string
     */
    public function getFacebookData();

    /**
     * Initialize method for model.
     */
    public function initialize();

    /**
     * Checks if the user is banned
     *
     * @return boolean
     */
    public function isBanned();

    /**
     * Method to set the value of field linkedin_name
     *
     * @param string $linkedin_name
     * @return $this
     */
    public function setLinkedinName($linkedin_name);

    /**
     * Returns the value of field gplus_data
     *
     * @return string
     */
    public function getGplusData();

    /**
     * Method to set the value of field facebook_data
     *
     * @param string $facebook_data
     * @return $this
     */
    public function setFacebookData($facebook_data);

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Returns the value of field facebook_name
     *
     * @return string
     */
    public function getFacebookName();

    public function getSource();

    /**
     * Returns the value of field banned
     *
     * @return integer
     */
    public function getBanned();

    /**
     * Returns the value of field suspended
     *
     * @return integer
     */
    public function getSuspended();

    /**
     * Method to set the value of field active
     *
     * @param integer $active
     * @return $this
     */
    public function setActive($active);

    /**
     * Returns the value of field updated_at
     *
     * @return string
     */
    public function getUpdatedAt();
}