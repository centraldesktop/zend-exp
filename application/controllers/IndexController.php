<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		Zend_Debug::dump($this->getRequest()->getRawBody());
    	
		
    	
    	return;
    }


}

