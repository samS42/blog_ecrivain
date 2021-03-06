<?php

ob_start();

	if(isset($_SESSION['pseudo']))
	{
?>
		<div id="width-button" class="buttons front col-xs-offset-2 col-xs-8 col-xs-offset-2 col-md-offset-3 col-md-3 pull-right info">
		<span id="bonjour class="pull-right">Bonjour <strong>Jean Forteroche</strong></span>
		<a href="/index.php?action=index" class="btn btn-primary btn-block font-button">Accueil</a>
		<a href="index.php?action=displayTitles" class="btn btn-primary pull-right btn-block font-button">Page d'administration</a>
		<a href="<?= ROOT; ?>/index.php?action=logout" class="btn btn-danger btn-block font-button">Déconnexion</a>
		</div>
<?php
	}
	else
	{
?>
		<!-- Display form for the connexion -->

		<div class="front col-xs-12 col-md-offset-4 col-md-2 pull-right info">
			<form method="post" action="index.php?action=connexion&action2=displayTitles" class="pull-right">
				<div class="form-group">
			 	<a href="/index.php?action=index" class="btn btn-primary btn-block font-button">Accueil</a>
			  	<label for="id">Identifiant: </label><input type="text" class="form-control" name="id" id="id">
			  	<label for="pass">Mots de passe: </label><input type="password" class="form-control" name="pass" id="pass">
			 	<input type="submit" name="Envoyer" value="Envoyer" class="btn btn-primary btn-block font-button" />
				</div>
			</form>
		</div>
<?php
	}

$form = ob_get_clean() ?>
<?php $title = 'Billet simple pour l\'Alaska' ?>

<?php ob_start(); ?>

	<div class="col-xs-offset-1 col-xs-10 col-xs-offset-1 col-md-offset-4 col-md-4 col-md-offset-4">
		<h2 id="title_view_posts"><strong>Billet</strong></h2>
	</div>

	<!-- Get data from post-->

<?php foreach ($db2 as $value)
{
?>
	<div class="col-xs-12 col-md-offset-3 col-md-6 col-md-offset-3">
		<div class="panel panel-info">
			<div id="panel-heading" class="panel-heading">
				<h3 id="title-center"><?= $value->getTitle(); ?></h3>
				Posté le: <?= $value->getDateCreation(); ?>
			</div>
 			<div class="list-group">
 				<?= $value->getContent(); ?>
			</div>
		</div>
	</div>
<?php
}
?>

		<!-- comment add form -->

	<div class="col-xs-12 col-md-offset-3 col-md-6 col-md-offset-3">
		<div class="panel panel-info">
			<div id="panel-heading" class="panel-heading">
				<h3> Ajouter un commentaire:</h3>
			</div>
			<div id="list-group" class="list-group">
				<form  method="POST" action="<?= ROOT; ?>/index.php?action=addComment&id=<?= $value->getId(); ?>">
					<div class="form-group col-md-6">
						<label for="pseudo">Pseudo: </label><input type="text" name="pseudo" id="pseudo" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label for="comment">Commentaire: </label><textarea name="comment" id="comment" class="form-control"></textarea>
					</div>
					<div id="btn" class="form-group">
						<input type="submit" class="btn btn-success font-button" />
					</div>
				</form>
			</div>
		</div>
	</div>


	<div class="col-xs-12 col-md-offset-3 col-md-6 col-md-offset-3">
		<div class="panel panel-info">
			<div id="panel-heading" class="panel-heading">
				<h3>Les commentaires</h3>
			</div>

	<!-- Get comments from post -->

			<?php
			
			foreach ($listComments as $newValue)
			{
			?>
			
				<div class="list-group">
					<h5><strong><?= $newValue->getAuthor(); ?></strong> le: <?= $newValue->getCommentDate(); ?></h5>
		 			<?= $newValue->getComment(); ?> <a href="<?= ROOT; ?>/index.php?action=signalComment&idComment=<?= $newValue->getId(); ?>&id=<?= $value->getId(); ?>" class="signal">(Signaler)</a>
				</div>
	
			<?php
			}
			?>
		</div>
	</div>

<?php $content = ob_get_clean();
	
$pagination = '';

require('view/frontend/frontTemplate.php'); ?>