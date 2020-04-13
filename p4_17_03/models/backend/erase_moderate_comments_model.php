<?php
// connect to db
require_once ("../../includes/connection.php");
//erase a comment from table posts 
	
function eraseComment(){
$db=connectDb();

	if(isset($_GET['moderate'])) {
		$id=$_GET['moderate'];
		$reponse = $db->prepare('DELETE FROM comments WHERE id=:id');
		$reponse->bindValue(':id', $id);
    	$reponse->execute();
		  	
		// Redirection to interface
		header("location:".  $_SERVER['HTTP_REFERER']);
	}
}
eraseComment();