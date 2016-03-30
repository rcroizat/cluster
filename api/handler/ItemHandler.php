<?php

class ItemHandler {
	function post(){

		$_POST = array();
		$_POST = (array) json_decode(file_get_contents('php://input'));

		global $db;
		$this->db = &$db;

		$itemIdUser = trim($_POST['id_user']);
		$itemIdWebsite = trim($_POST['id_website']);

	 	$sql_insert = "INSERT INTO `website` 
	    ( `id_user`, `id_website`)
	    VALUES (:id_user, :id_website);";

	    $query_insert = $this->db->prepare($sql_insert);
	    $query_insert->bindValue('id_user', $itemIdUser, PDO::PARAM_INT);
	    $query_insert->bindValue('id_website', $itemIdWebsite, PDO::PARAM_INT);

	    $query_insert->execute();

	    $itemId = $this->db->lastInsertId();

	    header("HTTP/1.1 200 OK");
		echo json_encode(array('id' => $itemId ));
	}

	function get($itemId){

		global $db;
		$this->db = &$db;


		if ($catId == 0) {
			$sql = "SELECT * FROM `item`;";
		}else{
			$sql = "SELECT * FROM `item` WHERE id = '".$itemId."';";
		}
		
			$stmt =  $this->db->query($sql);
			$website = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($website);
	}
}

