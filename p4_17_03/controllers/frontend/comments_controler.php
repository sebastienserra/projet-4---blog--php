<?php 
$title='Commentaires';
$address="../../";
$menu="../../";
require ("../../includes/header.php");
require ("../../includes/menuFrontEnd.php");
require("../../models/frontend/comments_model.php");
$donnees = getPost();
$comments = getComments();
require("../../models/frontend/report_comments_model.php");
require ("../../views/frontend/comments_view.php");
require ("../../includes/footer.php");

