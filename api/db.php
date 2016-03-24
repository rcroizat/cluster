<?php

// connexion a la base de donnees

$mysql_host = "149.202.49.52";
$mysql_user = "root";
$mysql_pwd = "root";
$conn_error = "Connexion a la base de donnee impossible";
$mysql_db = 'cluster';
$db = null;

try 
{
	$db = new PDO("mysql:host=$mysql_host;dbname=$mysql_db", $mysql_user, $mysql_pwd , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') );
} 
catch (PDOException $e) 
{

    	echo 'Connexion &eacute;chou&eacute;e : ' . $e->getMessage();
}