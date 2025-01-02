<?php
$pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
$query = $pdo->prepare('SELECT tasks.id, tasks.title, tasks.text, categories.color FROM tasks INNER JOIN categories ON tasks.category_id=categories.id WHERE tasks.status = "deleted" AND tasks.user_id = :user_id');
$query->execute([
    'user_id' => $_SESSION['id']
]);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $task):?>
    <div class="task-item" style="background-color: <?= $task['color'] ?>">
        <div class="task-text">
            <div class="task-header"><?= $task['title'] ?></div>
            <p><?= $task['text'] ?></p>

        </div>
        <div class="task-setting">
            <a href="handler/restore-task_handler.php?id=<?= $task['id']?>" title="Restore" class="task-setting_object">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 16 16">
                    <path d="M 2.464844 1 L 4.152344 2.6875 C 2.835938 3.878906 2 5.589844 2 7.5 C 2 11.085938 4.914063 14 8.5 14 C 12.085938 14 15 11.085938 15 7.5 C 15 3.914063 12.085938 1 8.5 1 L 8 1 L 8 2 L 8.5 2 C 11.542969 2 14 4.457031 14 7.5 C 14 10.542969 11.542969 13 8.5 13 C 5.457031 13 3 10.542969 3 7.5 C 3 5.859375 3.722656 4.402344 4.859375 3.394531 L 6 4.535156 L 6 1 Z"></path>
                </svg>
            </a>
            <a href="handler/permanent-delete-task_handler.php?id=<?= $task['id']?>" title="Delete permanently" class="task-setting_object">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 16 16">
                    <path d="M 6.496094 1 C 5.675781 1 5 1.675781 5 2.496094 L 5 3 L 2 3 L 2 4 L 3 4 L 3 12.5 C 3 13.324219 3.675781 14 4.5 14 L 10.5 14 C 11.324219 14 12 13.324219 12 12.5 L 12 4 L 13 4 L 13 3 L 10 3 L 10 2.496094 C 10 1.675781 9.324219 1 8.503906 1 Z M 6.496094 2 L 8.503906 2 C 8.785156 2 9 2.214844 9 2.496094 L 9 4 L 11 4 L 11 12.5 C 11 12.78125 10.78125 13 10.5 13 L 4.5 13 C 4.21875 13 4 12.78125 4 12.5 L 4 4 L 6 4 L 6 2.496094 C 6 2.214844 6.214844 2 6.496094 2 Z M 5 5 L 5 12 L 6 12 L 6 5 Z M 7 5 L 7 12 L 8 12 L 8 5 Z M 9 5 L 9 12 L 10 12 L 10 5 Z"></path>
                </svg>
            </a>


        </div>
    </div>
<?php endforeach; ?>
