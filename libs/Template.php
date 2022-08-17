<?php
class Template{
	
	private $_fileTemplate;
	
	private $_folderTemplate;
	
	private $_controller;
	
	public function __construct($controller){
		$this->_controller = $controller;
	}
	
	public function load(){
		$folderTemplate = $this->getFolderTemplate();
		$fileTemplate 	= $this->getFileTemplate();
		
		$pathFileConfig	= TEMPLATE_PATH . $folderTemplate;
		if(file_exists($pathFileConfig)){
			$view = $this->_controller->getView();
			$view->setTemplatePath(TEMPLATE_PATH . $folderTemplate . $fileTemplate);
		}
	
	}
	
	// SET FILE TEMPLATE ('index.php')
	public function setFileTemplate($value = 'index.php'){
		$this->_fileTemplate = $value;
	}
	
	// GET FILE TEMPLATE
	public function getFileTemplate(){
		return $this->_fileTemplate;
	}
	
	// SET FOLDER TEMPLATE (default/main/)
	public function setFolderTemplate($value = 'backend/'){
		$this->_folderTemplate = $value;
	}
	
	// GET FOLDER CONFIG
	public function getFolderTemplate(){
		return $this->_folderTemplate;
	}
}