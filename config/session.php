<?php

session_start();
if (isset($_SESSION['user']) === false) {
    header('Location: /inventory_management/login.php');
}
