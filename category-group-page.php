<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
$query = $pdo->prepare('SELECT * FROM categories WHERE user_id = :user_id');
$query->execute([
    'user_id' => $_SESSION['id']
]);
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

require_once 'header.php';
require_once 'nav.php';
?>
<section class="add-category-group-container">
    <h1 class="main-header">Add a category group</h1>
    <div class="add-category-group">
        <form action="handler/add_category_group_handler.php" id="add-category-group" method="post" class="">
            <div class="add-group_row">
                <label class="add-group_label" for="title">Enter group name</label>
                <input class="add-group_input" type="text" name="title" required>
            </div>
            <div class="add-group_row">
                <label class="add-group_label" for="group-category">Choose categories for that group</label>
                <select required class="add-group_input" name="group-category" id="group-category" multiple>
                    <?php foreach ($categories as $category):?>
                        <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="add-group_color">
                <label for="color" class="add-group_label">Choose a color for category group</label>
                <input type="color" name="color" class="add-group_input_color" required>
            </div>
            <div class="add-group_row">
                <div class="add-category-header">
                    You can share this group with other users
                </div>
                <label class="add-group_label" for="user_ids">Enter user IDs (separated by commas):</label>
                <input class="add-group_input" pattern="^(\d+|(\d+, \d+)+)$" type="text" name="user_ids" placeholder="Example: 1, 2, 3, 4">
            </div>
            <div class="add-group_row">
                <input  type="submit" name="submit" class="add-group_button" title="Submit">
            </div>
        </form>
    </div>
</section>


<?php
require_once 'footer.php';
?>
