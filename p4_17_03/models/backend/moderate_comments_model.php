<?php
// connect to db
require_once ("../../includes/connection.php");

	$db=connectDb();

//display comments
$report = $db->query('SELECT comments.id, comments.comment, comments.id_post, reported_comments.id_comment 
	FROM comments 
	JOIN reported_comments
	ON comments.id = reported_comments.id_comment
	');



