<?php

	ob_start();

	if(isset($_SESSION['pseudo']))
	{
?>
	<div id="width-button" class="buttons front col-xs-offset-3 col-xs-6 col-xs-offset-3 col-sm-offset-3 col-sm-4 col-md-offset-3 col-md-3 pull-right info">
		<span class="pull-right">Bonjour <strong>Jean Forteroche</strong></span>
		<a href="index.php?action=displayTitles" class="btn btn-primary pull-right btn-block ">Page d'administration</a>
		<a href="view/backend/log.php?logout=1" class="btn btn-danger btn-block">Déconnexion</a>	
	</div>

<?php
	}
	else
	{
?>
	<!-- Display form for the connexion -->

	<div class="front col-xs-12 col-sm-offset-4 col-sm-4 col-md-offset-4 col-md-2 pull-right info">
		<form method="post" action="index.php?action=connexion&action2=displayTitles" class="pull-right">
			<div class="form-group">
				<label for="id">Identifiant: </label><input type="text" class="form-control input-sm" name="id" id="id">
				<label for="pass">Mots de passe: </label><input type="password" class="form-control input-sm" name="pass" id="pass">
				<button class="btn btn-primary form-control input-sm">Envoyer</button>
			</div>
		</form>
	</div>

<?php

	}

$form = ob_get_clean();
?>

<?php $title = 'Blog de Jean Forteroche'; ?>
<?php ob_start();?>

	
	
<div class="col-xs-offset-1 col-xs-10 col-xs-offset-1 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-md-offset-4 col-md-4 col-md-offset-4">
	<h2 id="title_view_posts"><strong>Mes derniers billets</strong></h2>
</div>

<!-- Display posts list-->

<?php

	foreach ($listPosts as $value)
	{

?>

		<div id="content-list-posts" class="col-xs-offset-1 col-xs-10 col-xs-offset-1 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-md-offset-3 col-md-6 col-md-offset-3">
			<div class="panel panel-info">
				<div id="panel-heading" class="panel-heading">
					<h3 id="title-center"><?= $value->getTitle(); ?></h3>
					Posté le: <?= $value->getDateCreation(); ?><br/>
				</div>
				<div class="list-group">
					<p>
						<?php
						echo mb_strimwidth($value->getContent() ,0,200,"...");
						?>
						<a href="index.php?action=post&id=<?= $value->getId(); ?> ">Lire la suite</a>
					</p>
				</div>
			</div>
		</div>
		
<?php
	}
 $content = ob_get_clean() ?>

<?php ob_start(); ?>

<div id="pagination" class="col-md-12">
	<ul class="pagination">
		<?php for ($i=1; $i <= $nb_pages; $i++): ?>
			<li><a href="<?= ROOT; ?>/index.php?action=index&page=<?= $i ?>"><?= $i ?></a></li>
		<?php endfor; ?>
	</ul>
</div>

<?php $pagination = ob_get_clean(); ?>

<?php require('view/frontend/frontTemplate.php'); ?>