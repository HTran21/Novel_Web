<?php
include '../partials/connect_db.php';

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['avatar'])) {
    $query = "UPDATE users SET username=?, password=?, email=?, avatar=? WHERE id_user=?";

    try {
        $sth = $pdo->prepare($query);
        $sth->execute([
            $_POST['username'],
            $_POST['password'],
            $_POST['email'],
            $_POST['avatar'],
            $_POST['id_user']
        ]);

        session_start();
        if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
            unset($_SESSION["username"]);
            unset($_SESSION["password"]);
            unset($_SESSION["id_user"]);
        }

        header("Location: http://127.0.0.1/Novel_web/public/view/login.php");
    } catch (PDOException $e) {
        echo 'Khong them';
    }
} else {
    include '../partials/show_error.php';
}
