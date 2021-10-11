<?php
require_once('header.php');
session_start();
if (empty($_SESSION['id'])) header('Location: top.php');
echo $_SERVER['REQUEST_URI'];
?>

<h1>indexページ</h1>