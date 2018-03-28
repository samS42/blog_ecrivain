
<!-- Disconnection -->
<?php ob_start() ?>
<div class="col-md-offset-1 col-md-4">
<h1 class="title-admin"><strong>Page d'administration</strong></h1>
</div>
<div class="col-md-offset-5 col-md-2">
<a href="/tests/blog_mvc/tests/POO/index.php" class="btn btn-primary btn-block buttons-admin">Retour au site</a>
<a href="view/backend/log.php?logout=1" class="btn btn-danger btn-block">Déconnexion</a>
</div>
<?php $header = ob_get_clean() ?>

<!-- Display add post button -->
<?php ob_start() ?>
<div class="form-group">
	<div class="col-md-offset-2 col-md-3">
<form method="post" action="/tests/blog_mvc/tests/POO/view/backend/adminAddPost.php" >
	<button class="btn btn-primary btn-block btn-lg" name="add">Ajouter un billet</button>
</form>
</div>

<!-- Display signaled comments button -->
<div class="col-md-offset-2 col-md-3 col-md-offset-2">
<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=displaySignalComment" >
	<input type="submit" name="signal" value="Commentaire(s) signalé(s)" class="btn btn-primary btn-block btn-lg">
</form>
</div>
</div>


<?php $form = ob_get_clean() ?>

<?php $title_post = '' ?>

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

require('view/backend/backTemplate.php');
?>
