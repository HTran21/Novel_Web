<?php
include '/xampp/htdocs/app/Novel_web/public/partials/connect_db.php';
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
    unset($_SESSION["id_user"]);
}

header("Location: http://127.0.0.1/Novel_web/public/view/login.php");
