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
		<div class="row">
		<h1 class="col-md-offset-1 col-md-5 "><?= $title ?></h1>
	
		<?= $form ?>
		</div>
		</header>
	
	  <div class="row">
	  <?= $content ?>
	  </div>
	
	  <div class="row">
	  
	  	<div id="footer" class="col-md-12 footer">
	  		<div id="pics" class="col-md-4">
	  		<img class="thumbnail" src="doc/jean_forteroche.jpg" alt="jean_forteroche" height="120px" width="100px">
	  		</div>
	  		<div id="address" class="col-md-4">
	  			<p>jean_forteroche@gmail.com</p>
	  		</div>
	  		<div id="mention" class="col-md-4">
	  			<a href="#">Mentions légales</a>
	  		</div>
	  	</div>
	  </div>
</body>
</html>