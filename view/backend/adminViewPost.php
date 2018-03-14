<?php
session_start();
?>

<h1>Mon article</h1>
<p>
 <?= $display['title'] ?>				le: <?= $display['date_creation'] ?><br/>
 <?= $display['content'] ?>				<?php $display['id']; ?>
</p>
<form method="post" action="log.php">
	<input type="submit" name="update" value="Modifier un Billet">
	<input type="submit" name="delete" value="Supprimer un Billet">
	<input type="submit" name="comment" value="Modérer les commentaires">
</form>