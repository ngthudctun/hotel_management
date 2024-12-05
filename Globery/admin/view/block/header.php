<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    unset($_SESSION['admin_id']);
    $admin_id = null;
    header('location: ./');
} ?>
<!DOCTYPE html>
<html lang="en" class="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($actived ? $actived : 'Globezy Xin Chào') ?></title>
    <link rel="stylesheet" href="./view/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/scrollreveal"></script>
    <style>
        /* Tùy chỉnh sidebar */
        #sidebar {
            background-color: #343a40;
            color: white;
            min-height: 100vh;
        }

        #sidebar .nav-link {
            color: #b8c1ec;
        }

        #sidebar .nav-link:hover {
            background-color: #495057;
            color: white;
            border-radius: 50px 0px 0px 50px;
        }

        #sidebar .nav-link.actived {
            background-color: #495057 !important;
            color: white !important;
            border-radius: 50px 0px 0px 50px;
        }

        /* Tùy chỉnh stats card */
        .card {
            border-radius: 8px;
            overflow: hidden;
        }

        .card-header {
            font-weight: bold;
        }

        .card-body {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Tùy chỉnh table */
        .table-responsive {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Box shadow cho card */
        .card.shadow {
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body data-bs-theme="light" class="position-relative d-flex flex-column w-100">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar p-0">
                <div class="position-sticky pt-3">
                    <h3 class="text-center mt-3">Admin Dashboard</h3>
                    <ul class="nav flex-column mt-4">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center mt-1 gap-3 <?php if ($actived == 'dashboard') {
                                echo 'actived';
                            } ?>" href="./?page=dashboard">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center mt-1 gap-3 <?php if ($actived == 'hotel') {
                                echo 'actived';
                            } ?>" href="./?page=hotel">
                                <span data-feather="file"></span>
                                Quản lý khách sạn
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link d-flex align-items-center mt-1 gap-3 <?php if ($actived == 'room') {
                                echo 'actived';
                            } ?>" href="./?page=room">
                                <span data-feather="archive"></span>
                                Quản lý phòng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center mt-1 gap-3  <?php if ($actived == 'orders') {
                                echo 'actived';
                            } ?>" href="./?page=orders">
                                <span data-feather="shopping-cart"></span>
                                Đặt phòng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center mt-1 gap-3  <?php if ($actived == 'banner_display') {
                                echo 'actived';
                            } ?>" href="./?page=banner_display">
                                <span data-feather="airplay"></span>
                                Banner
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center mt-1 gap-3 <?php if ($actived == 'users') {
                                echo 'actived';
                            } ?>" href="./?page=users">
                                <span data-feather="users"></span>
                                Người dùng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center mt-1 gap-3 <?php if ($actived == 'changepass') {
                                echo 'actived';
                            } ?>" href="./?page=changepass">
                                <span data-feather="key"></span>
                                Đổi mật khẩu
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="" method="post" class="w-100">
                                <button class="nav-link d-flex align-items-center mt-1 gap-3 w-100" type="submit" name="logout" value="Đăng xuất"><span
                                        data-feather="log-out"></span> Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>