<?php
session_start();
if (isset($_POST['id'])){
    require_once 'header.php';
    require_once 'nav.php';
    $_SESSION['category_edit'] = true;
    require_once 'footer.php';
} else {
    redirect('index');

}