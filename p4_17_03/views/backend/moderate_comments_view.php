<?php 
$title='Interface de modération';
while ($donnees = $report->fetch())
{
?>
<div class="present"> 
		<p><?php echo $donnees['comment'] ?></p> 
		<a href="../../controllers/backend/moderate_comments_controler.php?moderate=<?php echo $donnees['id_comment'] ?>" class="btn btn-primary btn-sm"><span class="fas fa-trash-alt"></span></a>
</div>
<?php

}

