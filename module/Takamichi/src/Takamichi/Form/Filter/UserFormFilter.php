<?php
/**
 * UserFormFilter Class
 * Defines all validators and filter for the UserForm
 *
 * @author Virginie FAURE <virfaure@gmail.com>
 */

namespace Takamichi\Form\Filter;

use Zend\InputFilter\InputFilter;

class UserFormFilter extends InputFilter
{
    
    public function __construct()
    {
        $this->add(array(
            'name' => 'username',
            'filters' => array(
                array(
                    'name' => 'Alnum',
                    'name' => 'StripTags',
                    'name' => 'StringTrim',
                ),
            ),
            'required' => true,
        ));
        $this->add(array(
            'name' => 'password',
            'filters' => array(
                array(
                    'name' => 'Alnum',
                    'name' => 'StripTags',
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => '6',
                    ),
                ),
            ),
            'required' => true,
        ));
        $this->add(array(
            'name' => 'password_confirmation',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'Identical',
                    'options' => array(
                        'token' => 'password',
                    ),
                ),
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'required' => true,
        ));
        $this->add(array(
            'name' => 'file_upload',
            'validators' => array(
                array(
                    'name'    => 'File\MimeType',
                    'options' => array(
                       'mimeType' => array('image/jpeg', 'image/png'),
                    ),
                ),
            ),
        ));
    }
}
