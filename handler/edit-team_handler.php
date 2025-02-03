<?php
session_start();
require_once 'function.php';
if (isset($_SESSION['id'])){
    $pdo = getPDO();
    $query = $pdo->prepare('UPDATE teams SET title = :title WHERE id = :id ');
    $result = $query->execute([
        'id' => $_POST['title']
    ]);
}
redirect('../index');