<?php
require_once 'handler/function.php';
$query = getPDO()->prepare('
                            SELECT * FROM shared_categories
                            WHERE user_id = :userId
                            AND team_id = :teamId
                            ');
$query->execute([
    'userId' => $_SESSION['id'],
    'teamId' => $_GET['id']
]);
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>

    <?php foreach ($categories as $category):?>
        <div class="shared-category_item" style="background-color: <?= $category['color']; ?>">
            <h3 class="shared-category_header"><?= $category['title']; ?></h3>
            <ul class="shared-category_list">
                    <li>
                        <a href="task.php?id=" class="shared-category_link">g
                        </a>
                    </li>
            </ul>
        </div>
    <?php endforeach; ?>
