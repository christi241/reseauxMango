<?php
session_start();
include "db.php";
$idu= $_SESSION["utilisateur"]["id"];

$idp=$_GET['id'];

    
$resq="INSERT INTO `likes` ( `user_id`, `post_id`,  `created_at`) VALUES ('$idu', '$idp', current_timestamp())";
$requet4 = mysqli_query($conn,$resq);
   if($requet4){
      $_SESSION['like'] = true;
              header('location: ../view/profiles_utilisateur.php');
            
            
  }else {
   echo "<h1>likes non introduit</h1>";
   }

















?>