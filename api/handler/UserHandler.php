<?php

class UserHandler {
	function post(){

		include('lib/phpass.php');

		$_POST = array();
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
			$_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		global $db;
		$this->db = &$db;

		$userEmail = strtolower(trim($_POST['email']));
		$userPass = trim($_POST['pass']);
		$userPseudo = trim($_POST['pseudo']);
		$userDescription = trim($_POST['description']);
		$userIdRole = trim($_POST['id_role']);

	    //USER EXISTS
	    $sql = "SELECT * FROM users WHERE email = :email;";
	    $query = $this->db->prepare($sql);
	    $query->bindValue('email', $userEmail);
	    $query->execute();

	    if($query->rowCount() > 0){
	    	header("HTTP/1.1 400 Bad Request");
	        $return = 'Cette adresse email n\'est pas disponible';
	    } 
	    else {
	       
		 	$sql_insert = "INSERT INTO `users` 
		    ( `email`, `pass`, `pseudo`, `description`, `id_role` )
		    VALUES (:email, :pass, :pseudo, :description, :id_role );";

		    $hasher = new PasswordHash(8, TRUE);
		    $hashed_password = $hasher->HashPassword($userPass);

		    $query_insert = $this->db->prepare($sql_insert);
		    $query_insert->bindValue('email', $userEmail, PDO::PARAM_STR);
		    $query_insert->bindValue('pass', $hashed_password, PDO::PARAM_STR);
		    $query_insert->bindValue('pseudo', $userPass, PDO::PARAM_STR);
		    $query_insert->bindValue('description', $userPass, PDO::PARAM_STR);
		    $query_insert->bindValue('id_role', $userPass, PDO::PARAM_INT);

		    $query_insert->execute();
		    $return = $this->db->lastInsertId();

	    	header("HTTP/1.1 200 OK");

		}

		echo json_encode($return);
	}

	function get($userId){

		global $db;
		$this->db = &$db;

		$sql = "SELECT * FROM `users` WHERE id = '".$userId."';";
		$stmt =  $this->db->query($sql);
		$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($user);
	}
}

