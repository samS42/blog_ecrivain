
<form method="post" action="view/backend/log.php">
	<input type="submit" name="logout" value="Déconnexion">
</form>

<a href="/tests/blog_mvc/tests/POO/index.php">Retour au site</a>
<h1>Page d'aministration</h1>

<form method="post" action="log.php">
	<input type="submit" name="add" value="Ajouter un Billet">
	<input type="submit" name="signal" value="Commentaire(s) signalé(s)">
</form>
<h2>Mes billets:</h2>

<?php
while($title = $req->fetch())
{
?>

<ul>
	<li><a href="/tests/blog_mvc/tests/POO/index.php?action=adminPost&id=<?= $title['id'] ?>"><?= $title['title'] ?></a></li>
</ul>

<?php
}
?>
