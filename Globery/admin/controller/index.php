<?php
//connect database

include './model/connectdb.php';
include './model/admin_db.php';
$admin_db = new Admin();

//kiem tra dang nhap
session_start();

if (isset($_SESSION['admin_id'])) {
   $admin_id = $_SESSION['admin_id'];
}

if (!isset($admin_id)) {
   header('location: ./controller/admin_login.php');
}elseif(isset($_GET['page']) && $_GET['page']== 'changepass'){
   header('location: ./controller/changepass.php');
}else {
   // show header
   $actived = $_GET['page'] ?? '';
   include './view/block/header.php';
   // ---- //show contents 
   if (!isset($_GET['page'])) {
      $countHotel = $admin_db->count("hotel");
      $countRoom = $admin_db->count("room");
      $countCustomer = $admin_db->count("customer");
      include './view/dashboard.php';
   } else {
      switch ($_GET['page']) {
         case 'dashboard':
            include './view/dashboard.php';
            break;
         case 'hotel':
            include './view/hotel.php';
            break;
         case 'orders':
            include './view/orders.php';
            break;
         case 'room':
            include './view/room.php';
            break;
         case 'users':
            $customer = $admin_db->getCustomer();
            include './view/users.php';
            break;
         case 'banner_display':
            include './view/banner_display.php';
            break;
         default:
            echo 'Error';
            break;
      }
   }
   include './view/block/footer.php';
}
