<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<title><?= $title ?></title>
</head>
<body>
		<header class="header-page">
		<h1 class="title-front col-xs-12 col-sm-offset-1 col-sm-4 col-md-offset-1 col-md-5 "><strong><?= $title ?></strong></h1>
		<?= $form ?>
		</header>
	
	  <div class="row">
	  <?= $content ?>
	  </div>

	  <div class="row">
	  	<?= $pagination ?>
	  </div>
	  
	  	<footer id="footer" class="col-xs-12 col-sm-12 col-md-12">
	  		<div id="pics" class="col-md-4">
	  		<img class="thumbnail hidden-xs hidden-sm " src="/tests/blog_mvc/tests/POO/css/doc/jean_forteroche.jpg" alt="jean_forteroche" height="120px" width="100px">
	  		</div>
	  		<div id="address" class="col-md-4">
	  			<p>jean_forteroche@gmail.com</p>
	  		</div>
	  		<div id="mention" class="col-md-4">
	  			<a href="#">Mentions légales</a>
	  		</div>
	  	</footer>

</body>
</html>