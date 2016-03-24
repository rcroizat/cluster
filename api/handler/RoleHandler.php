<?php

class RoleHandler {
	function post(){

		$_POST = array();
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
			$_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		global $db;
		$this->db = &$db;

		$roleRole = trim($_POST['role']);

	 	$sql_insert = "INSERT INTO `role` 
	    ( `role`)
	    VALUES (:role);";

	    $query_insert = $this->db->prepare($sql_insert);
	    $query_insert->bindValue('role', $itemIdUser, PDO::PARAM_STR);

	    $query_insert->execute();

	    $roleId = $this->db->lastInsertId();

	    header("HTTP/1.1 200 OK");
		echo json_encode(array('id' => $roleId ););
	}

	function get($roleId){

		global $db;
		$this->db = &$db;

		$sql = "SELECT * FROM `role` WHERE id = '".$roleId."';";
		$stmt =  $this->db->query($sql);
		$website = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($website);
	}
}

