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
    <main class="container mt-3">

        <h1 class="text-center">Thêm truyện tiểu thuyết</h1>
        <form action="../../function/insert.php?id_truyen={$row['id_truyen']}" name="truyen" method="POST" class="w-50 m-auto mt-4">
            <div class="input-group mb-3 row">
                <span for="tentruyen" class="input-group-text col-3 d-flex justify-content-center">Tên truyện</span>
                <input type="text" class="form-control col-9" name="ten_truyen">
            </div>
            <div class="input-group mb-3 row">
                <span for="tacgia" class="input-group-text col-3 d-flex justify-content-center">Tác giả</span>
                <input type="text" class="form-control col-9" name="tac_gia">
            </div>
            <div class="input-group mb-3 row">
                <span for="theloai" class="input-group-text col-3 d-flex justify-content-center">Thể loại</span>
                <input type="text" class="form-control col-9" name="the_loai">
            </div>
            <div class="input-group mb-3 row">
                <span for="img" class="input-group-text col-3 d-flex justify-content-center">Hình Poster</span>
                <input type="text" class="form-control col-9" name="img">
            </div>
            <div class="input-group mb-3 row">
                <span for="noidung" class="input-group-text col-3 d-flex justify-content-center">Nội dung</span>
                <textarea class="form-control col-9" rows="10" name="noi_dung"></textarea>
            </div>
            <button class="btn btn-primary mb-5" type="submit">Thêm truyện</button>
        </form>


    </main>
    <?php include '../../partials/footer.php' ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>