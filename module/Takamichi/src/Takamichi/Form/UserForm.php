<?php
/**
 * UserForm Class
 * Defines all fields of the UserForm form
 *
 * @author Virginie FAURE <virfaure@gmail.com>
 */

namespace Takamichi\Form;

use Zend\Form\Form;

class UserForm extends Form
{
    /**
     * Form Constructor
     * Defines all the fields
     * 
     * @param type $name
     */
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('user');

        $this->add(array(
            'name' => 'username',
            'type' => 'Text',
            'options' => array(
                'label' => 'Username',
            ),
            'attributes'    => array(
                'class'     => 'form-control',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'Password',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes'    => array(
                'class'     => 'form-control',
            ),
        ));
        $this->add(array(
            'name' => 'password_confirmation',
            'type' => 'Password',
            'options' => array(
                'label' => 'Password Confirmation',
            ),
            'attributes'    => array(
                'class'     => 'form-control',
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'type' => 'Text',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes'    => array(
                'class'     => 'form-control',
            ),
        ));
        $this->add(array(
            'name' => 'file_upload',
            'type' => 'File',
            'options' => array(
                'label' => 'Avatar (only .jpg, .jpeg and .png file)',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Save',
                'id' => 'submitbutton',
                'class'     => 'btn btn-success',
            ),
        ));
    }
}
