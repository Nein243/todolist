<?php

function getPDO(): PDO
{
    return new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
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

function redirect(string $url):void{
    header("location:{$url}.php");
    exit;
}

