<div class="present">
<p><?php echo nl2br(($donnees['article']));?></p>

</div>	
<h2>Commentaires</h2>

<?php
		while ($donnees = $comments->fetch())
		{
?>
		<div class="present">
   			 <p><?php echo (($donnees['comment'])); ?></p>
    		<p><a href="../../models/frontend/report_comments_model.php?report=<?php echo $donnees['id'] ?>" name="report", id="report" class="btn btn-primary btn-sm"><span class="fas fa-comment-slash"></span></a></p>
		</div>
<?php
}
?>