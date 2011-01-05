<?php

class ItemController extends MF_Controller_SecureAction {

    public function viewAction() {
    	$this->view->data = array(
    		'pk_id' => $this->getRequest()->getParam('id')
    	);
    }

    public function deleteAction() {
		$this->addSuccessMessage('Item with pk_id <b>'.$this->getRequest()->getParam('id').'</b> has been deleted');
		$this->redirect('/folder');
    }


}

