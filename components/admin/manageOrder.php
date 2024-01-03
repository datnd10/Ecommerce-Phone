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
                        <div class="col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table dataTable table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">Mã Đơn</th>
                                                <th scope="col">Tên Khách</th>
                                                <th scope="col">Ngày Đặt</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Thanh Toán</th>
                                                <th scope="col">Trạng Thái</th>
                                                <th scope="col">Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bodyTable">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Trạng Thái</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control" id="orderId" hidden>
                                <input type="text" class="form-control" id="status" hidden value='pending'>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary updateBtn">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
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
            switch (stepIndex) {
                case 0:
                    $('#status').val('pending');
                    break;
                case 1:
                    $('#status').val('approved');
                    break;
                case 2:
                    $('#status').val('shipping');
                    break;
                case 3:
                    $('#status').val('received');
                    break;
                case 4:
                    $('#status').val('reviewed');
                    break;
                default:
                    $('#status').val('Trạng thái không xác định');
            }
            const linebars = $('.linebar');
            linebars.each(function(index) {
                $(this).toggleClass('active', index <= stepIndex);
            });
        }

        steps.each(function(index) {
            $(this).on('click', function() {
                activateStep(index);
            });
        });


        const showAllOrder = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/orderController.php',
                type: 'GET',
                data: {
                    action: "getAllOrder",
                },
                success: (response) => {
                    let data = JSON.parse(response);
                    console.log(data);
                    if (data == "No data found") {
                        data = "<h2 style=\"font-style: italic;\">Không có dữ liệu</h2>";
                        $('.dataTable').html(data);
                    } else {
                        $('.bodyTable').empty();
                        data.forEach(function(item) {
                            let status = "";
                            switch (item.status) {
                                case 'pending':
                                    status = 'Đang duyệt';
                                    break;
                                case 'approved':
                                    status = 'Chấp thuận';
                                    break;
                                case 'shipping':
                                    status = 'Đang ship';
                                    break;
                                case 'received':
                                    status = 'Đã nhận';
                                    break;
                                case 'reviewed':
                                    status = 'Đánh giá';
                                    break;
                                case 'canceled':
                                    status = 'Đã Hủy';
                                    break;
                                default:
                                    status = 'Trạng thái không xác định';
                            }
                            let html = `<tr>
                                                <td>
                                                    <a href="viewOrder.php?id=${item.order_id}">#${item.order_id}</a>
                                                </td>
                                                <td>
                                                    <span>${item.name}</span>
                                                </td>
                                                <td>
                                                    <span>${item.created_at}</span>
                                                </td>
                                                <td>
                                                    <span>$ ${item.total_money}</span>
                                                </td>
                                                <td>
                                                    <span>paid</span>
                                                </td>
                                                <td>
                                                    <span>${status}</span>
                                                </td>
                                                <td>
                                                    <a onclick="handleUpdate(${item.order_id})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="mdi mdi-grease-pencil fs-5 text-success"></i></a>
                                                </td>
                                            </tr>`
                            $('.bodyTable').append(html);
                        })
                        $('.dataTable').DataTable();
                    }
                }
            })
        }
        showAllOrder();


        const handleUpdate = (id) => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/orderController.php',
                type: 'GET',
                data: {
                    action: "getStatus",
                    id: id
                },
                success: (response) => {
                    let data = JSON.parse(response)[0];
                    $('#orderId').val(id);
                    $('#status').val(data.status);
                    switch (data.status) {
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
            })
        }

        $('.updateBtn').on('click', function() {
            const data = {
                'id': $('#orderId').val(),
                'status': $('#status').val(),
                'action': 'updateStatus',
            }
            $.ajax({
                url: 'http://localhost:3000/database/controller/orderController.php',
                type: 'POST',
                data: data,
                success: (response) => {
                    switch (response) {
                        case "success":
                            Swal.fire({
                                icon: 'success',
                                title: "Cập nhật thành công",
                                confirmButtonText: 'Ok',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    showAllOrder();
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
        })
    </script>
</body>

</html>