<div id="top"></div>

<form action="" method="post" id="edit_form">
	<p>
		<input type="hidden" name="id" id="id" value="<?php echo $_GET['edit']; ?>">
	</p>
	<p> <?php $edit = new Edit; echo $edit->onePost($id); ?>
<!-- 		<textarea name="article" id="article"  rows="10" cols="50" maxlength="250">
							
		</textarea> -->
	</p>
</form>
<?php

	$mis = new Edit;
	echo $mis->update();
?>