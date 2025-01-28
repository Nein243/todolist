<?php
session_start();
echo '<pre>';
print_r($_POST);
$user_ids_array = array_map('intval', explode(',', $_POST['user_ids']));
print_r($user_ids_array);
//die;
if (isset($_POST['submit'])){
    $pdo = getPDO();
    $query = $pdo->prepare('INSERT INTO `groups` (title, color, owner_id) VALUES (:title, :color, :owner_id)');
    $query->execute([
        'title' => $_POST['title'],
        'color' => $_POST['color'],
        'owner_id' => $_SESSION['id']
    ]);
}
header('location:../index.php');
exit;

