<?php
include '../partials/connect_db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['ten_truyen']) && !empty($_POST['tac_gia']) && !empty($_POST['the_loai']) && !empty($_POST['img']) && !empty($_POST['noi_dung'])) {
        include '../partials/connect_db.php';
        $query = 'INSERT INTO truyen (ten_truyen, tac_gia, the_loai, img, noi_dung) VALUES (?, ?, ?, ?, ?)';

        try {
            $sth = $pdo->prepare($query);
            $sth->execute([
                $_POST['ten_truyen'],
                $_POST['tac_gia'],
                $_POST['the_loai'],
                $_POST['img'],
                $_POST['noi_dung']
            ]);
            header("Location: http://localhost/Novel_web/public/view/admin.php");
            exit();
        } catch (PDOException $e) {
            echo 'Khong them';
        }
    } else {
        echo 'Khong nhap';
    }
}
