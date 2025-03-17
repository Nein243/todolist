<?php
session_start();
require_once 'function.php';
$teamId = $_POST['teamId'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $color = $_POST['color'];
    insertCategory(table: 'team_categories', title: $title,color: $color, teamId: $teamId);
}
redirectToId('../team-view', $teamId);
