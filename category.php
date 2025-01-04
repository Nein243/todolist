<?php
$pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
$query = $pdo->prepare('SELECT * FROM categories WHERE user_id = :user_id');
$query->execute([
    'user_id' => $_SESSION['id']
]);
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="nav-categories">
<?php foreach ($categories as $category):?>
    <li class="navigation-row category-row" style="background-color: <?= $category['color'] ?>">
        <a href="category-page.php?id=<?= $category['id']?>"><?=$category['title'];?></a>
        <div class="category-setting">
                <button title="Edit" data-category-id="<?= $category['id'] ?>" data-category-title="<?= $category['title']?>" data-category-color="<?= $category['color']?>"
                        class="task-setting_object edit-category-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M 12.03125 2.023438 C 11.535156 2.023438 11.066406 2.269531 10.675781 2.65625 L 2.5625 10.726563 L 1.207031 14.785156 L 5.265625 13.433594 L 5.351563 13.351563 L 13.386719 5.367188 C 13.773438 4.976563 14.015625 4.507813 14.015625 4.011719 C 14.015625 3.515625 13.773438 3.046875 13.386719 2.65625 C 12.996094 2.269531 12.527344 2.023438 12.03125 2.023438 Z M 10.027344 4.710938 L 11.320313 6.007813 L 4.726563 12.5625 L 2.789063 13.207031 L 3.4375 11.265625 Z"></path>
                    </svg>
                </button>
            <form action="handler/delete-category_handler.php" class="delete-category" method="post">
                <input type="hidden" value="<?= $category['id'] ?>" name="id">
                <button type="submit" title="Delete" name="submit" class="task-setting_object">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M 6.496094 1 C 5.675781 1 5 1.675781 5 2.496094 L 5 3 L 2 3 L 2 4 L 3 4 L 3 12.5 C 3 13.324219 3.675781 14 4.5 14 L 10.5 14 C 11.324219 14 12 13.324219 12 12.5 L 12 4 L 13 4 L 13 3 L 10 3 L 10 2.496094 C 10 1.675781 9.324219 1 8.503906 1 Z M 6.496094 2 L 8.503906 2 C 8.785156 2 9 2.214844 9 2.496094 L 9 4 L 11 4 L 11 12.5 C 11 12.78125 10.78125 13 10.5 13 L 4.5 13 C 4.21875 13 4 12.78125 4 12.5 L 4 4 L 6 4 L 6 2.496094 C 6 2.214844 6.214844 2 6.496094 2 Z M 5 5 L 5 12 L 6 12 L 6 5 Z M 7 5 L 7 12 L 8 12 L 8 5 Z M 9 5 L 9 12 L 10 12 L 10 5 Z"></path>
                    </svg>
                </button>
            </form>


        </div>
    </li>
<?php endforeach; ?>
    <div class="edit-category hide">
        <form action="handler/add_category_handler.php"  id="edit-category-form"
              method="post" class="add-category">
            <label for="title">Edit category name</label>
            <input type="text" id="category-name" class="category-title_edit" name="title" required>
            <label for="color">Choose category color</label>
            <input type="color" name="color" id="color" value="" class="category-color_edit">

            <div class="task-setting_object">
                <button type="submit" title="Submit" name="submit" id="submit" class="task-button">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                         viewBox="0 0 16 16">
                        <path d="M 7.5 1 C 3.917969 1 1 3.917969 1 7.5 C 1 11.082031 3.917969 14 7.5 14 C 11.082031 14 14 11.082031 14 7.5 C 14 3.917969 11.082031 1 7.5 1 Z M 7.5 2 C 10.542969 2 13 4.457031 13 7.5 C 13 10.542969 10.542969 13 7.5 13 C 4.457031 13 2 10.542969 2 7.5 C 2 4.457031 4.457031 2 7.5 2 Z M 10.144531 5.148438 L 6.5 8.792969 L 4.851563 7.148438 L 4.148438 7.851563 L 6.5 10.207031 L 10.855469 5.851563 Z"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

