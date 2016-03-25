<?php

class WebsiteCatHandler {
	function post(){

		$_POST = array();
		$_POST = (array) json_decode(file_get_contents('php://input'));

		global $db;
		$this->db = &$db;

		$websiteCatIdWebsite = trim($_POST['id_website']);
		$websiteCatIdCat = trim($_POST['id_cat']);
		

	 	$sql_insert = "INSERT INTO `website-cat` 
	    ( `id_website`, `id_cat`)
	    VALUES (:id_website, :id_cat";

	    $query_insert = $this->db->prepare($sql_insert);
	    $query_insert->bindValue('id_website', $valThemeIdWebsite, PDO::PARAM_INT);
	    $query_insert->bindValue('id_cat', $valThemeIdCat, PDO::PARAM_INT);

	    $query_insert->execute();

	    $websiteCatId = $this->db->lastInsertId();

	    header("HTTP/1.1 200 OK");
	    // header("HTTP/1.1 400 Bad Request");
		echo json_encode(array('id' => $websiteCatId ));
	}

	function get($websiteCatId){

		global $db;
		$this->db = &$db;

		$sql = "SELECT * FROM `website-cat` WHERE id = '".$websiteCatId."';";
		$stmt =  $this->db->query($sql);
		$website = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($website);
	}
}

