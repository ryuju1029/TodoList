<?php
require_once('header.php');
session_start();
if (empty($_SESSION['id'])) header('Location: top.php');
?>

<h1>indexページ</h1>