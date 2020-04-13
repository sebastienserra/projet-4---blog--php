<?php 
$title='Accueil';

require_once ("../../includes/connection.php");

//erase an article from table posts
function erasePost(){
$db=connectDb();	

if(isset($_GET['id'])) {
		$id=$_GET['id'];
		$reponse = $db->prepare('DELETE FROM posts WHERE id=:id');
		$reponse->bindValue(':id', $id);
    	$reponse->execute();
		  	
		// Redirection to interface
		header('Location: ../../controllers/backend/backend_controler.php');
		}
}
erasePost();

// retrieve from reported comments
$reponse = $db->query('SELECT * FROM reported_comments');