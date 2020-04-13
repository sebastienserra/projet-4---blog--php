<?php
while ($donnees = $req->fetch())
{
?>
<div class="present"> 
	<!-- <p>id<?php echo $donnees['id'] ?></p> -->
	<p><?php echo $donnees['comment'] ?></p> 
	<!-- <p>id_comment<?php echo $donnees['id_comment'] ?></p> -->
	<a href="moderate_comments_model.php?moderate=<?php echo $donnees['id_comment'] ?>" class="btn btn-primary btn-sm"><span class="fas fa-trash-alt"></span></a>
</div>
<?php

}
?>