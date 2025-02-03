<?php
session_start();
require_once 'function.php';
if (isset($_POST['submit'])) {
    $pdo = getPDO();
    $query = $pdo->prepare('SELECT * FROM users WHERE login = :login');
    $query->execute([
        'login' => $_POST['login']
    ]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if ($_POST['password'] === $user['password']) {
            $_SESSION['login'] = $user['login'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            redirect('../index');

        }
    }
        $_SESSION['warning'] = 'Login or password is incorrect';
    redirect('../log-in');

}
