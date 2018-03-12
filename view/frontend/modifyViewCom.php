
<form method="POST" action="/tests/blog_mvc/tests/POO/index.php?action=modifyComment&idCom=<?= $_GET['idCom'] ?>&idPost=<?= $_GET['idPost'] ?>">
			<label>Pseudo</label><input type="text" name="pseudo1" id="pseudo1"><br>
			<label>Votre nouveau commentaire</label><textarea name="comment1" id= "comment1"></textarea><br>
			<input type="submit"/>
</form>