<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Takamichi\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Takamichi\Form\UserForm;       
 
class UserController extends AbstractActionController
{
    public function addAction()
    {
        // Get Module Configuration
        $config = $this->getServiceLocator()->get('Config');
        
        // Get User Form
        $userForm = new UserForm();
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            // Merge uploaded files with post data
            $post = array_merge_recursive(
                $request->getPost()->toArray(),
                $request->getFiles()->toArray()
            );

            $userForm->setData($post);
            
            // If form is valid, save image in the public directory
            // Save user data in a log file (defined in Module Configuration)
            if ($userForm->isValid()) {
                die();
                //$filter = \Zend\Filter\File\RenameUpload("./public/uploads/");
                //$filter->filter($userForm->getData('file_upload'));

                // Get Controller Plugin to save info a in log file
                //$plugin = $this->SaveUserPlugin();
                //$plugin->writeDataInFile($userForm->getData(), $config['takamichi']['log_file']);
            }
        }
        
        return array('form' => $userForm);
    }
}
