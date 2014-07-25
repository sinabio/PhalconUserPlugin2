<?php
namespace Phalcon\UserPlugin\Forms\User;

use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

/**
 * Phalcon\UserPlugin\Forms\User\ChangePasswordForm
 */
class ChangePasswordForm extends Form
{
    public function initialize()
    {
        //Current Password
        $currentPassword = new Password('currentPassword', array(
            'class' => 'form-control'
        ));

        $currentPassword->addValidators(array(
            new PresenceOf(array(
                'message' => 'Current password is required'
            ))
        ));

        $this->add($currentPassword);

        $password = new Password('password', array(
            'class' => 'form-control'
        ));

        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Password is required'
            )),
            new StringLength(array(
                'min' => 8,
                'messageMinimum' => 'Password is too short. Minimum 8 characters'
            )),
            new Confirmation(array(
                'message' => 'Password doesn\'t match confirmation',
                'with' => 'confirmPassword'
            ))
        ));

        $this->add($password);

        //Confirm Password
        $confirmPassword = new Password('confirmPassword',array(
            'class' => 'form-control'
        ));

        $confirmPassword->addValidators(array(
            new PresenceOf(array(
                'message' => 'The confirmation password is required'
            ))
        ));

        $this->add($confirmPassword);
    }
}
