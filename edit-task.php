<?php
require_once 'handler/function.php';
if (isset($_GET['id'])):;
$pdo = getPDO();
$task = getOneById('tasks', $_GET['id']);
require_once 'header.php';
require_once 'nav.php';

?>
    <h1 class="main-header">Edit a task</h1>
    <div class="task-item task-item_form">
        <form action="handler/update-task_handler.php?id=<?=$task['id']?>" class="task-form" method="post">
            <div class="task-form_row">
                <label for="title" class="task-form_label">Enter title</label>
                <input type="text" name="title" id="title" class="task-form_text" value="<?= $task['title'] ?>"
                       required>
            </div>
            <div class="task-form_row">
                <label for="category_id" class="task-form_label">Select task category</label>
                <select name="category_id" id="category_id" class="task-form_text">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="task-form_row">
                <label for="text" class="task-form_label">Enter description</label>
                <textarea name="text" id="text"
                          class="task-form_text task-form_description"><?= $task['text'] ?></textarea>
            </div>
            <div class="task-setting">
                <div class="task-setting_object">
                    <button type="submit" name="submit" id="submit" class="task-button">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                             viewBox="0 0 16 16">
                            <path d="M 7.5 1 C 3.917969 1 1 3.917969 1 7.5 C 1 11.082031 3.917969 14 7.5 14 C 11.082031 14 14 11.082031 14 7.5 C 14 3.917969 11.082031 1 7.5 1 Z M 7.5 2 C 10.542969 2 13 4.457031 13 7.5 C 13 10.542969 10.542969 13 7.5 13 C 4.457031 13 2 10.542969 2 7.5 C 2 4.457031 4.457031 2 7.5 2 Z M 10.144531 5.148438 L 6.5 8.792969 L 4.851563 7.148438 L 4.148438 7.851563 L 6.5 10.207031 L 10.855469 5.851563 Z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        <?php
        require_once 'footer.php';

        else:
            redirect('index');
        endif;
        ?>
