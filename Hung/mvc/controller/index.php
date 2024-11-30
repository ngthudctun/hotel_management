<?php
//connect database

include './mvc/model/connectdb.php';
include './mvc/controller/vocabulary_db.php';

// show header
$actived = '';
if (!isset($_GET['page'])) {
   $actived = 'Home';
   include './mvc/view/block/header.php';
} else {
   $actived = $_GET['page'];
   include './mvc/view/block/header.php';
}

// ---- //show contents 
if (!isset($_GET['page'])) {
   include './mvc/view/index.php';
   $actived = 'Home';
} else {
   switch ($_GET['page']) {
      case 'login':
         include './mvc/view/login.php';
         $actived = 'Login';
         break;
      case 'register':
         $actived = 'register';
         include './mvc/view/register.php';
         break;
      case 'cart':
         $actived = 'Cart';
         include './mvc/view/cart.php';
         break;

      case 'test':
         include './mvc/view/test.php';
         break;

      case 'sentences':
         include './mvc/view/sentences.php';
         break;

      case 'tiktok':
         include './mvc/view/tiktok.php';
         break;

      default:
         echo 'Error';
         break;
   }
}

if (isset($_GET['result'])) {
   include './mvc/view/block/result.php';
}

//show footer
include './mvc/view/block/footer.php';
