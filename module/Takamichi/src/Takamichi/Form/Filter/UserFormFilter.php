<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Takamichi\Form\Filter;

use Zend\InputFilter\InputFilter;

class UserFormFilter extends InputFilter
{
    /**
     * Form Constructor
     * Defines all the fields, the validators and the filters
     * @param type $name
     */
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
                    'name' => 'Extension',
                    'options' => array(
                        'token' => 'password',
                    ),
                ),
            ),
        ));
    }
}
