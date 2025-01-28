<?php
require_once 'function.php';
if (isset($_GET['id'])){
    $pdo = getPDO();
    $query = $pdo->prepare('DELETE FROM tasks WHERE id = :id ');
    $query->execute([
        'id' => $_GET['id']
    ]);
}
header('location:../deleted_list.php');
