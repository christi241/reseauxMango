<?php 
session_start();
include "../model/db.php";

$id=$_SESSION['utilisateur']['id'];
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
									<li class="about-items"><i class="mdi mdi-account icon-sm "></i><span class="about-item-name">Name:</span><span class="about-item-detail"><?php echo $row['username'];?></span><a href="../model/taitement_profile.php?id=<?php echo $row['id'] ?>" name="modifier" class="about-item-edit">Edit</a></li>
									<li class="about-items"><i class="mdi mdi-mail-ru icon-sm "></i><span class="about-item-name">username:</span><span class="about-item-detail"><?php echo $row['email'];?></span> <a href="../model/taitement_profile.php?id=<?php echo $row['id'] ?>" name="modifier" class="about-item-edit">Edit</a></li>
									<li class="about-items"><i class="mdi mdi-lock-outline icon-sm "></i><span class="about-item-name">Password:</span><span class="about-item-detail">**********</span> <a href="../model/taitement_profile.php?id=<?php echo $row['id'] ?>" name="modifier" class="about-item-edit">Edit</a></li>
									<li class="about-items"><i class="mdi mdi-format-align-left icon-sm "></i><span class="about-item-name">Bio:</span><span class="about-item-detail">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto totam, nemo quidem delectus dolores vero porro inventore perferendis minus perspiciatis.</span> <a href="" class="about-item-edit">Edit</a></li>

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
									<li class="about-items"><i class="mdi mdi-phone icon-sm "></i><span class="about-item-name">Phone:</span><span class="about-item-detail">+9779861106179</span><a href="../model/taitement_profile.php?id=<?php echo $row['id'] ?>"  name="modifier"class="about-item-edit">Edit</a></li>
									<li class="about-items"><i class="mdi mdi-map-marker icon-sm "></i><span class="about-item-name">Address:</span><span class="about-item-detail">254 National Highway , Hisar India</span> <a href="../model/taitement_profile.php?id=<?php echo $row['id'] ?>" name="modifier" class="about-item-edit">Edit</a></li>
									<li class="about-items"><i class="mdi mdi-email-outline icon-sm "></i><span class="about-item-name">Email:</span><span class="about-item-detail"><a href=""><?php echo $row['email'];?></a></span> <a href="../model/taitement_profile.php?id=<?php echo $row['id'] ?>" name="modifier" class="about-item-edit">Edit</a></li>
									<li class="about-items"><i class="mdi mdi-web icon-sm "></i><span class="about-item-name">Site:</span><span class="about-item-detail"><a href="google.com">www.google.com</a></span> <a href="../model/taitement_profile.php?id=<?php echo $row['id'] ?>" name="modifier" class="about-item-edit">Edit</a></li>
								</ul>
								<p class="card-description">Basic Information</p>
								<ul class="about">
									<li class="about-items"><i class="mdi mdi-cake icon-sm "></i><span class="about-item-name">Birthday:</span><span class="about-item-detail">Aug 3 , 1998</span><a href="../model/taitement_profile.php?id=<?php echo $row['id'] ?>" name="modifier" class="about-item-edit">Edit</a></li>
									<li class="about-items"><i class="mdi mdi-account icon-sm "></i><span class="about-item-name">Gender:</span><span class="about-item-detail">Male</span> <a href="../model/taitement_profile.php?id=<?php echo $row['id'] ?>" name="modifier" class="about-item-edit">Edit</a></li>
									<li class="about-items"><i class="mdi mdi-clipboard-account icon-sm "></i><span class="about-item-name">Profession:</span><span class="about-item-detail">Student</span> <a href="../model/taitement_profile.php?id=<?php echo $row['id'] ?>"name="modifier" class="about-item-edit">Edit</a></li>
									<li class="about-items"><i class="mdi mdi-water icon-sm "></i><span class="about-item-name">Blood Group:</span><span class="about-item-detail">AB+</span> <a href="../model/taitement_profile.php?id=<?php echo $row['id'] ?>" class="about-item-edit" name="modifier">Edit</a></li>
									<li class="about-items"><i class="mdi mdi-human-male-female icon-sm "></i><span class="about-item-name">Relationship Status:</span><span class="about-item-detail">Single</span> <a href="" class="about-item-edit">Edit</a></li>
								</ul>

                </form>
							</div>
						</div>
					</div>

				</div>




			</div>
		</div>




    <div class="container">
    <h1 class="text-center" >tous mes posts</h1>
        
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger align-center" data-toggle="modal" data-target="#myModal">
  poster ici
