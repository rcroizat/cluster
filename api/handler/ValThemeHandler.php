<?php

class ValThemeHandler {
	function post(){

		$_POST = array();
		$_POST = (array) json_decode(file_get_contents('php://input'));

		global $db;
		$this->db = &$db;

		$valThemeIdWebsite = trim($_POST['id_website']);
		$valThemeName = trim($_POST['name']);
		$valThemeValue = trim($_POST['value']);

		$sql = "DELETE FROM `val_theme` WHERE `id_website` = :id_website;";

		$query_update = $this->db->prepare($sql);
		$query_update->bindValue('id_website', $valThemeIdWebsite);
		$query_update->execute();
		

	 	$sql_insert = "INSERT INTO `val_theme` 
	    ( `id_website`, `name`, `value`)
	    VALUES (:id_website, :name, :value)";

	    $query_insert = $this->db->prepare($sql_insert);
	    $query_insert->bindValue('id_website', (int) $valThemeIdWebsite, PDO::PARAM_INT);
	    $query_insert->bindValue('name', $valThemeName, PDO::PARAM_STR);
	    $query_insert->bindValue('value', $valThemeValue, PDO::PARAM_STR);

	    $query_insert->execute();

	    $valThemeId = $this->db->lastInsertId();

	    header("HTTP/1.1 200 OK");
	    // header("HTTP/1.1 400 Bad Request");
		echo json_encode(array('id' => $valThemeId, 'valThemeIdWebsite' => $valThemeIdWebsite, 'valThemeName' => $valThemeName, 'valThemeValue' => $valThemeValue, 'sql_insert' => $sql_insert ));
	}

	function get($websiteId){

		global $db;
		$this->db = &$db;

		$sql = "SELECT * FROM `val_theme` WHERE id_website = '".$websiteId."';";
		$stmt =  $this->db->query($sql);
		$website = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($website);
	}
}

