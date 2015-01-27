<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Takamichi\Form;

use Zend\Form\Form;

class UserForm extends Form
{
    /**
     * Form Constructor
     * Defines all the fields, the validators and the filters
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
                'label' => 'Avatar',
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
