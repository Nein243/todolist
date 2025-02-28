<?php

function getPDO(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function getOneById(string $table, int $id): array
{
    $pdo = getPDO();
    $query = $pdo->prepare("SELECT * FROM {$table} WHERE id = :id");
    $query->execute([
        'id' => $id
    ]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function isTeamOwner(int $userId, int $ownerId): bool
{
    if ($userId === $ownerId) {
        return true;
    }
    return false;
}

function redirect(string $url): void
{
    header("location:{$url}.php");
    exit;
}

function redirectToId(string $url, int $id): void
{
    header("location:{$url}.php?id={$id}");
    exit;
}

function getNameOwnerTeamByID(int $ownerId): string
{
    $query = getPDO()->prepare('SELECT name FROM users WHERE id=:id');
    $query->execute(['id' => $ownerId]);
    return $query->fetch(PDO::FETCH_COLUMN);
}

function isExistTeamInvite(int $id_user, int $id_team, string $status = 'sent'): bool
{
    $query = getPDO()->prepare('SELECT id FROM teams_invite WHERE id_user=:id_user AND id_team=:id_team AND status=:status');
    $query->execute([
        'id_user' => $id_user,
        'id_team' => $id_team,
        'status' => $status
    ]);
    return $query->fetch(PDO::FETCH_COLUMN);
}

function setMessage(string $message): void
{
    $_SESSION['warning'] = $message;
}

function sendInvite(int $id_user, int $id_team): void
{
    $query = getPDO()->prepare('
        INSERT INTO teams_invite(id_user, id_team, status) 
        VALUES (:id_user, :id_team, "sent" ) 
');
    $query->execute([
        'id_user' => $id_user,
        'id_team' => $id_team
    ]);
}

function getUserIdByLogin(string $id_user): int
{
    $query = getPDO()->
    prepare('
    SELECT id FROM users WHERE login=:id_user
');
    $query->execute(['id_user' => $id_user]);
    return $query->fetch(PDO::FETCH_COLUMN);
}

function changeInviteStatusToAccept(int $idUser, int $idTeam): void
{
    $query = getPDO()->
    prepare('
                    UPDATE teams_invite 
                    SET status = "accepted"
                    WHERE id_user = :id_user 
                    AND id_team = :id_team
        ');
    $query->execute([
        'id_user' => $idUser,
        'id_team' => $idTeam

    ]);
}
function acceptInvite (int $idUser, int $idTeam): void{
    $query = getPDO()->
    prepare('
                INSERT INTO teams_to_users (id_user, id_team, status)
                VALUES (:id_user, :id_team, "accepted")
    ');
    $query->execute([
        'id_user' => $idUser,
        'id_team' => $idTeam
    ]);
}
function declineInvite (int $idUser, int $idTeam): void{
    $query = getPDO()->
    prepare('
                    DELETE FROM teams_invite
                    WHERE id_user = :id_user 
                    AND id_team = :id_team
    ');
    $query->execute([
        'id_user' => $idUser,
        'id_team' => $idTeam

    ]);
}