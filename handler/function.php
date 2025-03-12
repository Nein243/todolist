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

function getAllById(string $table, string $column, int $id): array
{
    $query = getPDO()->prepare("
                    SELECT * FROM {$table}
                    WHERE $column = :id
                    ");
    $query->execute([
        'id' => $id
    ]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
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
    $query = getPDO()->prepare('
                            SELECT name FROM users
                            WHERE id=:id
');
    $query->execute(['id' => $ownerId]);
    return $query->fetch(PDO::FETCH_COLUMN);
}

function isExistTeamInvite(int $idUser, int $idTeam, string $status = 'sent'): bool
{
    $query = getPDO()->prepare('
                                    SELECT id 
                                    FROM teams_invite 
                                    WHERE id_user=:id_user 
                                    AND id_team=:id_team 
                                    AND status=:status
  ');
    $query->execute([
        'id_user' => $idUser,
        'id_team' => $idTeam,
        'status' => $status
    ]);
    return $query->fetch(PDO::FETCH_COLUMN);
}

function setMessage(string $message): void
{
    $_SESSION['warning'] = $message;
}

function sendInvite(int $idUser, int $idTeam): void
{
    $query = getPDO()->prepare('
        INSERT INTO teams_invite(id_user, id_team, status) 
        VALUES (:id_user, :id_team, "sent" ) 
');
    $query->execute([
        'id_user' => $idUser,
        'id_team' => $idTeam
    ]);
}

function getUserIdByLogin(string $idUser): int
{
    $query = getPDO()->
    prepare('
    SELECT id FROM users WHERE login=:id_user
');
    $query->execute(['id_user' => $idUser]);
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

function acceptInvite(int $idUser, int $idTeam): void
{
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

function declineInvite(int $idUser, int $idTeam): void
{
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

function countInvitesNumber(int $idUser): int
{
    $query = getPDO()->
    prepare('
                SELECT COUNT(*) FROM teams_invite
                WHERE id_user = :id_user
                AND status = "sent"
');
    $query->execute([
        'id_user' => $idUser
    ]);
    return $query->fetchColumn();
}

function getSharedTeamsByUserId(int $id): array
{
    $query = getPDO()->prepare('
                            SELECT teams.title, teams.id FROM teams 
                            JOIN teams_to_users 
                            ON  teams.id=teams_to_users.id_team
                            WHERE teams_to_users.id_user=:idUser
                           ');
    $query->execute([
        'idUser' => $id
    ]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function isTeamMember(int $idUser, int $idTeam): bool
{
    $query = getPDO()->prepare('
    SELECT * FROM teams_to_users
    WHERE id_user=:idUser
    AND id_team=:idTeam
    ');
    $query->execute([
        'idUser' => $idUser,
        'idTeam' => $idTeam
    ]);
    return !empty($query->fetchAll(PDO::FETCH_ASSOC));
}

//function checkAccessToTeam(int $userId, int $ownerId, int $teamId): bool{
//    if (isTeamOwner($userId, $ownerId)){
//        return true;
//    }
//
//    if (isTeamMember($userId, $teamId)){
//        return true;
//    }
//    return false;
//}

function insertCategory(string  $table, string $title,
                        string  $color, int $userId,
                        ?string $teamId = null): void
{
    if ($teamId !== null) {
        $query = getPDO()->prepare("
                INSERT INTO $table(title, color, user_id, team_id)
                VALUES (:title, :color, :user_id, :team_id)
                ");
        $query->execute([
            'title' => $title,
            'color' => $color,
            'user_id' => $userId,
            'team_id' => $teamId
        ]);
    } else {
        $query = getPDO()->prepare("
                INSERT INTO $table(title, color, user_id)
                VALUES (:title, :color, :user_id)
                ");
        $query->execute([
            'title' => $title,
            'color' => $color,
            'user_id' => $userId
        ]);
    }
}

;