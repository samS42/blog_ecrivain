<?php ob_start() ?>

<div class="col-md-offset-1 col-md-4">
<h1 class="title-admin"><strong>Page d'administration</strong></h1>
</div>
<div class="col-md-offset-5 col-md-2">

<a href="/tests/blog_mvc/tests/POO/index.php?action=displayTitles" class="btn btn-primary btn-block">Retour aux billets</a>
<a href="/tests/blog_mvc/tests/POO/index.php" class="btn btn-primary btn-block">Retour au site</a>
<a href="log.php?logout=1" class="btn btn-danger btn-block">Déconnexion</a>

</div>
<?php $header = ob_get_clean() ?>

  <h1>Modifier le billet</h1>

  <!-- Display content form from Tiny MCE -->
  
<?php ob_start(); ?>

  <form action="/tests/blog_mvc/tests/POO/index.php?action=updatePost&id=<?= $_GET['id'] ?>" method="post">
    <label for="myTitle">Titre: </label><input type="text" id="myTitle" name="myTitle" value="<?= $_GET['title'] ?>">
    <label for="myTextarea"> Contenu: </label><textarea id="myTextarea" name="myTextarea"><?= $_GET['content'] ?></textarea>
    <input type="submit" value="Mettre à jour" class="btn btn-primary" />
  </form>
  <?php $form = ob_get_clean(); ?>

  <?php

  $title_post = '';
  $content = '';
  $title_2 = '';
  $comment = '';
  $title_page = '';

  ?>

<?php require('backTemplate.php'); ?>