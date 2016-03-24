<?php

class ValThemeHandler {
	function post(){

		$_POST = array();
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
			$_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		global $db;
		$this->db = &$db;

		$valThemeIdWebsite = trim($_POST['id_website']);
		$valThemeName = trim($_POST['name']);
		$valThemeValue = trim($_POST['value']);
		

	 	$sql_insert = "INSERT INTO `val_theme` 
	    ( `id_website`, `name`, `value`)
	    VALUES (:id_website, :name, :value";

	    $query_insert = $this->db->prepare($sql_insert);
	    $query_insert->bindValue('id_website', $valThemeIdWebsite, PDO::PARAM_INT);
	    $query_insert->bindValue('name', $valThemeName, PDO::PARAM_STR);
	    $query_insert->bindValue('value', $valThemeValue, PDO::PARAM_STR);

	    $query_insert->execute();

	    $valThemeId = $this->db->lastInsertId();

	    header("HTTP/1.1 200 OK");
	    // header("HTTP/1.1 400 Bad Request");
		echo json_encode(array('id' => $valThemeId ););
	}

	function get($valThemeId){

		global $db;
		$this->db = &$db;

		$sql = "SELECT * FROM `val_theme` WHERE id = '".$valThemeId."';";
		$stmt =  $this->db->query($sql);
		$website = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($website);
	}
}

