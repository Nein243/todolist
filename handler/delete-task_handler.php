<?php
require_once 'function.php';
if (isset($_GET['id'])){
    $pdo = getPDO();
    $query = $pdo->prepare('UPDATE tasks SET status = "deleted" WHERE id = :id ');
    $query->execute([
        'id' => $_GET['id']
    ]);
}
redirect('../index');
