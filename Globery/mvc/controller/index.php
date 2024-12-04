<?php
//connect database
session_start();
include './mvc/model/connectdb.php';
include './mvc/model/getData.php';
$getData = new GetData();

if (isset($_SESSION['user_name'])) {
   $user = $_SESSION['user_name'];
}

// show header
$actived = '';
if (!isset($_GET['page'])) {
   $actived = 'home';
   require_once './mvc/view/block/header.php';
} else if ($_GET['page'] == 'login') {
   include './mvc/view/login.php';
   $actived = 'login';
} else if ($_GET['page'] == 'register') {
   include './mvc/model/register.php';
   include './mvc/view/register.php';
   $actived = 'register';
} else {
   $actived = $_GET['page'];
   require_once './mvc/view/block/header.php';
}

// ---- //show contents 
if (!isset($_GET['page'])) {
   $getHotel = $getData->getHotel();
   $getRoom = $getData->getRoom();
   include './mvc/view/index.php';
   $actived = 'Home';
} else {
   switch ($_GET['page']) {
      case 'cart':
         $actived = 'Cart';
         
         include './mvc/view/cart.php';
         break;
      case 'login':
         $actived = 'login';
         break;
      case 'register':
         $actived = 'register';
         break;

      case 'cartdetails':
         $actived = 'cartdetails';
         include './mvc/view/cartdetails.php';
         break;
      case 'checkout':
         if(isset($_GET['room'])){
            $getRoomHotel = $getData->getRoomHotel($_GET['room']);
         }
         $actived = 'checkout';
         include './mvc/view/checkout.php';
         break;

      case 'roomdetails':
         
         if(isset($_GET['room'])){
            $getRoomHotel = $getData->getRoomHotel($_GET['room']);
         }
         $actived = 'roomdetails';
         include './mvc/view/roomdetails.php';
         break;
      case 'hoteldetails':
         if(isset($_GET['hotel'])){
            $getRoomHotel = $getData->getHotelRoom($_GET['hotel']);
         }
         $actived = 'hoteldetails';
         include './mvc/view/hoteldetails.php';
         break;

      default:
         echo 'Error';
         break;
   }
}
//show footer
include './mvc/view/block/footer.php';