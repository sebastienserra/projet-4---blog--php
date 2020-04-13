<?php
require_once ("../../includes/connection.php");

function getPost(){
		$db=connectDb();
	// Retrieve article by id
	$req = $db->prepare('SELECT id, article FROM posts WHERE id = ?');
	$req->execute(array($_GET['billet']));
	$donnees = $req->fetch();
	return $donnees;
}

//$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête
function getComments(){
	$db=connectDb();
		// Retrieve comments
	$comments = $db->prepare('SELECT id, comment, id_post FROM comments WHERE id_post = ? ORDER BY date_of_comment DESC LIMIT 0,4');
	$comments->execute(array($_GET['billet']));
return $comments;

}


