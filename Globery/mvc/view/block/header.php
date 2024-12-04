<!DOCTYPE html>
<html lang="en" class="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($actived ? $actived : $_GET['page']) ?></title>
    <link rel="stylesheet" href="./mvc/view/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./mvc/view/css/style.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body data-bs-theme="light" class="position-relative d-flex flex-column w-100">
    <nav class="navbar navbar-expand-lg bg-emphasis">
        <div class="container-fluid">
            <a class="navbar-brand" href="./"><img src="./mvc/view/img/logo.png" alt="logo" style="width: 100px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Máy Bay + Khách Sạn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Chổ Ở</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Phương Tiện Di Chuyển
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Xe Khách</a></li>
                            <li><a class="dropdown-item" href="#">Máy Bay</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Xe 4 Chỗ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Hoạt Động
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Xe Khách</a></li>
                            <li><a class="dropdown-item" href="#">Máy Bay</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Xe 4 Chỗ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Phiếu Giảm Giá Và Ưu Đãi</a>
                    </li>
                </ul>

                <div class="d-flex gap-3">
                    <a href="./index.php?page=cart"><i class="fa-solid fa-cart-shopping"></i></a>
                    <?php if (isset($user)) {
                        echo '
                        
                            <a href="./">
                                <button type="submit" name="unsetUser" class="btn btn-secondary" data-bs-container="body"
                                    data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Bottom popover"></button>
                            </a>
                        
                        <form action="" method="post">
                        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    ' .
                            $user . '
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#" name="unsetUser">Đăng xuất</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
</form>
                        ';

                    } else { ?>
                        <a href="./index.php?page=login&currentpage=<?php echo $actived ?>"><button
                                class="btn-login btn btn-outline-primary rounded-pill">Đăng
                                Nhập</button></a>
                        <a href="./index.php?page=register">
                            <button class="btn-signup btn btn btn-outline-primary rounded-pill ">Đăng Kí</button>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_POST['unsetUser'])) {
        unset($_SESSION['user_name']);
        $user = null;
    }
    ?>