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
    <div class="mt-5">
        <div class="container my-5 clearfix">
            <!-- Shopping cart table -->
            <div class="card">
                <div class="card-body">
                    <div class="modal-body">
                        <form class="row g-3">
                            <input type="text" class="form-control" id="inputUserid" hidden>
                            <div class="col-md-6">
                                <label for="email" class="form-label">
                                    <span>Email: </span>
                                    <span id="wrongEmail" class="text-danger d-none">Email không đúng form</span>
                                    <span id="existEmail" class="text-danger d-none">Email này đã tồn tại</span>
                                </label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="col-md-3">
                                <label for="username" class="form-label">
                                    <span>Tên Người Dùng: </span>
                                </label>
                                <input type="text" class="form-control" id="username" placeholder="Tên Người Dùng" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="fullname" class="form-label">
                                    <span>Tên đầy đủ:</span>
                                </label>
                                <input type="text" class="form-control" id="fullname" placeholder="Tên đầy đủ">
                            </div>
                            <div class="col-md-4">
                                <label for="phone" class="form-label">
                                    <span>Điện Thoại:</span>
                                    <span id="wrongPhone" class="text-danger d-none">Điện Thoại phải có 10 chữ số</span>
                                    <span id="existPhone" class="text-danger d-none">Điện Thoại đã tồn tại</span>
                                </label>
                                <input type="text" class="form-control" id="phone" placeholder="Số Điện Thoại">
                            </div>
                            <div class="col-md-8">
                                <label for="address" class="form-label d-flex justify-content-between">
                                    <span>Địa Chỉ:</span>
                                    <span data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-info">
                                        Chỉnh sửa
                                    </span>
                                </label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="avatar">Ảnh Đại Diện</label>
                                <input type="file" class="form-control-file mt-3" accept="image/*" onchange="loadFile(event)" id="avatar" name="avatar">
                                <img id="avatarDisplay" style="width: 200px;height: 200px;object-fit: cover; border-radius: 50%;margin-top: 10px; border: 1px solid #ccc;" />
                                <input type="text" class="form-control" id="image" name="image" hidden="">
                            </div>
                            <div class="col-12 mt-4">
                                <button class="btn btn-primary submitBtn">Lưu Thay Đổi</button>
                            </div>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Chỉnh Sửa Địa Chỉ</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="city" class="form-label" style="font-weight: bold">Thành Phố:</label>
                                                <select class="form-select" id="city" aria-label=".form-select-sm" required>
                                                    <option value="" selected>Chọn Thành Phố</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="district" class="form-label" style="font-weight: bold">Huyện:</label>
                                                <select class="form-select" id="district" aria-label=".form-select-sm" required>
                                                    <option value="" selected>Chọn Quận Huyện</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="ward" class="form-label" style="font-weight: bold">Phường:</label>
                                                <select class="form-select" id="ward" aria-label=".form-select-sm" required>
                                                    <option value="" selected>Chọn Phường</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="ward" class="form-label" style="font-weight: bold">Địa chỉ cụ thể:</label>
                                                <input type="text" required class="form-control" id="AddressChange" placeholder="VD: Số nhà 20, ngách 20" name="address">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <button type="button" class="btn btn-primary btnChangeAddress">Lưu Thay Đổi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        const loadFile = function(event) {
            $('#avatarDisplay')[0].src = URL.createObjectURL(event.target.files[0]);
            $('#avatarDisplay')[0].onload = function() {
                URL.revokeObjectURL($('#avatarDisplay')[0].src);
            };
            $('#image').val(event.target.files[0].name);
        };

        function init() {
            const sessionValue = <?php echo json_encode($_SESSION['account']); ?>;
            const decodedSessionValue = JSON.parse(sessionValue)[0];
            $('#inputUserid').val(decodedSessionValue.user_id);
            $('#email').val(decodedSessionValue.email);
            $('#username').val(decodedSessionValue.username);
            $('#fullname').val(decodedSessionValue.fullname);
            $('#phone').val(decodedSessionValue.phone);
            $('#address').val(decodedSessionValue.address);
            $("#avatarDisplay").attr("src", `../../database/uploads/${decodedSessionValue.avatar}`);
            imgDefault = decodedSessionValue.avatar;
        }
        init();


        let citis = document.getElementById("city");
        let districts = document.getElementById("district");
        let wards = document.getElementById("ward");
        let Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        let promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                let opt = document.createElement('option');
                opt.value = x.Name;
                opt.text = x.Name;
                opt.setAttribute('data-id', x.Id);
                citis.options.add(opt);
            }
            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.options[this.selectedIndex].dataset.id != "") {
                    const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

                    for (const k of result[0].Districts) {
                        let opt = document.createElement('option');
                        opt.value = k.Name;
                        opt.text = k.Name;
                        opt.setAttribute('data-id', k.Id);
                        district.options.add(opt);
                    }
                }
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
                if (this.options[this.selectedIndex].dataset.id != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex].dataset.id)[0].Wards;

                    for (const w of dataWards) {
                        let opt = document.createElement('option');
                        opt.value = w.Name;
                        opt.text = w.Name;
                        opt.setAttribute('data-id', w.Id);
                        wards.options.add(opt);
                    }
                }
            };
        }

        function normalizeText(text) {
            text = text.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            return text.replace(/Đ/g, "D").replace(/đ/g, "d");
        }


        $('.btnChangeAddress').on('click', function() {
            const selectedCity = citis.options[citis.selectedIndex].value;
            const selectedDistrict = districts.options[districts.selectedIndex].value;
            const selectedWard = wards.options[wards.selectedIndex].value;
            const addressChange = $('#AddressChange').val();
            const newAddress = `${normalizeText(addressChange)}, ${normalizeText(selectedWard)}, ${normalizeText(selectedDistrict)}, ${normalizeText(selectedCity)}`;
            Swal.fire({
                text: "Cập Nhật Địa Chỉ Thành Công",
                icon: 'success',
            })
            $('#address').val(newAddress);
        });

        $('.submitBtn').on('click', function(e) {
            e.preventDefault();
            const wrongEmail = $('#wrongEmail');
            const existEmail = $('#existEmail');
            const wrongPhone = $('#wrongPhone');
            const existPhone = $('#existPhone');

            function isEmpty(value) {
                return value.trim() === '';
            }

            const fields = ['email', 'username', 'fullname', 'phone', 'address'];

            fields.forEach(field => {
                const element = $(`#${field}`);
                if (isEmpty(element.val())) {
                    element.addClass('is-invalid');
                } else {
                    element.removeClass('is-invalid');
                }
            });

            if (fields.some(field => isEmpty($(`#${field}`).val()))) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Điền đầy đủ thông tin',
                });
            } else {
                function checkEmail(email) {
                    const EMAIL_REGEX = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    return EMAIL_REGEX.test(email);
                }

                function checkPhone(phone) {
                    const PHONE_REGEX = /^\d{10}$/;
                    return PHONE_REGEX.test(phone);
                }

                const checkEmailValid = checkEmail($('#email').val());
                const checkPhoneValid = checkPhone($('#phone').val());

                wrongEmail.toggleClass('d-none', checkEmail($('#email').val()));
                wrongPhone.toggleClass('d-none', checkPhone($('#phone').val()));

                if (checkEmailValid && checkPhoneValid) {
                    const data = new FormData();
                    data.append('id', $('#inputUserid').val());
                    data.append('email', $('#email').val());
                    data.append('phone', $('#phone').val());
                    data.append('username', $('#username').val());
                    data.append('fullname', $('#fullname').val());
                    data.append('address', $('#address').val());

                    let imageInput = $('.form-control-file');
                    if (imageInput.get(0).files.length > 0) {
                        data.append('avatar', imageInput.prop('files')[0]);
                    }
                    data.append('oldImage', imgDefault);
                    data.append('action', 'changeInformation');

                    $.ajax({
                        url: 'http://localhost:3000/database/controller/userController.php',
                        type: 'POST',
                        data: data,
                        contentType: false,
                        processData: false,
                        success: (response) => {
                            console.log(response);
                            switch (response) {
                                case "success":
                                    Swal.fire({
                                        icon: 'success',
                                        title: "Cập nhật thành công",
                                        confirmButtonText: 'Ok',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.reload();
                                        }
                                    })
                                    existEmail.addClass('d-none');
                                    existPhone.addClass('d-none');
                                    break;
                                default:
                                    if (response.includes("existemail")) {
                                        existEmail.removeClass('d-none');
                                    } else {
                                        existEmail.addClass('d-none');
                                    }
                                    if (response.includes("existphone")) {
                                        existPhone.removeClass('d-none');
                                    } else {
                                        existPhone.addClass('d-none');
                                    }
                                    Swal.fire({
                                        title: 'Có gì đó sai sót',
                                        icon: 'error',
                                        confirmButtonText: 'OK',
                                    })
                                    break;
                            }
                        }
                    });
                }
            }
        });
    </script>
</body>

</html>