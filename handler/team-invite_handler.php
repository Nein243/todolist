<?php
session_start();
require_once 'function.php';
if (isset($_POST['submit'])) {
    $idUser = (int) $_POST['id_user'];
    $idTeam = $_POST['id_team'];

    try {
        if (!is_int($idUser)) {
            $idUser = getUserIdByLogin($idUser);

        }
        if (isExistTeamInvite($idUser, $idTeam)) {
            setMessage('The user already has already received your invitation');
        } else {
            sendInvite($idUser, $idTeam);
            setMessage('The user has received your invitation');


        }
    } catch (PDOException $e) {
        setMessage('User not found');
    } catch (TypeError $e) {
        setMessage('Enter users id');
    }
}


redirectToId('../team-view', $idTeam);


