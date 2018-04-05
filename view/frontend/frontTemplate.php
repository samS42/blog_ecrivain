<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<title><?= $title ?></title>
</head>
<body id="body">
   
		<header class="header-page">
			<h1 class="title-front col-xs-12 col-md-offset-1 col-md-5 "><strong><?= $title ?></strong></h1>
			<?= $form ?>
		</header>
	
	    <div class="row">
	    	<?= $content ?>
	    </div>

	    <div class="row">
	  		<?= $pagination ?>
	    </div>
	  
	  	<div class="row">
	  	<footer id="footer" class="col-xs-12 col-md-12">

	  		<div id="address" class="col-xs-12 col-md-3">
	  			<p>jean_forteroche@gmail.com</p>
	  		</div>

	  		<div id="pics" class="col-xs-12 col-md-3">
	  			<img class="thumbnail " src="css/doc/jean_forteroche.jpg" alt="jean_forteroche" height="120px" width="100px">
	  		</div>

	  		<div id="social-media" class="col-xs-12 col-md-3">
	  				<a href="#"><i class="fa fa-facebook fa-lg"></i></a>
	  				<a href="#"><i class="fa fa-twitter fa-lg"></i></a>
	  				<a href="#"><i class="fa fa-youtube fa-lg"></i></a>
	  				<a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
	  		</div>

	  		<div id="mention" class="col-xs-12 col-md-3">
	  			<a href="#">Mentions légales</a>
	  		</div>

	  	</footer>
	  	</div>
 
</body>
</html>