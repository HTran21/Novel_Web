<!doctype html>
<html lang="en">

<head>
    <title>Novel</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon/icons8-literature-50.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">




    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>

<body>
    <?php include '../../partials/header.php' ?>
    <main class="container mt-3" <?php if (!isset($_SESSION['username'])) {
                                        echo 'style="pointer-events: none;"';
                                    } ?>>
        <div class="truyen_de_cu">
            <h5>Truyện đề cử </h5>
            <div id="carouselExampleControls" class="carousel carousel-dark slide mb-5 d-flex justify-content-center" data-bs-ride="carousel">
                <div class="carousel-inner ">
                    <div class="carousel-item active mt-3">
                        <div class="card-wrapper container-sm d-flex  justify-content-around">

                            <?php include '../../partials/connect_db.php';
                            $query1 = 'SELECT * FROM truyen LIMIT 3';
                            $sth1 = $pdo->query($query1);
                            $length = $sth1->rowCount();
                            while ($row1 = $sth1->fetch()) {
                                echo "<div class=\"card mb-4\"> <a href=\"read_novel.php?id_truyen={$row1['id_truyen']}\"><img src=\"{$row1['img']}\" class=\"card-img-top img_poster w-100\"></a>
                                <div class=\"card-body p-0\">
                                    <div class=\"title_poster\">{$row1['ten_truyen']}</div>
                                    </div>
                                </div>";
                            }



                            ?>


                        </div>
                    </div>
                    <div class="carousel-item active mt-3">
                        <div class="card-wrapper container-sm d-flex  justify-content-around">

                            <?php include '../../partials/connect_db.php';
                            $query2 = 'SELECT * FROM truyen ORDER BY create_at DESC LIMIT 3';
                            $sth2 = $pdo->query($query2);
                            $length = $sth2->rowCount();
                            while ($row2 = $sth2->fetch()) {
                                echo "<div class=\"card mb-4\"> <a href=\"read_novel.php?id_truyen={$row2['id_truyen']}\"><img src=\"{$row2['img']}\" class=\"card-img-top img_poster w-100\"></a>
                                <div class=\"card-body p-0\">
                                    <div class=\"title_poster\">{$row2['ten_truyen']}</div>
                                    </div>
                                </div>";
                            }



                            ?>


                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>
        <div class="truyen_hay">
            <h5>Truyện hay</h5>
            <div class="row">
                <div class="col-lg-8 ds_truyen m-3 d-flex justify-content-center ms-4">
                    <div class="row w-100">
                        <?php
                        $query = 'SELECT * FROM truyen';
                        $sth = $pdo->query($query);
                        while ($row = $sth->fetch()) {
                            echo "<div class=\"col-lg-3 col-md-4 col-sm-6\"> 
                            <div class=\"card mb-4\">
                            <a href=\"read_novel.php?id_truyen={$row['id_truyen']}\"><img src=\"{$row['img']}\" class=\"card-img-top img_poster w-100\"></a>
                               <div class=\"card-body p-0\" >
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
                <div class="col-lg-3 lich_su m-3 overflow-auto">
                    <div class="title_lich_su">
                        Top truyện hay
                    </div>
                    <div class="content_lich_su">
                        <ul class="ds_top_truyen">
                            <?php
                            $query = 'SELECT * FROM truyen LIMIT 10';
                            $sth = $pdo->query($query);
                            $number = 1;
                            while ($row = $sth->fetch()) {
                                echo '<li class="mt-3 border-bottom">
                                <div class="content_top_truyen mb-2">
                                    <div class="so_content_top_truyen">' . $number . '</div>
                                    <a href="read_novel.php?id_truyen=' . $row['id_truyen'] . '"><img src="' . $row['img'] . '" alt="" class="img_content_top_truyen"></a>
                            <div class="title_content_top_truyen">' . $row['ten_truyen'] . '</div>
                            </div>
                                </li>';
                                $number++;
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include '../../partials/footer.php' ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>