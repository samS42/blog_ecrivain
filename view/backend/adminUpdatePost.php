<?php ob_start() ?>

<div class="col-md-offset-1 col-md-4">
<h1 class="title-admin"><strong>Page d'administration</strong></h1>
</div>
<div class="col-md-offset-5 col-md-2">

<a href="/tests/blog_mvc/tests/POO/index.php?action=displayTitles" class="btn btn-primary btn-block buttons-admin">Retour aux billets</a>
<a href="/tests/blog_mvc/tests/POO/index.php" class="btn btn-primary btn-block">Retour au site</a>
<a href="log.php?logout=1" class="btn btn-danger btn-block">Déconnexion</a>
<br/>
</div>
<?php $header = ob_get_clean() ?>

  <?php $title_page = '<h2><strong id="subtitle-border">Modifier le billet</strong></h2>' ?>

  <!-- Display content form from Tiny MCE -->
  
<?php ob_start(); ?>

<br/>
<div class="form-group">
  <div class="col-md-offset-2 col-md-8 col-md-offset-2">

  <form action="/tests/blog_mvc/tests/POO/index.php?action=updatePost&id=<?= $_GET['id'] ?>" method="post">
    <input type="submit" value="Mettre à jour" class="btn btn-primary pull-right" />
    <label for="myTitle">Titre: </label><input type="text" id="myTitle" name="myTitle" value="<?= $_GET['title'] ?>" class="form-control"><br/>
    <label for="myTextarea"> Contenu: </label><textarea id="myTextarea" name="myTextarea" class="form-control"><?= $_GET['content'] ?></textarea>
    
  </form>
</div>
</div>
  <?php $form = ob_get_clean(); ?>

  <?php

  $title_post = '';
  $content = '';
  $title_2 = '';
  $comment = '';

  ?>

<?php require('backTemplate.php'); ?>