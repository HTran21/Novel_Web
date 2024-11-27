<?php
include './partials/connect_db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['id_truyen']) && !empty($_POST['id_user']) && !empty($_POST['noi_dung_cm'])) {
        include '../partials/connect_db.php';
        $query = 'INSERT INTO comments (id_truyen, id_user, noi_dung_cm) VALUES (?, ?, ?)';

        try {
            $sth = $pdo->prepare($query);
            $sth->execute([
                $_POST['id_truyen'],
                $_POST['id_user'],
                $_POST['noi_dung_cm']
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
