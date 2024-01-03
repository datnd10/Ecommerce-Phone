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
                        <h2 class="page-title h2"> Quản Lý Sản Phẩm</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashBoard.php">Thống Kê</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản Lý Sản Phẩm</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-end mb-3">
                                        <button type="button" class="btn btn-primary addProduct" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="mdi mdi-plus-circle"></i>
                                        </button>
                                    </div>
                                    <table class="table dataTable table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Tên</th>
                                                <th>Nhãn Hàng</th>
                                                <th>Mô Tả</th>
                                                <th>Tổng Bán</th>
                                                <th>Đánh giá</th>
                                                <th>Trạng thái</th>
                                                <th>Ngày tạo</th>
                                                <th>Hành Động</th>
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
                                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Nhãn Hàng</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="removeInformations()"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3">
                                    <input type="text" class="form-control" id="productID" hidden>
                                    <div class="col-md-6">
                                        <label for="category" class="form-label">Tên Nhãn Hàng:</label>
                                        <select id="category" class="form-select form-select-lg">
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="productName" class="form-label">
                                            <span>Tên Sản Phẩm: </span>
                                            <span id="existProductName" class="text-danger d-none">Tên Sản Phẩm đã tồn tại</span>
                                        </label>
                                        <input type="text" class="form-control" id="productName" placeholder="Sản Phẩm">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="description">Mô tả</label>
                                        <textarea class="form-control" placeholder="Mô tả Sản Phẩm" id="description" style="height: 100px"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="removeInformations()">Close</button>
                                <button type="button" class="btn btn-primary btnSave">Save changes</button>
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
        let categoryArray = []; // Khai báo biến ở mức độ toàn cục hoặc trong phạm vi bên ngoài hàm

        const getAllCategories = (targetArray) => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/productController.php',
                type: 'GET',
                data: {
                    action: "getCategories",
                },
                success: (response) => {
                    const data = JSON.parse(response);

                    data.forEach((category) => {
                        let item = {
                            id: category.category_id,
                            name: category.category_name,
                        };

                        targetArray.push(item);
                    });

                    const optionsHtml = targetArray.map((category) => `<option value="${category.id}">${category.name}</option>`).join('');
                    $('#category').append(optionsHtml);
                    console.log(targetArray);
                }
            });
        };
        getAllCategories(categoryArray);

        const showAllProducts = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/productController.php',
                type: 'GET',
                data: {
                    action: "view",
                },
                success: (response) => {
                    let data = JSON.parse(response);
                    if (data == "No data found") {
                        data = "<h2 style=\"font-style: italic;\">Không có dữ liệu</h2>";
                        $('.dataTable').html(data);
                    } else {
                        $('.bodyTable').empty();
                        data.forEach(function(item) {
                            console.log(item.rate);
                            const filledStars = Array.from({length: item.rate}, () => '<i class="mdi mdi-star-outline" style="color: #FA8232"></i>');
                            const emptyStars = Array.from({length: 5 - item.rate}, () => '<i class="mdi mdi-star-outline"></i>');
                            const starsHtml = filledStars.concat(emptyStars).join('');
                            const category = categoryArray.find(category => category.id === item.category_id);
                            let html = `<tr>
                                                <td>
                                                    <span>${item.product_name}<span>
                                                </td>
                                                <td>
                                                    <span>${category ? category.name : ''}</span>
                                                </td>
                                                <td>
                                                    <span class="d-inline-block text-truncate" style="max-width: 400px">${item.description}</span>
                                                </td>
                                                <td>
                                                    <span>2</span>
                                                </td>
                                                <td>
                                                    <span>${starsHtml}</span>
                                                </td>
                                                <td>
                                                    <span>${item.is_active}</span>
                                                </td>
                                                <td>
                                                    <span>${item.created_at}</span>
                                                </td>
                                                <td>
                                                    <div class="userEmail">
                                                        <a onclick="handleUpdate(${item.product_id})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="mdi mdi-grease-pencil fs-5 text-success"></i></a>
                                                        <a onclick="handleDelete(${item.product_id})"><i class="mdi mdi-delete fs-5 text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>`
                            $('.bodyTable').append(html);
                        })
                        $('.dataTable').DataTable();
                    }
                }
            })
        }
        showAllProducts();



        const handleDelete = (id) => {
            Swal.fire({
                title: 'Bạn chắc chắn chứ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'http://localhost:3000/database/controller/productController.php',
                        type: 'GET',
                        data: {
                            action: "delete",
                            id: id
                        },
                        success: (response) => {
                            Swal.fire({
                                title: 'Xóa thành công',
                                icon: 'success'
                            })
                            showAllProducts();
                        }
                    })
                }
            })
        }

        const handleUpdate = (id) => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/productController.php',
                type: 'GET',
                data: {
                    action: "getProductById",
                    id: id
                },
                success: (response) => {
                    $('.modal-title').html('Cập Nhật Sản Phẩm');
                    $('.btnSave').addClass('updateBtn');
                    let data = JSON.parse(response);
                    $("#productID").val(data[0].product_id);
                    $("#productName").val(data[0].product_name);
                    $("#description").val(data[0].description);
                    $('#category option').prop('selected', false);
                    $(`#category option[value="${data[0].category_id}"]`).prop('selected', true);
                }
            })
        }

        const removeInformations = function() {
            const fields = ['productName', 'description', 'category'];
            fields.forEach(field => {
                $(`#${field}`).val('');
            });
            if ($('.btnSave').hasClass('updateBtn')) {
                $('.btnSave').removeClass('updateBtn');
            }
            if ($('.btnSave').hasClass('addBtn')) {
                $('.btnSave').removeClass('addBtn');
            }
        }

        $('.addProduct').on('click', function() {
            $('.modal-title').html('Thêm Sản Phẩm Mới');
            $('.btnSave').addClass('addBtn');
        })

        function addBackslashBeforeSingleQuote(paragraph) {
            // Check if the paragraph includes a single quote
            if (paragraph.includes("'")) {
                // Add a backslash before every single quote
                return paragraph.replace(/'/g, "\\'");
            }
            // If no single quotes found, return the original paragraph
            return paragraph;
        }

        function handleUserAction(action) {
            function isEmpty(value) {
                return value.trim() === '';
            }

            const fields = ['productName', 'description', 'category'];

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
                const existProductName = $('#existProductName');
                const data = new FormData();
                data.append('id', $('#productID').val());
                data.append('category', $('#category').val());
                data.append('productName', $('#productName').val());
                data.append('description', addBackslashBeforeSingleQuote($('#description').val()));
                data.append('action', action);
                $.ajax({
                    url: 'http://localhost:3000/database/controller/productController.php',
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
                                        showAllProducts();
                                    }
                                })
                                existProductName.addClass('d-none');
                                break;
                            default:
                                if (response.includes("existProductName")) {
                                    existProductName.removeClass('d-none');
                                } else {
                                    existProductName.addClass('d-none');
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

        $(document).on('click', '.updateBtn', function() {
            handleUserAction("updateProduct");
        });

        $(document).on('click', '.addBtn', function() {
            handleUserAction("addProduct");
        });
    </script>
</body>

</html>