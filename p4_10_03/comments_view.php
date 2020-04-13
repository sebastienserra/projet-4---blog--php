<div class="present">
<p><?php echo nl2br(($donnees['article']));?></p>
<a href="comment_form.php?post_comment=<?php echo $donnees['id'] ?>" class="btn btn-primary btn-sm"><span class="far fa-comments"></span></a>

</div>	
<h2>Commentaires</h2>
<?php
		while ($donnees = $comments->fetch())
		{
?>
		<div class="present">
   			 <p><?php echo (($donnees['comment'])); ?></p>
    		<p><a href="comments_model.php?report=<?php echo $donnees['id'] ?>" name="report", id="report" class="btn btn-primary btn-sm"><span class="fas fa-comment-slash"></span></a></p>
		</div>
<?php
}
?>