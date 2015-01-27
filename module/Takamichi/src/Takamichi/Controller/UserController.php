<?php
/**
 * UserController Class
 * Defines the actions of the UserController
 *
 * @author Virginie FAURE <virfaure@gmail.com>
 */


namespace Takamichi\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Takamichi\Form\UserForm;       
use Takamichi\Form\Filter\UserFormFilter;       
 
class UserController extends AbstractActionController
{
    /**
     * addAction : create User form 
     * and add a user in a log file is form is valid
     * 
     */
    public function addAction()
    {
        $error = $success = false;
        
        // Get Module Configuration
        $config = $this->getServiceLocator()->get('Config');
        
        // Get User Form
        $userForm = new UserForm();
        $userForm->setInputFilter(new UserFormFilter());
        
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
                // Get Controller Plugin to save info a in log file
                $plugin = $this->SaveUserPlugin();
                
                try{
                    // Rename Upload File                    
                    $fileRenamed = $plugin->renameUploadedFile($post['file_upload'], $config['takamichi']['upload_dir']);
                   
                    // Keep image uploaded in form data
                    $userData = $userForm->getData();
                    $userData['image'] = $fileRenamed;
                    
                    // Write all info in a log
                    $plugin->writeDataInFile($userData, $config['takamichi']['log_file']);
                    $success = "User successfully added, please check ".$config['takamichi']['log_file']." to see log";
                }  catch (\Exception $e){
                    $error = $e->getMessage();
                }
            }
        }
        
        return array('form' => $userForm, 'error' => $error, 'success' => $success);
    }
}
