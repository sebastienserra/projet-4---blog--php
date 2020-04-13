<?php 
$title='Commentaires';
require ("header.php");
require ("menuFrontEnd.php");
require("comments_model.php");
$donnees = getPost();
$comments = getComments();
require ("comments_view.php");
require ("footer.php");

