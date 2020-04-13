<?php $title='Accueil';?>


<?php 
require "connection.php";

// insert articles into table posts

function postData(){

$db=connectDb();
//insertion des donnees postees
if (isset($_POST['article'])){
	$article=($_POST['article']);
	
// Insertion du message à l'aide d'une requête préparée
$req = $db->prepare('INSERT INTO posts (article) VALUES(?)');
$req->execute(array(($_POST['article'])));

// Redirect to interface
header('Location: backEnd_controler.php');
}
}
postData();




$db=connectDb();

// define results display per page
$results_per_page=1;

// find number of total rows in table posts
$reponse = $db->query('SELECT COUNT(*) AS nb_posts FROM posts');
$donnees = $reponse->fetch();
$nb_posts=$donnees['nb_posts'];

//nber of total pages available
$nber_of_pages=ceil($nb_posts/$results_per_page);

// determine which page nber the user is currently on

if(!isset($_GET['page']))
{
	$page=1;
}
else
{
	$page=$_GET['page'];
}
// determine the limit for posts displayed on page
$this_page_first_result=($page-1)*$results_per_page;


// Retrieve from table posts
	$req = $db->query('SELECT * FROM posts ORDER BY id DESC limit '.$this_page_first_result.','.$results_per_page);



//erase an article from table posts
function erasePost(){
$db=connectDb();	

if(isset($_GET['id'])) {
		$id=$_GET['id'];
		$reponse = $db->prepare('DELETE FROM posts WHERE id=:id');
		$reponse->bindValue(':id', $id);
    	$reponse->execute();
		  	
		// Redirection to interface
		header('Location: backEnd_controler.php');
		}
}
erasePost();

// retrieve from reported comments
$reponse = $db->query('SELECT * FROM reported_comments');