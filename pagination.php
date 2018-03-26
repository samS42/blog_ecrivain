<?php

$db = new PDO('mysql:host=localhost;dbname=miniuchat;charset=utf8', 'root', '');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$perPage = isset($_GET['perPage']) && $_GET['perPage'] <= 50 ? (int)$_GET['perPage'] : 4;

$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$posts = $db->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM posts LIMIT {$start}, {$perPage}");
$posts->execute();
$posts = $posts->fetchAll(PDO::FETCH_ASSOC);

$total = $db->query("SELECT FOUND_ROWS() as total")->fetch() ['total'];
$pages = ceil($total / $perPage);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Posts</title>
</head>
<body>
	<?php foreach ($posts as $post): ?>
		<div class="post">
			<p><?= $post['title'] ?><br/><?= $post['content'] ?></p>
		</div>
	<?php endforeach; ?>

	<div class="pagination">
		<?php for ($i=1; $i <= $pages; $i++): ?>
			<a href="?page=<?= $i ?>&perPage=<?= $perPage ?>"><?= $i ?></a>
		<?php endfor; ?>
	</div>
</body>
</html>