<?php
require_once("../../includes/classes.php");

if (isset($_POST['button_form']) AND isset($_POST['article'])){
	
		$article=$_POST['article'];
		$article=$_POST['title'];
		$author=$_POST['author'];

		$object = new Crud;
		echo $object-> saveRecords($article, $title, $author);

}

if(isset($_GET['delete'])){

	$id= (int)$_GET['delete'];

	$erase = new Crud;
	$erase->destroy($id);

}

if(isset($_GET['moderate'])){

	$id=(int)$_GET['moderate'];

	$eraseReportedComment = new Crud;	
	$eraseReportedComment ->eraseReportedCommentInReportedComments($id);
}


