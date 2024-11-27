<?php
include '../partials/connect_db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['id_user']) && !empty($_POST['noi_dung'])) {
        include '../partials/connect_db.php';
        $query = 'INSERT INTO contacts (id_user, noi_dung) VALUES (?, ?)';

        try {
            $sth = $pdo->prepare($query);
            $sth->execute([
                $_POST['id_user'],
                $_POST['noi_dung']
            ]);
            header("Location: " . $_SERVER['HTTP_REFERER'] . "");
            exit();
        } catch (PDOException $e) {
            echo 'Khong them';
        }
    } else {
        echo 'Khong nhap';
    }
}
