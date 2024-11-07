<?php
if(isset($_POST['submit'])){
    $pdo = new PDO('mysql:host=localhost;dbname=todolist','root', '');
    $query = $pdo->prepare('INSERT INTO tasks(title, text, category_id) VALUES (:title, :text, :category_id)');
    $query->execute([
        'title' => $_POST['title'],
        'text' => $_POST['text'],
        'category_id' => $_POST['category_id']
    ]);
}
header('location:../index.php');
exit;
