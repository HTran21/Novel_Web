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
    <main class="container mt-4 ">
        <div class="content row">
            <div class="tai_khoan col-lg-3 col-sm-12">
                <div class="img_user mt-3 d-flex justify-content-center" style="position: relative;">
                    <?php
                    include '../../partials/connect_db.php';
                    $query_user = "SELECT * FROM users WHERE id_user={$_SESSION['id_user']}";
                    $row_user = $pdo->query($query_user)->fetch();
                    if (!empty($row_user['avatar'])) {
                        echo '<img src="' . $row_user['avatar'] . '" alt="">';
                    } else {
                        echo '<img src="https://tieuhocdongphuongyen.edu.vn/wp-content/uploads/2023/02/1676245765_235_Hinh-anh-Avatar-Trang-Dep-Cho-FB-Zalo-BI-AN.jpg" alt="">';
                    }
                    ?>

                    <a href="./update_user.php?id_user=<?php echo $_SESSION['id_user'] ?>"><i class="fa-solid fa-pen-to-square fa-lg edit_img_user" style="color: #7286D3;"></i></a>
                </div>
                <div class=" content_user">
                    <div class="ten_user" style="font-size: 20px;"><?php echo $_SESSION['username'] ?></div>
                    <div class="luong_yeu_thich ms-5">Truyện đã đăng: <?php

                                                                        $query_count = 'SELECT * FROM truyen';
                                                                        $count_truyen = $pdo->query($query_count);
                                                                        echo $count_truyen->rowCount(); ?></div>
                </div>
            </div>
            <div class="yeu_thich col-lg-8">
                <h3 class="text-center">DANH SÁCH TIỂU THUYẾT ĐƯỢC YÊU THÍCH</h3>
                <div class="ds_yeuthich mt-3">
                    <div class="ds_truyen mt-2">
                        <ul class="list-group row">
                            <?php
                            $query = 'SELECT * FROM truyen';
                            $sth = $pdo->query($query);
                            while ($row = $sth->fetch()) {
                                echo '<li class="row danh_sach_truyen">
                                <img src="' . $row['img'] . '" class="col-4 img_dst">
                                <div class="col-8 noidung_dst">
                                    <a href="read_novel.php?id_truyen=' . $row['id_truyen'] . '" class="text-decoration-none"><span class="title_yeuthich">' . $row['ten_truyen'] . '<br></span></a>
                                    <span class="text_tacgia">' . $row['tac_gia'] . '<br></span>';
                                $query_fa = "SELECT * FROM favorites WHERE id_truyen={$row['id_truyen']} AND favorite='1'";
                                $count_fa = $pdo->query($query_fa)->rowCount();
                                echo '<span class="trang_thai text-black">Lượt yêu thích: ' . $count_fa . '</span></div>
                            </li>
                            ';
                            }

                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <?php
    include '../../partials/footer.php'
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</body>

</html>