
<form method="POST" action="index.php?action=modifyComment&amp;id= <?= $_GET['idCom'] ?>">
			<label>Pseudo</label><input type="text" name="pseudo" id="pseudo"><br>
			<label>Votre nouveau commentaire</label><textarea name="comment" id= "comment"></textarea><br>
			<input type="submit"/>
</form>