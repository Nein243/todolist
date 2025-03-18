<?php
require_once 'handler/function.php';
session_start();
if (isset($_GET['id'])){
    $_SESSION['team_id'] = $_GET['id'];
}
$categories = getAllById('team_categories', 'team_id', $_GET['id']);
?>
<?php foreach ($categories as $category): ?>
    <div class="shared-category_item" style="background-color: <?= $category['color']; ?>">
        <h3 class="shared-category_header">
                <a href="team-category-view.php?id=<?= $category['id']
                //TODO нужно передать айди тимы
                ?>">
                    <?= $category['title']; ?>
                </a>
        </h3>
        <ul class="shared-category_list">
            <li>
                <a href="task.php?id=" class="shared-category_link">g
                </a>
            </li>
        </ul>
    </div>
<?php endforeach; ?>
