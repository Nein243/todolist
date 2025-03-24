<?php
$idUser = $_SESSION['id'];
//$messages = getAllByIdAndTeam('team_messages', $_GET['id']);
$messages = getMessageAndSender($_GET['id']);
foreach ($messages as $message): ?>
    <div class="message
        <?php if ($message['id'] == $idUser): ?>
            own-message
        <?php else: ?>
            user-message
        <?php endif; ?>
    ">
        <div class="message_sender"><?= $message['name'] ?></div>
        <div class="message_text"><?= $message['message'] ?></div>
        <div class="message_date"><?= date("d M Y, H:i", strtotime($message['created_at'])) ?></div>
    </div>
<?php endforeach; ?>