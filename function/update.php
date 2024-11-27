<?php
include '../partials/connect_db.php';
if (!empty($_POST['ten_truyen']) && !empty($_POST['tac_gia']) && !empty($_POST['the_loai']) && !empty($_POST['img']) && !empty($_POST['noi_dung'])) {
    $query = "UPDATE truyen SET ten_truyen=?, tac_gia=?, the_loai=?, img=?, noi_dung=? WHERE id_truyen=?";

    try {
        $sth = $pdo->prepare($query);
        $sth->execute([
            $_POST['ten_truyen'],
            $_POST['tac_gia'],
            $_POST['the_loai'],
            $_POST['img'],
            $_POST['noi_dung'],
            $_POST['id_truyen']
        ]);
        header("Location: http://localhost/Novel_web/public/view/admin.php");
    } catch (PDOException $e) {
        echo 'Khong them';
    }
} else {
    include '../partials/show_error.php';
}
