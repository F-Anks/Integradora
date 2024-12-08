<?php
session_start();
if ($_SESSION['user_role'] != 0) {
    header("Location: index.php");
    exit;
}
?>
