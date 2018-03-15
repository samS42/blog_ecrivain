<?php 
	session_start();
	ob_start();

	if(isset($_SESSION['pseudo']))
	{
		echo 'Bonjour ' . $_SESSION['pseudo'];
?>
	<a href="index.php?action=displayTitles">Page d'administration</a>
	<br/>
	<form method="post" action="view/backend/log.php">
		<input type="submit" name="logout" value="Déconnexion">
	</form>
		
<?php
	}
	else
	{
?>
	<form method="post" action="index.php?action=connexion&action2=displayTitles">
		<label>Identifiant: </label><input type="text" name="id" id="id">
		<label>Mots de passe: </label><input type="password" name="pass" id="pass">
		<input type="submit" name="envoyer"/>
	</form>

<?php
	}


	$form = ob_get_clean() ?>

<?php $title = 'Mon nouveau blog' ?>

<?php ob_start();?>

	<h1>Mon nouveau blog</h1>
	<h2>Mes derniers billets</h2>
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