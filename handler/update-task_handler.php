<?php
require_once 'function.php';
if (isset($_POST['submit'])){
    $pdo = getPDO();
    $query = $pdo->prepare('UPDATE tasks SET title = :title, text = :text, category_id = :category_id WHERE id = :id');
    $result = $query->execute([
        'id' => $_GET['id'],
        'title' => $_POST['title'],
        'text' => $_POST['text'],
        'category_id' => $_POST['category_id']
    ]);
}
header('location:../index.php');
exit;
