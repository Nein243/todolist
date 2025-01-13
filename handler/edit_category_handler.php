<?php
session_start();
if (isset($_POST['id'])){
    $pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
    $query = $pdo->prepare('UPDATE categories SET title = :title, color = :color WHERE id = :id');
    $result = $query->execute([
        'id' => $_POST['id'],
        'title' => $_POST['title'],
        'color' => $_POST['color']
    ]);
}
header('location:../index.php');
exit;
