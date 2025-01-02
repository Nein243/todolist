<?php
if (isset($_GET['id'])){
    $pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
    $query = $pdo->prepare('UPDATE tasks SET status = "deleted" WHERE id = :id ');
    $query->execute([
        'id' => $_GET['id']
    ]);
}
header('location:../index.php');
exit;