<form action="comment_form_model.php" method="post">
	<div class="form-group">
	<p><input type="hidden" name="post_comment" value="<?php echo $_GET['post_comment']; ?>" class="form-control"></p>
	</div>
	<div class="form-group">
	<p><label>Votre commentaire:</label>
		<textarea name="comment" id="comment" class="form-control" rows="3" cols="50" maxlength="250" placeholder="Nous n'acceptons que les compliments ;-)"></textarea>
	</p>
	</div>
	<p><input class="btn btn-primary" name="bouton_comment" id="bouton_comment"type="submit" value="Envoi"></p>
</form>