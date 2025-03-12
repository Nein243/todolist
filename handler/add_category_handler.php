<?php
session_start();
require_once 'function.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $color = $_POST['color'];
    $userId = $_SESSION['id'];
    insertCategory('categories', $title, $color, $userId);
    $id = getPDO()->lastInsertId();

    http_response_code(200);
    echo json_encode([
        'message' => 'Success',
        'id' => $id,
        'title' => $title,
        'color' => $color
    ]);
}


