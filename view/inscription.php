<?php
session_start();
include "../model/db.php";


if (isset($_POST['ajouter'])) {

  $email=$_POST['email'];
  $nom=$_POST['nom'];
  $date_danniv=$_POST['date'];
  $motp=$_POST['motp'];
  $secure=hash_hmac("sha256", $motp, "cle");
    $mdp_secure=password_hash($secure,PASSWORD_DEFAULT);


    if(!empty($nom) and !empty($email) and !empty($date_danniv) and !empty($motp)){
      $sql2= "INSERT INTO `users` ( `username`, `password`, `email`, `date_aniv`, `created_at`) VALUES ('$nom', '$mdp_secure', '$email', '$date_danniv', current_timestamp())";
      $resultat = mysqli_query($conn,$sql2);
      if ($resultat) {

             $_SESSION['utilisateur'] = ["email"=>$_POST['mail'] , "nom" =>$_POST['nom'], "pasword"=>$_POST['motp']];
             

            $id_u="SELECT id FROM users where email==$email";
            $R = mysqli_query($conn,$id_u);
            
            if ($ligne=mysqli_fetch_assoc($R)) {
                $idU=$ligne['id'];
                echo $idu;
                $_SESSION['utilisateur']= ["id"=>$idu];
            }

            $dataLine = "$nomUtilisateur,$email\n"; // Modifiez le format selon vos besoins

            // Chemin du fichier d'enregistrement des utilisateurs
            $cheminFichier = '../includes/tous_inscrit.txt'; // Modifiez le chemin selon vos besoins

            // Enregistrer les données d'inscription dans le fichier
            file_put_contents($cheminFichier, $dataLine, FILE_APPEND);      
          header('location:../index.php');


      }else{

      echo "pas d'ajout du users";

      }

    }
  }
    







?>






<link rel="shortcut icon" href="../images/apple.jpg" type="image/jpg">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



    
                                    
                              
                                


                               
    
    <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style1.css">
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
	<title></title>
</head>
<body>
	<div class="login-box">
  <div class="Back">
        
  <h2>inscription</h2> 
  <form action="./inscription.php" method="POST">
   
	<div class="user-box">
        <input type="text" name="nom" >
        <label > Nom</label>
    </div>
    <div class="user-box">
        <input type="text"  name="email" >
        <label >Email</label>
    </div>
    <div class="user-box">
        <input type="date"  name="date">
        <label  >date d'anniv</label>
    </div>
    <div class="user-box">
        <input type="password"  name="motp" >
        <label >Password</label>
    </div>
    <input type="submit" class="btn btn-success" name="ajouter">
  </form>
</div>
</body>
</html>