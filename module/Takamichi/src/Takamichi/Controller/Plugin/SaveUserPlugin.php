<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Takamichi\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Log\Writer\Stream;
use Zend\Log\Logger;

class SaveUserPlugin extends AbstractPlugin
{    
    //Fields form UserForm that we want to log
    protected $mapField = array(
        'username',
        'password',
        'email',
        'image'
    );
    
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
