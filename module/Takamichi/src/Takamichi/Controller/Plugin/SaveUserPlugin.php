<?php
/**
 * SaveUserPlugin Class
 *
 * @author Virginie FAURE <virfaure@gmail.com>
 */

namespace Takamichi\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Log\Writer\Stream;
use Zend\Log\Logger;
use Zend\Filter\File\RenameUpload;

class SaveUserPlugin extends AbstractPlugin
{    
    //Fields form UserForm that we want to log
    protected $mapField = array(
        'username',
        'password',
        'email',
        'image'
    );
    
    /**
     * renameUploadedFile : Move uploaded file to a new path
     * @param type $file
     */
    public function renameUploadedFile($file, $dir = FALSE)
    { 
        try{
            $filter = new RenameUpload($dir);
            $filter->setUseUploadName(true);
            $filter->filter($file);
            
            return $dir.$file['name'];
        }catch(\Exception $e){
            throw new \Exception('Error moving uploaded file to the directory ' . $dir);
        }
    }
    
    /**
     * writeDataInFile: write the data of user form in a log file
     * Throw exception if data empty or inexistant log file
     * 
     * @param type $dataForm
     * @param type $log
     * @throws \Exception
     */
    public function writeDataInFile($dataForm, $log = FALSE)
    { 
        if(!$log){
            throw new \Exception('Log File cant be empty');
        }
        
        if(!$dataForm){
            throw new \Exception('Empty Data, nothing to log');
        }
        
        $writer = new Stream($log);
        $logger = new Logger();
        $logger->addWriter($writer);

        // Map Fields from input to save only the one we specified
        $data = array_intersect_key($dataForm, array_flip($this->mapField));
                
        $logger->info('--- User Added ---');
        $logger->info($data);
    }
    
}
