<?php

class TypeHandler {
	function post(){

		$_POST = array();
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
			$_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		global $db;
		$this->db = &$db;

		$typeName = trim($_POST['name']);

	 	$sql_insert = "INSERT INTO `type` 
	    ( `name` )
	    VALUES (:name );";

	    $query_insert = $this->db->prepare($sql_insert);
	    $query_insert->bindValue('name', $typeName, PDO::PARAM_STR);

	    $query_insert->execute();

	    $typeId = $this->db->lastInsertId();

	    header("HTTP/1.1 200 OK");
		echo json_encode(array('id' => $typeId ));
	}

	function get($typeId){

		global $db;
		$this->db = &$db;

		$sql = "SELECT * FROM `type` WHERE id = '".$typeId."';";
		$stmt =  $this->db->query($sql);
		$type = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($type);
	}
}

