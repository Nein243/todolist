<?php
session_start();
require_once 'function.php';
if (isset($_POST['submit'])) {
    //TODO id_user -> idUser everywhere!
    $id_user = $_POST['id_user'];
    $id_team = $_POST['id_team'];
    try {
        if (!is_int($id_user)) {
            $id_user = getUserIdByLogin($id_user);
        }
        if (isExistTeamInvite($id_user, $id_team)) {
            setMessage('The user already has already received your invitation');
        } else {
            sendInvite($id_user, $id_team);
            setMessage('The user has received your invitation');


        }
    } catch (PDOException $e) {
        setMessage('User not found');
    } catch (TypeError $e) {
        setMessage('Enter users id');
    }
}


redirectToId('../team-view', $id_team);


