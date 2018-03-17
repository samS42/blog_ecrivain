<!DOCTYPE html>
<html>
<head>
  <title>Ajouter un billet</title>
  <script type="text/javascript" src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#myTextarea',
    theme: 'modern',
    width: 600,
    height: 300,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    content_css: 'css/content.css',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  });

  /*tinymce.init({
    selector: '#myTitle',
    theme: 'modern',
    width: 600,
    height: 10,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    content_css: 'css/content.css',
    menubar: false,
    toolbar: false
  });*/

  </script>
</head>

<body>
 <form method="post" action="view/backend/log.php">
  <input type="submit" name="logout" value="Déconnexion">
 </form>

 <a href="/tests/blog_mvc/tests/POO/index.php">Retour au site</a><br/>
 <a href="/tests/blog_mvc/tests/POO/index.php?action=displayTitles">Accueil page d'administration</a>
 
  <h1>Ajouter un billet</h1>

  <!-- Display content form from Tiny MCE -->
  
  <form action="/tests/blog_mvc/tests/POO/index.php?action=updatePost&id=<?= $_GET['id'] ?>" method="post">
    <h3>Titre: </h3><input type="text" id="myTitle" name="myTitle" value="<?= $_GET['title'] ?>">
    <h3>Contenu: </h3><textarea id="myTextarea" name="myTextarea"><?= $_GET['content'] ?></textarea>
    <input type="submit" value="Mettre à jour" />
  </form>
</body>
</html>