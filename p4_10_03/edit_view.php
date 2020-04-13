<div class="present">
	<?php echo $donnees['article']; ?>
</div>	

<form action="edit_model.php" method="post">
	<div class="form-group">
	<p><input type="hidden" class="form-control" name="id" value="<?php echo $donnees['id']; ?>"></p>
	</div>
	<div class="form-group">
	<p><textarea name="article" id="article"  rows="10" cols="50" maxlength="250"><?php echo $donnees['article'];?></textarea></p>
	</div>
	<div class="form-group">
	<p><input type="submit" class="btn btn-primary" name="btn_edit" id="btn_edit" value="Modifier" /></p>
	</div>
</form>