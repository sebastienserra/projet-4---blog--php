<?php require"header.php";
require"menuFrontEnd.php"; 

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

	if (isset($_POST['comment']) AND isset($_POST['post_comment']))
	{
	$comment=$_POST['comment'];
	echo"Commentaire bien recu.";
    // Insertion du message à l'aide d'une requête préparée
	$req = $db->prepare('INSERT INTO comments (comment, id_post) VALUES(?,?)');
	$req->execute(array(htmlspecialchars($_POST['comment']), htmlspecialchars($_POST['post_comment'])));

	}	


//header('Location: comment_form_controler.php');
?>
<?php require"footer.php";?>