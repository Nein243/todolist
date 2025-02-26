<?php
require_once 'header.php';
require_once 'nav.php';
require_once 'handler/function.php';
$team = getOneById('teams', $_GET['id']);
if (!isTeamOwner($_SESSION['id'], $team['owner_id'])) {
// TODO СДЕЛАТЬ РЕДИРЕКТ НА СТРАНИЦУ 404
    redirect('deleted_list');
}
?>
    <h1 class="main-header">Team <?= $team['title'] ?></h1>
<?php require_once 'footer.php';