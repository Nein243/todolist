<?php
session_start();
require_once 'function.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $pdo = getPDO();
    $query = $pdo->prepare('INSERT INTO teams(title, owner_id) VALUES (:title, :owner_id)');
    $query->execute([
        'title' => $_POST['title'],
        'owner_id' => $_SESSION['id']
    ]);
    $id = $pdo->lastInsertId();

    http_response_code(200);
    echo json_encode([
        'message' => 'Success',
        'id' => $id,
        'title' => $_POST['title'],
    ]);
}