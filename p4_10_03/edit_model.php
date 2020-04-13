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


function postUpdate(){

$db=connectDb();
	if(isset($_POST['btn_edit']))
	{
		$id = $_POST['id'];
		$article = $_POST['article'];

		$req = $db->prepare('UPDATE posts SET id=:id, article=:article WHERE id=:id');
		$req->execute(array('article'=>$article, 'id'=>$id));
		header('Location: backEnd_controler.php');
	}	
}
postUpdate();



