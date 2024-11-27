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
    <main class="container mt-5 mb-5" style="min-height: 70vh;">

        <div class="update_user">
            <div class="img_logo">
                <img src="" alt="">
            </div>
            <div class="title_login text-center">
                <h3>THAY ĐỔI THÔNG TIN</h3>
            </div>
            <div class="des text-center p-2 ps-5 pe-5">Sau khi thay đổi thông tin tài khoản sẽ bị đăng xuất
            </div>
            <!-- lỗi -->

            <div class="content_update">
                <form method="POST" action="../../function/update_info.php">
                    <?php
                    include '../../partials/connect_db.php';
                    $query = "SELECT * FROM users WHERE id_user=?";
                    $sth = $pdo->prepare($query);
                    $sth->execute([
                        $_GET['id_user']
                    ]);
                    $row = $sth->fetch();
                    ?>
                    <div class="group">
                        <i class="fa-solid fa-user d-flex align-items-center"></i>
                        <input type="text" name="username" id="" autocomplete="off" placeholder=" " value="<?php echo $row['username'] ?>">
                        <label for="username">
                            Username....
                        </label>
                    </div>
                    <div class="group" id="group2">
                        <i class="fa-solid fa-lock d-flex align-items-center"></i>
                        <input type="password" name="password" id="password" placeholder=" " value="<?php echo $row['password'] ?>">
                        <label for="password">
                            Password...
                        </label>

                        <i class="fa-solid fa-eye m-auto" onclick="changeTypePass()"></i>
                        <i class="fa-solid fa-eye-slash m-auto" onclick="changeTypePass()"></i>
                    </div>
                    <div class=" group">
                        <i class="fa-solid fa-envelope d-flex align-items-center"></i>
                        <input type="text" name="email" id="" autocomplete="off" placeholder=" " value="<?php echo $row['email'] ?>">
                        <label for="email">
                            Email....
                        </label>
                    </div>
                    <div class=" group">
                        <i class="fa-solid fa-image d-flex align-items-center"></i>
                        <input type="text" name="avatar" id="" autocomplete="off" placeholder=" " value="<?php echo $row['avatar'] ?>">
                        <label for="avatar">
                            Avartar....
                        </label>
                    </div>
                    <input type="hidden" name="id_user" value="<?php echo $_GET['id_user']; ?>">
                    <div class="btn_update mt-4 d-flex justify-content-center">
                        <button type="submit" class="btn mb-4">Thay đổi</button>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <script>
        function changeTypePass() {
            let password = document.getElementById('password');
            password.type = password.type == 'text' ? 'password' : 'text';
        }
    </script>
    <?php include '../../partials/footer.php' ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>