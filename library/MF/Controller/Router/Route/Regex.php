<?php

require_once 'Zend/Controller/Router/Route/Regex.php';

class MF_Controller_Router_Route_Regex extends Zend_Controller_Router_Route_Regex {
	
	protected $_formats = array('html', 'xml', 'json');
	protected $_defaultFormat = 'html';
	
	public function match($path, $partial = false){
		$format = null;

		if(preg_match('@\.('.join('|', $this->_formats).')$@i', $path, $matchs)){
			$format = $matchs[1];
			$path = substr($path, 0, -strlen($matchs[0]));
			unset($matchs);
		}

		$values = parent::match($path, $partial);
		
		if(is_array($values)){
			if(is_null($format)){
				if(!isset($values['format']) || !in_array($values['format'], $this->_formats)){
					$values['format'] = $this->_defaultFormat;
				} 
			}else{
				$values['format'] = $format;
			}
		}
		
		return $values;
	}
}

