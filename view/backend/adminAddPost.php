<?php ob_start(); ?>

<div class="col-md-offset-1 col-md-4">
<h1>Page d'administration</h1>
</div>

<div class="col-md-offset-5 col-md-2">

  <a href="/tests/blog_mvc/tests/POO/index.php?action=displayTitles" class="btn btn-info btn-block">Retour aux billets</a>
  <a href="/tests/blog_mvc/tests/POO/index.php" class="btn btn-warning btn-block">Retour au site</a>
  <a href="log.php?logout=1" class="btn btn-danger btn-block">Déconnexion</a>
  
  
</div>
<?php $header = ob_get_clean(); ?>

  <!-- Display content form from Tiny MCE -->
<?php $title_page = '<h2>Modifier le billet</h2>'; ?>
<?php ob_start(); ?>

<div class="form-group-vertical coll-md-12">
  <div class="col-md-offset-3 col-md-6 col-md-offset-3">

  <form action="/tests/blog_mvc/tests/POO/index.php?action=addPost" method="post">
    <label for="myTitle">Titre: </label><input type="text" id="myTitle" class="form-control" name="myTitle">

    <label for="myTextarea"> Contenu: </label><textarea id="myTextarea" class="form-control" name="myTextarea"></textarea>

    <button>Ajouter</button>
  </form>
</div>
</div>
  <?php
  $form = ob_get_clean();

  $title_post = '';
  $content = '';
  $title_2 = '';
  $comment = '';

require('backTemplate.php'); ?>