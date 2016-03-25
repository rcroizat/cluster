<?php

class WebsiteHandler {
	function post(){

		$_POST = json_decode(file_get_contents('php://input'));
		// if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		// 	$_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		// }

		// global $db;
		// $this->db = &$db;

		// $websiteName = trim($_POST['name']);
		// $websiteUrl = trim($_POST['url']);
		// $websiteDescription = trim($_POST['description']);
		// $websiteIdType = trim($_POST['id_type']);
		// $websiteIdTheme = trim($_POST['id_theme']);

	 // 	$sql_insert = "INSERT INTO `website` 
	 //    ( `name`, `url`, `user_registered`, `description`, `id_type`, `id_theme`)
	 //    VALUES (:name, :url, :user_registered, :description, :id_type, :id_theme);";

	 //    $query_insert = $this->db->prepare($sql_insert);
	 //    $query_insert->bindValue('name', $websiteName, PDO::PARAM_STR);
	 //    $query_insert->bindValue('url', $websiteUrl, PDO::PARAM_STR);
	 //    $query_insert->bindValue('description', $websiteDescription, PDO::PARAM_STR);
	 //    $query_insert->bindValue('id_type', $websiteIdType, PDO::PARAM_INT);
	 //    $query_insert->bindValue('id_theme', $websiteIdTheme, PDO::PARAM_INT);

	 //    $query_insert->execute();

	 //    $websiteId = $this->db->lastInsertId();

	 //    header("HTTP/1.1 200 OK");
		// echo json_encode(array('id' => $websiteId ));
		// echo json_encode($_POST);
		// echo json_encode(file_get_contents('php://input'));
		// echo json_encode(json_decode(file_get_contents('php://input')) );
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

