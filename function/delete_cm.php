<?php
include '../partials/connect_db.php';

$id = $_POST['id_comment'];

$sth = $pdo->prepare("DELETE FROM comments WHERE id_comment=?");
$sth->execute([
    $id
]);
$count = $sth->rowCount();
if ($count > 0) {
    header("Location:  {$_SERVER['HTTP_REFERER']}");
} else {
    echo "Error in delete";
}
