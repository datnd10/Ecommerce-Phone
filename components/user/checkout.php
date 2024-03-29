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

    <div class="container">
        <div class="row cart-body p-5 bg-white mt-3">
            <form class="d-flex row w-100" id="checkOutForm">
                <div class="col-md-6">
                    <!-- SHIPPING METHOD -->
                    <div class="card">
                        <div class="card-header bg-light" style="font-size: 22px; color: chocolate; font-weight: bold">Thông Tin Người Mua</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="Name" class="form-label" style="font-weight: bold">Tên Người Nhận:</label>
                                <input type="text" class="form-control fullName" id="Name" placeholder="Full name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="Phone" class="form-label" style="font-weight: bold">
                                    <span>Điện Thoại:</span>
                                    <span id="wrongPhone" class="text-danger d-none">Điện Thoại phải có 10 chữ số</span>
                                </label>
                                <input type="text" class="form-control phone" id="Phone" placeholder="Phone" name="phone" required>
                            </div>

                            <div class="mb-3">
                                <label for="Address" class="form-label d-flex justify-content-between" style="font-weight: bold">
                                    <span>Địa chỉ</span>
                                    <span data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-info">
                                        Chỉnh sửa
                                    </span>
                                </label>
                                <input type="text" required class="form-control" id="Address" placeholder="Specific Address" name="address" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="shipping" class="form-label" style="font-weight: bold">Vận Chuyện</label>
                                <select id="shipping" class="form-select" name="shipping">
                                    <option value="1" class="20000">Chuyển phát thường (Nhận Hàng Sau 1 Tuần)</option>
                                    <option value="2" class="25000">Chuyển phát nhanh (Nhận Hàng Trong Khoảng 4 đến 6 ngày)</option>
                                    <option value="3" class="30000">Chuyển phát hỏa tốc (Nhận Hàng Trong Khoảng 1 đến 3 ngày)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Message" class="form-label" style="font-weight: bold">Lời Nhắn:</label>
                                <input type="text" class="form-control" id="Message" placeholder="Message" value="" name="message">
                            </div>
                            <div class="mb-3">
                                <label for="payment" class="form-label" style="font-weight: bold">Phương Thức Thanh Toán:</label>
                                <select id="payment" class="form-select" name="payment">
                                    <option value="cod">Thanh Toán Nhận Hàng</option>
                                    <option value="banking">Thanh Qua Ngân Hàng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->


                <!-- Modal -->
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
                                    <select class="form-select" id="city" aria-label=".form-select-sm" required name="city">
                                        <option value="" selected>Chọn Thành Phố</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="district" class="form-label" style="font-weight: bold">Huyện:</label>
                                    <select class="form-select" id="district" aria-label=".form-select-sm" required name="district">
                                        <option value="" selected>Chọn Quận Huyện</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ward" class="form-label" style="font-weight: bold">Phường:</label>
                                    <select class="form-select" id="ward" aria-label=".form-select-sm" required name="ward">
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
                <div class="col-md-6">
                    <!-- REVIEW ORDER -->
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div style="font-size: 22px;color: chocolate;font-weight: bold">Giỏ Hàng</div>
                            <a href=" cart.php" style="font-size: 14px;text-align: center;text-decoration: none;color: green;font-weight: bold">Sửa Giỏ Hàng</a>
                        </div>
                        <div class="card-body">
                            <div class="form-group listItem">

                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <strong>Tiền Hàng</strong>
                                    <span class="float-end" style="font-weight: bold"><span class="totalPrice"></span></span>
                                    <input type="text" id="totalBuyPrice" value="" hidden="">
                                </div>
                                <div class="col-12">
                                    <strong>Tiền Ship</strong>
                                    <span class="float-end" style="font-weight: bold"><span class="shipvalue"></span></span>
                                </div>
                                <div class="col-12">
                                    <strong>Tổng Tiền</strong>
                                    <span class="float-end" style="font-weight: bold"><span class="totalPriceAndShip"></span></span>
                                    <input type="text" id="totalOrder" value="" hidden="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" style="background-color: #ee4d2d; color: white; padding: 13px 26px" class="btn float-end submitBtn">Thanh Toán</button>
                </div>
            </form>
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
        // Assuming sessionValue is a JSON string
        const sessionValue = <?php echo json_encode($_SESSION['account']); ?>;
        const decodedSessionValue = JSON.parse(sessionValue)[0];
        const totalPrice = $('.totalPrice');
        const totalInput = $('input[name="total"]');
        const shipping = $('#shipping');
        const totalOrder = $('#totalOrder');
        const totalBuyPrice = $('#totalBuyPrice');
        const totalPriceAndShip = $('.totalPriceAndShip');

        let totalCart = 0;

        function formatVietnameseCurrency(amount) {
            try {
                // Đảm bảo amount là một số
                amount = parseFloat(amount);

                // Sử dụng hàm toLocaleString để định dạng số và thêm dấu phẩy
                formattedAmount = amount.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });

                return formattedAmount;
            } catch (error) {
                return "Số tiền không hợp lệ";
            }
        }

        function updateShippingDetails() {
            const selectedOption = shipping.find('option:selected');
            const selectedOptionClassName = selectedOption.prop('class');
            $('.shipvalue').html(formatVietnameseCurrency(selectedOptionClassName));
            totalPriceAndShip.empty().append(formatVietnameseCurrency(totalCart + (+selectedOptionClassName)));
            totalInput.val(totalCart + (+selectedOptionClassName));
            totalOrder.val(totalCart + (+selectedOptionClassName));
        };



        function init() {
            return new Promise((resolve, reject) => {
                $('#Name').val(decodedSessionValue.fullname);
                $('#Phone').val(decodedSessionValue.phone);
                $('#Address').val(decodedSessionValue.address);
                $.ajax({
                    url: 'http://localhost:3000/database/controller/cartController.php',
                    type: 'GET',
                    data: {
                        action: 'viewcart',
                    },
                    success: (response) => {
                        let total = 0;
                        let data = JSON.parse(response);
                        data.forEach(function(item, currentIndex) {
                            let html = `<div class="d-flex justify-content-between">
                                        <div class="col-sm-3 col-3">
                                        <img class="img-fluid" src="../../database/uploads/${item.dataProductImage[0].image}" />
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <div class="col-12" style="font-weight: bold;font-size: 18px">${item.dataProduct[0].product_name}</div>
                                        <div class="col-12"><small style="font-weight: bold ;font-style: italic;font-size: 14px">Số Lượng: <span style="font-weight: lighter ;font-style: normal">${item.quantity}</span></small></div>
                                        <div class="col-12"><small style="font-weight: bold ;font-style: italic;font-size: 14px">Màu: 
                                            <span style="font-weight: lighter ;font-style: normal">${item.dataProductColor[0].color}</span>
                                        </small>
                                        </div>
                                        <div class="col-12"><small style="font-weight: bold ;font-style: italic;font-size: 14px">Giá: <span style="font-weight: lighter ;font-style: normal">${formatVietnameseCurrency(item.dataProductColor[0].price)}</span></small></div>
                                    </div>
                                    <div class="col-sm-3 col-3 text-end">
                                        <h6><span class="price">${formatVietnameseCurrency(item.dataProductColor[0].price * item.quantity)}</span></h6>
                                    </div></div><hr />`;
                            total = item.dataProductColor[0].price * item.quantity;
                            totalCart += total;
                            $('.listItem').append(html);
                        })
                        totalBuyPrice.val(total)
                        totalPrice.append(formatVietnameseCurrency(total));
                        updateShippingDetails();
                        resolve();
                    }
                })
            });
        }

        shipping.change(updateShippingDetails);

        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                var opt = document.createElement('option');
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
                        var opt = document.createElement('option');
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
                        var opt = document.createElement('option');
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
            $('#Address').val(newAddress);
        });
        let checkBanking = true;
        $('.submitBtn').on('click', function() {
            function isEmpty(value) {
                return value.trim() === '';
            }


            const fields = ['Name', 'Phone'];

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
                function checkPhone(phone) {
                    const PHONE_REGEX = /^\d{10}$/;
                    return PHONE_REGEX.test(phone);
                }
                $('#wrongPhone').toggleClass('d-none', checkPhone($('#Phone').val()));

                if (checkPhone($('#Phone').val())) {
                    var data = {
                        id: decodedSessionValue.user_id,
                        name: $('#Name').val(),
                        phone: $('#Phone').val(),
                        address: $('#Address').val(),
                        shipping: $('#shipping').find(':selected').attr('class'),
                        message: $('#Message').val(),
                        totalOrder: $('#totalOrder').val(),
                        payment: $('#payment').find(':selected').val(),
                        action: 'checkout'
                    }
                    if ($('#payment').find(':selected').val() == 'banking') {
                        $.ajax({
                            url: 'http://localhost:3000/database/controller/vnpay.php',
                            type: 'POST',
                            data: data,
                            success: (response) => {
                                console.log(response);
                                switch (response) {
                                    case "failed":
                                        Swal.fire({
                                            icon: 'error',
                                            title: "Một trong số sản phẩm của bạn không đủ số lượng",
                                        })
                                        break;
                                    default:
                                        let result = JSON.parse(response);
                                        url = result.data;
                                        Swal.fire({
                                            icon: 'success',
                                            title: "Mời Bạn Thanh Toán",
                                        }).then((result) => {
                                            window.location.href = url;
                                        })
                                        break;
                                }
                            }
                        })
                    } else {
                        data.payment_status = 'not paid';
                        $.ajax({
                            url: 'http://localhost:3000/components/sendMail.php',
                            type: 'POST',
                            data: data,
                            success: (response) => {
                                console.log(response);
                                switch (response) {
                                    case "success":
                                        Swal.fire({
                                            icon: 'success',
                                            title: "Đặt Hàng Thành Công",
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = 'home.php';
                                            }
                                        })
                                        break;
                                    default:
                                        Swal.fire({
                                            title: 'Một trong số sản phẩm của bạn không đủ số lượng',
                                            icon: 'error',
                                            confirmButtonText: 'OK',
                                        })
                                        break;
                                }
                            }
                        })
                    }

                }
            }
        })
        init().then(() => {
            var urlParams = new URLSearchParams(window.location.search);
            var id = urlParams.get('vnp_TransactionStatus');
            if (id == '00' && id != null) {
                var total = urlParams.get('vnp_Amount');
                var data = {
                    id: decodedSessionValue.user_id,
                    name: $('#Name').val(),
                    phone: $('#Phone').val(),
                    address: $('#Address').val(),
                    shipping: (+total / 100) - totalBuyPrice.val(),
                    message: $('#Message').val(),
                    totalOrder: +total / 100,
                    payment: "banking",
                    payment_status: 'paid',
                    action: 'checkout'
                }
                console.log(data);
                $.ajax({
                    url: 'http://localhost:3000/components/sendMail.php',
                    type: 'POST',
                    data: data,
                    success: (response) => {
                        console.log(response);
                        switch (response) {
                            case "success":
                                Swal.fire({
                                    icon: 'success',
                                    title: "Đặt Hàng Thành Công",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = 'home.php';
                                    }
                                })
                                break;
                            default:
                                Swal.fire({
                                    title: 'Có gì đó sai sót',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                })
                                break;
                        }
                    }
                })
            }
            if (id != '00' && id != null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Thanh Toán Thất Bại',
                })
            }
        });
    </script>
</body>

</html>