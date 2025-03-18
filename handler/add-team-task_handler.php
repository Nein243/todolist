<?php
session_start();
require_once 'function.php';
$idTeam = $_SESSION['team_id'];
if(isset($_POST['submit'])){
    insertTask(
        'team_tasks', 'team_id',
        $_POST['title'], $_POST['text'],
        $_POST['category_id'], $idTeam
    );
}
redirectToId('../team-view', $idTeam);
