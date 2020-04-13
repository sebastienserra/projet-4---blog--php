<?php 
// connect to db
require ("../../includes/connection.php");
$db=connectDb();
 
	if (isset($_POST['comment']) AND isset($_POST['post_comment']))
	{
	$comment=$_POST['comment'];
	
    // Insertion du message à l'aide d'une requête préparée
	$req = $db->prepare('INSERT INTO comments (comment, id_post) VALUES(?,?)');
	$req->execute(array(htmlspecialchars($_POST['comment']), htmlspecialchars($_POST['post_comment'])));
	header("location:".  $_SERVER['HTTP_REFERER']);

	}	




?>

