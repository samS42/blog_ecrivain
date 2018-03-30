
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

	$form = ob_get_clean() ?>
<?php $title = 'Blog de Jean Forteroche' ?>

<?php ob_start(); ?>
<div class="col-xs-offset-1 col-xs-10 col-xs-offset-1 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-md-offset-4 col-md-4 col-md-offset-4">
	<h2 id="title_view_posts"><strong>Billet</strong></h2>
	</div>

	<!-- Get data from post-->

	<div id="content-list-posts" class="col-xs-offset-1 col-xs-10 col-xs-offset-1 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-md-offset-3 col-md-6 col-md-offset-3">
			<div class="panel panel-info">
			<div id="panel-heading" class="panel-heading">
			<h3 id="title-center"><?= $db2['title'] ?></h3>
			Posté le: <?= $db2['date_creation'] ?>
			</div>
 
 			<div class="list-group">
 			<?= $db2['content'] ?>
			</div>
		</div>
	</div>
	


		<!-- comment add form -->
		<div id="content-list-posts" class="col-xs-offset-1 col-xs-10 col-xs-offset-1 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-md-offset-3 col-md-6 col-md-offset-3">
			<div class="panel panel-info">
			<div id="panel-heading" class="panel-heading">
				<h4> Ajouter un commentaire:</h4>
			</div>
		<div id="list-group" class="list-group">
		<form  method="POST" action="<?= ROOT; ?>/index.php?action=addComment&id=<?= $db2['id'] ?>">
			<div class="form-group col-md-6"><label for="pseudo">Pseudo: </label><input type="text" name="pseudo" id="pseudo" class="form-control">
			</div>
			<div class="form-group col-md-6"><label for="comment">Commentaire: </label><textarea name="comment" id="comment" class="form-control"></textarea></div>
			<div id="btn" class="form-group"><input type="submit" class="btn btn-success" />
			</div>
		</form>
		</div>
		</div>
	</div>


	<div id="content-list-posts" class="col-xs-offset-1 col-xs-10 col-xs-offset-1 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-md-offset-3 col-md-6 col-md-offset-3">
		<div class="panel panel-info">
			<div id="panel-heading" class="panel-heading">
			<h4>Les commentaires</h4>
			</div>

	<!-- Get comments from post -->
	<?php
	while($db3 = $db1->fetch())
	{ ?>
		<div class="list-group">
		 <h5><strong><?= $db3['author'] ?></strong> le: <?= $db3['comment_date'] ?></h5>

		 <?= $db3['comment'] ?> <a href="<?= ROOT; ?>/index.php?action=signalComment&idComment=<?= $db3['id'] ?>&id=<?= $db2['id'] ?>" class="signal">(Signaler)</a>
		</div>
		
	
	<?php } ?>
	</div>
	</div>
	
	<?php $db1->closeCursor(); ?>

	<?php $content = ob_get_clean();
	
	$pagination = '';

	require('view/frontend/frontTemplate.php'); ?>