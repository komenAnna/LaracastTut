<?php

require "functions.php";

require 'router.php';

require 'Database.php'
// Connection to database
$db = new Database()
$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);