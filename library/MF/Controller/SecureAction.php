<?php

abstract class MF_Controller_SecureAction extends MF_Controller_Action {
	
	function preDispatch(){
		$authorized = true;
		if(!$authorized){
			$this->addWarningMessage('Authorization required');
			$this->redirector()->gotoUrl('/login');
		}
	}
	
}

