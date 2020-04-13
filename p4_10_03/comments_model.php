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
function getReportedComment(){
	
$db=connectDb();

if (isset($_GET['report'])) 
{

// Récupération des commentaires
$req = $db->prepare('INSERT INTO reported_comments (id_comment) VALUES(?)');
$req->execute(array(htmlspecialchars($_GET['report'])));
// si id_commentaire deja presente dans commentaires_signales alors message: "ce commentaire a deja ete signale" ou "Commentaire signale " mais sans enregistrer
	header('Location: articles_controler.php');
}
}
getReportedComment();

