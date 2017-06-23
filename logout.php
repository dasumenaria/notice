<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["username"]);
unset($_SESSION["category"]);
unset($_SESSION["loggedin_time"]);
header("Location:index.php");
?>