<?php
require('../../partials/connect_db.php');

session_start();


?>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../img/logo/logo_1.png" class="logo" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse header-lienket" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 m-auto">
                    <li class="nav-item">
                        <a class="nav-link ps-3 pe-3 btn-lienket me-3 text-center" aria-current="page" href="http://127.0.0.1/Novel_web/public/view/home.php" id="home">
                            Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link ps-3 pe-3 btn-lienket me-3 text-center" id="the_loai" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-list-ul"></i> Thể loại
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            $the_loai = "SELECT DISTINCT the_loai FROM truyen";
                            $kq_the_loai = $pdo->query($the_loai);
                            while ($row = $kq_the_loai->fetch()) {
                                echo '<li><a name="the_loai" class="dropdown-item" href="http://127.0.0.1/NOVEL_WEB/public/view/the_loai.php?the_loai=' . $row['the_loai'] . '">' . $row['the_loai'] . '</a>
                                    <hr class="dropdown-divider">
                                </li>';
                            }

                            ?>



                        </ul>
                    </li>
                    <form action="" method="POST"></form>
                    <li class="nav-item">
                        <a class="nav-link ps-3 pe-3 btn-lienket me-3 text-center" id="favorite" aria-current="page" href="<?php
                                                                                                                            if (isset($_SESSION['username'])) {
                                                                                                                                if ($_SESSION['username'] == 'Admin') {
                                                                                                                                    echo 'http://127.0.0.1/Novel_web/public/view/admin_favorite.php';
                                                                                                                                } else {
                                                                                                                                    echo 'http://127.0.0.1/Novel_web/public/view/user.php';
                                                                                                                                }
                                                                                                                            }
                                                                                                                            ?>"><i class="fa-solid fa-heart"></i> Yêu thích</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ps-3 pe-3 btn-lienket me-3 text-center" id="contact" aria-current="page" href="<?php
                                                                                                                            if (isset($_SESSION['username'])) {
                                                                                                                                if ($_SESSION['username'] == 'Admin') {
                                                                                                                                    echo 'http://127.0.0.1/Novel_web/public/view/contact_admin.php';
                                                                                                                                } else {
                                                                                                                                    echo 'http://127.0.0.1/Novel_web/public/view/contact.php';
                                                                                                                                }
                                                                                                                            }
                                                                                                                            ?>"><i class="fa-solid fa-file-signature"></i> Contact</a>
                    </li>
                    <li class="row">
                        <form method="POST" action="../view/search.php" class="d-flex my-2 my-lg-0 search">
                            <input class="inp_search col-10" name="search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn_search col-2" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </li>

                </ul>
                <?php
                if (isset($_SESSION['username'])) {


                ?>
                    <li style="margin-right: 30px; list-style: none;" class="nav-item dropdown avata">
                    <?php
                    $name = $_SESSION['username'];
                    $sql = "SELECT avatar, id_user, username from users WHERE username = '$name'";
                    $kq = $pdo->query($sql)->fetch();
                }

                if (isset($_SESSION['username'])) {


                    ?>
                    <li style="margin-right: 30px; list-style: none;" class="nav-item dropdown avata">
                        <?php
                        $name = $_SESSION['username'];
                        $sql = "SELECT avatar, id_user, username from users WHERE username = '$name'";
                        $kq = $pdo->query($sql)->fetch();

                        //tồn tài avata
                        if (!empty($kq['avatar'])) {
                        ?>
                            <img style="width: 50px; height:50px; border-radius:50%;" src="<?php echo $kq['avatar']; ?>" alt="avata user">
                        <?php

                            //avata không tồn tại
                        } else {
                        ?>
                            <img style="width: 35px; height:35px; border-radius:50%;" src="https://tieuhocdongphuongyen.edu.vn/wp-content/uploads/2023/02/1676245765_235_Hinh-anh-Avatar-Trang-Dep-Cho-FB-Zalo-BI-AN.jpg" alt="none avata">
                        <?php
                        }
                        ?>
                        <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                        <div style="margin-right: 30px;" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php
                                                            if (isset($_SESSION['username'])) {
                                                                if ($_SESSION['username'] == 'Admin') {
                                                                    echo 'http://127.0.0.1/Novel_web/public/view/admin.php';
                                                                } else {
                                                                    echo 'http://127.0.0.1/Novel_web/public/view/user.php';
                                                                }
                                                            }
                                                            ?>"><?php echo $_SESSION['username'] ?></a>

                            <div class="dropdown-divider"></div>
                            <a href="../../function/logout.php" class="dropdown-item">Đăng xuất</a>
                        </div>
                    </li>

                <?php
                } else {
                    //
                ?>
                    <button class="btn-dangnhap btn-lienket"><a href="/Novel_web/public/view/login.php" class="dangnhap">Đăng nhập</a></button>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
    <script>
        var home_ac = document.getElementById('home');
        var theloai_ac = document.getElementById('the_loai');
        var favorite_ac = document.getElementById('favorite');
        var contact_ac = document.getElementById('contact');
        var url = window.location.href;

        function cutUrl(url, n) {
            return url.split('?').slice(0, n).join('?');
        }
        window.addEventListener("pageshow", action);

        function action() {
            if (window.location.href == 'http://127.0.0.1/Novel_web/public/view/home.php') {
                home.classList.add("action");
            } else if (cutUrl(window.location.href, 1) == 'http://127.0.0.1/NOVEL_WEB/public/view/the_loai.php') {
                theloai_ac.classList.add("action");
            } else if (window.location.href == 'http://127.0.0.1/Novel_web/public/view/user.php' || window.location.href == 'http://127.0.0.1/Novel_web/public/view/admin_favorite.php') {
                favorite_ac.classList.add("action");
            } else if (window.location.href == 'http://127.0.0.1/Novel_web/public/view/contact.php' || window.location.href == 'http://127.0.0.1/Novel_web/public/view/contact_admin.php') {
                contact_ac.classList.add("action");
            }
        }
    </script>
</header>