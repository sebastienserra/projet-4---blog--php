<?php
	// connect to db
function connectDb(){
	try
{
	$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	return $db;
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
}
connectDb();