<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<title>back template</title>
</head>
<body>
	
	 <header class="header-page">
	  <div class="row">
		<?= $header ?>
	  </div>
	 </header>
	<div class="container">
		<div class="row">
			<?= $form ?>
		</div>
		<div class="row">
			<?= $title_post ?>
			<?= $content ?>
		</div>
		<div class="row">
			<?= $title_2 ?>
		</div>
		<div class="row">
			<?= $comment ?>
		</div>

	</div>

</body>
</html>