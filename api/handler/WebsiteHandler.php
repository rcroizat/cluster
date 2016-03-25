<?php

class WebsiteHandler {
	function post(){

		$_POST = (array) json_decode(file_get_contents('php://input'));

		global $db;
		$this->db = &$db;

		$websiteName = trim($_POST['name']);
		$websiteUrl = trim($_POST['url']);
		$websiteDescription = trim($_POST['description']);
		$websiteIdType = trim($_POST['id_type']);
		$websiteIdTheme = trim($_POST['id_theme']);

	 	$sql_insert = "INSERT INTO `website` 
	    ( `name`, `url`, `description`, `id_type`, `id_theme`)
	    VALUES (:name, :url, :description, :id_type, :id_theme);";

	    $query_insert = $this->db->prepare($sql_insert);
	    $query_insert->bindValue('name', $websiteName, PDO::PARAM_STR);
	    $query_insert->bindValue('url', $websiteUrl, PDO::PARAM_STR);
	    $query_insert->bindValue('description', $websiteDescription, PDO::PARAM_STR);
	    $query_insert->bindValue('id_type', $websiteIdType, PDO::PARAM_INT);
	    $query_insert->bindValue('id_theme', $websiteIdTheme, PDO::PARAM_INT);

	    $query_insert->execute();

	    $websiteId = $this->db->lastInsertId();

	    header("HTTP/1.1 200 OK");
		echo json_encode(array('id' => $websiteId ));

	}

	function get($websiteId){

		global $db;
		$this->db = &$db;

		$sql = "SELECT * FROM `website` WHERE id = '".$websiteId."';";
		$stmt =  $this->db->query($sql);
		$website = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($website);
	}
}

