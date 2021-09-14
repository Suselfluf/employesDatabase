<?php
declare(strict_types=1);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include ("router.php");





http_response_code(200); #response code

define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT. "/controll/");
define("MODEL_PATH", ROOT. "/model/");


require_once("db.php");

$db = new DB();
$db->connToDB();

//Запустить docker-compose up -d
//Потушить docker-compose down