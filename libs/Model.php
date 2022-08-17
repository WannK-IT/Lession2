<?php
class Model
{
	protected $connect;
	protected $table;
	protected $resultQuery;

	// CONNECT DATABASE
	public function __construct($params = null)
	{
		if ($params == null) {
			$params['server']	= DB_HOST;
			$params['username']	= DB_USER;
			$params['password']	= DB_PASS;
			$params['database']	= DB_NAME;
			$params['table']	= DB_TBL_USER;
		}
		$link = mysqli_connect($params['server'], $params['username'], $params['password'], $params['database']);
		if (!$link) {
			die('Fail connect: ');
		} else {
			$this->connect 	= $link;
			$this->table 	= $params['table'];
			// $this->query("SET NAMES 'utf8'");
			// $this->query("SET CHARACTER SET 'utf8'");
			mysqli_set_charset($link, "utf8mb4");
		}
	}

	// SET TABLE
	public function setTable($table)
	{
		$this->table = $table;
	}

	// INSERT
	public function insert($data)
	{
		$newQuery 	= $this->createInsertSQL($data);
		$query 		= "INSERT INTO `$this->table`(" . $newQuery['cols'] . ") VALUES (" . $newQuery['vals'] . ")";
		$this->query($query);
		return $this->lastID();
	}

	// CREATE INSERT SQL
	public function createInsertSQL($data)
	{
		$cols = $vals = "";
		$newQuery = [];
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$cols .= ", `$key`";
				$vals .= ", '$value'";
			}
		}
		$newQuery['cols'] = substr($cols, 2);
		$newQuery['vals'] = substr($vals, 2);
		return $newQuery;
	}

	// LAST ID
	public function lastID()
	{
		return mysqli_insert_id($this->connect);
	}

	// QUERY
	public function query($query)
	{
		$this->resultQuery = mysqli_query($this->connect, $query);
		return $this->resultQuery;
	}

	// UPDATE
	public function update($data, $where)
	{
		$newSet 	= $this->createUpdateSQL($data);
		$newWhere 	= $this->createWhereUpdateSQL($where);
		$query = "UPDATE `$this->table` SET " . $newSet . " WHERE $newWhere";
		$this->query($query);
	}

	// CREATE UPDATE SQL
	public function createUpdateSQL($data)
	{
		$newQuery = "";
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$newQuery .= ", `$key` = '$value'";
			}
		}
		$newQuery = substr($newQuery, 2);
		return $newQuery;
	}

	// CREATE WHERE UPDATE SQL
	public function createWhereUpdateSQL($data)
	{
		$newWhere = [];
		if (!empty($data)) {
			foreach ($data as $value) {
				$newWhere[] = "`$value[0]` = '$value[1]'";
				$newWhere[] = $value[2];
			}
			$newWhere = implode(" ", $newWhere);
		}
		return $newWhere;
	}

	// LIST RECORD
	public function listRecord($query)
	{
		$result = [];
		if (!empty($query)) {
			$resultQuery = $this->query($query);
			if (mysqli_num_rows($resultQuery) > 0) {
				while ($row = mysqli_fetch_assoc($resultQuery)) {
					$result[] = $row;
				}
				mysqli_free_result($resultQuery);
			}
		}
		return $result;
	}

	// SINGLE RECORD
	public function singleRecord($query)
	{
		$result = [];
		if (!empty($query)) {
			$resultQuery = $this->query($query);
			if (mysqli_num_rows($resultQuery) > 0) {
				$result = mysqli_fetch_assoc($resultQuery);
			}
			mysqli_free_result($resultQuery);
		}
		return $result;
	}

	// EXIST
	public function isExist($query)
	{
		if ($query != null) {
			$this->resultQuery = $this->query($query);
		}
		if (mysqli_num_rows($this->resultQuery) > 0) return true;
		return false;
	}

	// DISCONNECT DATABASE
	public function __destruct()
	{
		mysqli_close($this->connect);
	}
}
