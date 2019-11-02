<?php
require 'classe/class.php';
session_start();
unset($_SESSION['user']);
header('Location: index.php');
?>
