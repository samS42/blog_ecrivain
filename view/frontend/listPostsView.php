<?php
	ob_start();

	if(isset($_SESSION['pseudo']))
	{
?>
	<div class="col-md-2 pull-right info">
		<span class="pull-right">Bonjour <strong>Jean Forteroche</strong></span><br/>

		
		<a href="index.php?action=displayTitles" class="btn btn-info pull-right btn-block ">Page d'administration</a>
		<br/>

		<a href="view/backend/log.php?logout=1" class="btn btn-danger btn-block">Déconnexion</a>
		
		</div>

		
<?php
	}
	else
	{
?>

	<!-- Display form for the connexion -->
	<div class="col-md-2 pull-right info">
		<form method="post" action="index.php?action=connexion&action2=displayTitles" class="pull-right">
			<div class="form-group">
			<label for="id">Identifiant: </label><input type="text" class="form-control input-sm" name="id" id="id">
			<label for="pass">Mots de passe: </label><input type="password" class="form-control input-sm" name="pass" id="pass">
			<button class="btn btn-success form-control input-sm">Envoyer</button>
			</div>
		</form>
		</div>

<?php
	}

	$form = ob_get_clean()
?>

<?php ob_start();?>

	<?php $title = 'Blog de Jean Forteroche' ?>
	
	<div id="title-list-posts" class="col-md-offset-3 col-md-6 col-md-offset-3">
	<h2>Mes derniers billets</h2>
	</div>
	

		<!-- Display posts list-->

		<?php
		while($write_db = $entry_db->fetch())
		{
		?>

			<div id="content-list-posts" class="col-md-offset-3 col-md-6 col-md-offset-3">
			<h3><?= $write_db['title']?></h3>
			Posté le: <?= $write_db['date_creation'] ?><br/>
			<p>
			<?php
				echo mb_strimwidth($write_db['content'],0,200,"..."); ?>

				<a href="index.php?action=post&amp;id=<?= $write_db['id'] ?> ">Lire la suite</a>
			</p>
			</div>
		
		<?php
		}
		$entry_db->closeCursor(); ?>

		<div class="pagination">
		<?php for ($i=1; $i <= $pages; $i++): ?>
			<a href="?page=<?= $i ?>&perPage=<?= $perPage ?>"><?= $i ?></a>
		<?php endfor; ?>
	</div>

	<?php $content = ob_get_clean() ?>

<?php require('view/frontend/frontTemplate.php'); ?>