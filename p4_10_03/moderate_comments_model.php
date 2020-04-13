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
$db=connectDb();

//display comments
$req = $db->query('SELECT comments.id, comments.comment, comments.id_post, reported_comments.id_comment 
	FROM comments 
	JOIN reported_comments
	ON comments.id = reported_comments.id_comment
	');

//erase a comment from table posts 
	
function eraseComment(){
$db=connectDb();

	if(isset($_GET['moderate'])) {
		$id=$_GET['moderate'];
		$reponse = $db->prepare('DELETE FROM comments WHERE id=:id');
		$reponse->bindValue(':id', $id);
    	$reponse->execute();
		  	
		// Redirection to interface
		header('Location: moderate_comments_controler.php');
	}
}
eraseComment();