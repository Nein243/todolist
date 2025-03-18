<?php
session_start();
require_once 'function.php';
if (isset($_POST['submit'])) {
    insertTask(
        'tasks', 'user_id',
        $_POST['title'], $_POST['text'],
        $_POST['category_id'], $_SESSION['id']
    );
}
redirect('../index');

