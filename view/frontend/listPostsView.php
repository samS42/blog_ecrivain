<?php ob_start();?>
	<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=connexion">
		<label>Identifiant: </label><input type="text" name="id" id="id">
		<label>Mots de passe: </label><input type="password" name="pass" id="pass">
		<input type="submit" name="envoyer"/>
	</form>
<?php $form = ob_get_clean() ?>

<?php $title = 'Mon nouveau blog' ?>

<?php ob_start();?>
	<h1>Mon nouveau blog</h1>
	<h2>Mes derniers articles</h2>
	<p>
		<?php
		while($write_db = $entry_db->fetch())
		{
			?>
			<p>
			<?php echo $write_db['title'] . '				' . $write_db['date_creation'] . '<br/>' . $write_db['content']; ?>
			<a href="index.php?action=post&amp;id=<?= $write_db['id'] ?> ">Commentaires</a>
			</p>
			<?php
		}
		$entry_db->closeCursor(); ?>
	</p>
	<?php $content = ob_get_clean() ?>
<?php require('view/frontend/template.php'); ?>