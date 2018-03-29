
<!-- Disconnection -->
<?php ob_start() ?>
<div class="title-front col-xs-12 col-sm-offset-1 col-sm-4 col-md-offset-1 col-md-5">
<h1 class="title-admin"><strong>Page d'administration</strong></h1>
</div>

<div id="width-button" class="buttons front col-xs-offset-3 col-xs-6 col-xs-offset-3 col-sm-offset-3 col-sm-4 col-md-offset-3 col-md-3 pull-right info">
<a href="/tests/blog_mvc/tests/POO/index.php" class="btn btn-primary btn-block buttons-admin">Retour au site</a>
<a href="view/backend/log.php?logout=1" class="btn btn-danger btn-block">Déconnexion</a>
</div>
<?php $header = ob_get_clean() ?>

<!-- Display add post button -->
<?php ob_start() ?>
<div id="add-signal-post" class="form-group">
	<div class="col-xs-offset-3 col-xs-6 col-xs-offset-3 col-sm-offset-2 col-sm-3  col-md-offset-2 col-md-3">
<form method="post" action="/tests/blog_mvc/tests/POO/view/backend/adminAddPost.php" >
	<button class="btn btn-primary btn-block btn-lg" name="add">Ajouter un billet</button>
</form>
</div>

<!-- Display signaled comments button -->
<div class="col-xs-offset-3 col-xs-6 col-xs-offset-3 col-sm-offset-2 col-sm-3 col-sm-offset-2  col-md-offset-2 col-md-3 col-md-offset-2">
<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=displaySignalComment" >
	<input type="submit" name="signal" value="Commentaire(s) signalé(s)" class="btn btn-primary btn-block btn-lg">
</form>
</div>
</div>


<?php $form = ob_get_clean() ?>

<!-- Get and Display titles from posts -->

<?php ob_start(); ?>
<br>
<div class="col-md-offset-2 col-md-8 coll-md-offset-2">
<div class="panel panel-info">
	<div id="panel-heading" class="panel-heading">
		<h2 id="title-center">Mes billets</h2>
	</div>

<?php
while($title = $req->fetch())
{
?>


<div class="list-group">
	<a href="/tests/blog_mvc/tests/POO/index.php?action=adminPost&id=<?= $title['id'] ?>" class="list-group-item"><?= $title['title'] ?></a>
</div>

<?php 
} ?>
</div>
</div>
<?php
$content = ob_get_clean();
$comment = '';
$title_2 = '';
$title_page = '';
$title_post = '';

require('view/backend/backTemplate.php');
?>
