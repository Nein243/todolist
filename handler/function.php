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

function getAllByIdAndTeam(string $table, int $idTeam): array
{
    $query = getPDO()->prepare("
                        SELECT * FROM $table
                        WHERE id_team = :id_team
    ");
    $query->execute([
        'id_team' => $idTeam
    ]);
    return  $query->fetchAll(PDO::FETCH_ASSOC);
}
function getMessageAndSender(int $idTeam): array{
    $query = getPDO()->prepare("
                            SELECT team_messages.message,
                            team_messages.created_at, users.id, users.name
                            FROM team_messages
                            JOIN users ON team_messages.id_user = users.id
                            WHERE id_team = :id_team
    ");
    $query->execute([
        'id_team' => $idTeam
    ]);
    return  $query->fetchAll(PDO::FETCH_ASSOC);
}

function getCategoriesAndTasksData(string $categoryTable, string $taskTable, int $id): array
{
    $query = getPDO()->prepare("
                        SELECT $categoryTable.title 
                        AS category_title, $categoryTable.color,
                        $taskTable.id, $taskTable.text, $taskTable.title 
                        FROM $categoryTable INNER JOIN $taskTable 
                        ON $categoryTable.id = $taskTable.category_id 
                        WHERE category_id = :category_id 
                        AND  $taskTable.status = 'new'
  ");
    $query->execute([
        'category_id' => $id
    ]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function insertTask(string $table, string $ownerColumn,
                    string $title, string $text, int $categoryId,
                    int    $ownerId): void
{
    $pdo = getPDO();
    $query = $pdo->prepare("
                INSERT INTO $table(title, text,
                category_id, $ownerColumn)
                VALUES (:title, :text, :category_id, :user_id)
");
    $query->execute([
        'title' => $title,
        'text' => $text,
        'category_id' => $categoryId,
        'user_id' => $ownerId
    ]);
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
//TODO РАЗДЕЛИТЬ ФУНКЦИЮ
function insertCategory(string  $table, string $title,
                        string  $color, ?int $userId = null,
                        ?string $teamId = null): void
{
    if ($teamId !== null) {
        $query = getPDO()->prepare("
                INSERT INTO $table(title, color, team_id)
                VALUES (:title, :color, :team_id)
                ");
        $query->execute([
            'title' => $title,
            'color' => $color,
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

function getUserAndTeamData(): array
{
    $query = getPDO()->prepare("
                            SELECT users.name, teams.title, teams_to_users.id_team
                            FROM teams_to_users
                            INNER JOIN users
                            ON teams_to_users.id_user = users.id
                            INNER JOIN teams
                            ON teams_to_users.id_team = teams.id
                            WHERE teams_to_users.status = 'accepted'
");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function sendMessage(string $message, int $idUser, int $idTeam): void
{
    $query = getPDO()->prepare("
                            INSERT INTO team_messages
                            (message, id_user, id_team)
                            VALUES (:message, :id_user, :id_team)
    ");
    $query->execute([
        'message' => $message,
        'id_user' => $idUser,
        'id_team' => $idTeam
    ]);
}
function getUnreadMessagesNumber():int{
    $query = getPDO()->prepare("
                        SELECT COUNT(*)
                        FROM team_messages
                        WHERE status = 'unread'
    ");
    $query->execute();
    return $query->fetchColumn();
}