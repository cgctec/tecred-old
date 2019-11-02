<?php
require_once('../classe/class.php');
session_start();
unset($_SESSION['user']);
header('Location: ../index.php');
?>
