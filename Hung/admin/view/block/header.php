<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $actived ?></title>
    <link rel="stylesheet" href="./mvc/view/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./mvc/view/css/style.css">
    <link rel="icon" type="image/png" href="./admin/view/img/favicon.ico" sizes="64x64">
</head>

<body data-bs-theme="dark" class="position-relative d-flex flex-column">
  <div class="preloader"><div class="loader"></div><div class="loader loader2"></div></div>
    <header class="container-flude d-flex justify-content-center align-items-center">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo w-25">
                <a href="index.php" class="no-select"
                    style="overflow: hidden; width: 3rem; height: 3rem; display: flex; justify-content: center; align-items: center; margin: .5rem; border-radius: 1rem; padding: 2rem">
                    <img src="./admin/view/img/logonguyenban.png" alt="" style="border-radius: 100%; width: 110px;">
                </a>
            </div>
            <div class="nav d-none d-md-flex justify-content-center ">
                <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-light rounded-5 shadow-sm d-flex" id="pillNav2"
                    role="tablist"
                    style="--bs-nav-link-color: var(--primary-color); --bs-nav-pills-link-active-color: var(--bs-light); --bs-nav-pills-link-active-bg: var(--primary-color);">
                    <li class="nav-item" role="presentation">
                        <a href="index.php?page=words">
                            <button
                                class="nav-link <?php if ($actived == 'words') echo("active disabled"); ?> bold rounded-5"
                                id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">TẤT CẢ
                                TỪ VỰNG</button></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="index.php?page=topics">
                            <button
                                class="nav-link <?php if ($actived == 'topics') echo("active disabled"); ?> bold rounded-5"
                                id="profile-tab2" data-bs-toggle="tab" type="button" role="tab"
                                aria-selected="false">TẤT CẢ CHỦ ĐỀ</button></a>
                    </li>
                </ul>
            </div>
            <div class="search w-25">
                <form action="./index.php?page=search" class="border-secondary mx-auto p-3  d-none d-md-flex"
                    method="post">
                    <style>
                    .form-control {
                        background-color: var(--primary-color);
                        border: 1px solid #fff;
                    }

                    .form-control:focus {
                        box-shadow: none;
                        border: 1px solid #fff;
                        background-color: var(--primary-color);
                    }

                    .form-control:not(:placeholder-shown)+span,
                    .form-control:focus+span {
                        display: none;
                    }
                    </style>
                    <div class="form-input w-100 d-none d-sm-flex position-relative">
                        <input type="text" id="name" name="word" class="form-control border-none w-100" placeholder=" ">
                        <span class="position-absolute"
                            style="left: 1rem; top: 50%; transform: translateY(-50%); user-select: none; pointer-events: none;">Search</span>
                        <button class="btn btn-light position-absolute rounded-end" name="btn"
                            style="right: 0; border-radius: 0;">
                            <i class="fa-solid fa-magnifying-glass mx-2" style="color: var(--primary-color)"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="cs-hover btn-icon-list ms-10 d-md-none p-1">
                <style>
                .btn-icon-list {
                    z-index: 10000;
                    margin: 1rem;
                    /* border-radius: .5rem; */
                }

                .btn-icon-list>div {
                    margin: .1rem 0;
                    height: .3rem;
                    width: 1.5rem;
                    border-radius: .2rem;
                }
                </style>
                <div class="bg-light"></div>
                <div class="bg-light"></div>
                <div class="bg-light"></div>
            </div>
        </div>
    </header>
    <nav class="nav-menu position-absolute overflow-hidden" style="z-index: 1000;">
        <script>
        const btnList = document.querySelector('.btn-icon-list')
        const navMenu = document.querySelector('.nav-menu')
        btnList.addEventListener('click', () => {
            navMenu.classList.toggle('active')
        })
        </script>
        <style>
        nav {
            top: 0;
            right: 0;
            width: 0%;
            background-color: var(--primary-color);
            min-height: calc(100vh - 5rem);
            transition: all .5s ease;
            z-index: 3;
            margin-top: 5rem;
            scroll-behavior: none;
        }

        nav.active {
            width: 100%;
        }
        </style>
        <ul class="text-center">
            <li class="p-3" style="font-size: 1.5rem;">
                <a href="index.php?page=words" class="text-nowrap bold">TẤT CẢ TỪ VỰNG</a>
            </li>
            <li class="p-3" style="font-size: 1.5rem;">
                <a href="index.php?page=topics" class="text-nowrap bold">TẤT CẢ CHỦ ĐỀ</a>
            </li>
        </ul>
    </nav>