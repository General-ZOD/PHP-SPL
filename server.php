<?php
$file = preg_replace("/\//", DIRECTORY_SEPARATOR, dirname(__FILE__) . "/class/serviceFunctions.php"); 
include $file;

$options = array("uri"=>"http://localhost:84/server.php");
$server = new SoapServer(NULL, $options);
$server->setClass("ServiceFunctions");
$server->handle();