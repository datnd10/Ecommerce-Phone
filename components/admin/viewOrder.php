<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
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
    <link rel="stylesheet" href="../../assets/css/datatable.css">
    <style>
        #togglePassword {
            float: right;
            margin-left: -20px;
            margin-top: -30px;
            position: relative;
            z-index: 2;
        }

        a {
            text-decoration: none;
        }

        @font-face {
            font-family: pop;
            src: url(./Fonts/Poppins-Medium.ttf);
        }

        .main {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: pop;
            flex-direction: column;
        }

        .head {
            text-align: center;
        }

        .head_1 {
            font-size: 30px;
            font-weight: 600;
            color: #333;
        }

        .head_1 span {
            color: #ff4732;
        }

        .head_2 {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-top: 3px;
        }

        .head {
            display: flex;
        }

        .head li {
            list-style: none;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        ul li .icon {
            font-size: 35px;
            /* color: rgb(45, 194, 88); */
            color: rgb(224, 224, 224);
            margin: 0 60px;
        }

        ul li .text {
            font-size: 14px;
            font-weight: 600;
            /* color: rgb(45, 194, 88); */
            color: rgb(224, 224, 224);
        }

        /* linebar Div Css  */

        ul li .linebar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: rgb(224, 224, 224);
            ;
            margin: 14px 0;
            display: grid;
            place-items: center;
            color: #fff;
            position: relative;
            cursor: pointer;
        }

        .linebar::after {
            content: " ";
            position: absolute;
            width: 125px;
            height: 5px;
            background-color: rgb(224, 224, 224);
            ;
            right: 30px;
        }

        .one::after {
            width: 0;
            height: 0;
        }

        ul li .linebar .uil {
            display: none;
        }

        ul li .linebar p {
            font-size: 13px;
        }

        /* Active Css  */

        ul li .active {
            background-color: rgb(45, 194, 88);
            display: grid;
            place-items: center;
        }

        li .active::after {
            background-color: rgb(45, 194, 88);
        }

        ul li .active p {
            display: none;
        }

        ul li .active .uil {
            font-size: 20px;
            display: flex;
        }

        /* Responsive Css  */

        @media (max-width: 980px) {
            ul {
                flex-direction: column;
            }

            ul li {
                flex-direction: row;
            }

            ul li .linebar {
                margin: 0 30px;
            }

            .linebar::after {
                width: 5px;
                height: 55px;
                bottom: 30px;
                left: 50%;
                transform: translateX(-50%);
                z-index: -1;
            }

            .one::after {
                height: 0;
            }

            ul li .icon {
                margin: 15px 0;
            }
        }

        @media (max-width:600px) {
            .head .head_1 {
                font-size: 24px;
            }

            .head .head_2 {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <?php include '../../partials/navbarAdmin.php' ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?php include '../../partials/sideBar.php' ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h2 class="page-title h2"> Quản Lý Đơn Hàng</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashBoard.php">Thống Kê</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản Lý Đơn Hàng</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="sherah-dsinner">
                            <div class="sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                                <div class="sherah-table__head sherah-table__main">
                                    <h4 class="sherah-order-title orderId"></h4>
                                    <div class="sherah-order-right">
                                        <p class="sherah-order-text time"></p>
                                        <div class="sherah-table-status">
                                            <div class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">Paid</div>
                                            <div class="sherah-table__status sherah-color3 sherah-color3__bg--opactity">Partially Fulfilled</div>
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
                                                        <span class="address"> Truong Cap 2 Mo Lao, Phuong Mo Lao, Quan Ha Dong, Thanh pho Ha Noi</span>
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
                                                    <li class="step step-5">
                                                        <i class="icon uil mdi mdi-star"></i>
                                                        <div class="linebar five">
                                                            <i class="mdi mdi-check"></i>
                                                        </div>
                                                        <p class="text">Đánh Giá</p>
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/simple-datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const orderId = urlParams.get('id');
        const steps = $('.step');
        function activateStep(stepIndex) {
            steps.each(function(index) {
                const currentStep = $(`.step-${index + 1}`);
                if (currentStep.length) {
                    const isCurrent = index <= stepIndex;
                    currentStep.find('.icon').css('color', isCurrent ? 'rgb(45, 194, 88)' : '');
                    currentStep.find('.text').css('color', isCurrent ? 'rgb(45, 194, 88)' : '');
                }

            });
            const linebars = $('.linebar');
            linebars.each(function(index) {
                $(this).toggleClass('active', index <= stepIndex);
            });
        }

        const showOrderDetail = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/orderController.php',
                type: 'GET',
                data: {
                    action: "getOrderDetail",
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
                        data.detail.forEach(function(item) {
                            console.log(item);
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
                                                <p class="sherah-table__product-desc">$ ${item.price}</p>
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-1 sherah-table__data-4">
                                            <div class="sherah-table__product-content">
                                                <p class="sherah-table__product-desc"> ${item.quantity}</p>
                                            </div>
                                        </td>
                                        <td class="sherah-table__column-1 sherah-table__data-5">
                                            <div class="sherah-table__product-content">
                                                <p class="sherah-table__product-desc">$ ${item.quantity * item.price}</p>
                                            </div>
                                        </td>
                                    </tr>`
                            totalPrice += +item.quantity * +item.price;
                            $('.bodyTable').append(html);
                        })
                        $('.totalPrice').html('$' + totalPrice);
                        $('.shipvalue').html('$' + data.information[0].shipping);
                        $('.totalPriceAndShip').html('$' + data.information[0].total_money);
                        $('.customerName').html(data.information[0].name);
                        $('.phone').html(data.information[0].phone);
                        $('.gmail').html(data.information[0].email);
                        $('.address').html(data.information[0].address);
                        $(".avatar").attr("src", `../../database/uploads/${data.information[0].avatar}`);
                        $('.orderId').html('Mã Đơn Hàng #' + orderId);
                        $('.time').html(data.information[0].created_at);
                        switch (data.information[0].status) {
                            case 'pending':
                                $(".head").removeClass("d-none");
                                $(".head-2").addClass("d-none")
                                activateStep(0);
                                break;
                            case 'approved':
                                $(".head").removeClass("d-none");
                                $(".head-2").addClass("d-none")
                                activateStep(1);
                                break;
                            case 'shipping':
                                $(".head").removeClass("d-none");
                                $(".head-2").addClass("d-none")
                                activateStep(2);
                                break;
                            case 'received':
                                $(".head").removeClass("d-none");
                                $(".head-2").addClass("d-none")
                                activateStep(3);
                                break;
                            case 'reviewed':
                                $(".head").removeClass("d-none");
                                $(".head-2").addClass("d-none")
                                activateStep(4);
                                break;
                            case 'canceled':
                                $(".head").addClass("d-none")
                                $(".head-2").removeClass("d-none")
                                break;
                            default:
                                status = 'Trạng thái không xác định';
                                break;
                        }
                    }
                }
            })
        }
        showOrderDetail();
    </script>
</body>

</html>