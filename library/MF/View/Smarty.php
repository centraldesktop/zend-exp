<?php

class MF_View_Smarty implements Zend_View_Interface {
	
	private $_smarty = null;
	
	
	public function __construct(array $conf, $tmplPath = null, array $vars = array()){
		$this->_smarty = new Smarty();
		$this->_smarty->template_dir = $conf['template_dir'];
		$this->_smarty->compile_dir = $conf['compile_dir'];
		$this->_smarty->cache_dir = $conf['cache_dir'];
	}
	
	/**
	* Return the template engine object
	*
	* @return Smarty
	*/
    public function getEngine(){
		return $this->_smarty;
    }

    /**
     * Set the path to find the view script used by render()
     *
     * @param string|array The directory (-ies) to set as the path. Note that
     * the concrete view implentation may not necessarily support multiple
     * directories.
     * @return void
     */
    public function setScriptPath($path){
    	if (is_readable($path)) {
            $this->_smarty->template_dir = $path;
            return;
        }
 
        throw new Exception('Invalid path provided');
    }

    /**
     * Retrieve all view script paths
     *
     * @return array
     */
    public function getScriptPaths(){
		return array($this->_smarty->template_dir);
    }

    /**
     * Set a base path to all view resources
     *
     * @param  string $path
     * @param  string $classPrefix
     * @return void
     */
    public function setBasePath($path, $classPrefix = 'Zend_View'){
    	return $this->setScriptPath($path);
    }

    /**
     * Add an additional path to view resources
     *
     * @param  string $path
     * @param  string $classPrefix
     * @return void
     */
    public function addBasePath($path, $classPrefix = 'Zend_View'){
    	return $this->setScriptPath($path);
    }

    /**
     * Assign a variable to the view
     *
     * @param string $key The variable name.
     * @param mixed $val The variable value.
     * @return void
     */
    public function __set($key, $val){
    	$this->_smarty->assign($key, $val);
    }

    /**
     * Allows testing with empty() and isset() to work
     *
     * @param string $key
     * @return boolean
     */
    public function __isset($key){
    	return !is_null($this->_smarty->get_template_vars($key));
    }

    /**
     * Allows unset() on object properties to work
     *
     * @param string $key
     * @return void
     */
    public function __unset($key){
    	$this->_smarty->clear_assign($key);
    }

    /**
     * Assign variables to the view script via differing strategies.
     *
     * Suggested implementation is to allow setting a specific key to the
     * specified value, OR passing an array of key => value pairs to set en
     * masse.
     *
     * @see __set()
     * @param string|array $spec The assignment strategy to use (key or array of key
     * => value pairs)
     * @param mixed $value (Optional) If assigning a named variable, use this
     * as the value.
     * @return void
     */
    public function assign($spec, $value = null){
    	if (is_array($spec)) {
            $this->_smarty->assign($spec);
            return;
        }
 
        $this->_smarty->assign($spec, $value);
    }

    /**
     * Clear all assigned variables
     *
     * Clears all variables assigned to Zend_View either via {@link assign()} or
     * property overloading ({@link __get()}/{@link __set()}).
     *
     * @return void
     */
    public function clearVars(){
    	 $this->_smarty->clear_all_assign();
    }

    /**
     * Processes a view script and returns the output.
     *
     * @param string $name The script name to process.
     * @return string The script output.
     */
    public function render($name){
    	return $this->_smarty->fetch($name);
    }
	
}