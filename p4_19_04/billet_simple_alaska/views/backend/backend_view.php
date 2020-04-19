<div id="top"></div>
<?php 
if(isset($_SESSION['username'])){

	echo '<p id="welcome_message">Bienvenue ' .$_SESSION['username']. '!<p>';

}else{

		echo '<p id="welcome_message">Vous n etes pas connecte</p>';

}	

$objet = new Crud;
$objet->getAllData();

?>
<div class="id_comment"> 
	<a href="../../controllers/backend/reported_comments_controller.php">Modérer les commentaires (<?php $nb_reportedComments = new Crud; $nb_reportedComments->CountReportedComments(); ?>)</a>
</div>
<form action="" method="post"> 
	<p id="edit_block">

		<input type="text" name="title" id="title" rows="1" cols="50" maxlength="250" placeholder="Titre">
		<textarea name="article" id="article"  rows="10" cols="50" maxlength="250" placeholder="Ecrivez vos articles ici.">
			
		</textarea>
		<input type="text" name="author" id="author" rows="1" cols="50" maxlength="250" placeholder="Auteur">
	</p>

	<p>
		<input class="btn btn-primary" name="button_form" id="button_form" type="submit" value="Envoi">
	</p>
</form>
