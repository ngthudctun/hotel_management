<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ielts</title>
  <link rel="stylesheet" href="./mvc/view/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./mvc/view/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    :root {
      --primary-color: #003cff;
    }

    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-thumb {
      background: var(--primary-color);
      border-radius: 10px;
    }

    .bold {
      font-weight: bold;
    }

    hr {
      margin: 0;
    }

    ul {
      margin: 0;
      padding: 0;
    }

    li {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    a {
      text-decoration: none;
      color: var(--text-color);
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
    }

    .blur {
      position: absolute;
      align-self: start;
      box-shadow: 0 0 1000px 50px #3300ff;
      z-index: -100;
    }

    .blur-right {
      position: absolute;
      right: 10rem;
      background-color: #003cff;
      box-shadow: 0 0 1000px 50px #3300ff;
      z-index: -100;
    }

    .cs-hover {
      cursor: pointer;
    }

    ::selection {
      background-color: var(--primary-color);
      color: white;
    }

    header {
      width: 100%;
      background-color: var(--primary-color);
    }

    .form-input,
    .form-input:focus {
      border: none;
      width: 100%;
      height: 100%;
      background-color: transparent;
      outline: none;
    }

    .form-select,
    .form-select:valid:focus {
      background-color: transparent;
      border: none;
      box-shadow: none;
      padding: 0;
    }
  </style>
</head>

<body data-bs-theme="dark" class="position-relative">
<div class="preloader"><div class="loader"></div><div class="loader loader2"></div></div>
  <header class="container-flude d-flex justify-content-center align-items-center">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="logo w-25">
        <div class="no-select"
          style="background-color: #fff; width: 3rem; height: 3rem; display: flex; justify-content: center; align-items: center; color: #000; margin: .5rem; border-radius: 1rem; padding: 2rem">
          <div style="background-color: #fff; position: absolute; width: 1.7rem; height: .7rem; z-index: 1;"></div>
          <span
            style="font-weight: bolder; z-index: 2; font-size: 1.5rem; color: var(--primary-color); text-shadow: 1px 1px 2px #fff, 0 0 1em #fff, 0 0 0.2em #fff, 3px 1px 2px #fff, -2.6px 1px 2px #fff;">ℋ</span>
          <span style="font-size: 3rem; position: absolute; margin-bottom: 4px; color: var(--primary-color)">Ꮿ</span>
          <style>
            .no-select {
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
            }
          </style>
        </div>
      </div>
      <div class="nav d-none d-md-flex justify-content-center ">
      <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-light rounded-5 shadow-sm d-flex" id="pillNav2" role="tablist"
          style="--bs-nav-link-color: var(--primary-color); --bs-nav-pills-link-active-color: var(--bs-light); --bs-nav-pills-link-active-bg: var(--primary-color);">
          <li class="nav-item" role="presentation">
          <a href="index.php?page=add_topic">  
          <button class="nav-link <?php if ($actived == 'add_topic') echo("active disabled"); ?> bold rounded-5" data-bs-toggle="tab" type="button" role="tab"
              aria-selected="true">THÊM CHỦ ĐỀ</button></a>
          </li>
          <li class="nav-item" role="presentation">
            <a href="index.php?page=add_vocabulary">
              <button class="nav-link <?php if ($actived == 'add_vocabulary') echo("active disabled"); ?> bold rounded-5" data-bs-toggle="tab" type="button" role="tab"
              aria-selected="false">THÊM TỪ VỰNG</button></a>
          </li>
        </ul>
      </div>
      <div class="user w-25 d-flex justify-content-end">
        <div class="dropdown">
          <button class="btn btn-light rounded-4 p-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-regular fa-circle-user" style="color: var(--primary-color); font-size: 1.8rem;"></i>
          </button>
          <ul class="dropdown-menu shadow" style="background-color: var(--primary-color);">
            <li><button class="dropdown-item text-white bold" type="button">Thêm Admin</button></li>
            <li><button class="dropdown-item text-white bold" type="button">Đăng Xuất</button></li>
          </ul>
        </div>
      </div>
    </div>
  </header>