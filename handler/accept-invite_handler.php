<?php
session_start();
require_once 'function.php';
if (isset($_POST['accept'])) {
    $idTeam = $_POST['idTeam'];
    $idUser = $_SESSION['id'];
    changeInviteStatusToAccept($idUser, $idTeam);
    acceptInvite($idUser, $idTeam);
    setMessage('The invitation has been successfully accepted!');

}
redirect('../invite-team-list');
