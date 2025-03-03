<?php
session_start();
require_once 'function.php';
if (isset($_POST['decline'])) {
    $idTeam = $_POST['idTeam'];
    $idUser = $_SESSION['id'];
    declineInvite($idUser, $idTeam);
    setMessage('The invitation has been declined');

}
redirect('../invite-team-list');
