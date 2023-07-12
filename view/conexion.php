<?php 
session_start();
include "../model/db.php";
if (isset($_POST['envoyer'])) {	
	
	if(!empty($_POST['email']) and !empty($_POST['motp'])){
	$email=$_POST['email'];
	$motp=$_POST['motp'];
	$mdp_secure= hash_hmac("sha256", $motp, "cle");
	
	$sql= "SELECT * FROM users";
	$req=mysqli_query($conn,$sql);
	$row= mysqli_fetch_assoc($req);
	
	while ($row= mysqli_fetch_assoc($req)) {
		if (password_verify($mdp_secure, $row['password'])) {
		
			if ($row['email'] == $email ) {
			 $_SESSION['utilisateur'] = ["email"=>$_POST['email'],"id"=>$row['id'],"nom"=>$Row['username']];
			
				 
					$nomUtilisateur = $row['username'];
					$dateConnexion = date('Y-m-d H:i:s');
					
					// Format de la ligne de journal
					$logLine = "$nomUtilisateur,$dateConnexion\n";
					
					// Chemin du fichier de journal
					$cheminFichier = "../includes/journal.txt";
					
					// Enregistrement de la ligne de journal dans le fichier
					file_put_contents($cheminFichier, $logLine, FILE_APPEND);
	
					header('location: ../index.php');
			}else{
				$message="email ou mot de passe incorrect";
			}
		}
	}
	}

}


echo $message;
 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../images/apple.jpg" type="image/jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style1.css">
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<title></title>
</head>
<body>
	<div class="login-box">
  <h2>connexion</h2> 
  <form action="./conexion.php" method="POST">
   
	<div class="user-box">
      <input type="text" name="email"  >
      <label>e-mail</label>
    </div>
    <div class="user-box">
      <input type="password" name="motp" >
      <label>mot de passe</label>
    </div>
    <input type="submit" class="btn btn-success" name="envoyer">
  </form>
</div>
</body>
</html>