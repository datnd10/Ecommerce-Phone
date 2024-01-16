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
        a {
            text-decoration: none;

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
    <div class="container" style="min-height: 64vh">
        <div class="row cart-body p-5 bg-white mt-3 border">
            <div class="col-md-12">
                <h3>Lịch Sử Mua Hàng</h3>
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

        const showAllOrders = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/orderController.php',
                type: 'GET',
                data: {
                    action: "getUserOrder",
                },
                success: (response) => {
                    let data = JSON.parse(response);
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
                                                    <a href="detailOrder.php?id=${item.order_id}">#${item.order_id}</a>
                                                </td>
                                                <td>
                                                    <span>${item.name}</span>
                                                </td>
                                                <td>
                                                <span>${item.created_at}</span>
                                                </td>
                                                <td>
                                                    <span>${formatVietnameseCurrency(item.total_money)}</span>
                                                </td>
                                                <td>
                                                    <span>${item.payment_status === 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán'}</span>
                                                </td>
                                                <td>
                                                    <span>${status}</span>
                                                </td>`

                            if (item.status != 'canceled') {
                                html += `<td>
                                                    <a onclick="handleDelete(${item.order_id})"><i class="mdi mdi-delete fs-5 text-danger"></i></a>
                                                
                                                    </td>  `
                            } else {
                                html += `<td></td>`;
                            }

                            html += `</tr>`
                            $('.bodyTable').append(html);
                        })
                        $('.dataTable').DataTable();
                    }
                }
            })
        }
        showAllOrders();
        const handleDelete = (id) => {
            Swal.fire({
                title: `Bạn chắc chắn hủy đơn hàng #${id}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Đóng!',
                confirmButtonText: 'Xóa!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'http://localhost:3000/components/sendMail.php',
                        type: 'GET',
                        data: {
                            action: "delete",
                            id: id
                        },
                        success: (response) => {
                            console.log(response);
                            switch (response) {
                                case 'success':
                                    Swal.fire({
                                        title: 'Hủy thành công',
                                        icon: 'success'
                                    })
                                    showAllOrders();
                                    break;
                                case 'failed':
                                    Swal.fire({
                                        title: 'Không thể hủy đơn khi đã nhận',
                                        icon: 'error'
                                    })
                                    break;
                                default:
                                    Swal.fire({
                                        title: 'Có gì đó sai sót',
                                        icon: 'error'
                                    })
                                    break;
                            }
                        }
                    })
                }
            })
        }
    </script>
</body>

</html>