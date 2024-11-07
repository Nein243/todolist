<?php
$pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
$query = $pdo->prepare('SELECT * FROM categories');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $category):?>
<li class="navigation-row" style="background-color: <?= $category['color']?>"><a href=""><?= $category['title'];?></a></li>
<?php endforeach;?>

