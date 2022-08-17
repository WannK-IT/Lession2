<?php
class UserController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->load();
	}

	public function loginAction()
	{
		if(isset($this->_arrParam['_token'])){
			$this->_view->resultLogin = $this->_model->login($this->_arrParam);
			if($this->_view->resultLogin == true){
				URL::direct(DEFAULT_MODULE, DEFAULT_CONTROLLER, DEFAULT_ACTION);
			}else{
				$_SESSION['login_failed'] = 'Tài khoản hoặc mật khẩu chưa chính xác !';
			}
		}
		$this->_view->render('user/login', true);
	}

    public function registerAction()
	{
		if(isset($this->_arrParam['_token'])){
			$source = [
				'fullName' => $this->_arrParam['fullName'],
				'email' => $this->_arrParam['email'],
				'password' => md5($this->_arrParam['password'])
			];
			$validate = new Validate($source);
			$arrEmails	= array_column($this->_model->list($this->_arrParam, 'email'), 'email');
			$validate->addRule('fullName', 'string', ['min' => 1, 'max' => 50])
					->addRule('email', 'email', $arrEmails)
					->addRule('password', 'password', md5($this->_arrParam['re_password']));
			$validate->run();
			$this->_view->results = $validate->getResult();
			$params = $validate->getResult();

			// kiểm tra hợp lệ
			if (!$validate->isValid()) {
				$this->_view->errors  = $validate->showErrors();
			} else {
				$this->_model->register($params);
				$this->redirect(DEFAULT_MODULE, USER_CONTROLLER, USER_LOGIN_ACTION);
			}
		}
		$this->_view->render('user/register', true);
	}

	public function logoutAction(){
		session_destroy();
		URL::direct(DEFAULT_MODULE, USER_CONTROLLER, USER_LOGIN_ACTION);
	}

}
