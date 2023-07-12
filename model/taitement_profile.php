<?php 
session_start();
include "db.php";
$idu= $_SESSION["utilisateur"]["id"];
	$sql= "SELECT * FROM users where id= $idu";
	$req=mysqli_query($conn,$sql);
	$row= mysqli_fetch_assoc($req);
    $ids=$_GET['id'];

    if (isset($_POST['submit'])) {
       
        $username= $_POST['username'];
        $email= $_POST['email'];
        $modp=$_POST['modp'];
        $secure=hash_hmac("sha256", $modp, "cle");
        $mdp_secure=password_hash($secure,PASSWORD_DEFAULT);
        if (!empty($username) and !empty($email) and !empty($modp)) {
          $req2="UPDATE `users` SET `username`='$username',`password`='$mdp_secure',`email`='$email',`date_aniv`=current_timestamp(),`created_at`=current_timestamp() WHERE id=$idu";
          $resp1=mysqli_query($conn,$req2);
          if ($resp1) {
           header('location: ../view/profiles_utilisateur.php');
          
          }else{
            echo "pas de modification";
          }
          
        }else{
            echo "erreure de modification";
        }

    }
     






?>

<link rel="shortcut icon" href="../images/apple.jpg" type="image/jpg">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="./traitement_profile.css">
<!------ Include the above in your HEAD tag ---------->

<!--

Copy this code in your html file.

-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
</head>
<body>
    <div class="container">
       <div class="Back">
        <a href="../view/profiles_utilisateur.php">
            <i class="fa fa-arrow-left" onclick="Back()"></i>
            </a>
        </div>
        <p class="h2 text-center">modifiers profile</p>
        <form action="taitement_Profile.php" method="post">
            <div class="preview text-center">
                <img class="preview-img" src="http://simpleicon.com/wp-content/uploads/account.png" alt="Preview Image" width="200" height="200"/>
                <div class="browse-button">
                    <i class="fa fa-pencil-alt"></i>
                    <input class="browse-input" type="file"  name="UploadedFile" id="UploadedFile"/>
                </div>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Full Name:</label>
                <input class="form-control" type="text"  value ="<?php echo $row['username']; ?>" name="username" required >
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="email" value ="<?php echo $row['email']; ?>" name="email" required >
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input class="form-control" type="password"  value ="<?php echo $row['password']; ?>" name="modp" required>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Gender:</label><br/>
                <label><input type="radio" name="gender" required value="Male" checked /> Male</label>
                <label><input type="radio" name="gender" required value="Female" /> Female</label>
                <label><input type="radio" name="gender" required value="Other" /> Other</label>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>

    <footer class="bg-dark text-light fixed-bottom" style="width: 100%; height: 5%;">
	
			
			
		
			<div class="row">
				<div class="col">
					<p class="copyright text-center">
						&copy;Mon site tout droit reserver
					</p>
				</div>
			</div>
			
		
	</footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

