<!DOCTYPE html>
<html>
<head>
	<link href="<?= ROOT; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<title>Home page</title>
	<style type="text/css">
		body { background-image: url(<?= ROOT; ?>/css/doc/new_a2.jpg); background-attachment: fixed;}
		#title-home-page { display: flex; justify-content: center; padding-top: 150px; color: white /*#252628*/; }
		#h1-home-page { border: solid; padding: 10px; }
		#button-home-page { display: flex; justify-content: center; padding-top: 125px; }
		@media (max-width: 768px) { #h1-home-page { font-size: x-large; } }
	</style>
</head>
<body>
	<div class="container">
	<div class="row">
	<div id="title-home-page" class="col-xs-12 col-sm-12  col-md-offset-2 col-md-8 col-md-offset-2">
	<h1><strong id="h1-home-page">Billet simple pour l'Alaska</strong></h1>
	</div>
	</div>
	<div class="row">
	<div id="button-home-page" class="col-xs-offset-4 col-xs-4 col-xs-offset-4 col-sm-offset-4 col-sm-4 col-sm-offset-4  col-md-offset-4 col-md-4 col-md-offset-4">
<a href="<?= ROOT; ?>/index.php?action=index" class="btn btn-info btn-block btn-lg"><strong>Entrer</strong></a>
</div>
</div>
</div>
</body>
</html>