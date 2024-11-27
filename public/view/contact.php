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
    <main style="min-height: 70vh;">
        <div class="contact">
            <div class="row">

                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 mt-2 p-4 m-auto">
                    <div class="title_login text-center">
                        <h2>LIÊN HỆ</h2>
                        <p class="p-2">Mọi thắc mắc hoặc góp ý vui lòng liên hệ với chúng tôi</p>
                    </div>

                    <div class="content_login">
                        <form method="POST" action="../../function/add_contacts.php">
                            <?php
                            include '../../partials/connect_db.php';
                            $query = "SELECT * FROM users WHERE id_user={$_SESSION['id_user']}";
                            $sth = $pdo->query($query);
                            $row = $sth->fetch();
                            ?>
                            <div class="input-group mb-3 ms-2 me-2">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $row['username']; ?>">
                            </div>
                            <div class="input-group mb-3 ms-2 me-2">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $row['email']; ?>">
                            </div>
                            <div class="form-floating ms-2">
                                <textarea class="form-control" placeholder="Leave a comment here" name="noi_dung" id="floatingTextarea2" style="height: 100px; width: 102%;"></textarea>
                                <label for="floatingTextarea2">Nội dung</label>
                            </div>
                            <input type="hidden" name="id_user" id="" value="<?php echo $_SESSION['id_user'] ?>">
                            <div class="btn_login mt-4 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2 m-auto">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid mt-3" alt="Sample image">
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