<?php ob_start(); ?>

  <div class="title-front col-xs-12 col-sm-offset-1 col-sm-4 col-md-offset-1 col-md-4">
    <h1 class="title-admin"><strong>Page d'administration</strong></h1>
  </div>

  <div id="width-button-padd" class="buttons front col-xs-offset-3 col-xs-6 col-xs-offset-3 col-sm-offset-3 col-sm-4 col-md-offset-3 col-md-3 pull-right info">
    <a href="<?= ROOT; ?>/index.php?action=displayTitles" class="btn btn-primary btn-block buttons-admin">Retour aux billets</a>
    <a href="<?= ROOT; ?>/index.php?action=index" class="btn btn-primary btn-block">Retour au site</a>
    <a href="view/backend/log.php?logout=1" class="btn btn-danger btn-block">Déconnexion</a>
    <br/>
  </div>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

  <div class="col-xs-offset-2 col-xs-8 col-xs-offset-2 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-md-offset-4 col-md-4 col-md-offset-4">
    <h2 id="subtitle-border"><strong>Modifier le billet</strong></h2>
  </div>

<?php $title_page = ob_get_clean(); ?>

<!-- Display content form from Tiny MCE -->
  
<?php ob_start();

foreach ($db2 as $value)
{
?>

  <br/>
  <div class="form-group">
    <div class="col-md-offset-2 col-md-8 col-md-offset-2">
      <form action="<?= ROOT; ?>/index.php?action=updatePost&id=<?= $value->getId(); ?>" method="post">
        <input type="submit" value="Mettre à jour" class="btn btn-primary pull-right" />
        <label for="myTitle">Titre: </label><input type="text" id="myTitle" name="myTitle" value="<?= $value->getTitle(); ?>" class="form-control"><br/>
        <label for="myTextarea"> Contenu: </label><textarea id="myTextarea" name="myTextarea" class="form-control"><?= $value->getContent(); ?></textarea>
      </form>
    </div>
  </div>

<?php
}
$form = ob_get_clean(); 

$title_post = '';
$content = '';
$title_2 = '';
$comment = '';

require('backTemplate.php'); ?>