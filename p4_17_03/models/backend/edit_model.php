<?php
// connect to db
require ("../../includes/connection.php");

$db=connectDb();

$update = false;
	if(isset($_GET['edit'])) {
		$id=$_GET['edit'];
		$update = true;
		// Retrieve article
		$req = $db->prepare('SELECT id, article FROM posts WHERE id = ?');
		$req->execute(array($_GET['edit']));
		$donnees = $req->fetch();
			$article=$donnees['article'];		
		}
;

function postUpdate(){
$db=connectDb();
	if(isset($_POST['btn_edit']))
	{
		$id = $_POST['id'];
		$article = $_POST['article'];

		$req = $db->prepare('UPDATE posts SET id=:id, article=:article WHERE id=:id');
		$req->execute(array('article'=>$article, 'id'=>$id));
		header('Location: ../../controllers/backend/backend_controler.php');
	}	
}
postUpdate();



