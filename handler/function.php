<?php

function getPDO():PDO{
   return new PDO('mysql:host=localhost;dbname=todolist', 'root', '');
}
