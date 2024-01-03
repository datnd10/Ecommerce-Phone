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
        .dropdown-toggle::after {
            content: none;
        }

        .dropdown-toggle {
            background-color: transparent;
        }

        body {
            overflow-x: hidden;

        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .main {
            height: 85%;
            position: relative;
        }

        .control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 80px;
            color: white;
            cursor: pointer;
        }

        .prev {
            left: -10px;
            color: black
        }

        .next {
            right: -10px;
            color: black
        }

        .img-wrap {
            width: 100%;
            height: 100%;
        }

        .list-img {
            display: flex;
        }

        .list-img div {
            cursor: pointer;
            padding: 5px;
            background-color: #bbb;
            flex: 1;
        }

        .list-img div.active {
            background-color: rgb(220, 86, 86);
        }

        .list {
            margin-left: 60px;
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        a:hover {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>
    <?php include '../../partials/header.php' ?>
    <div class="container mt-5">
        <div class="main border">
            <span class="control prev">
                <i class="mdi mdi-chevron-left"></i>
            </span>
            <span class="control next">
                <i class="mdi mdi-chevron-right"></i>
            </span>
            <div class="img-wrap" style="height: 400px;object-fit: cover">
                <img src="../../assets/images/image1.jpg" alt="" />
            </div>
        </div>
        <div class="list-img">
            <div class="d-none">
                <img src="../../assets/images/image1.jpg" alt="" />
            </div>
            <div class="d-none">
                <img src="../../assets/images/image2.jpg" alt="" />
            </div>
            <div class="d-none">
                <img src="../../assets/images/image3.jpg" alt="" />
            </div>
            <div class="d-none">
                <img src="../../assets/images/image4.jpg" alt="" />
            </div>
            <div class="d-none">
                <img src="../../assets/images/image5.jpg" alt="" />
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row p-0 m-0">
            <div class="d-flex justify-content-between mt-4 gap-4">
                <div class="col-md-2">
                    <form id="filterForm">
                        <input type="text" class="searchInput" name="search" hidden="">
                        <div>
                            <label for="sort">
                                <h4>Sắp xếp theo:</h4>
                            </label>
                            <select id="sort" class="form-control" name="sort">
                                <option selected value="price asc">Giá tăng dần</option>
                                <option value="price desc">Giá giảm dần</option>
                                <option value="total_sold desc">Bán chạy nhất</option>
                                <option value="product.create_at desc">Sản phẩm mới</option>
                            </select>
                        </div>
                        <hr />
                        <div class="filterCategory">
    
    
                        </div>
                        <hr />
                        <div>
                            <h4>Giá</h4>
                            <!-- <div class="d-flex">
                                <div class="input-group mr-3 d-flex align-items-center">
                                    <input type="text" class="form-control" id="pricefrom" style="border-radius: 5px" placeholder="Từ"><span>$</span>
                                </div>
    
                                <div class="input-group align-items-center">
                                    <input type="text" class="form-control" id="priceto" style="border-radius: 5px" placeholder="Đến"><span>$</span>
                                </div>
                            </div> -->
                            <div class="d-flex input-group mb-3">
                                <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons">
                                <button class="btn btn-outline-secondary" type="button">-</button>
                                <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons">
                            </div>
                        </div>
                        <hr />
                        <div>
                            <h4>Đánh giá</h4>
                            <input type="radio" id="5" name="star" value="5">
                            <label for="5">
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                            </label><br>
                            <input type="radio" id="4" name="star" value="4">
                            <label for="4">
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="far fa-star"></i>
                            </label><br>
                            <input type="radio" id="3" name="star" value="3">
                            <label for="3">
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </label><br>
                            <input type="radio" id="2" name="star" value="2">
                            <label for="2">
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </label><br>
                            <input type="radio" id="1" name="star" value="1">
                            <label for="1">
                                <i class="mdi mdi-star" style="color: #FA8232"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </label>
                        </div>
                        <hr />
                        <input type="button" id="filterBtn" value="Lọc" class="btn btn-primary" style="width: 155px">
                    </form>
                </div>
    
                <div class="col-md-10">
                    <div class="d-flex justify-content-between align-items-center mb-4" style="padding: 12px 24px; background-color: #F2F4F5;">
                        <div>Tiêu chí lọc: </div>
                        <div><b>65,867</b> Kết quả tìm thấy</div>
                    </div>
                    <div class="d-flex flex-wrap listProduct gap-3">
    
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
    <script>
        const listImg = $(".list-img div");
        const img = $(".img-wrap img");
        const prevBtn = $(".prev");
        const nextBtn = $(".next");

        let currentIndex = 0;

        prevBtn.on("click", function() {
            if (currentIndex === 0) {
                currentIndex = listImg.length - 1;
                display(currentIndex);
            } else {
                currentIndex--;
                display(currentIndex);
            }
        });

        nextBtn.on("click", function() {
            if (currentIndex === listImg.length - 1) {
                currentIndex = 0;
                display(currentIndex);
            } else {
                currentIndex++;
                display(currentIndex);
            }
        });

        const display = function(currentIndex) {
            listImg.each(function(index, value) {
                if (currentIndex === index) {
                    img.attr("src", `../../assets/images/image${currentIndex + 1}.jpg`);
                } else {
                    $(value).removeClass("active");
                }
            });
        };

        setInterval(function() {
            currentIndex++;
            if (currentIndex === listImg.length) {
                currentIndex = 0;
            }
            display(currentIndex);
        }, 2000);
        const viewAll = () => {
            var data = {
                'sort': $('#sort').val(),
                'category': $('input[name="category"]:checked').val(),
                'pricefrom': $('#pricefrom').val(),
                'priceto': $('#priceTo').val(),
                'rate': $('input[name="star"]:checked').val(),
                'action': 'view'
            }
            $.ajax({
                url: 'http://localhost:3000/database/controller/homeController.php',
                type: 'GET',
                data: data,
                success: (response) => {
                    console.log(response);
                    let data = JSON.parse(response);
                    let html = "<h5>Nhãn Hàng</h5>";
                    data.dataCategory.forEach(function(category) {
                        
                    //     html += `<input type="radio" id="category${category.category_id}" name="category" value="${category.category_id}">
                    // <label for="category${category.category_id}">${category.category_name}</label>
                    // <br />`
                    html += `
                            <div class="form-check" style="margin-left: 20px">
                                <input class="form-check-input" type="radio" name="category" id="category${category.category_id}" value="${category.category_id}">
                                <label class="form-check-label m-0" for="category${category.category_id}">
                                    ${category.category_name}
                                </label>
                            </div>
                            `
                    })
                    $('.filterCategory').append(html);


                    let content = "";
                    data.dataProduct.forEach(function(product) {
                        content += `<a href=detailProduct.php?id=${product.product_id} ><div style="padding: 16px; border: 1px solid #E4E7E9; border-radius: 3px;" class="mr-3">`
                        let src = "";
                        data.dataImage.forEach(function(image) {
                            if (image.product_id == product.product_id) {
                                src = image.image;
                            }
                        })
                        content += `<img src="../../database/uploads/${src}" alt="" style="width: 180px; height: 180px; object-fit: cover; margin-bottom: 24px;">
                        <div>`;

                        // Loop to add filled stars based on product.rate
                        for (var i = 0; i < product.rate; i++) {
                            content += `<i class="mdi mdi-star" style="color: #FA8232"></i>`;
                        }

                        // Loop to add empty stars for the remaining
                        for (var i = 0; i < 5 - product.rate; i++) {
                            content += `<i class="mdi mdi-star"></i>`;
                        }

                        content += `<span>(${product.total_sold_quantity})</span>
                        </div>
                    <div style="color: #191C1F; font-size: 14px; font-weight: 400; margin: 8px 0px;">
                         ${product.product_name}
                        </div>
                     <div style="color: #2DA5F3;">
                         ${product.price}$
                    </div>
                    </div>`
                        "</a>";

                    })
                    $('.listProduct').append(content);
                }
            })
        }
        viewAll();
    </script>
</body>

</html>