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
                        <h2 class="page-title h2"> Quản Lý Nhãn Hàng </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashBoard.php">Thống Kê</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản Lý Nhãn Hàng</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-end mb-3">
                                        <button type="button" class="btn btn-primary addCategory" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="mdi mdi-plus-circle"></i>
                                        </button>
                                    </div>
                                    <table class="table dataTable table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Tên</th>
                                                <th>Mô Tả</th>
                                                <th>Tổng Bán</th>
                                                <th>Tổng sản Phẩm</th>
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
                                    <input type="text" class="form-control" id="categoryId" hidden>
                                    <div class="col-md-6">
                                        <label for="categoryName" class="form-label">
                                            <span>Tên Nhãn Hàng: </span>
                                            <span id="existCategoryName" class="text-danger d-none">Tên Nhãn Hàng đã tồn tại</span>
                                        </label>
                                        <input type="text" class="form-control" id="categoryName" placeholder="Tên Nhãn Hàng">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="description" class="form-label">
                                            <span>Mô Tả:</span>
                                        </label>
                                        <input type="text" class="form-control" id="description" placeholder="Mô Tả">
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
        const showAllCategories = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/categoryController.php',
                type: 'GET',
                data: {
                    action: "view",
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
                            let html = `<tr>
                                                <td>
                                                    <span>${item.category_name}<span>
                                                </td>
                                                <td>
                                                    <span>${item.description}</span>
                                                </td>
                                                <td>
                                                    <span>2</span>
                                                </td>
                                                <td>
                                                    <span>3</span>
                                                </td>
                                                <td>
                                                    <span>active</span>
                                                </td>
                                                <td>
                                                    <span>${item.created_at}</span>
                                                </td>
                                                <td>
                                                    <div class="userEmail">
                                                        <a onclick="handleUpdate(${item.category_id})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="mdi mdi-grease-pencil fs-5 text-success"></i></a>
                                                        <a onclick="handleDelete(${item.category_id})"><i class="mdi mdi-delete fs-5 text-danger"></i></a>
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
        showAllCategories();

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
                        url: 'http://localhost:3000/database/controller/categoryController.php',
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
                            showAllCategories();
                        }
                    })
                }
            })
        }

        const handleUpdate = (id) => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/categoryController.php',
                type: 'GET',
                data: {
                    action: "getCategoryById",
                    id: id
                },
                success: (response) => {
                    $('.modal-title').html('Cập Nhật Nhãn Hàng');
                    $('.btnSave').addClass('updateBtn');
                    let data = JSON.parse(response);
                    $("#categoryId").val(data[0].category_id);
                    $("#categoryName").val(data[0].category_name);
                    $("#description").val(data[0].description);
                }
            })
        }

        const removeInformations = function() {
            const fields = ['categoryName', 'description'];
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

        $('.addCategory').on('click', function() {
            $('.modal-title').html('Thêm Nhãn Hàng Mới');
            $('.btnSave').addClass('addBtn');
        })

        function handleUserAction(action) {
            function isEmpty(value) {
                return value.trim() === '';
            }

            const fields = ['categoryName', 'description'];

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
                const existCategoryName = $('#existCategoryName');
                const data = new FormData();
                data.append('id', $('#categoryId').val());
                data.append('categoryName', $('#categoryName').val());
                data.append('description', $('#description').val());
                data.append('action', action);
                $.ajax({
                    url: 'http://localhost:3000/database/controller/categoryController.php',
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
                                        showAllCategories();
                                    }
                                })
                                existCategoryName.addClass('d-none');
                                break;
                            default:
                                if (response.includes("existCategoryName")) {
                                    existCategoryName.removeClass('d-none');
                                } else {
                                    existCategoryName.addClass('d-none');
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
            handleUserAction("updateCategory");
        });

        $(document).on('click', '.addBtn', function() {
            handleUserAction("addCategory");
        });
    </script>
</body>

</html>