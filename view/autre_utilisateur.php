<?php 
session_start();
include "../model/db.php";

$id=$_GET['id'];
$query = "SELECT * FROM users WHERE id = $id ";
$ID=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($ID);

if (isset($_POST['submit'])) {  
  $media= $_POST['media'];
  $img=$_FILES['img']['name'];
  $dist="../images".$img;
  move_uploaded_file($_FILES['img']['tmp_name'],$dist);

$bon="INSERT INTO `posts` ( `user_id`, `media`, `text`, `created_at`) VALUES ('$id', '$media', '$img', current_timestamp())";
$requet4 = mysqli_query($conn,$bon);
   if($requet4){
              header('location: profiles_utilisateur.php');
            
  }else {
   echo "pots pas introduit";
   }
      
  


}




?>


<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
       
        <link rel="shortcut icon" href="../images/apple.jpg" type="image/jpg">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="style_pro.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.4.95/css/materialdesignicons.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../style.css">


<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark fixed-top" >
  <a class="navbar-brand" href="#">resauxMANGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">
          <i class="fa fa-home"></i>
          Home
          <span class="sr-only">(current)</span>
          </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-envelope-o">
            <span class="badge badge-primary">13</span>
          </i>
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ">
        <?php if (!$_SESSION["utilisateur"]) {
            
        ?>
      <li class="nav-item">
        <a class="nav-link" href="./conexion.php">
          <i class="fa fa-user">
            
          </i>
          connexion
        </a>
      </li>
      <?php }else{?>
        <li class="nav-item">
        <a class="nav-link" href="./deconnexion.php">
          <i class="fa fa-power-off">
            
          </i>
          deconnexion
        </a>
      </li>
      <?php }?>

      <li class="nav-item">
        <a class="nav-link" href="./inscription.php">
          <i class="fa fa-globe">
            
          </i>
          inscription
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./profiles_utilisateur.php">
          <i class="fa fa-user">
            <span class="badge badge-success">52</span>
          </i>
          mon compte
        </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<br>
<br>
<br>



<div class="d-flex justify-content-center rounded">
			<div class="image_outer_container">
				<div class="green_icon"></div>
				<div class="image_inner_container">
					<img src="https://picsum.photos/320/250/?random?image=1">
				</div>
			</div>
		</div>
	</div>

		<!-- partial -->
		<div class="main-panel">
			<div class="container">


				<div class="row">
					<div class="col-md-4 grid-margin stretch-card">
						<div class="card">
							<div class="profile-card">

								<div class="profile-header">

									<div class="cover-image">
										<img src="https://cdn.pixabay.com/photo/2019/10/19/14/16/away-4561518_960_720.jpg" class="img img-fluid">
									</div>
									<div class="user-image">
										<img src="../images/apple.jpg" class="img ">
									</div>
								</div>

								<div class="profile-content">
									<div class="profile-name"></div>
									<div class="profile-designation">Webdeveloper</div>
									<p class="profile-description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
									<ul class="profile-info-list">
										<a href="" class="profile-info-list-item"><i class="mdi mdi-eye"></i>Timeline</a>
										<a href="" class="profile-info-list-item"><i class="mdi mdi-bookmark-check"></i>Saved</a>
										<a href="" class="profile-info-list-item"><i class="mdi mdi-movie"></i>Medias</a>
										<a href="" class="profile-info-list-item"><i class="mdi mdi-account"></i>About</a>

									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-8 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<p class="card-title font-weight-bold">About</p>
								<hr>
								<p class="card-description">User Information</p>
                <form action="profiles_utilisateur.php">
								<ul class="about">
									<li class="about-items"><i class="mdi mdi-account icon-sm "></i><span class="about-item-name">Name:</span><span class="about-item-detail"><?php echo $row['username'];?></span></li>
									<li class="about-items"><i class="mdi mdi-mail-ru icon-sm "></i><span class="about-item-name">username:</span><span class="about-item-detail"><?php echo $row['email'];?></span> </li>
									<li class="about-items"><i class="mdi mdi-lock-outline icon-sm "></i><span class="about-item-name">Password:</span><span class="about-item-detail">**********</span> </li>
									<li class="about-items"><i class="mdi mdi-format-align-left icon-sm "></i><span class="about-item-name">Bio:</span><span class="about-item-detail">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto totam, nemo quidem delectus dolores vero porro inventore perferendis minus perspiciatis.</span> </li>

                       <li class="about-items"><i class="mdi mdi-trophy-variant-outline icon-sm "></i><span class="about-item-name">Badges:</span><span class="about-item-detail">
                       <button type="button" class="btn btn-success btn-rounded btn-icon">
                        <i class="mdi mdi-star text-white"></i>
                      </button>  
                        <button type="button" class="btn btn-info btn-rounded btn-icon">
                        <i class="mdi mdi-check text-white"></i>
                      </button>
                       <button type="button" class="btn btn-danger btn-rounded btn-icon">
                        <i class="mdi mdi-check text-white"></i>
                      </button>
                      </span> <a href="" class="about-item-edit">View</a></li>

								</ul>
								<p class="card-description">Contact Information</p>
								<ul class="about">
									<li class="about-items"><i class="mdi mdi-phone icon-sm "></i><span class="about-item-name">Phone:</span><span class="about-item-detail">+9779861106179</span></li>
									<li class="about-items"><i class="mdi mdi-map-marker icon-sm "></i><span class="about-item-name">Address:</span><span class="about-item-detail">254 National Highway , Hisar India</span> </li>
									<li class="about-items"><i class="mdi mdi-email-outline icon-sm "></i><span class="about-item-name">Email:</span><span class="about-item-detail"></span> </li>
									<li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Site:</span><span class="about-item-detail"><a href="google.com">www.google.com</a></span></li>
								</ul>
								<p class="card-description">Basic Information</p>
								<ul class="about">
									<li class="about-items"><i class="mdi mdi-cake icon-sm "></i><span class="about-item-name">Birthday:</span><span class="about-item-detail">Aug 3 , 1998</span></li>
									<li class="about-items"><i class="mdi mdi-account icon-sm "></i><span class="about-item-name">Gender:</span><span class="about-item-detail">Male</span></li>
									<li class="about-items"><i class="mdi mdi-clipboard-account icon-sm "></i><span class="about-item-name">Profession:</span><span class="about-item-detail">Student</span></li>
									<li class="about-items"><i class="mdi mdi-water icon-sm "></i><span class="about-item-name">Blood Group:</span><span class="about-item-detail">AB+</span> Edit</a></li>
									<li class="about-items"><i class="mdi mdi-human-male-female icon-sm "></i><span class="about-item-name">Relationship Status:</span><span class="about-item-detail">Single</span> </li>
								</ul>

                </form>
							</div>
						</div>
					</div>

				</div>




			</div>
		</div>
<br>
<br>
<br>

    
<footer class="bg-dark text-light fixed-bottom" style="width: 100%; height: 5%;">
	
			
			
		
  <div class="row">
    <div class="col">
      <p class="copyright text-center">
        &copy;Mon site tout droit reserver
      </p>
    </div>
  </div>
  

</footer>