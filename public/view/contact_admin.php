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
    <main class="container" style="min-height: 70vh;">
        <div class="table-responsive cart">
            <h2 class="text-center mt-4">LIÊN HỆ</h2>
            <table class=" table mt-4 shadow w-75 m-auto text-center">
                <thead class="bg-light">
                    <tr>
                        <th scope=" col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Trả lời</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-light bg-opacity-75">
                    <?php
                    include '../../partials/connect_db.php';
                    $query = "SELECT users.username, users.email, contacts.id_contact, contacts.noi_dung FROM users, contacts WHERE contacts.id_user = users.id_user";
                    $sth = $pdo->query($query);
                    $number = 1;
                    if ($sth && $sth->rowCount() >= 1) {
                        while ($row = $sth->fetch()) {
                            echo '<th scope="row">' . $number . '</th>
                            <td>';
                            echo '' . $row['username'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['noi_dung'] . '</td>
                            <td><a href="" onclick="reply()"><i class="fa-solid fa-reply"></i></a></td>
                            <td><a href="" data-bs-toggle="modal" data-id="' . $row['id_contact'] . '" data-bs-target="#delete_cart">
                            <i class="fa-solid fa-circle-check" style="color: #2b65ca;"></i></a></td>
                            </td>
                        </tr>';
                        }
                        $number++;
                    } else {
                        echo '<tr>
                                <td colspan="6" class="text-center">
                                    Không có liên hệ
                                </td>
                            </tr>';
                    }

                    ?>



                </tbody>
            </table>
        </div>

        <!-- {{!-- Confirm delete --}} -->
        <div id="delete_cart" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hoàn tất phản hồi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn chắc chắn đã phản hồi, khi bạn bấm nút hoàn tất thì phản hồi này sẽ bị xóa?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button id="btn-delete-cart" type="button" class="btn btn-success">Hoàn tất</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- {{!-- Delete hidden form --}} -->
        <form name="delete-form" method="POST"></form>
        <script>
            var delete_repair = document.getElementById('delete_cart')
            var id_contact
            var deleteForm = document.forms['delete-form'];
            var btnDeleteCart = document.getElementById('btn-delete-cart');
            delete_repair.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                var button = event.relatedTarget
                // Extract info from data-bs-* attributes
                id_contact = button.getAttribute('data-id')
            })
            btnDeleteCart.onclick = function() {
                deleteForm.action = 'http://localhost/Novel_web/function/delete_contact.php?id_contact=' + id_contact;
                deleteForm.submit();
            }

            function reply() {
                window.open("https://accounts.google.com/");
            }
        </script>

    </main>
    <?php include '../../partials/footer.php' ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>