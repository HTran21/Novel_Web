<?php
include '/xampp/htdocs/Novel_web/partials/connect_db.php';
$uname = $_POST['uname'];
$pass = $_POST['password'];
$errors;
if (isset($_POST['uname']) && isset($_POST['password'])) {
    $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
    $kq = $pdo->query($sql)->fetch();

    if ($kq) {
        session_start();
        $_SESSION['username'] = $kq['username'];
        $_SESSION['password'] = $kq['password'];
        $_SESSION['id_user'] = $kq['id_user'];
        header('Location: http://127.0.0.1/NOVEL_WEB/public/view/home.php');
    } else {
        header('Location: http://127.0.0.1/Novel_web/public/view/login.php?error=Tài khoản hoặc mật khẩu không chính xác');
    }
} else {
    header('Location: http://127.0.0.1/Novel_web/public/view/login.php');
    exit();
}
