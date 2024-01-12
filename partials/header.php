<style>
    .dropdown-menu a:hover {
        color: inherit !important;
        /* Use !important to override Bootstrap styles */
        text-decoration: none !important;
        /* Optional: Remove underline on hover */
    }

    .dropdown-toggle::after {
        content: none;
    }
</style>



<div style="background-color: #1B6392;">
    <div class="container d-flex justify-content-between align-items-center py-3">
        <div class="logo col-md-2">
            <a href="home.php"><img src="../../assets/images/hoha-logo.png" alt="Logo" style="height: 80px; width: 190px; object-fit: cover;"></a>
        </div>
        <div class="search col-md-6">
            <input type="text" id="search" placeholder="Tìm kiếm sản phẩm..." style="padding: 10px 15px; width: 600px">
        </div>

        <?php
        // Start the session
        session_start();
        if (!isset($_SESSION['account'])) {
            echo "<div class='user col-md-2 d-flex'>
                    <i class='fa-solid fa-cart-shopping' style='font-size: 24px'></i>
                    <a href='signIn.php'><button class='btn btn-success mr-3'>Đăng Nhập</button></a>
                    <a href='signup.php'><button class='btn btn-info'>Đăng Kí</button></a>
                </div>";
        } else {
            $jsonData = $_SESSION['account'];
            $data = json_decode($jsonData, true);
            $username = $data[0]['username'];
            $image = $data[0]['avatar'];
            $role = $data[0]['role'];

            echo "<div class='col-md-2 d-flex align-items-center justify-content-between'>
                    <a href='cart.php' id='cartLink' style='text-decoration: none; color: inherit;'>
                        <i class='mdi mdi-cart' style='font-size: 35px'></i>
                    </a>
                    <div class='dropdown'>
                        <button class='btn dropdown-toggle d-flex align-items-center justify-content-center border border-secondary p-2' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <div class='username'>$username</div>
                            <img src='../../database/uploads/$image' style='width: 20px; height: 20px; border-radius: 50%' />
                        </button>
                        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                            <a href='information.php' class='dropdown-item'>Thông tin cá nhân</a>";

            if ($role == 0) {
                echo "<a href='/components/admin/dashBoard.php' class='dropdown-item'>Quản lý cửa hàng</a>";
            }

            echo "<a href='historyPurchase.php' class='dropdown-item'>Lịch sử mua hàng</a>
                    <a href='changePassword.php' class='dropdown-item'>Đổi mật khẩu</a>
                    <a class='dropdown-item logout' href='#'>Đăng xuất</a>
                </div>
            </div>
        </div>";
        }
        ?>
    </div>
</div>


<script>
    const logout = document.querySelector('.logout');
    if (logout) {
        logout.onclick = function() {
            const data = new FormData();
            data.append('action', 'view');
            $.ajax({
                url: 'http://localhost:3000/database/controller/userController.php',
                type: 'GET',
                data: {
                    action: 'logOut',
                },
                success: (response) => {
                    location.reload();
                }
            })
        }
    }

    const btnSearch = document.querySelector('#search');
    btnSearch.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            viewAll();
        }
    });

</script>