<?php
require_once "header.php";
require_once "nav.php";

$pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
$query = $pdo->prepare('SELECT * FROM categories');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>
    <main>
        <h1 class="main-header">Add a task</h1>
        <div class="task-item task-item_form">
            <form action="handler/add_task_handler.php" class="task-form" method="post">
                <div class="task-form_row">
                    <label for="title" class="task-form_label">Enter title</label>
                    <input type="text" name="title" id="title" class="task-form_text" required>
                </div>
                <div class="task-form_row">
                    <label for="category_id" class="task-form_label">Select task category</label>
                    <select name="category_id" id="category_id" class="task-form_text">
                        <?php foreach ($result as $category): ?>
                        <option value="<?= $category['id']?>"><?= $category['title']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="task-form_row">
                    <label for="text" class="task-form_label">Enter description</label>
                    <textarea name="text" id="text" class="task-form_text task-form_description"></textarea>
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
                    <div class="task-setting_object">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                             viewBox="0 0 16 16">
                            <path d="M 6.496094 1 C 5.675781 1 5 1.675781 5 2.496094 L 5 3 L 2 3 L 2 4 L 3 4 L 3 12.5 C 3 13.324219 3.675781 14 4.5 14 L 10.5 14 C 11.324219 14 12 13.324219 12 12.5 L 12 4 L 13 4 L 13 3 L 10 3 L 10 2.496094 C 10 1.675781 9.324219 1 8.503906 1 Z M 6.496094 2 L 8.503906 2 C 8.785156 2 9 2.214844 9 2.496094 L 9 4 L 11 4 L 11 12.5 C 11 12.78125 10.78125 13 10.5 13 L 4.5 13 C 4.21875 13 4 12.78125 4 12.5 L 4 4 L 6 4 L 6 2.496094 C 6 2.214844 6.214844 2 6.496094 2 Z M 5 5 L 5 12 L 6 12 L 6 5 Z M 7 5 L 7 12 L 8 12 L 8 5 Z M 9 5 L 9 12 L 10 12 L 10 5 Z"></path>
                        </svg>
                    </div>
                </div>
            </form>
<?php
require_once "footer.php";
?>