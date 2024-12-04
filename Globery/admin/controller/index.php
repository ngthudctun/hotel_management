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
} else {
   // show header
   $actived = 'Dashboard';
   include './view/block/header.php';
   // ---- //show contents 
   if (!isset($_GET['page'])) {
      $actived = 'dashboard';
      $_GET['page'] = 'dashboard';
   } else {
      switch ($_GET['page']) {
         case 'dashboard':
            $actived = 'dashboard';
            $countHotel = $admin_db->count("hotel");
            $countRoom = $admin_db->count("room");
            $countCustomer = $admin_db->count("customer");
            include './view/dashboard.php';
            break;
         case 'hotel':
            $actived = 'hotel';
            include './view/hotel.php';
            break;
         case 'orders':
            $actived = 'orders';
            include './view/orders.php';
            break;
         case 'room':
            $actived = 'room';
            include './view/room.php';
            break;
         case 'users':
            $actived = 'users';
            $customer = $admin_db->getCustomer();
            include './view/users.php';
            break;
         case 'banner':
            $actived = 'banner';
            include './view/banner.php';
            break;
         default:
            echo 'Error';
            break;
      }
   }
   include './view/block/footer.php';
}
