<?php

class FolderController extends MF_Controller_SecureAction {

    public function viewAction() {
		/*
		 * It's really hard to get CD_* libs working here since they pull
		 * a lot of CD's infrastructire which conficts with ZF.
		 * So only sample data for now
		 */
		$content = array();
		for($i=0; $i<10; $i++){
			$content[] = array(
				'pk_id' => $i,
				'title' => "Item #$i"
			);	
		} 
		
		$this->view->items = $content;
		$this->view->folder = array('pk_id' => 1, 'title' => 'Flder name');
    }

    public function deleteAction() {
    	$this->addSuccessMessage('Folder has been deleted');
		$this->redirect('/folder');
    }


}

