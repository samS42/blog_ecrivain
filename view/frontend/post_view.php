
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
			<button class="btn btn-info form-control input-sm">Envoyer</button>
			</div>
		</form>
		</div>

<?php
}

	$form = ob_get_clean() ?>
<?php $title = 'Blog de Jean Forteroche' ?>

<?php ob_start(); ?>

	<!-- Get data from post-->

	<div id="title-post" class="col-md-offset-3 col-md-6 col-md-offset-3">
	<h2><?= $db2['title'] ?></h2>
	</div>

 <div id="content-post" class="col-md-offset-3 col-md-6 col-md-offset-3">
 <p>Posté le: <?= $db2['date_creation'] ?></p>
 <p>
 <?= $db2['content'] ?>
</div>
</p>


		<!-- comment add form -->

		
		<div id="add-comment-post" class="row col-md-offset-3 col-md-6 col-md-offset-3">
		<h4> Ajouter un commentaire:</h4><br/>
		<p>
		
		<form class="col-md-4" method="POST" action="/tests/blog_mvc/tests/POO/index.php?action=addComment&id=<?= $db2['id'] ?>">
			<div class="form-group"><label for="pseudo">Pseudo: </label><input type="text" name="pseudo" id="pseudo" class="form-control"></div>
			<div class="form-group"><label for="comment">Commentaire: </label><textarea name="comment" id="comment" class="form-control"></textarea></div>
			<div class="form-group"><input type="submit" class="btn btn-success form-control" /></div>
		</form>
	</p>
</div>

	
	<p>

	<div id="comment-post" class="col-md-offset-3 col-md-6 col-md-offset-3">
	<h4>Les commentaires</h4><br/>

	<!-- Get comments from post -->
	<?php
	while($db3 = $db1->fetch())
	{ ?>
		
		 <h5><strong><?= $db3['author'] ?></strong> le: <?= $db3['comment_date'] ?></h5>

		 <?= $db3['comment'] ?> <a href="/tests/blog_mvc/tests/POO/index.php?action=signalComment&idComment=<?= $db3['id'] ?>&id=<?= $db2['id'] ?>" class="signal">(Signaler)</a>
		</div>
	</p> 
	<?php } ?>
	
	
	<?php $db1->closeCursor(); ?>

	<?php $content = ob_get_clean(); ?>
	<?php require('view/frontend/frontTemplate.php'); ?>