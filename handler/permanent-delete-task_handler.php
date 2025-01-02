<?php
if (isset($_GET['id'])){
    $pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
    $query = $pdo->prepare('DELETE FROM tasks WHERE id = :id ');
    $query->execute([
        'id' => $_GET['id']
    ]);
}
header('location:../deleted_list.php');
