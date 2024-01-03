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

        .list-img span {
            cursor: pointer;
            padding: 5px;
            background-color: #bbb;
        }

        .list-img span.active {
            background-color: rgb(220, 86, 86);
        }

        .list-color .active {
            background-color: white;
            color: blue;
        }

        .dropdown-toggle::after {
            content: none;
        }

        .dropdown-toggle {
            background-color: transparent;
        }

        .icon-hover:hover {
            border-color: #3b71ca !important;
            background-color: white !important;
            color: #3b71ca !important;
        }

        .icon-hover:hover i {
            color: #3b71ca !important;
        }
    </style>
</head>

<body>
    <?php include '../../partials/header.php' ?>
    <div class="container">
        <div class="row d-flex p-5 my-5 border">
            <div class="col-md-6 images">
                <div class="mt-3">
                    <div class="main border">
                        <span class="control prev">
                            <i class="mdi mdi-chevron-left"></i>
                        </span>
                        <span class="control next">
                            <i class="mdi mdi-chevron-right"></i>
                        </span>
                        <div class="img-wrap" style="height: 500px; object-fit: cover">
                            <img src="images/iphone14black1.jpg" class="mainImage" />
                        </div>
                    </div>
                    <div class="list-img mt-3">

                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="ps-lg-3 rightSide">
                    <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
                    <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add tocart </a>
                    <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
                </div>
            </div>
        </div>

        <div class="row d-flex p-5  border">
            <div class="col-md-6 text-black h6 font-italic">Mô tả</div>
            <div class="col-md-3 text-black h6 font-italic">Đặc trưng</div>
            <div class="col-md-3 text-black h6 font-italic">Thông tin chuyển phát</div>
            <div class="col-md-6">
                <div class="mt-3 description">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mt-3">
                    <div><i class="mdi mdi-trophy-variant" style="color: #FA8232; margin-right: 5px;"></i>Bảo hành 1 năm miễn phí</div>
                    <div><i class="mdi mdi-truck" style="color: #FA8232; margin-right: 5px;"></i>Giao hàng nhanh nhất</div>
                    <div><i class="mdi mdi-certificate" style="color: #FA8232;margin-right: 5px;"></i>Đảm bảo hoàn tiền 100%</div>
                    <div><i class="mdi mdi-phone-outgoing" style="color: #FA8232;margin-right: 5px;"></i>Hỗ trợ khách hàng 24/7</div>
                    <div><i class="mdi mdi-credit-card" style="color: #FA8232;margin-right: 5px;"></i>Phương thức thanh toán an toàn</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mt-3">
                    <div><strong>Chuyển phát nhanh:</strong> 2 - 4 ngày</div>
                    <div><strong>Vận chuyển địa phương:</strong> tối đa một tuần, $19,00</div>
                    <div><strong>Vận chuyển mặt đất của UPS:</strong> 4 - 6 ngày, $29,00</div>
                    <div><strong>Unishop Xuất Khẩu Toàn Cầu:</strong> 3 - 4 ngày, $39,00</div>
                </div>
            </div>
        </div>

        <div class="row d-flex p-5 mt-5  border">
            <div class="col-md-12">
                <h2 style="color: #ee4d2d; font-style: italic">Đánh Giá Sản Phẩm</h2>
               <hr>     
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between order-${review.review_id}">
                    <div class="reviews">

                    </div>
                    <!-- <div style="margin-left: -15px">
                        <c:if test="${review.user_id == requestScope.userId}">
                            <div class="dropdown">
                                <i class="fa-solid fa-ellipsis dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 28px"></i>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="update-review?id=${review.review_id}">Update</a>
                                </div>
                            </div>
                        </c:if>
                    </div> -->
                </div>
            </div>
            <hr>
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
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('id');
        const getProduct = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/productColorController.php',
                type: 'GET',
                data: {
                    action: "getProductDetails",
                    productId: productId,
                },
                success: (response) => {
                    let data = JSON.parse(response);
                    const mainImage = document.querySelector('.mainImage');
                    mainImage.src = `/database/uploads/${data.productImage[0][0].image}`;
                    const listImage = document.querySelector('.list-img');
                    let htmlLeftSide = "";
                    let indexImage = 0;
                    data.productImage.forEach(function(images, index1) {
                        images.forEach(function(image, index2) {
                            htmlLeftSide += `<span class=" ${index1 == 0 && index2 == 0 ? "active" : ""}" ">
                            <img src="/database/uploads/${image.image}" alt ="${image.image}" id="image${indexImage}" class="${image.product_color_id}" style="width: 80px;height: 80px; object-fit: cover" />
                        </span>`
                            indexImage++;
                        })
                    });
                    listImage.innerHTML = htmlLeftSide;
                    const rightSide = document.querySelector('.rightSide');
                    let listPriceProduct = "";
                    data.productColor.forEach(function(product, index) {
                        listPriceProduct += `<span class="price${index} ${index == 0 ? "" : "d-none"} h3" >$${product.price}</span>`;
                    });
                    let htmlRightSide = `<div class="mt-2">
                    <h2 class="title text-dark"> ${data.product[0].product_name}</h2>
                    <div class="d-flex flex-row my-3">
                        <div class="text-warning mb-1 me-2">`
                    for (var i = 0; i < data.product[0].rate; i++) {
                        htmlRightSide += `<i class="mdi mdi-star-outline" style="color: #FA8232"></i>`;
                    }

                    // Loop to add empty stars for the remaining
                    for (var i = 0; i < 5 - data.product[0].rate; i++) {
                        htmlRightSide += `<i class="mdi mdi-star-outline"></i>`;
                    }
                    let sumOfSold = 0;
                    data.productColor.forEach(function(product) {
                        sumOfSold += Number(product.sold_quantity);
                    })
                    let listcolor = ``;
                    data.productColor.forEach(function(product, index1) {
                        listcolor += ` <input type="button" class="btn btn-info ${index1 == 0 ? " active" : ""} color" name="${product.product_color_id}" value="${product.color}"></input>`
                    });
                    let listQuantiyproduct = "";
                    data.productColor.forEach(function(product, index) {
                        if (product.quantity > 0) {
                            listQuantiyproduct += ` <p style="color: #757575; font-style: italic" class="quantiy${index} ${index == 0 ? "" : "d-none"} ml-4" id="${product.quantity}">${product.quantity} mặt hàng</p>`;
                        } else {
                            listQuantiyproduct += `<p style="color: #757575; font-style: italic" class="quantiy${index} ${index == 1 ? "" : "d-none"} ml-4" id="${product.quantity}">0 mặt hàng</p>`;
                        }
                    })
                    htmlRightSide += `</span>
                        <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>${sumOfSold} đã bán</span>
                        <span class="ms-2 status">In stock</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 list-price">
                        ${listPriceProduct}
                    </div>
                    <p>
                    ${data.product[0].description}
                    </p>
                    <div class="row">
                        <dt class="col-3">Category:</dt>
                        <dd class="col-9">${data.category[0].category_name}</dd>
                    </div>

                    <hr />  

                <div class="d-flex align-items-center mt-4">
                    <div style="font-size: 20px;font-weight: bold; margin-right: 50px">Màu:</div>
                    <div class="list-color">
                        ${listcolor}
                    </div>
                </div>
                <input type="text" hidden="" name="color" value class="inputColor">
                <input type="text" value="${data.product.product_id}" hidden="" name="productID">
                <div class="d-flex mt-4">
                    <div style="font-size: 20px;font-weight: bold; margin-right: 50px">Quantity:</div>
                    <div>
                    <input type="number" id="quantity" name="quantity" class="form-control" min="1" value="1">
                        <input type="text" id="inventory" name="inventory" hidden="">
                    </div>
                    <div class="list-quantity">
                        ${listQuantiyproduct}
                    </div>
                </div>
                <div class="d-flex mt-3" style="gap: 30px">
                    <button id="submitBtn" type="button" style="text-decoration: none; color: #ee4d2d; background-color: rgba(255,87,34,0.1); border: 1px solid #ee4d2d; padding: 15px 40px">Thêm vào giỏ hàng</button>
                    <button id="buyNow" type="button" style="background-color: rgb(238, 77, 45); color: rgb(255, 255, 255);border: 1px solid #ee4d2d; padding: 15px 40px">
                        <i class="fa-solid fa-money-bills"></i>
                        Mua Ngay
                    </button>
                </div>`
                    rightSide.innerHTML = htmlRightSide;
                    const description = document.querySelector('.description');
                    description.innerHTML = data.product[0].description;
                    const listImg = document.querySelectorAll(".list-img span");
                    const img = document.querySelector(".img-wrap img");
                    const prevBtn = document.querySelector(".prev");
                    const nextBtn = document.querySelector(".next");
                    let currentIndex = 0;
                    const colors = document.querySelectorAll(".color");
                    const colorActiveDefault = document.querySelector(".list-color .active");
                    const colorDefault = document.querySelector(".inputColor");
                    colorDefault.value = colorActiveDefault.value;
                    colors.forEach((value, index) => {
                        value.addEventListener("click", function() {
                            const colorActive = document.querySelector(".list-color .active");
                            const color = document.querySelector(".inputColor");
                            color.value = value.value;
                            colorActive.classList.remove("active");
                            value.classList.add("active");
                            let dup = true;
                            listImg.forEach(function(img, index) {
                                if (img.querySelector('img').className == value.name && dup == true) {
                                    currentIndex = index;
                                    dup = false;
                                }
                            })
                            display(currentIndex);
                            displayInformation(index);
                        });
                    });
                    prevBtn.addEventListener("click", function() {
                        if (currentIndex === 0) {
                            currentIndex = listImg.length - 1;
                            display(currentIndex);
                        } else {
                            currentIndex--;
                            display(currentIndex);
                        }
                    });
                    nextBtn.addEventListener("click", function() {
                        if (currentIndex === listImg.length - 1) {
                            currentIndex = 0;
                            display(currentIndex);
                        } else {
                            currentIndex++;
                            display(currentIndex);
                        }
                    });
                    const display = function(currentIndex) {
                        listImg.forEach(function(value, index) {
                            if (currentIndex === index) {
                                value.classList.add("active");
                                const x = document.querySelector(`#image${currentIndex}`);
                                img.src = `/database/uploads/${x.alt}`;
                            } else {
                                value.classList.remove("active");
                            }
                        });
                    };
                    const listPrice = document.querySelectorAll(".list-price span");
                    const listQuantiy = document.querySelectorAll(".list-quantity p");
                    const displayInformation = function(currentIndex) {
                        listPrice.forEach(function(value, index) {
                            if (currentIndex === index) {
                                value.classList.remove("d-none");
                            } else {
                                value.classList.add("d-none");
                            }
                        });
                        listQuantiy.forEach(function(value, index) {
                            if (currentIndex === index) {
                                value.classList.remove("d-none");
                                const numberInput = document.getElementById('quantity');
                                numberInput.value = 1;
                                numberInput.max = value.id; // Set the maximum value to 100 
                                const inventory = document.querySelector("#inventory");
                                inventory.value = value.id;
                                const status = document.querySelector(".status");
                                if (inventory.value == 0) {
                                    status.innerHTML = 'Hết Hàng';
                                    status.style.color = 'red';
                                } else {
                                    status.innerHTML = 'Còn Hàng';
                                    status.style.color = 'green';
                                }
                            } else {
                                value.classList.add("d-none");
                            }
                        });
                    };
                    displayInformation(currentIndex);
                    const quantity = document.querySelector('#quantity');
                    quantity.addEventListener("input", function(e) {
                        if (+e.target.value > +quantity.max) { // Convert both value and max to numbers for comparison                                     
                            e.target.value = quantity.max;
                        }
                    });
                    const submitBtn = document.querySelector("#submitBtn");
                    submitBtn.onclick = function() {
                        if (document.querySelector('.status').innerHTML == 'Sold out') {
                            Swal.fire({
                                icon: 'error',
                                title: "Product is sold out",
                                confirmButtonText: 'OK',
                            })
                        } else {
                            const data = new FormData();
                            data.append('productColor', $('.color.active').attr('name'));
                            console.log($('.color.active').attr('name'));
                            console.log($('#quantity').val());
                            console.log($('#inventory').val());
                            data.append('quantity', $('#quantity').val());
                            data.append('inventory', $('#inventory').val());
                            data.append('action', 'addTocart');
                            $.ajax({
                                url: 'http://localhost:3000/database/controller/cartController.php',
                                type: 'POST',
                                data: data,
                                contentType: false,
                                processData: false,
                                success: (response) => {
                                    switch (response) {
                                        case "success":
                                            Swal.fire({
                                                icon: 'success',
                                                title: "Add To cart Successfully",
                                                confirmButtonText: 'OK',
                                            })
                                            break;
                                        default:
                                            Swal.fire({
                                                icon: 'error',
                                                title: "Product is sold out",
                                                confirmButtonText: 'OK',
                                            })
                                    }
                                }
                            });
                        }
                    }
                }
            })
        }
        getProduct();

        const getReview = (id) => {
            const data = {
                id: id,
                action: 'getReview'
            }
            $.ajax({
                url: 'http://localhost:3000/database/controller/reviewController.php',
                type: 'get',
                data: data,
                success: (response) => {
                    let data = JSON.parse(response);
                    data.forEach(function(item) {
                        console.log(item);
                        let html = `<div class="container d-flex gap-4 mb-5">
                        <div class="avatar">
                            <img src="../../database/uploads/${item.avatar}" style="width: 50px; height: 50px; border-radius: 50%" alt="alt" />
                        </div>
                        <div class="review">
                            <div class="review-header">
                                <div class="review-info">
                                    <p class="reviewer-name mb-0" style="font-style: italic; color:rgba(0,0,0,.87);font-size: 18px">${item.username}</p>
                                    <div class="review-rating">`
                        for (var i = 0; i < item.star; i++) {
                            html += `<i class="mdi mdi-star" style="color: #FA8232"></i>`;
                        }

                        // Loop to add empty stars for the remaining
                        for (var i = 0; i < 5 - item.star; i++) {
                            html += `<i class="mdi mdi-star-outline"></i>`;
                        }
                        html += `</div>
                                    <p class="review-date" style="color: rgba(0,0,0,.54);width: 200px">${item.created_at} | ${item.color}</p>
                                </div>
                            </div>
                            <div class="review-content">
                                <p class="review-text" style="word-wrap: break-word;">${item.content}</p>
                            </div> 
                            <div class="d-flex gap-3">`
                        for (let i = 0; i < item.images.length; i++) {
                            html += `<img src="/database/uploads/${item.images[i].image}" style="width: 100px;height: 100px; object-fit: cover" />`;
                        }

                        `</div>
                        </div>
                        `
                        $('.reviews').append(html);
                    })
                }
            });
        }
        getReview(productId);
    </script>
</body>

</html>