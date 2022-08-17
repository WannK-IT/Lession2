<?php
class View{
	
	public $_moduleName;
	public $_templatePath;
	public $_fileView;
	
	public function __construct($moduleName){
		$this->_moduleName = $moduleName;
	}
	
	public function render( $fileInclude, $loadFull = true){
		$path = APPLICATION_PATH. $this->_moduleName . DS . 'views' . DS . $fileInclude . '.php';
		if(file_exists($path)){
			if($loadFull == true){
				$this->_fileView = $fileInclude;
				require_once $this->_templatePath;
			}else{
				require_once $path;
			}
		}else{
			echo '<h3>' . __METHOD__ . ': Error</h3>';
		}
	}
	
	// Thiết lập đường dẫn đến template
	public function setTemplatePath($path){
		$this->_templatePath = $path;
	}
	
}