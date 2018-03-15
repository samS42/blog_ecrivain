<?php
session_start();
?>
<form method="post" action="view/backend/log.php">
	<input type="submit" name="logout" value="Déconnexion">
</form>

<a href="/tests/blog_mvc/tests/POO/index.php">Retour au site</a><br/>
<a href="/tests/blog_mvc/tests/POO/index.php?action=displayTitles">Accueil page d'administration</a>

<h1>Mon article</h1>
<p>
	<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=deletePost&idPost=<?= $display['id'] ?>">
		<input type="submit" name="delete" value="Supprimer le billet">
	</form>
	<?= $display['title'] ?>				le: <?= $display['date_creation'] ?><br/>
	<?= $display['content'] ?>				<?php $display['id']; ?>
</p>
<h2>Commentaires</h2><br/>
<?php
while ($comments = $displayComments->fetch())
{


	echo '<p>' . $comments['author'] . $comments['comment_date'] . '<br/>' . $comments['comment'] . '</p>';
	echo '<a href="/tests/blog_mvc/tests/POO/index.php?action=deleteComment&idComment=' . $comments['id'] .'&id=' . $comments['post_id'] .'" >	Supprimer le commentaire</a>';

}
?>