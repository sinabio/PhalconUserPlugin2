<?php

namespace Phalcon\UserPlugin\Interfaces;

interface UserGroupsInterface
{
    /**
     * Returns the value of field active
     *
     * @return integer
     */
    public function getActive();

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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName();

    /**
     * Validations and business logic
     */
    public function validation();

    /**
     * Method to set the value of field active
     *
     * @param integer $active
     * @return $this
     */
    public function setActive($active);

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);
}