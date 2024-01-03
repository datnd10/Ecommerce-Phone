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

        img {
            width: 200px;
            height: 200px;
            object-fit: cover;
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
                                                <th>Tên Nhãn Hàng</th>
                                                <th>Tên Sản Phẩm</th>
                                                <th>Màu</th>
                                                <th>Giá</th>
                                                <th>Số Lượng</th>
                                                <th>Số Lượng Bán</th>
                                                <th>Trạng thái</th>
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
                                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Màu Sản Phẩm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="removeInformations()"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3">
                                    <input type="text" class="form-control" id="productColorId" hidden>
                                    <div class="col-md-6">
                                        <label for="category" class="form-label">Tên Nhãn Hàng:</label>
                                        <select id="category" class="form-select form-select-lg">
                                            <option value="">Chọn Nhãn Hàng</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="product" class="form-label">Tên Sản Phẩm:</label>
                                        <select id="product" class="form-select form-select-lg">
                                            <option value="">Chọn Sản Phẩm</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="color"><span>Màu</span><span id="existColor" class="text-danger d-none ml-3">Màu Của Sản Phẩm Đã Tồn Tại</span></label>
                                        <input type="text" class="form-control" id="color" placeholder="Màu Sản Phẩm">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="price">Giá Bán</label>
                                        <input type="text" class="form-control" id="price" placeholder="Giá Bán">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="quantity">Số Lượng</label>
                                        <input type="text" class="form-control" id="quantity" placeholder="Số Lượng">
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


        let categoryArray = []; // Khai báo biến ở mức độ toàn cục hoặc trong phạm vi bên ngoài hàm
        let productArray = [];
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
                }
            });
        };
        const getAllProducts = (targetArray) => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/productColorController.php',
                type: 'GET',
                data: {
                    action: "getProducts",
                },
                success: (response) => {
                    let data = JSON.parse(response);
                    data.forEach((product) => {
                        let item = {
                            id: product.product_id,
                            name: product.product_name,
                            category_id: product.category_id
                        }
                        targetArray.push(item);
                    });
                }
            })
        }
        getAllCategories(categoryArray);
        getAllProducts(productArray);

        const showAllProductColors = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/productColorController.php',
                type: 'GET',
                data: {
                    action: "view",
                },
                success: (response) => {
                    let data = JSON.parse(response);
                    console.log(data);
                    if (data == "No data found") {
                        data = "<h2 style=\"font-style: italic;\">No data found</h2>";
                        $('.bodyTable').html(data);
                    } else {
                        $('.bodyTable').empty();
                        data.forEach(function(item) {
                            let html = `<tr>
                                                <td>
                                                    <span>${item.category_name}<span>
                                                </td>
                                                <td>
                                                    <span>${item.product_name}</span>
                                                </td>
                                                <td>
                                                    <span style="display: inline-block; width: 15px; height: 15px; background-color: ${item.color}; border-radius: 50%; vertical-align: middle;"></span>
                                                    <span style="display: inline-block; vertical-align: middle; margin-top: -2px;margin-left: 5px;">${item.color}</span>
                                                </td>
                                                <td>
                                                    <span>$${item.price}</span>
                                                </td>
                                                <td>
                                                    <span>${item.quantity}</span>
                                                </td>
                                                <td>
                                                    <span>${item.sold_quantity}</span>
                                                </td>
                                                <td>
                                                    <span>${item.is_active}</span>
                                                </td>
                                                <td>
                                                    <div class="userEmail">
                                                        <a onclick="handleUpdate(${item.product_color_id})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="mdi mdi-grease-pencil fs-5 text-success"></i></a>
                                                        <a onclick="handleDelete(${item.product_color_id})"><i class="mdi mdi-delete fs-5 text-danger"></i></a>
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
        showAllProductColors();



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
                        url: 'http://localhost:3000/database/controller/productColorController.php',
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
                            showAllProductColors();
                        }
                    })
                }
            })
        }

        function updateProductSelect(categoryId, selectId) {
            const productsToShow = productArray
                .filter(product => product.category_id == categoryId)
                .map(product => `<option value="${product.id}">${product.name}</option>`);
            if (productsToShow && productsToShow.length > 0) {
                $(`#${selectId}`).html(productsToShow.join(''));
            } else {
                $(`#${selectId}`).html(`<option value="" >Chọn Sản Phẩm</option>`);
            }
        }

        $('#category').on('change', (e) => {
            updateProductSelect(e.target.value, 'product');
        });

        const listImageOld = [];

        const handleUpdate = (id) => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/productColorController.php',
                type: 'GET',
                data: {
                    action: 'getProductColorById',
                    id: id
                },
                success: (response) => {
                    $('.modal-title').html('Cập Nhật Màu Sản Phẩm');
                    $('.btnSave').addClass('updateBtn');
                    const data = JSON.parse(response);
                    const product = data[0];
                    const images = data.slice(1);

                    let category;
                    productArray.forEach((product) => {
                        if (product.id == data[0].product_id) {
                            category = product.category_id;
                        }
                    });
                    $('#category').val(category);
                    const productsToShow = productArray
                        .filter(product => product.category_id == category)
                        .map(product => `<option value="${product.id}">${product.name}</option>`);

                    $('#product').html(productsToShow.join(''));
                    $("#productColorId").val(product.product_color_id);
                    $("#product").val(product.product_id);
                    $("#color").val(product.color);
                    $("#price").val(product.price);
                    $("#quantity").val(product.quantity);

                    if (images.length > 0) {
                        $('#images').empty();
                        images.forEach((image) => {
                            listImageOld.push(image.image);
                            $('#images').append(`<figure><img src="../../database/uploads/${image.image}"><figcaption>${image.image}</figcaption></figure>`);
                        });
                        numOfFiles.empty();
                        numOfFiles.append(`${images.length} files chosen`);
                    }
                }
            });
        };


        const removeInformations = function() {
            const fields = ['category', 'product', 'productColorId', 'color', 'price', 'quantity', 'file-input'];
            fields.forEach(field => {
                $(`#${field}`).val('');
            });
            $('#images').empty();
            updateProductSelect(0, 'product');
            if ($('.btnSave').hasClass('updateBtn')) {
                $('.btnSave').removeClass('updateBtn');
            }
            if ($('.btnSave').hasClass('addBtn')) {
                $('.btnSave').removeClass('addBtn');
            }
        }

        $('.addProduct').on('click', function() {
            $('.modal-title').html('Thêm Màu Sản Phẩm Mới');
            $('.btnSave').addClass('addBtn');
        })

        function isInteger(value) {
            return /^\d+$/.test(value);
        }

        function isFloat(value) {
            return /^\d+(\.\d+)?$/.test(value);
        }

        function handleUserAction(action) {
            function isEmpty(value) {
                return value.trim() === '';
            }

            const fields = ['category', 'product', 'color', 'price', 'quantity'];

            fields.forEach(field => {
                const element = $(`#${field}`);
                if (isEmpty(element.val())) {
                    element.addClass('is-invalid');
                } else {
                    element.removeClass('is-invalid');
                }
            });

            let listImages = $('#file-input')[0].files;

            if (fields.some(field => isEmpty($(`#${field}`).val()))) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Điền đầy đủ thông tin',
                });
            } else if (!isInteger($(`#quantity`).val()) || !isFloat($(`#price`).val())) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Price must be float or integer, quantity must be integer',
                });
            } else {
                const existColor = $('#existColor');
                const addForm = $('#addForm');
                const data = new FormData();
                data.append('id', $('#productColorId').val());
                data.append('categoryId', $('#category').val());
                data.append('productId', $('#product').val());
                data.append('color', $('#color').val());
                data.append('price', $('#price').val());
                data.append('quantity', $('#quantity').val());

                for (let i = 0; i < listImages.length; i++) {
                    data.append('images[]', listImages[i]);
                }

                data.append('oldImage', JSON.stringify(listImageOld));
                data.append('action', action);

                $.ajax({
                    url: 'http://localhost:3000/database/controller/productColorController.php',
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
                                        showAllProductColors();
                                    }
                                });
                                existColor.addClass('d-none');
                                break;
                            default:
                                if (response.includes('existData')) {
                                    existColor.removeClass('d-none');
                                } else {
                                    existColor.addClass('d-none');
                                }
                                Swal.fire({
                                    title: 'Có Gì Đó Sai Sót',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                });
                                break;
                        }
                    }
                });
            }
        }


        $(document).on('click', '.updateBtn', function() {
            handleUserAction("updateProductColor");
        });

        $(document).on('click', '.addBtn', function() {
            handleUserAction("addProductColor");
        });
    </script>
</body>

</html>