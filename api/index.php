<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: accept, content-type');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

// APP
require('handler/WebsiteHandler.php');

require('db.php');
require('Toro.php');

header('Content-Type: application/json');

ToroHook::add("404", function() {
    echo "Request not found";
});

Toro::serve(array(

	"1/website/:number"			=> "WebsiteHandler",			// GET
	"1/website/"				=> "WebsiteHandler"				// POST

));