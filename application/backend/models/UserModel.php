<?php
class UserModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_USER);
	}

	public function login($arrParams)
	{
		$email		= mysqli_real_escape_string($this->connect, $arrParams['email']);
		$password	= mysqli_real_escape_string($this->connect, $arrParams['password']);
		$query[] 	= "SELECT `email`, `password`, `id`, `role_id` FROM `{$this->table}`";
		$query[] 	= "WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'";
		$query		= implode($query);
		$result		= $this->singleRecord($query);

		// Check if email & password exists
		if(!empty($result)){
			$_SESSION['flag_login']	= true;
			$_SESSION['email'] 		= $result['email'];
			$_SESSION['user_id'] 	= $result['id'];
			$_SESSION['role_id'] 	= $result['role_id'];
		}

		return $result;
	}

	public function register($arrParams){
		$arrParams['created_date'] 	= date('Y-m-d H:i:s');
		$arrParams['role_id'] 		= 2;
		$this->insert($arrParams);
	}

	public function list($arrParams, $option)
	{
		switch ($option) {
			case 'email':
				$query		= "SELECT `email` FROM `" . DB_TBL_USER . "`";
				$result 	= $this->listRecord($query);
				break;
		}
		return $result;
	}
}
