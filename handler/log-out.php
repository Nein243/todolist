<?php
session_start();
require_once 'function.php';

if (isset($_SESSION['login'])){
    session_unset();

}
redirect('../registration');
