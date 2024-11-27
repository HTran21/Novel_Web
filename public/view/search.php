<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novel</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon/icons8-literature-50.png">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>

<body>

    <?php include '../../partials/header.php' ?>

    <div class="container mt-4" style="min-height: 70vh;">
        <?php
        include('/xampp/htdocs/Novel_web/partials/connect_db.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_POST['search'])) {
                $name = $_POST['search'];
                $sql = "SELECT * FROM truyen where ten_truyen like '%$name%'";

                $kq = $pdo->query($sql);

                if ($kq) {

        ?>
                    <h5>Kết quả tìm kiếm cho: <?php echo $name; ?></h5>

                    <body>

                        <div class="container mt-4">
                            <?php
                            include('/xampp/htdocs/Novel_web/partials/connect_db.php');

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (!empty($_POST['search'])) {
                                    $name = $_POST['search'];
                                    $sql = "SELECT * FROM truyen where ten_truyen like '%$name%'";

                                    $kq = $pdo->query($sql);

                                    if ($kq) {

                            ?>

                                        <div class="row">
                                            <div class="col-lg-8 ds_truyen m-3 d-flex justify-content-center ms-4">
                                                <div class="row w-100">
                                                    <?php


                                                    while ($row = $kq->fetch()) {
                                                        echo "<div class=\"col-lg-3 col-md-4 col-sm-6\"> 
                                    <div class=\"card mb-4\">
                                    <a href=\"read_novel.php?id_truyen={$row['id_truyen']}&username={$_SESSION['username']}\"><img src=\"{$row['img']}\" class=\"card-img-top img_poster w-100\"></a>
                                    <div class=\"card-body p-0\">
                                        <div class=\"title_poster\">
                                            {$row['ten_truyen']}
                                        </div>
                                    </div>
                                </div>
                            </div>";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            }

                            ?>
                        </div>
                    </body>

        <?php
                }
            }
        }

        ?>
    </div>
    <?php include '../../partials/footer.php'; ?>
</body>

</html>