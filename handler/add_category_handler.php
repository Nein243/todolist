<?php
if(isset($_POST['submit'])){
    $pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
    $query = $pdo->prepare('INSERT INTO categories(title, color) VALUES (:title, :color)');
    $query->execute([
        'title' => $_POST['title'],
        'color' => $_POST['color']
    ]);
}
header('location:../index.php');
exit;