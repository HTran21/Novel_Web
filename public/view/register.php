<?php
require_once('../../function/adduser.php')
?>
<!doctype html>
<html lang="en">

<head>
    <title>Novel</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon/icons8-literature-50.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <style>
        .error {
            color: red;
            margin-left: 2.5%;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="/Novel_web//public/css/style.css">


</head>

<body>
    <?php require('/xampp/htdocs/Novel_web/partials/header.php'); ?>
    <main class="container mt-5 mb-5">

        <div class="login">
            <div class="img_logo">
                <img src="../img/logo/logo_1.png" alt="">
            </div>
            <div class="title_login text-center">
                <h2>ĐĂNG KÝ</h2>
            </div>
            <div class="des text-center">Đăng ký để trải nghiệm dịch vụ
            </div>
            <!-- lỗi -->
            <?php if (isset($_GET['error'])) { ?>
                <p class="error" style="background: #F2DEDE;"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="content_login">
                <form method="POST" action="">
                    <div class=" group" id="group1">
                        <i class="fa-solid fa-envelope d-flex align-items-center"></i>
                        <input type="text" name="phone" id="" autocomplete="off" placeholder=" ">
                        <label for="phone">
                            Email or phone....
                        </label>
                    </div>
                    <!-- hiện thị lỗi -->
                    <?php
                    if (!empty($errors['phone']['required'])) {
                        echo '<span class="error" style="color:red"><i>' . $errors['phone']['required'] . '</i></span>';
                    }
                    ?>

                    <div class=" group" id="group1">
                        <i class="fa-solid fa-user d-flex align-items-center"></i>
                        <input type="text" name="username" id="" autocomplete="off" placeholder=" ">
                        <label for="username">
                            Username...
                        </label>

                    </div>

                    <!-- hiện thị lỗi -->
                    <?php
                    echo (!empty($errors['username']['required'])) ? '<span
                        style="color:red;" class="error"><i>' . $errors['username']['required'] . '</i></span>' : false;
                    ?>
                    <div class="group" id="group2">
                        <i class="fa-solid fa-lock d-flex align-items-center"></i>
                        <input type="password" name="password1" id="password" autocomplete="off" placeholder=" ">
                        <label for="password">
                            Password...
                        </label>
                        <i class="fa-solid fa-eye m-auto" onclick="changeTypePass()"></i>
                        <i class="fa-solid fa-eye-slash m-auto" onclick="changeTypePass()"></i>

                    </div>
                    <!-- hiện thị lỗi -->
                    <?php
                    if (!empty($errors['password1']['required'])) {
                        echo '<span style="color:red" class="error"><i>' . $errors['password1']['required'] . '</i></span>';
                    }
                    ?>


                    <div class="group" id="group3">
                        <i class="fa-solid fa-lock d-flex align-items-center"></i>
                        <input type="password" name="password2" id="password2" autocomplete="off" placeholder=" ">
                        <label for="password2">
                            Confirm Password...
                        </label>
                        <i class="fa-solid fa-eye m-auto" onclick="changeTypePass2()"></i>
                        <i class="fa-solid fa-eye-slash m-auto" onclick="changeTypePass2()"></i>

                    </div>
                    <!-- hiện thị lỗi -->

                    <?php
                    if (!empty($errors['password2']['required'])) {
                        echo '<span style="color:red" class="error"><i>' . $errors['password2']['required'] . '</i></span>';
                    }

                    if (!empty($errors['password2']['overlap'])) {
                        echo '<span style="color:red" class="error"><i>' . $errors['password2']['overlap'] . '</i></span>';
                    }
                    ?>

                    <div class="btn_login mt-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </div>
                </form>
            </div>
            <div class="chuyen_huong mt-4">
                Bạn đã có tài khoản? <a href="./login.php" class="text-chuyen-huong">Đăng nhập</a>
            </div>
        </div>

    </main>
    <?php require('/xampp/htdocs/Novel_web/partials/footer.php'); ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script>
        function changeTypePass() {
            let password = document.getElementById('password');
            password.type = password.type == 'text' ? 'password' : 'text';
        }

        function changeTypePass2() {
            let password2 = document.getElementById('password2');
            password2.type = password2.type == 'text' ? 'password' : 'text';
        }
    </script>
</body>

</html>