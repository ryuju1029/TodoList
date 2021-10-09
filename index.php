<?php
require_once('header.php');
session_start();
if (empty($_SESSION['id'])) header('Location: signin.php');
?>

<h1>index</h1>
