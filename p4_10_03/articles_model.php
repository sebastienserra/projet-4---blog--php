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

// define results of pages displayed per page
$results_per_page=1;

// find number of total rows in table posts
$reponse = $db->query('SELECT COUNT(*) AS nb_posts FROM posts');
$donnees = $reponse->fetch();
$nb_posts=$donnees['nb_posts'];

//echo'<p> Nombre total de lignes dans ma table clients: '. $donnees['nb_posts'] . '</p>'; 
if(!isset($_GET['page']))
{
  $page=1;
}
else
{
  $page=$_GET['page'];
}
//nber of total pages available
$nber_of_pages=ceil($nb_posts/$results_per_page);

// determine which page nber the user is currently on

// 

// determine the limit for posts displayed on page
$this_page_first_result=($page-1)*$results_per_page;

	
	// Retrieve all posts from table posts
  $articles = $db->query('SELECT * FROM posts limit '.$this_page_first_result.','.$results_per_page);




