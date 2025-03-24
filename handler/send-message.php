<?php
session_start();
$idTeam = $_POST['id_team'];
require_once 'function.php';
sendMessage($_POST['message'], $_SESSION['id'], $idTeam);
redirectToId('../team-chat_view', $idTeam);
