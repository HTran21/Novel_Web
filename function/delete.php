<?php
include '../partials/connect_db.php';

$id = $_GET['id_truyen'];

$sth = $pdo->prepare("DELETE FROM truyen WHERE id_truyen={$id}");
$sth->execute();
$count = $sth->rowCount();
if ($count > 0) {
    header("Location: http://localhost/Novel_web/public/view/admin.php");
} else {
    echo "Error in delete";
}
