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
    <link rel="stylesheet" href="../../assets/css/order.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
    <style>
        a {
            text-decoration: none;

        }

        .rating {
            display: flex;
            margin-top: -10px;
            flex-direction: row-reverse;
            margin-left: -4px;
            float: left;
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: 19px;
            font-size: 25px;
            color: #ffce3d;
            cursor: pointer;

        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }

        input[type="file"] {
            display: none;
        }

        .desc {
            display: block;
            position: relative;
            background-color: #025bee;
            color: #ffffff;
            font-size: 14px;
            text-align: center;
            width: 200px;
            margin-left: 10px;
            padding: 10px 0;
            border-radius: 5px;
            cursor: pointer;
        }

        .upload p {
            text-align: center;
            margin-top: 12px;
            margin-left: 20px;
        }

        #images,
        #imagesUpdate {
            width: 90%;
            position: relative;
            margin: auto;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }


        figcaption {
            text-align: center;
            font-size: 1.4vmin;
            margin-top: 0.5vmin;
        }

        select {
            /* for Chrome */
            -webkit-appearance: none;
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
    <div class="container">
        <div class="sherah-dsinner">
            <div class="sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                <div class="sherah-table__head sherah-table__main">
                    <h4 class="sherah-order-title orderId"></h4>
                    <div class="sherah-order-right">
                        <p class="sherah-order-text time"></p>
                        <div class="sherah-table-status">
                            <!-- <div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Paid</div>
                            <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Partially Fulfilled</div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 col-12 mg-top-30">
                    <!-- <div class="col-lg-4 col-md-4 col-12"> -->
                    <div class="sherah-contact-card sherah-default-bg sherah-border mg-top-30">
                        <h4 class="sherah-contact-card__title">Thông tin Liên Hệ</h4>
                        <div class="sherah-vcard__body">
                            <div class="sherah-vcard__img">
                                <img class="avatar" alt="#" style="height: auto; max-width: 100px;">
                            </div>
                            <div class="sherah-vcard__content">
                                <h4 class="sherah-vcard__title customerName">Samantha</h4>
                                <ul class="sherah-vcard__contact">
                                    <li>
                                        <i class="mdi mdi-cellphone"></i>
                                        <span class="phone">+91 564-258-4781</span>
                                    </li>
                                    <li>
                                        <i class="mdi mdi-map-marker"></i>
                                        <span class="address">Samantha (Skype)</span>
                                    </li>
                                    <li>
                                        <i class="mdi mdi-gmail"></i>
                                        <span class="gmail">+91 564-258-4781</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="main">
                                    <ul class="head">
                                        <li class="step step-1">
                                            <i class="icon uil mdi mdi-cellphone-iphone" style="color: rgb(45, 194, 88);"></i>
                                            <div class="linebar one active">
                                                <i class="mdi mdi-check"></i>
                                            </div>
                                            <p class="text" style="color: rgb(45, 194, 88);">Đang Duyệt</p>
                                        </li>
                                        <li class="step step-2">
                                            <i class="icon uil mdi mdi-file-document"></i>
                                            <div class="linebar two">
                                                <i class="mdi mdi-check"></i>
                                            </div>
                                            <p class="text">Xác Nhận</p>
                                        </li>
                                        <li class="step step-3">
                                            <i class="icon uil mdi mdi-truck-delivery"></i>
                                            <div class="linebar three">
                                                <i class="mdi mdi-check"></i>
                                            </div>
                                            <p class="text">Đang Ship</p>
                                        </li>
                                        <li class="step step-4">
                                            <i class="icon uil mdi mdi-check-circle"></i>
                                            <div class="linebar four">
                                                <i class="mdi mdi-check"></i>
                                            </div>
                                            <p class="text">Nhận Hàng</p>
                                        </li>
                                    </ul>

                                    <ul class="head-2 d-none">
                                        <h2 style="color: red;">Đã Hủy</h2>
                                    </ul>
                                </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-12 mg-top-30">
                        <div class="sherah-table-order mg-top-30">
                            <table id="sherah-table__orderv1" class="sherah-table__main sherah-table__main--orderv1 dataTable">
                                <thead class="sherah-table__head">
                                    <tr>
                                        <th class="sherah-table__column-1 sherah-table__h1">Sản Phẩm</th>
                                        <th class="sherah-table__column-2 sherah-table__h2">Tên Sản Phẩm</th>
                                        <th class="sherah-table__column-3 sherah-table__h3">Giá</th>
                                        <th class="sherah-table__column-4 sherah-table__h3">Số Lượng</th>
                                        <th class="sherah-table__column-5 sherah-table__h4">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody class="sherah-table__body bodyTable">

                                </tbody>
                            </table>
                            <hr>
                            <div class="order-totals">
                                <ul class="order-totals__list">
                                    <li><span>Tổng Hàng</span> <span class="order-totals__amount totalPrice">$25</span></li>
                                    <li class="order-totals__bottom"><span>Tiền Ship</span> <span class="order-totals__amount shipvalue">$35</span></li>
                                    <li class="order-totals__list--sub"><span>Tổng tiền</span> <span class="order-totals__amount totalPriceAndShip">$790</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Đánh Giá Đơn Hàng</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control" id="orderId" hidden>
                                <input type="text" class="form-control" id="status" hidden value='pending'>
                                <div class="main">
                                    <input type="number" class="form-control productId" id="productColorId" name="productColorId" hidden="">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-3">
                                            <img class="img-fluid image" src="" style="width: 150px;height: 150px; object-fit: cover;" />
                                        </div>

                                        <div class="col-sm-6 col-6 text-left">
                                            <div class="col-12"><span>Tên Sản Phẩm: </span><span class="productName"></span></div>
                                            <div class="col-12"><span>Màu: </span><span class="color"></span></div>
                                            <div class="col-12"><span>Giá: </span><span class="price"></span></div>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6 text-left mb-5">
                                        <label for="star" style="font-weight: bold; display: block">Star</label>
                                        <div class="rating">
                                            <input type="radio" name="rating" value="5" id="5" class="ratingStar"><label for="5">☆</label>
                                            <input type="radio" name="rating" value="4" id="4" class="ratingStar"><label for="4">☆</label>
                                            <input type="radio" name="rating" value="3" id="3" class="ratingStar"><label for="3">☆</label>
                                            <input type="radio" name="rating" value="2" id="2" class="ratingStar"><label for="2">☆</label>
                                            <input type="radio" name="rating" value="1" id="1" class="ratingStar"><label for="1">☆</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 text-left">
                                        <label for="description" style="font-weight: bold">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                                    </div>
                                    <div class="upload col-md-12">
                                        <div class="d-flex  align-items-center mb-4">
                                            <input type="file" id="file-input" accept="image/png, image/jpeg" onchange="preview()" multiple>
                                            <label for="file-input" class="desc">
                                                <i class="mdi mdi-upload"></i> &nbsp; Chọn Ảnh
                                            </label>
                                            <p id="num-of-files">No Files Chosen</p>
                                        </div>
                                        <div id="images"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary updateBtn">Lưu</button>
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
    <script src="../../assets/js/simple-datatables.js"></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const orderId = urlParams.get('id');
        const sessionValue = <?php echo json_encode($_SESSION['account']); ?>;
        const decodedSessionValue = JSON.parse(sessionValue)[0];

        const handelReview = (id) => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/reviewController.php',
                type: 'GET',
                data: {
                    action: "getProductById",
                    id: id
                },
                success: (response) => {
                    let data = JSON.parse(response)[0];
                    console.log(data.product_color_id);
                    $('#productColorId').val(data.product_color_id);
                    $('.productName').html(data.product_name);
                    $('.price').html('$' + data.price);
                    $('.color').html(data.color);
                    console.log(`../../database/uploads/${data.image}`);
                    $(".image").attr("src", `../../database/uploads/${data.image}`);
                }
            })
        }

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
        
        const showOrderDetail = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/orderController.php',
                type: 'GET',
                data: {
                    action: "userGetOrderDetail",
                    orderId: orderId,
                },
                success: (response) => {
                    console.log(response);
                    let data = JSON.parse(response);
                    console.log(data);
                    if (data == "No data found") {
                        data = "<h2 style=\"font-style: italic;\">Không có dữ liệu</h2>";
                        $('.dataTable').html(data);
                    } else {
                        $('.bodyTable').empty();
                        let totalPrice = 0;
                        if (data.information[0].status == 'received') {
                            const tableHeaderRow = document.querySelector('thead tr');
                            const newTh = document.createElement('th');
                            newTh.className = 'sherah-table__column-6 sherah-table__h5';
                            newTh.textContent = 'Đánh Giá';
                            tableHeaderRow.appendChild(newTh);
                        }
                        data.detail.forEach(function(item) {
                            let price = item.price;
                            let total = item.quantity * item.price;
                            let html = `<tr>
                                        <td class="sherah-table__column-1 sherah-table__data-1">
                                            <div class="sherah-table__product--thumb">
                                                <img src="../../database/uploads/${item.image}" style = "height: auto; max-width: 100%;">
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-1 sherah-table__data-2">
                                            
                                            <div class="sherah-table__product-name">
                                                <h4 class="sherah-table__product-name--title">${item.product_name}</h4>
                                                <p class="sherah-table__product-name--text">Màu: <span style="display: inline-block; width: 15px; height: 15px; background-color: ${item.color}; border-radius: 50%; vertical-align: middle;"></span></p>
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-1 sherah-table__data-3">
                                            <div class="sherah-table__product-content">
                                                <p class="sherah-table__product-desc">${formatVietnameseCurrency(price)}</p>
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-1 sherah-table__data-4">
                                            <div class="sherah-table__product-content">
                                                <p class="sherah-table__product-desc"> ${item.quantity}</p>
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-1 sherah-table__data-5">
                                            <div class="sherah-table__product-content">
                                                <p class="sherah-table__product-desc">${formatVietnameseCurrency(total)}</p>
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-1 sherah-table__data-6">
                                            <a onclick="handelReview(${item.product_color_id})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="mdi mdi-grease-pencil fs-5 text-success"></i></a>
                                        </td>`;
                            html += `</tr>`
                            totalPrice += +item.quantity * +item.price;
                            $('.bodyTable').append(html);
                        })
                        $('.totalPrice').html(formatVietnameseCurrency(totalPrice));
                        $('.shipvalue').html(formatVietnameseCurrency(data.information[0].shipping));
                        $('.totalPriceAndShip').html(formatVietnameseCurrency(data.information[0].total_money));
                        $('.customerName').html(data.information[0].name);
                        $('.phone').html(data.information[0].phone);
                        $('.gmail').html(decodedSessionValue.email);
                        $('.address').html(data.information[0].address);
                        $(".avatar").attr("src", `../../database/uploads/${decodedSessionValue.avatar}`);
                        $('.orderId').html('Mã Đơn Hàng #' + orderId);
                        $('.time').html(data.information[0].created_at);
                    }
                }
            })
        }
        showOrderDetail();

        function preview(fileInput, imageContainer, numOfFiles) {
            imageContainer.empty();
            numOfFiles.text(`${fileInput[0].files.length} Files Selected`);

            for (let file of fileInput[0].files) {
                let reader = new FileReader();
                let figure = $("<figure></figure>");
                let figCap = $("<figcaption></figcaption>");

                figCap.text(file.name);
                figure.append(figCap);

                reader.onload = () => {
                    let img = $("<img>");
                    img.attr("src", reader.result);
                    figure.prepend(img);
                }

                imageContainer.append(figure);
                reader.readAsDataURL(file);
            }
        }

        let fileInput = $("#file-input");
        let imageContainer = $("#images");
        let numOfFiles = $("#num-of-files");

        fileInput.on('change', () => {
            preview(fileInput, imageContainer, numOfFiles);
        });

        $('.updateBtn').on('click', () => {
            let listImages = $('#file-input')[0].files;
            const data = new FormData();
            data.append('id', $('#productColorId').val());
            data.append('description', $('#description').val());
            data.append('rate', $('.ratingStar:checked').val());
            for (let i = 0; i < listImages.length; i++) {
                console.log(listImages[i]);
                data.append('images[]', listImages[i]);
            }
            data.append('action', 'addReview');
            $.ajax({
                url: 'http://localhost:3000/database/controller/reviewController.php',
                type: 'POST',
                data: data,
                contentType: false,
                processData: false,
                success: (response) => {
                    console.log(response);
                    switch (response) {
                        case 'success':
                            Swal.fire({
                                icon: 'success',
                                title: 'Cập Nhật Thành Công',
                                confirmButtonText: 'OK',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    showOrderDetail();
                                }
                            });
                            break;
                        default:
                            Swal.fire({
                                title: 'Có Gì Đó Sai Sót',
                                icon: 'error',
                                confirmButtonText: 'OK',
                            });
                            break;
                    }
                }
            });

        });
    </script>
</body>

</html>