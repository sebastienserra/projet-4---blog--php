<?php 
$title='Interface administration';
?>
<?php
	// display articles one by one
	while ($donnees = $req->fetch())
	{
?>

	<div class="present">
	<p><?php echo nl2br(($donnees['article']));?></p>
	<a href="backEnd_model.php?id=<?php echo $donnees['id'] ?>" class="btn btn-primary btn-sm"><span class="fas fa-trash-alt"></span></a>
	<a href="edit_controler.php?edit=<?php echo $donnees['id'] ?>" class="btn btn-primary btn-sm"><span class="fas fa-edit"></span></a>
	</div>
	</div>
<?php
	}
?>
<p class="link">
<?php	
for($page=1;$page<=$nber_of_pages; $page++)
{
echo '<a href="backEnd_controler.php?page='.$page.'"> ' . $page . '</a>';
}
?>
</p>

<div class="id_commentaire"> Id commentaires signalés: </div>
<div class="id_commentaire">
<?php
while ($donnees = $reponse->fetch())
{
?>
   <span> <?php echo $donnees['id_comment']; ?> </span>

<?php

}

?>
<span> <a href="moderate_comments_view.php">Modérer les commentaires</a><span>
</div>
<form action="backEnd_model.php" method="post">
	<p><textarea name="article" id="article"  rows="10" cols="50" maxlength="250" placeholder="Ecrire ici."></textarea></p>
	
	<p><input class="btn btn-primary" name="bouton_form" id="bouton_form" type="submit" value="Envoi"></p>
</form>

