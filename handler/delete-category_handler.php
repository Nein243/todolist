<?php
require_once 'function.php';
if (isset($_POST['id'])){
    $pdo = getPDO();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $pdo->prepare('DELETE FROM categories WHERE id = :id ');
    $query->execute([
        'id' => $_POST['id']
    ]);
    http_response_code(200);
    echo json_encode([
        'id' => $_POST['id']
    ]);
}


