<?php

abstract class MF_Controller_Action extends Zend_Controller_Action {
	
	const STATUS_SUCCESS = 1;
	const STATUS_FAILURE = 2;
	const STATUS_WARNING = 4;
	
	private $_flashMessennger = null;
	private $_redirector = null;
	
	public function init(){
		$format = $this->getRequest()->getParam('format');
		$action = $this->getRequest()->getParam('action');
		$language = $this->getRequest()->getParam('ln', null);
		
		switch($format){
			case 'json':
			case 'xml':
				$this->_helper
				     ->getHelper('ContextSwitch')
             	     ->setActionContext($action, $format)
             	     ->initContext();
             	break;
             				
			case 'html':
			default:
				$smartyConf = $this->getInvokeArg('bootstrap')->getOption('smarty');
				$this->view = new MF_View_Smarty($smartyConf);
		        $viewRenderer = $this->_helper->getHelper('viewRenderer');
		        $viewRenderer->setView($this->view)
		                     ->setViewBasePathSpec($smartyConf['template_dir'])
		                     ->setViewScriptPathSpec(':controller/:action.:suffix')
		                     ->setViewScriptPathNoControllerSpec(':action.:suffix')
		                     ->setViewSuffix('html');
		                     //->setNoRender(true);
		                     
		        $this->view->messages = $this->getMessages();
		}
		
		if(is_null($language)){
			$language = $this->getInvokeArg('bootstrap')->getOption('language');
		}
		
		$this->view->tr = new Zend_Translate(
		    array(
		        'adapter' => 'array',
		        'content' => APPLICATION_PATH."/languages/$language.php",
		        'locale'  => $language
		    )
		);
	}
	
	/*------ helpers ------*/
	
	protected function messenger(){
		if(is_null($this->_flashMessennger)){
			$this->_flashMessennger = $this->_helper->getHelper('FlashMessenger');
		}
		return $this->_flashMessennger;
	}
	
	protected function redirector(){
		if(is_null($this->_redirector)){
			$this->_redirector = $this->_helper->getHelper('Redirector');
		}
		return $this->_redirector;
	}
	
	/*------ messages ------*/
	
    private function addMessage($status, $message){
    	$this->messenger()->addMessage(array(
    		'status' => $status, 
    		'message' => $message
    	));
    }
    
    protected function addSuccessMessage($message){
    	$this->addMessage(self::STATUS_SUCCESS, $message);
    }
    
    protected function addFailureMessage($message){
    	$this->addMessage(self::STATUS_FAILURE, $message);
    }
    
    protected function addWarningMessage($message){
    	$this->addMessage(self::STATUS_WARNING, $message);
    }
    
    protected function getMessages(){
    	return $this->messenger()->getMessages();
    }
    
    /*------ response ------*/
    
    
    
    /*------ misc ------*/
    
    protected function showInfo(){
    	$this->_helper->viewRenderer->setNoRender(true);
    	
    	echo '<h2>Request:</h2>';
		Zend_Debug::dump($this->getRequest()->getParams());
		
		echo '<h2>Messages:</h2>';
		Zend_Debug::dump($this->getMessages());

		echo "\n\n";
    }
    
    protected function redirect($url = '/'){
    	$this->redirector()
    	     ->setCode(303)
    	     ->gotoUrl($url);
    }
}


