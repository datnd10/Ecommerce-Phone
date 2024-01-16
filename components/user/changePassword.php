<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
    <style>
        body {
            background: #eee;
        }

        .ui-w-40 {
            width: 40px !important;
            height: auto;
        }

        .card {
            box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
        }

        .ui-product-color {
            display: inline-block;
            overflow: hidden;
            margin: .144em;
            width: .875rem;
            height: .875rem;
            border-radius: 10rem;
            -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
            vertical-align: middle;
        }

        .dropdown-toggle::after {
            content: none;
        }

        .dropdown-toggle {
            background-color: transparent;
        }
    </style>
</head>

<body>
    <?php include '../../partials/header.php' ?>
    <?php
    if ($data == 'null') {
        // Chuyển hướng đến trang cụ thể nếu $data là null
        header('Location: signIn.php');
        exit(); // Đảm bảo dừng việc thực thi mã sau lệnh header
    } 
    ?>
    <div class="mt-5" style="min-height: 58vh;">
        <div class="container my-5 clearfix">
            <!-- Shopping cart table -->
            <div class="card">
                <div class="card-body">
                    <div class="modal-body">
                        <div class="row g-3">
                            <input type="text" class="form-control" id="inputUserid" hidden>
                            <div class="col-md-12">
                                <label for="password" class="form-label">
                                    <span>Mật Khẩu Cũ:</span>
                                    <span id="wrongPassword" class="text-danger d-none">Mật khẩu không đúng</span>
                                </label>
                                <input type="password" class="form-control" id="password" placeholder="Mật Khẩu">
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form-label">
                                    <span>Mật Khẩu Mới:</span>
                                    <span id="wrongNewPassword" class="text-danger d-none">Mật khẩu ít nhất 6 kí tự bao gồm chữ và số</span>
                                </label>
                                <input type="password" class="form-control" id="newPassword" placeholder="Mật Khẩu">
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form-label">
                                    <span>Xác Nhận Mật Khẩu:</span>
                                    <span id="wrongConfirmPassword" class="text-danger d-none">Mật khẩu ít nhất 6 kí tự bao gồm chữ và số</span>
                                    <span id="ConfirmPassword" class="text-danger d-none">Xác nhận mật khẩu không đúng</span>
                                </label>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Mật Khẩu">
                            </div>
                            <div class="col-12 mt-4">
                                <button class="btn btn-primary submitBtn">Lưu Thay Đổi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../partials/footer.php' ?>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        $('.submitBtn').on('click', function(e) {
            e.preventDefault();
            function checkPassword(password) {
                const PASSWORD_REGEX = /^(?=.*[0-9])(?=.*[a-zA-Z]).{6,20}$/;
                return PASSWORD_REGEX.test(password);
            }
            if (!checkPassword($('#newPassword').val()) || !checkPassword($('#confirmPassword').val())) {
                $('#wrongNewPassword').toggleClass('d-none', checkPassword($('#newPassword').val()));
                $('#wrongConfirmPassword').toggleClass('d-none', checkPassword($('#confirmPassword').val()));
            } else {
                $('#wrongNewPassword').addClass('d-none');
                $('#wrongConfirmPassword').addClass('d-none');
                if ($('#newPassword').val() != $('#confirmPassword').val()) {
                    $('#ConfirmPassword').removeClass('d-none');
                } else {
                    $('#ConfirmPassword').addClass('d-none');
                    $.ajax({
                        type: "post",
                        url: "http://localhost:3000/database/controller/userController.php",
                        data: {
                            oldPassword: $('#password').val(),
                            newpassword: $('#newPassword').val(),
                            action: 'changePassword',
                        },
                        cache: false,
                        success: function(response) {
                            console.log(response);
                            switch (response) {
                                case 'success': {       
                                    Swal.fire({
                                        title: 'Cập Nhật thành công',
                                        icon: 'success'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.reload();
                                        }
                                    })
                                    
                                }
                                
                            }
                        }
                    });
                }
            }
        });
    </script>
</body>

</html>