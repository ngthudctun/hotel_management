<?php
//Show Header 
include './views/header.php';

//Database
include './models/connectdb.php';

//Show Content
if (!isset($_GET['page'])) {
    include './controller/product.php'; 
    include './view/products.php';
 } else {
    switch ($_GET['page']) {
       case 'about':
          break;
       case 'contact':
          break;    
       default:
          echo 'trang không tòn tại';
          break;
    }
 }

//Show Footer
include './view/footer.php';