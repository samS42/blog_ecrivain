
<!-- Disconnection -->
<?php ob_start() ?>
<div class="col-md-offset-1 col-md-4">
<h1>Page d'administration</h1>
</div>
<div class="col-md-offset-5 col-md-2">
<a href="view/backend/log.php?logout=1" class="btn btn-danger btn-block">Déconnexion</a>
<a href="/tests/blog_mvc/tests/POO/index.php" class="btn btn-success btn-block">Retour au site</a>
</div>
<?php $header = ob_get_clean() ?>

<!-- Display add post button -->
<?php ob_start() ?>
<div class="form-group">
	<div class="col-md-offset-2 col-md-3">
<form method="post" action="/tests/blog_mvc/tests/POO/view/backend/adminAddPost.php" >
	<button class="btn btn-success btn-block btn-lg" name="add">Ajouter un billet</button>
</form>
</div>

<!-- Display signaled comments button -->
<div class="col-md-offset-2 col-md-3 col-md-offset-2">
<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=displaySignalComment" >
	<input type="submit" name="signal" value="Commentaire(s) signalé(s)" class="btn btn-danger btn-block btn-lg">
</form>
</div>
</div>


<?php $form = ob_get_clean() ?>

<?php $title_post = '<h2>Mes billets:</h2>' ?>

<!-- Get and Display titles from posts -->

<?php ob_start();

while($title = $req->fetch())
{
?>

<ul>
	<li><a href="/tests/blog_mvc/tests/POO/index.php?action=adminPost&id=<?= $title['id'] ?>"><?= $title['title'] ?></a></li>
</ul>
<?php 
}
$content = ob_get_clean();
$comment = '';
$title_2 = '';

require('view/backend/backTemplate.php');
?>
