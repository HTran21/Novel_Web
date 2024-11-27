<?php
include '../partials/connect_db.php';

$favorite;
if (isset($_POST['favorite'])) {
    if ($_POST['favorite'] == 'yes') {
        $favorite = 1;
    } else {
        $favorite = 0;
    }
} else $favorite = 0;

// echo $favorite;
// if (!isset($_POST['id_fa'])) {
//     echo $favorite;
// } else {
//     echo 'khong co';
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['id_truyen']) && !empty($_POST['id_user']) && !empty($_POST['favorite'])) {
        include '../partials/connect_db.php';
        if (isset($_POST['id_fa']) && !empty($_POST['id_fa'])) {
            $query_fa = 'UPDATE favorites SET id_truyen=?, id_user=?, favorite=? WHERE id_fa=?';
            try {
                $sth_fa = $pdo->prepare($query_fa);
                $sth_fa->execute([
                    $_POST['id_truyen'],
                    $_POST['id_user'],
                    $favorite,
                    $_POST['id_fa']
                ]);
                header("Location: " . $_SERVER['HTTP_REFERER'] . "");
                exit();
            } catch (PDOException $e) {
                echo 'Khong them';
            }
        } else {
            $query = 'INSERT INTO favorites (id_truyen, id_user, favorite) VALUES (?, ?, ?)';

            try {
                $sth = $pdo->prepare($query);
                $sth->execute([
                    $_POST['id_truyen'],
                    $_POST['id_user'],
                    $favorite
                ]);
                header("Location: " . $_SERVER['HTTP_REFERER'] . "");
                exit();
            } catch (PDOException $e) {
                echo 'Khong them';
            }
        }
    } else {
        echo 'Khong nhap';
    }
}
