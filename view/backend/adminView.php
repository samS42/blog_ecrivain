
<!-- Disconnection -->

<form method="post" action="view/backend/log.php">
	<input type="submit" name="logout" value="Déconnexion">
</form>

<a href="/tests/blog_mvc/tests/POO/index.php">Retour au site</a>
<h1>Page d'aministration</h1>

<!-- Display add post button -->

<form method="post" action="/tests/blog_mvc/tests/POO/view/backend/adminAddPost.php">
	<input type="submit" name="add" value="Ajouter un Billet">
</form>

<!-- Display signaled comments button -->

<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=displaySignalComment">
	<input type="submit" name="signal" value="Commentaire(s) signalé(s)">
</form>
<h2>Mes billets:</h2>

<?php

/*Get and Display titles from posts*/

while($title = $req->fetch())
{
?>

<ul>
	<li><a href="/tests/blog_mvc/tests/POO/index.php?action=adminPost&id=<?= $title['id'] ?>"><?= $title['title'] ?></a></li>
</ul>

<?php
}
?>
