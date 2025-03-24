<?php
require_once 'header.php';
require_once 'handler/function.php';
$query = getPDO()
    ->prepare('
                    SELECT  teams.title, teams_invite.id_team 
                    FROM teams_invite 
                    JOIN teams ON teams_invite.id_team = teams.id
                    WHERE teams_invite.status = "sent"
                    AND teams_invite.id_user = :id_user
                     ');
$query->execute([
    'id_user' => $_SESSION['id']
]);
$invites = $query->fetchAll(PDO::FETCH_ASSOC);
?>
    <h1 class="main-header invite-header">Your invitations</h1>
    <div class="invite-list">
        <?php foreach ($invites as $invite): ?>
            <div class="invite_item">
                <div class="invite_header"><?= $invite['title'] ?></div>
                <form action="handler/accept-invite_handler.php" method="post"
                      class="invite-form">
                    <input type="hidden" name="idTeam"
                           value="<?= $invite['id_team'] ?>">
                    <button name="accept" type="submit"
                            class="invite-btn invite-btn-accept">
                        Accept
                    </button>
                </form>
                <form action="handler/decline-invite_handler.php" method="post"
                      class="invite-form">
                    <input type="hidden" name="idTeam"
                           value="<?= $invite['id_team'] ?>">
                    <button name="decline" type="submit"
                            class="invite-btn invite-btn-decline">
                        Decline
                    </button>
                </form>

            </div>
        <?php endforeach; ?>
    </div>
<?php
require_once 'footer.php';
