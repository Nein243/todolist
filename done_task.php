<?php
$pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
$query = $pdo->prepare('SELECT tasks.title, tasks.text, categories.color FROM tasks INNER JOIN categories ON tasks.category_id=categories.id WHERE tasks.status = "done"');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once 'task_body.php';