<?php

class ThemeHandler {
	function post(){

		$_POST = array();
		$_POST = (array) json_decode(file_get_contents('php://input'));

		global $db;
		$this->db = &$db;

		$themeName = trim($_POST['name']);

	 	$sql_insert = "INSERT INTO `website` 
	    ( `name`)
	    VALUES (:name);";

	    $query_insert = $this->db->prepare($sql_insert);
	    $query_insert->bindValue('name', $themeName, PDO::PARAM_STR);

	    $query_insert->execute();

	    $themeId = $this->db->lastInsertId();

	    header("HTTP/1.1 200 OK");
	    // header("HTTP/1.1 400 Bad Request");
		echo json_encode(array('id' => $themeId));
	}

	function get($themeId){

		global $db;
		$this->db = &$db;

		$sql = "SELECT * FROM `theme` WHERE id = '".$themeId."';";
		$stmt =  $this->db->query($sql);
		$website = $stmt->fetch(PDO::FETCH_ASSOC);

		echo json_encode($website);
	}
}

