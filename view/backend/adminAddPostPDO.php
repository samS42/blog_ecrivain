<?php ob_start(); ?>

  <div class="title-front col-xs-12 col-md-offset-1 col-md-5">
    <h1 class="title-admin"><strong>Page d'administration</strong></h1>
  </div>

  <div id="width-button-padd" class="buttons front col-xs-offset-2 col-xs-8 col-xs-offset-2 col-md-offset-3 col-md-3 pull-right info">
    <a href="<?= ROOT; ?>/index.php?action=displayTitles" class="btn btn-primary btn-block buttons-admin button">Retour aux billets</a>
    <a href="<?= ROOT; ?>/index.php?action=index" class="btn btn-primary btn-block button">Retour au site</a>
    <a href="<?= ROOT; ?>/index.php?action=logout" class="btn btn-danger btn-block button">Déconnexion</a>
    <br/>
  </div>

<?php $header = ob_get_clean(); ?>

  <!-- Display content form from Tiny MCE -->

<?php ob_start(); ?>

  <div class="col-xs-12 col-md-offset-2 col-md-8 coll-md-offset-2">
    <h2 id="subtitle-border"><strong>Ajouter un billet</strong></h2>
  </div>

<?php $title_page = ob_get_clean(); ?>

<?php ob_start(); ?>

<br/>
  <div class="form-group">
    <div class="col-xs-12 col-md-offset-2 col-md-8 col-md-offset-2">

      <form action="<?= ROOT; ?>/index.php?action=addPost" method="post">
        <button class="btn btn-primary pull-right button-publish">Publier</button>
        <label for="myTitle">Titre: </label><input type="text" id="myTitle" class="form-control" name="myTitle"><br/>
        <label for="myTextarea"> Contenu: </label><textarea id="myTextarea" class="form-control" name="myTextarea"></textarea>
      </form>
    </div>
  </div>

<?php $form = ob_get_clean();

$title_post = '';
$content = '';
$title_2 = '';
$comment = '';

require('view/backend/backTemplate.php');
?>