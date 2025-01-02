<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title><?= isset($title) ? $title . ' | ' : '' ?>To do List</title>
</head>
<body>
<?php if (isset($_SESSION['warning'])): ?>
    <div class="warning">
        <?php if (is_array($_SESSION['warning'])): ?>
            <?php foreach ($_SESSION['warning'] as $message): ?>
                <div class="warning-content"><?= $message ?></div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="warning-content"><?= $_SESSION['warning'] ?></div>
        <?php endif; ?>
        <button class="warning-button yellow-button">OK</button>
        <?php unset($_SESSION["warning"]); ?>

    </div>
<?php endif; ?>
<div class="warning-window hide" id="category_added">
    <div class="warning">
        <div class="warning-content">Category has been successfully added</div>
        <button class="category-warning-button yellow-button">OK</button>
    </div>
</div>
<div class="warning-window hide" id="category_deleted">
    <div class="warning">
        <div class="warning-content">Category has been successfully deleted</div>
        <button class="category-warning-button yellow-button">OK</button>
    </div>
</div>



