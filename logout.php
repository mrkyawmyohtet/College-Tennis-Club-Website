<?php
   session_start();
   if(isset($_SESSION["sess_user"])){
       session_destroy();
       header('location: ../UserSide/home.php');
   }
   else{
       header('location: ../AdminSide/admin.php');
   }
?>