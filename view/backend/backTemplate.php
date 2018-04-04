<!DOCTYPE html>
<html>

	<head>
		<script type="text/javascript" src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=oxo5ntb8f8kc5nlnysbfdjmtrf94len4qkn6fq5mb7eoipxq'></script>  
	    <script type="text/javascript">
	    tinymce.init({
	    selector: '#myTextarea',
	    theme: 'modern',
	    entity_encoding : "raw",
	    encoding: "UTF-8",
	    height: 475,
	    plugins: [
	      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
	      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
	      'save table contextmenu directionality emoticons template paste textcolor'
	    ],
	    content_css: 'css/bootstrap.css, css/style.css',
	    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
	  	});
	  	</script>

		<link href="<?= ROOT; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="<?= ROOT; ?>/css/style.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8">  
		<title><?= $title_page ?></title>
	</head>

	<body id="body">
		<header class="header-page">
			<?= $header ?>
	 	</header>

		<div class="container">
			<div class="row">
				<?= $title_page ?>
			</div>

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