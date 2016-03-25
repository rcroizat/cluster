<?php

class ValHandler {
	function post(){

		$_POST = array();
		$_POST = (array) json_decode(file_get_contents('php://input'));

		global $db;
		$this->db = &$db;

		$valIdItem = trim($_POST['id_item']);
		$valType = trim($_POST['type']);
		$valValue = trim($_POST['value']);

	 	$sql_insert = "INSERT INTO `val` 
	    ( `id_item`, `type`, `value` )
	    VALUES (:id_item`, :type, :value );";

	    $query_insert = $this->db->prepare($sql_insert);
	    $query_insert->bindValue('id_item', $valIdItem, PDO::PARAM_INT);
	    $query_insert->bindValue('type', $valType, PDO::PARAM_STR);
	    $query_insert->bindValue('value', $valValue, PDO::PARAM_STR);

	    $query_insert->execute();

	    $valId = $this->db->lastInsertId();

	    header("HTTP/1.1 200 OK");
		echo json_encode(array('id' => $valId ));
	}

	function get($valId){

		global $db;
		$this->db = &$db;

		$sql = "SELECT * FROM `val` WHERE id = '".$valId."';";
		$stmt =  $this->db->query($sql);
		$type = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($type);
	}
}

