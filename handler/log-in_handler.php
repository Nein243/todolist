<?php
session_start();
if (isset($_POST['submit'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
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
            header("location:../index.php");
            exit;
        }
    }
        $_SESSION['warning'] = 'Login or password is incorrect';
        header('location:../log-in.php');
        exit;

}
