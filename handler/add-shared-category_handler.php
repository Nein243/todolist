<?php
session_start();
require_once 'function.php';
$teamId = $_POST['teamId'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $color = $_POST['color'];
    $userId = $_SESSION['id'];
    insertCategory('shared_categories', $title, $color, $userId, $teamId);
}
redirectToId('../team-view', $teamId);
