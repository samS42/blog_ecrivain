<?php ob_start(); ?>

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

  <!-- Display content form from Tiny MCE -->
<?php $title_page = '<h2><strong id="subtitle-border">Ajouter un billet</strong></h2>'; ?>

<?php ob_start(); ?>
<br/>
<div class="form-group">
  <div class="col-md-offset-2 col-md-8 col-md-offset-2">

  <form action="/tests/blog_mvc/tests/POO/index.php?action=addPost" method="post">
    <button class="btn btn-primary pull-right">Publier</button>
    <label for="myTitle">Titre: </label><input type="text" id="myTitle" class="form-control" name="myTitle"><br/>
    <label for="myTextarea"> Contenu: </label><textarea id="myTextarea" class="form-control" name="myTextarea"></textarea>
  </form>

</div>
</div>
  <?php
  $form = ob_get_clean();

  $title_post = '';
  $content = '';
  $title_2 = '';
  $comment = '';

require('backTemplate.php');
?>