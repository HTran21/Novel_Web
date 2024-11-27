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
    <div class="container" style="min-height: 70vh;<?php if (!isset($_SESSION['username'])) {
                                                        echo 'pointer-events: none;';
                                                    } ?>">
        <div class="truyen_hay" style="margin: auto;">
            <div class="row ">

                <div class="ds_truyen m-3 d-flex justify-content-center ms-4">
                    <div class="row w-100">
                        <h5 class="mt-4 mb-4" #carouselExampleControls>Kết quả tìm kiếm thể loại: <?php echo $_GET['the_loai']; ?></h5>

                        <?php
                        require('/xampp/htdocs/Novel_web/partials/connect_db.php');
                        $get_the_loai = $_GET['the_loai'];

                        if (!empty($_GET['the_loai'])) {
                            $sql = "SELECT * FROM truyen WHERE the_loai = '$get_the_loai'";
                            $kq = $pdo->query($sql);
                            while ($row = $kq->fetch()) {
                                echo "<div class=\"col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center\"> 
                    <div class=\"card mb-4\">
                    <a href=\"read_novel.php?id_truyen={$row['id_truyen']}\"><img src=\"{$row['img']}\" class=\"card-img-top img_poster w-100\"></a>
                       <div class=\"card-body p-0\">
                           <div class=\"title_poster\">
                               {$row['ten_truyen']}
                           </div>
                       </div>
                   </div>
               </div>";
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <?php include '../../partials/footer.php' ?>
</body>

</html>