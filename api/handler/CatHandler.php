<?php

class CatHandler {
	function post(){

		$_POST = array();
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
			$_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		global $db;
		$this->db = &$db;

		$catName = trim($_POST['name']);
		

	 	$sql_insert = "INSERT INTO `cat` 
	    ( `name`)
	    VALUES (:name";

	    $query_insert = $this->db->prepare($sql_insert);
	    $query_insert->bindValue('name', $catName, PDO::PARAM_STR);

	    $query_insert->execute();

	    $catId = $this->db->lastInsertId();

	    header("HTTP/1.1 200 OK");
	    // header("HTTP/1.1 400 Bad Request");
		echo json_encode(array('id' => $catId ));
	}

	function get($catId){

		global $db;
		$this->db = &$db;

		$sql = "SELECT * FROM `cat` WHERE id = '".$catId."';";
		$stmt =  $this->db->query($sql);
		$website = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($website);
	}
}

