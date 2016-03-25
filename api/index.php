<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: accept, content-type');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

// APP
require('handler/WebsiteHandler.php');
require('handler/InputHandler.php');
require('handler/ThemeHandler.php');
require('handler/ValThemeHandler.php');
require('handler/UserHandler.php');
require('handler/WebsiteCatHandler.php');
require('handler/CatHandler.php');
require('handler/ItemHandler.php');
require('handler/TypeHandler.php');
require('handler/RoleHandler.php');
require('handler/ValHandler.php');


require('db.php');
require('Toro.php');

header('Content-Type: application/json');

ToroHook::add("404", function() {
    echo "Request not found";
});

Toro::serve(array(

	"website/:number"			=> "WebsiteHandler",			// GET
	"website/"				=> "WebsiteHandler",			// POST

	"input/:number"			=> "InputHandler",				// GET
	"input/"					=> "InputHandler",				// POST
	
	"theme/:number"			=> "ThemeHandler",				// GET
	"theme/"					=> "ThemeHandler",				// POST

	"valTheme/:number"		=> "ValThemeHandler",			// GET
	"valTheme/"				=> "ValThemeHandler",			// POST

	"user/:number"			=> "UserHandler",				// GET
	"user/"					=> "UserHandler",				// POST

	"type/:number"			=> "TypeHandler",				// GET
	"type/"					=> "TypeHandler",				// POST

	"websitecat/:number"		=> "WebsiteCatHandler",			// GET
	"websitecat/"				=> "WebsiteCatHandler",			// POST

	"cat/:number"				=> "CatHandler",				// GET
	"cat/"					=> "CatHandler",				// POST

	"val/:number"				=> "ValHandler",				// GET
	"val/"					=> "ValHandler",				// POST

	"item/:number"			=> "ItemHandler",				// GET
	"item/"					=> "ItemHandler",				// POST

	"role/:number"			=> "RoleHandler",				// GET
	"role/"					=> "RoleHandler"				// POST

));