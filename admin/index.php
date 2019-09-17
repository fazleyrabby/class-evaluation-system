<?php
session_start();
if (isset($_SESSION['username']) &&  isset($_SESSION['user_type'])) {
    header("Location: dashboard.php");
    exit;
}

else
{
    $_SESSION['alert'] = "Cannot Enter without Login!!";
    header("Location: ../login.php");
    exit;
    session_destroy();
}