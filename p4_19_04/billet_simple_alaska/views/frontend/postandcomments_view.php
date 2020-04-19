
<div class="present_art_and_comments">
	<h2>Article</h2>
	<?php

	$post= new Front; 
	echo $post->getPost();
	?>



		<?php
			if(isset($_POST['button_comment'])){
				if(trim($_POST['comment'])=="" ){

					echo '<div class="error">Laisser un commentaire!</div>';

				}
				elseif (isset($_POST['comment']) AND isset($_POST['button_comment']))
				{

					$zu= new Front;
					$zu->savecomment();

					echo '<div class="success">Commentaire ajouté avec succès!</div>';
				}
			}

			if (isset($_GET['commentreport'])){

				$reportComment = new Front;
				$reportComment->getReportedComment();

			echo '<div class="success">Commentaire signalé avec succès!</div>';
			}
		?>


		<h3>Votre commentaire: </h3>	
		<form action="" method="post" id="form_comments">
		<div class="form-group">
		<p>
			<input type="hidden" name="id_post" value="<?php echo $_GET['comment']; ?>" class="form-control">
		</p>
		</div>
		<div class="form-group">
		<p>
			<textarea name="comment" id="comment" class="form-control" rows="3" cols="40" maxlength="250" placeholder="Laisser un commentaire.">
			</textarea>
		</p>
		</div>
		<p>
			<input class="btn btn-primary" name="button_comment" id="button_comment" type="submit" value="Envoi">
		</p>
	</form>
	

	<h2 id="commentaires">Commentaires associés</h2>
	<?php
	$comments= new Front; 
	echo $comments->getComments();
	?>
</div>
