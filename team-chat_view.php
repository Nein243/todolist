<?php
require_once 'header.php';

$teams = getUserAndTeamData();
?>
    <h1 class="main-header">
        Chats:
    </h1>
    <div class="chat_container">
        <div class="chat_teams">
            <?php foreach ($teams as $team): ?>
                <div class="chat-team">
                    <a class="chat-team_title"
                       href="team-chat_view.php?id=<?= $team['id_team'] ?>">
                        <?= $team['title'] ?>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
        <div class="chat_window">
            <?php if (!isset($_GET['id'])): ?>
                <div class="chat-empty">
                    <div class="chat-empty_warning">
                        Select a team to open a chat
                    </div>
                </div>
            <?php
            else:
                require_once 'team-message.php';
                ?>


            <?php endif; ?>

        </div>
        <div class="chat-input">
            <form action="handler/send-message.php" method="post" class="chat-input_form">
                <textarea name="message" class="chat-type"></textarea>
                <?php if (isset($_GET['id'])): ?>
                    <input type="hidden" name="id_team" value="<?= $_GET['id'] ?>">
                <?php endif; ?>

                <button class="chat-input_button">
                    <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M14.6644 5.47875L18.6367 9.00968C20.2053 10.404 20.9896 11.1012 20.9896 11.9993C20.9896 12.8975 20.2053 13.5946 18.6367 14.989L14.6644 18.5199C13.9484 19.1563 13.5903 19.4746 13.2952 19.342C13 19.2095 13 18.7305 13 17.7725V15.4279C9.4 15.4279 5.5 17.1422 4 19.9993C4 10.8565 9.33333 8.57075 13 8.57075V6.22616C13 5.26817 13 4.78917 13.2952 4.65662C13.5903 4.52407 13.9484 4.8423 14.6644 5.47875Z"
                                  stroke="#000000" stroke-width="1.2" stroke-linecap="round"
                                  stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </button>

            </form>


        </div>
    </div>
<?php
require_once 'footer.php';