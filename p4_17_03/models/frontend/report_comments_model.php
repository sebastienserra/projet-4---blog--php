<?php
require_once ("../../includes/connection.php");
function getReportedComment(){
	
$db=connectDb();

if (isset($_GET['report'])) 
{

// Récupération des commentaires
$req = $db->prepare('INSERT INTO reported_comments (id_comment) VALUES(?)');
$req->execute(array(htmlspecialchars($_GET['report'])));
// si id_commentaire deja presente dans commentaires_signales alors message: "ce commentaire a deja ete signale" ou "Commentaire signale " mais sans enregistrer
header("location:".  $_SERVER['HTTP_REFERER']);
}
}
getReportedComment();