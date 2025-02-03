<?php
session_start();
require_once 'function.php';
$login = $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];
$errors = [];
$hasError = false;


if (mb_strlen($name) < 5 || mb_strlen($name) > 25) {
    $errors['name'] = 'Invalid name length (6 to 25 characters)';
    $hasError = true;
}
if (mb_strlen($password) < 5 || mb_strlen($password) > 15) {
    $errors['password'] = 'Invalid password length (6 to 15 characters)';
    $hasError = true;
}
if (mb_strlen($login) < 5 || mb_strlen($login) > 15) {
    $errors['login'] = 'Invalid login length (6 to 15 characters)';
    $hasError = true;
}
if ($_POST['password_confirm'] !== $password) {
    $errors['passwordConfirm'] = 'Passwords do not match';
    $hasError = true;
}
if ($hasError){
    $_SESSION['warning'] = $errors;
    redirect('../registration');

}
$pdo = getPDO();
$query = $pdo->prepare('SELECT login FROM users WHERE login = :login');
$query->execute([
    'login' => $login
]);
$checkLogin = $query->fetch(PDO::FETCH_ASSOC);
if ($checkLogin) {
   $_SESSION['warning'] = 'Login has been already taken';
    redirect('../registration');
}
$query = $pdo->prepare('INSERT INTO users (login, name, password) VALUES (:login, :name, :password)');
$query->execute([
    'login' => $login,
    'name' => $name,
    'password' => $password

]);
$query = $pdo->prepare('SELECT id FROM users where login = :login');
$query->execute([
    'login' => $login
]);
$user = $query->fetch(PDO::FETCH_ASSOC);
$_SESSION['password'] = $password;
$_SESSION['login'] = $login;
$_SESSION['id'] = $user['id'];
$_SESSION['name'] = $name;

$_SESSION['warning'] = 'You have been successfully signed up!';
redirect('../index');

