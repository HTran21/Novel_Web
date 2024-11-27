<?php
$errors;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty(trim($_POST['username']))) {
        $errors['username']['required'] = 'tên người dùng không được để trống';
    }

    if (empty(trim($_POST['phone']))) {
        $errors['phone']['required'] = 'email hoặc số điện thoại người dùng không được để trống';
    }
    if (empty(trim($_POST['password1']))) {
        $errors['password1']['required'] = 'mật khẩu bắt buộc phải nhập';
    }
    if (empty(trim($_POST['password2']))) {
        $errors['password2']['required'] = 'mật khẩu bắt buộc phải nhập';
    }


    if (!empty($_POST['username']) && !empty($_POST['phone']) && !empty($_POST['password1']) && !empty($_POST['password2'])) {
        include '/xampp/htdocs/Novel_web/partials/connect_db.php';
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];

        $sql1 = "SELECT * FROM users WHERE username='$username'";
        $kq = $pdo->query($sql1)->fetch();

        if ($pass1 != $pass2) {
            $errors['password2']['overlap'] = 'mật khẩu không khớp';
        } else {
            if ($kq) {
                header("Location: http://127.0.0.1/Novel_web/public/view/register.php?error=Tài khoản đã tồn tại");
            } else {
                $sql = "INSERT INTO users ( email, username, password) VALUE('$phone','$username', '$pass1' )";
                $pdo->exec($sql);
                header("Location: http://127.0.0.1/Novel_web/public/view/login.php");
            }
        }
    }
}
