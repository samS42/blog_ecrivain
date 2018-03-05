
<?php $title = 'Mon article' ?>

<?php ob_start(); ?>
<h1>Mon article</h1>
<p>
 <?= $db2['title'] ?>				le: <?= $db2['date_creation'] ?><br/>
 <?= $db2['content'] ?>
</p>

	<h3>Les commentaires</h3>
	<p>
	<?php

	while($db3 = $db1->fetch())
	{ ?>
		 <?= $db3['author'] ?>				le: <?= $db3['comment_date'] ?><br/>
		 <?= $db3['comment'] ?> <a href="view/frontend/modifyViewCom.php?idCom=<?=$db3['id'] ?>">(Modifier)</a>
	</p> 
	<?php } ?>
	
	<p>
		<form method="POST" action="index.php?action=addComment&id= <?= $db2['id'] ?>">
			<label>Pseudo</label><input type="text" name="pseudo" id="pseudo"><br>
			<label>Commentaire</label><input type="text" name="comment" id="comment"><br>
			<input type="submit"/>
		</form>
	</p>
	<?php $db1->closeCursor(); ?>

	<?php $content = ob_get_clean(); ?>
	<?php require('view/frontend/template.php'); ?>
