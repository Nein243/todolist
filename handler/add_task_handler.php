<?php
session_start();
require_once 'function.php';
if(isset($_POST['submit'])){
    $pdo = getPDO();
    $query = $pdo->prepare('INSERT INTO tasks(title, text, category_id, user_id) VALUES (:title, :text, :category_id, :user_id)');
    $query->execute([
        'title' => $_POST['title'],
        'text' => $_POST['text'],
        'category_id' => $_POST['category_id'],
        'user_id' => $_SESSION['id']
    ]);
}
header('location:../index.php');
exit;
