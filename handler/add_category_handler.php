<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
    $query = $pdo->prepare('INSERT INTO categories(title, color, user_id) VALUES (:title, :color, :user_id)');
    $query->execute([
        'title' => $_POST['title'],
        'color' => $_POST['color'],
        'user_id' => $_SESSION['id']
    ]);
    $id = $pdo->lastInsertId();

    http_response_code(200);
    echo json_encode([
        'message' => 'Success',
        'id' => $id,
        'title' => $_POST['title'],
        'color' => $_POST['color']
    ]);
}


