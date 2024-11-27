<?php
include '../partials/connect_db.php';

$id = $_GET['id_contact'];
$sth = $pdo->prepare("DELETE FROM contacts WHERE id_contact=?");
$sth->execute([
    $id
]);
$count = $sth->rowCount();
if ($count > 0) {
    header("Location: http://127.0.0.1/NOVEL_WEB/public/view/contact_admin.php");
} else {
    echo "Error in delete";
}
