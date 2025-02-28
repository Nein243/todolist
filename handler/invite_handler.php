<?php
session_start();
require_once 'function.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['action'])) {
    $idTeam = $_POST['idTeam'];
    $idUser = $_SESSION['id'];
    if ($_POST['action'] == 'accept') {
        changeInviteStatusToAccept($idUser, $idTeam);
        acceptInvite($idUser, $idTeam);
        setMessage('The invitation has been successfully accepted!');
    }
    if ($_POST['action'] == 'decline') {
        declineInvite($idUser, $idTeam);
        setMessage('The invitation has been declined');
    }
}
redirect('../invite-team-list');
