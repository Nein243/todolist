<?php
session_start();
require_once 'function.php';
if (isset($_POST['id'])){
    $pdo = getPDO();
    $query = $pdo->prepare('UPDATE categories SET title = :title, color = :color WHERE id = :id');
    $result = $query->execute([
        'id' => $_POST['id'],
        'title' => $_POST['title'],
        'color' => $_POST['color']
    ]);
}
header('location:../index.php');
exit;
