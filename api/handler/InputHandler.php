<?php

class InputHandler {
	function post(){

		$_POST = array();
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
			$_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		global $db;
		$this->db = &$db;

		$inputIdWebSite = trim($_POST['idWebSite']);
		$inputType = trim($_POST['type']);
		$inputVal = trim($_POST['val']);

	 	$sql_insert = "INSERT INTO `input` 
	    ( `id_website`, `type`, `val`)
	    VALUES (:idWebSite, :type, :val);";

	    $query_insert = $this->db->prepare($sql_insert);
	    $query_insert->bindValue('idWebSite', $inputIdWebSite, PDO::PARAM_INT);
	    $query_insert->bindValue('type', $inputType, PDO::PARAM_STR);
	    $query_insert->bindValue('val', $inputVal, PDO::PARAM_STR);

	    $query_insert->execute();

	    $inputId = $this->db->lastInsertId();

	    header("HTTP/1.1 200 OK");
	    // header("HTTP/1.1 400 Bad Request");
		echo json_encode(array('id' => $inputId ););
	}

	function get($websiteId){

		global $db;
		$this->db = &$db;

		$sql = "SELECT * FROM `input` WHERE id_website = '".$websiteId."';";
		$stmt =  $this->db->query($sql);
		$inputs = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($inputs);
	}
}

