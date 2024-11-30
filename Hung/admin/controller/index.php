<?php
//connect database

include './model/connectdb.php';
include './controller/vocabulary_db.php';

//kiem tra dang nhap
session_start();
if (isset($_SESSION['admin_id'])) {
   $admin_id = $_SESSION['admin_id'];
}

if (!isset($admin_id)) {
   header('location: ./controller/admin_login.php');
} else {
   // show header
   $actived = '';
   if (!isset($_GET['page'])) {
      $actived = 'add_topic';
      include './view/admin_header.php';
   } else {
      $actived = $_GET['page'];
      include './view/admin_header.php';
   }
   // ---- //show contents 
   if (!isset($_GET['page'])) {
      $actived = 'add_topic';
      include './view/add_topic.php';
   } else {
      switch ($_GET['page']) {
         case 'add_topic':
            $actived = 'add_topic';
            include './view/add_topic.php';
            break;
         case 'add_vocabulary':
            $actived = 'add_vocabulary';
            include './view/add_vocabulary.php';
            break;
         case 'add_sentences':
            $actived = 'add_sentences';
            include './view/add_sentences.php';
            break;
         default:
            echo 'Error';
            break;
      }
   }

   if (isset($_GET['result'])) {
      include './view/block/result.php';
   }

   //show footer
   include './view/block/footer.php';
}
