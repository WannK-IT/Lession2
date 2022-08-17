<?php
class HomeModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(DB_TBL_USER);
	}

	public function list($arrParams, $option)
	{
		switch ($option) {
			case 'users':
				$privilege_limit 	= (isset($_SESSION['role_id']) && $_SESSION['role_id'] != 1) ? " AND `u`.`id` = '" . $_SESSION['user_id'] . "'" : "";
				$query[] 	= "SELECT `u`.`id`, `u`.`email`, `u`.`fullName`, `u`.`password`, `u`.`role_id`, `r`.`role_name`";
				$query[] 	= "FROM `{$this->table}` AS `u`, `" . DB_TBL_ROLE . "` AS `r`";
				$query[] 	= "WHERE `u`.`role_id` = `r`.`id`" . $privilege_limit;

				// Filter result search
				$query[] = (!empty($arrParams['search'])) ? "AND `u`.`fullName` LIKE '%" . trim($arrParams['search']) . "%'" : '';
		

				$query		= implode(" ", $query);
				$result 	= $this->listRecord($query);
				break;
			case 'roles':
				$query		= "SELECT `id`, `role_name` FROM `" . DB_TBL_ROLE . "`";
				$result 	= $this->listRecord($query);
				break;
			case 'email':
				$ignoreID	= ($arrParams['task'] == 'edit') ? "WHERE `id` NOT IN ('" . $arrParams['id'] . "')" : "";
				$query		= "SELECT `email` FROM `" . DB_TBL_USER . "` $ignoreID";
				$result 	= $this->listRecord($query);
				break;
		}
		return $result;
	}

	public function single($params)
	{
		$query[] = "SELECT `u`.`id`, `u`.`email`, `u`.`fullName`, `u`.`password`, `u`.`created_date`, `u`.`role_id`, `r`.`role_name`";
		$query[] = "FROM `{$this->table}` AS `u`, `" . DB_TBL_ROLE . "` AS `r`";
		$query[] = "WHERE `u`.`id` = '" . $params['id'] . "'";
		$query 	= implode(" ", $query);
		$result = $this->singleRecord($query);
		return $result;
	}

	public function delete($arrParams)
	{
		$id 	= mysqli_real_escape_string($this->connect, $arrParams['id']);
		$query 	= "DELETE FROM `{$this->table}` WHERE `id` = '" . $id . "'";
		$this->query($query);
	}

	public function handleForm($arrParams, $paramsUrl, $option)
	{
		switch ($option) {
			case 'edit':
				$arrParams['password'] = $arrParams['password'];
				$this->update($arrParams, [['id', $paramsUrl['id']]]);
				break;
			case 'copy':
				$arrParams['created_date'] 	= date('Y-m-d H:i:s');
				$arrParams['password'] = $arrParams['password'];
				$this->insert($arrParams);
				break;
		}
	}
}
