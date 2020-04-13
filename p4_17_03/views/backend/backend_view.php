<?php 
$title='Interface administration';
	// display articles one by one
	while ($donnees = $req->fetch())
	{
?>
	<div class="present">
	<p><?php echo nl2br(($donnees['article']));?></p>
	<a href="../../controllers/backend/backend_controler.php?id=<?php echo $donnees['id'] ?>" class="btn btn-primary btn-sm"><span class="fas fa-trash-alt"></span></a>
	<a href="../../controllers/backend/edit_controler.php?edit=<?php echo $donnees['id'] ?>" class="btn btn-primary btn-sm"><span class="fas fa-edit"></span></a>
	</div>
	</div>
<?php
	}
?>
<p class="link">
<?php	
for($page=1;$page<=$nber_of_pages; $page++)
{
echo '<a href="../../controllers/backend/backend_controler.php?page='.$page.'"> ' . $page . '</a>';
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
<span> <a href="../../controllers/backend/moderate_comments_controler.php">Modérer les commentaires</a><span>
</div>
<form action="../../models/backend/backend_model.php" method="post">
	<p><textarea name="article" id="article"  rows="10" cols="50" maxlength="250" placeholder="Ecrire ici."></textarea></p>
	
	<p><input class="btn btn-primary" name="bouton_form" id="bouton_form" type="submit" value="Envoi"></p>
</form>

