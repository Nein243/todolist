<?php
require_once 'header.php';
require_once 'nav.php';
require_once 'handler/function.php';
$team = getOneById('teams', $_GET['id']);
$ownerId = $team['owner_id'];
$userId = $_SESSION['id'];
$isTeamOwner = isTeamOwner($userId, $ownerId);
$isTeamMember = isTeamMember($userId, $team['id']);
if (!$isTeamOwner && !$isTeamMember) {
    redirect('not-found');
}
?>
    <h1 class="main-header">Team <?= $team['title'] ?></h1>
    <h3>Chef: <?= getNameOwnerTeamByID($ownerId) ?></h3>
<?php if ($isTeamOwner): ?>
<details class="team-addition">
    <summary class="team-addition_summary">
        Invite a member
    </summary>
    <form action="handler/team-invite_handler.php" class="team-addition_form" id="team-addition_form" method="post">
        <input type="hidden" name="id_team" value="<?=$team['id']?>">
        <h4 class="team-addition_header">Send an invitation to join a group <span><?=$team['title']?></span></h4>
        <label class="team_addition_label" for="id_user">Enter login or id of user</label>
        <input type="text" name="id_user" class="team-addition_input">
        <button type="submit" class="team-addition_button" name="submit" id="submit">Send</button>
    </form>
</details>
<?php endif; ?>
    <h3 class="minor-header">Categories in this team:</h3>
        <div class="shared-category_grid">
            <?php require_once 'shared-category.php'?>
        </div>
<?php require_once 'footer.php';