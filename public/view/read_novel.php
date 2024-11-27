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
    <main class="container">
        <div class="back_home">
            <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" style="font-size: 16px; font-weight: 500;" class="text-decoration-none text-dark"><i class="fa-solid fa-arrow-left fa-xl"></i> </a>
        </div>
        <div class="content_truyen row m-auto">
            <?php
            include '../../partials/connect_db.php';
            $query = "SELECT * FROM truyen WHERE id_truyen={$_GET['id_truyen']}";
            $sth = $pdo->query($query);
            $row = $sth->fetch();


            // comment
            $comment = "SELECT comments.id_comment, comments.id_user, comments.id_truyen, comments.noi_dung_cm, users.username,users.avatar FROM (comments 
            INNER JOIN users ON comments.id_user = users.id_user) WHERE id_truyen={$_GET['id_truyen']}";
            $cm = $pdo->query($comment);

            echo '<div class="thong_tin_truyen col-lg-3 col-md-6 text-center">
            <img src="' . $row['img'] . '" alt="" style="width: 200px; margin-top: 10px">
            <div class="title_yeuthich mb-0 mt-2"><b>' . $row['ten_truyen'] . '</b></div>
            <div class="text_tacgia"><b>Tác giả: ' . $row['tac_gia'] . '</b></div>
            <div class="the_loai"><b>Thể loại: ' . $row['the_loai'] . '</b></div>
            <div class="mt-2">';

            ?>
            <form action="../../function/add_fa.php" method="POST">
                <?php
                $query_fa = "SELECT * FROM favorites WHERE id_user={$_SESSION['id_user']} AND id_truyen={$_GET['id_truyen']}";
                $sth_fa = $pdo->query($query_fa);
                if ($sth_fa && $sth_fa->rowCount() == 1) {
                    $row_fa = $sth_fa->fetch();
                    if ($row_fa['favorite'] == 1) {
                        echo '
                        <input type="hidden" name="id_truyen" value="' . $_GET['id_truyen'] . '">
                        <input type="hidden" name="id_user" value="' . $_SESSION['id_user'] . '">
                        <input type="checkbox" name="favorite" value="no" checked hidden>
                        <input type="hidden" name="id_fa" value="' . $row_fa['id_fa'] . '">
                        <button type="submit" class="btn_favorite_2"><i class="fa-solid fa-heart"></i> Yêu thích</button>';
                    } else {
                        echo '
                                <input type="hidden" name="id_truyen" value="' . $_GET['id_truyen'] . '">
                                <input type="hidden" name="id_user" value="' . $_SESSION['id_user'] . '">
                                <input type="checkbox" name="favorite" value="yes" checked hidden>
                                <input type="hidden" name="id_fa" value="' . $row_fa['id_fa'] . '">
                                <button type="submit" class="btn_favorite"><i class="fa-solid fa-heart"></i> Yêu thích</button>';
                    }
                } else {
                    echo '<input type="hidden" name="id_truyen" value="' . $_GET['id_truyen'] . '">
                    <input type="hidden" name="id_user" value="' . $_SESSION['id_user'] . '">
                    <input type="checkbox" name="favorite" value="yes" checked hidden>';
                    if (isset($row_fa['id_fa'])) {
                        echo '<input type="hidden" name="id_fa" value="' . $row_fa['id_fa'] . '">';
                    }
                    echo '
                    
                    <button type="submit" class="btn_favorite"><i class="fa-solid fa-heart"></i> Yêu thích</button>';
                }
                ?>

            </form>

            <?php

            echo '</div>
            <div class="comment mt-5">
            <h5 class="text-center">Bình luận</h5>
                <div class="content_cm w-100">
                ';

            while ($row2 = $cm->fetch()) {
                echo '<form action="../../function/delete_cm.php" method="POST">
                <div class="row mb-2 ms-2">
                        <img src="';
                if (!empty($row2['avatar'])) {
                    echo $row2['avatar'];
                } else {
                    echo 'https://tieuhocdongphuongyen.edu.vn/wp-content/uploads/2023/02/1676245765_235_Hinh-anh-Avatar-Trang-Dep-Cho-FB-Zalo-BI-AN.jpg';
                }
                echo '" alt="" class="col-4">
                        <div class="content_us_cm col-8">
                            <div class="user_name">' . $row2['username'] . '</div>
                            <div class="noidung_cm">' . $row2['noi_dung_cm'] . '</div>
                        </div>';
                if ($_SESSION['id_user'] == $row2['id_user']) {
                    echo '
                    
                    <input type="hidden" name="id_comment" value="' . $row2['id_comment'] . '">
                        <button type="submit" style="border: none; padding: 0;"><i class="fa-solid fa-trash"></i></button>
                    
                    
                            ';
                }
                echo '</div>
                </form>';
            }

            $name = $_SESSION['username'];
            $sql_id = "SELECT * FROM users WHERE username='$name'";
            $sth_id = $pdo->query($sql_id);
            $id_user = $sth_id->fetch();

            echo '
            </div>
                <div class="add_comment">
                <form action="../../function/insert_cm.php" method="POST">
                    <input type="hidden" name="id_user" value="' . $id_user['id_user'] . '">
                    <input type="hidden" name="id_truyen" value="' . $row['id_truyen'] . '">
                    <input type="text" name="noi_dung_cm" id="" style="border: none; border-radius: 5px; background-color: #fff; height: 33px; transform: translate(0,3px);" autocomplete="off">
                    <button class="btn" style="border-radius: 20px; border: none; background-image: linear-gradient(to bottom right, #46bec4, #a62ec1); color: #fff; padding: 5px 20px; ">Đăng</button>
            </form>
                </div>
            </div>
        </div>
        <div class="noi_dung_truyen col-lg-9 col-md-6">
            <div class="title_truyen text-center mt-3">
                <h3>' . $row['ten_truyen'] . '</h3>
                </div>
                <div class="text_truyen">
                    <p>' . $row['noi_dung'] . '</div>
                    </div>
                </div>';


            ?>



    </main>
    <?php include '../../partials/footer.php' ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>