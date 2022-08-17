<?php
class HomeController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->load();
	}

	public function indexAction()
	{
		$this->_view->listUsers	= $this->_model->list($this->_arrParam, 'users');
		$this->_view->render('home/index', true);
	}

	public function deleteAction(){
		$this->_model->delete($this->_arrParam);
		URL::direct(DEFAULT_MODULE, DEFAULT_CONTROLLER, DEFAULT_ACTION);
	}

	public function formAction(){
		$this->_view->listRoles	= $this->_model->list($this->_arrParam, 'roles');
		$infoUser = $this->_model->single($this->_arrParam);
		
		$this->_view->results 	= $infoUser;
		if($this->_arrParam['task'] == 'edit'){
			$this->_view->title = 'Edit';
		}elseif($this->_arrParam['task'] == 'copy'){
			$this->_view->title = 'Copy';
		}

		if(isset($this->_arrParam['_token'])){
			$source 	= [
				'fullName' 	=> $this->_arrParam['fullName'],
				'email' 	=> $this->_arrParam['email'],
				'password' 	=> $this->_arrParam['password'],
				'role_id'	=> $this->_arrParam['role_id']
			];
			$validate 	= new Validate($source);
			$arrEmails	= array_column($this->_model->list($this->_arrParam, 'email'), 'email');
			$validate->addRule('fullName', 'string', ['min' => 1, 'max' => 50])
					->addRule('email', 'email', $arrEmails)
					->addRule('password', 'password', $this->_arrParam['re_password'])
					->addRule('role_id', 'int', ['min' => 1, 'max' => 100]);
			$validate->run();
			$this->_view->results = $validate->getResult();
			$params 	= $validate->getResult();

			// kiểm tra hợp lệ
			if (!$validate->isValid()) {
				$this->_view->errors  = $validate->showErrors();
			}else {
				switch($this->_arrParam['task']){
					case 'edit':
						$this->_model->handleForm($params, $this->_arrParam, 'edit');
						break;
					case 'copy':
						$this->_model->handleForm($params, $this->_arrParam, 'copy');
						break;
				}
				
				$this->redirect(DEFAULT_MODULE, DEFAULT_CONTROLLER, DEFAULT_ACTION);
			}
		}
		$this->_view->render('home/form', true);
	}

	public function viewAction(){
		$this->_view->title 	= 'View';
		$this->_view->infoUser	= $this->_model->single($this->_arrParam);
		$this->_view->render('home/view', true);
	}

}