</button>

<!-- Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- En-tête du modal -->
      <div class="modal-header">
        <h4 class="modal-title">Tous se qui vous plait</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Contenu du modal -->
      <div class="modal-body">
      <div class="card gedf-card">
                <div class="card-body">
                    <h1 class="text-center">faite des poste </h1>
                <form  method="post" action="./profiles_utilisateur.php" enctype="multipart/form-data">
                    <div class="nb-3">
                        <label for="prix" class="form-label">commentaire</label>
                        <input type="text" class="form-control"  name="media" >
                    </div>
                    <div class="nb-3">
                        <label for="img" class="form-label">image</label>
                        <input type="file" class="form-control-file"  name="img" >
                    </div>
                    <br>
                    <div class="user-box">
                    </div>
                <br>
                <div class="nb-3">
                    <button type="submit" class="btn btn-success mb-3" name="submit">Confirm</button>
                    <button type="button" class="btn btn-danger mb-3" name="annulez" data-dismiss="modal">annulez</button>
                </div>
        </form>
                    </div>
                    
                </div>
      </div>

      <!-- Pied du modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>

    </div>
  </div>
</div>


    <div class=" row ">
		
                <?php
                  $rec="SELECT Likes.*, Comments.*
                  FROM Likes l
                  JOIN Comments c ON l.user_id = c.user_id
                  WHERE l.user_id = '$id'";
                  $result1=mysqli_query($conn,$req);

                $req="SELECT u.*, p.*
                FROM users u
                JOIN posts p ON u.id = p.user_id and u.id = $id order by p.id DESC
                 ";
                $result=mysqli_query($conn,$req);
                while ($row= mysqli_fetch_assoc($result) or $row2= mysqli_fetch_assoc($result1)) {


                ?>
                <!-- ITEM -->
                <form  method="post" action="#" enctype="multipart/form-data" style="margin: 18px">
                <div class="card my-3  ">
                            <div class="card-header bg-white border-0 py-2 ">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <a href="#">
                                            <img class="rounded-circle" src="https://picsum.photos/80/80/?random?image=1" width="45" alt="" />
                                        </a>
                                        <div class="ml-3">
                                            <div class="h6 m-0 ">
                                                <a href="#"></a> <?php echo $row['username']?> <a href="#"><?php echo $_SESSION["email"]?></a>
                                            </div>
                                            <div class="text-muted h8">Hace 5 miin <i class="fa fa-globe" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="card-body pt-0 pb-2"><?php echo $row['media']."<br>". $row2['c.content'];  
                            
                            ?>
                              
                            </div>
                            <div class="ratio ratio-16x9">
                            <img  class="card-img-top "  src="<?php echo "../images/".$row['text'] ?>" style="width :250px; height:200px; " >
                            </div>
                            <div class="card-footer bg-white border-0 p-0">
                                <div class="d-flex justify-content-between align-items-center py-2 mx-3 border-bottom">
                                    <div>
                                      <p>
                                        
                                        <?php
                                        

                                        ?>
                                      </p>

                                    </div>
                                    <div class="h7"> 3279 <a href="#"></a> 44845 veces <a href="#">compartido</a></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center my-1">
                                    <div class="col">
                                      
                        
                                    <a class="btn icon-btn btn-danger like-btn" id="likeButton" href="../model/jaime_et_coment.php?id=<?php echo $row['id']; ?>"  name="like">
  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
  <span class="glyphicon btn-glyphicon glyphicon-thumbs-up img-circle text-primary"></span>
  Like
</a>
                                    <a class="btn icon-btn btn-primary" href="#?id=<?php echo $row['user_id']; ?>" > <i class="fa fa-mail-forward"></i><span class="glyphicon btn-glyphicon glyphicon-share img-circle text-info"></span>Share</a>
                                       
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        </form>
                        
                        <?php  } ?>
                </div>
                </div>
                <br>
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


  <script defer>
  const likeButton = document.querySelector('#likeButton');

  likeButton.addEventListener('click', function() {
    this.classList.add('liked');
  });
</script>