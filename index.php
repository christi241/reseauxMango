<?php
session_start();
include "./model/db.php";
$idu = $_SESSION["utilisateur"]["id"];




if (isset($_POST['submit'])) {
    $media = $_POST['media'];
    $img = $_FILES['img']['name'];
    $dist = "images/" . $img;
    move_uploaded_file($_FILES['img']['tmp_name'], $dist);

    $bon = "INSERT INTO `posts` ( `user_id`, `media`, `text`, `created_at`) VALUES ('$idu', '$media', '$img', current_timestamp())";
    $requet4 = mysqli_query($conn, $bon);
    if ($requet4) {
    //header('location: index.php');

    } else {
        echo "pas pas introduit";
    }




}


?>


<?php
if (isset($_POST['comment'])) {
  
  $idc=$_GET['id2'];
$message=$_POST["message"];

if (!empty($message)) {
  

  $resq="INSERT INTO `comments` ( `user_id`, `post_id`,`content`,  `created_at`) VALUES ('$idu', '$idc','$message', current_timestamp())";
  $requet4 = mysqli_query($conn,$resq);
  if($requet4){
    // header('location: ../index.php');
     echo "<h1>commentaires  bien introduit</h1>";
   
}
}else {
  echo "<h1>commentaires  non introduit</h1>";
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

    <link rel="shortcut icon" href="./images/apple.jpg" type="image/jpg">

<link rel="stylesheet" href="index.css">
<script src="./controller/style.js"></script>






<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">resauxMANGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./index.php">
                    <i class="fa fa-home"></i>
                    Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
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
                    <a class="nav-link" href="./view/conexion.php">
                        <i class="fa fa-user">

                        </i>
                        connexion
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./view/inscription.php">
                    <i class="fa fa-globe">

                    </i>
                    inscription
                </a>
            </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="./view/deconnexion.php">
                        <i class="fa fa-power-off">

                        </i>
                        deconnexion
                    </a>
                </li>
            <li class="nav-item">
                <a class="nav-link" href="./view/profiles_utilisateur.php">
                    <i class="fa fa-user">
                        <span class="badge badge-success">52</span>
                    </i>
                    mon compte
                </a>
            </li>
            <?php }?>
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
<br>
<br>
<br>



<div class="container-fluid gedf-wrapper fixed-right ">
    <div class="row">
        <div class="col-md-3 " style="">
            <div class="card">
                <div class="card-body">
                    <div class="h5">tous les utilisateurs</div>
                    <div class="h7 text-muted">faites votre choix</div>
                    <div class="h7">
                    <br>
                    <br>
                    <?php
                    $req2= "SELECT * FROM users";
                     $resp1=mysqli_query($conn,$req2);
                   while( $row3= mysqli_fetch_assoc($resp1)  ){

                   

                    
                    
                    
                    ?>
                    <div class="container-fluid">
                    
                    <a href="./view/autre_utilisateur.php?id=<?php echo $row3['id'] ?>" class="about-item-edit" name="modifier"><img src="https://picsum.photos/80/80/?random?image=1" style="width: 45px; height : 50px;" class="card-img-top rounded-circle" alt="<?php echo $row3['username']; ?>">
                        <?php  echo $row3['email'];?></a>
                        <div class=" bg-success border border-light rounded-circle" style="width: 10px; height : 10px;">
                                
                            </div>
                     </div>
                    <br>
                    <br>
                    <?php }?>
                    </div>
                </div>
               


            </div>

        </div>
        <div class="col-md-6 gedf-main">

            <!-- tous sur le code php pour l'ajout des post -->

            <!--- \\\\\\\Post-->
            <?php if ($_SESSION["utilisateur"]) {
                # code...
                ?>
                <div class="card gedf-card">
                    <div class="card-body">
                        <h1 class="text-center">faite des poste </h1>
                        <form method="post" action="index.php" enctype="multipart/form-data">
                            <div class="nb-3">
                                <label for="prix" class="form-label">commentaire</label>
                                <input type="text" class="form-control" name="media">
                            </div>
                            <div class="nb-3">
                                <label for="img" class="form-label">image</label>
                                <input type="file" class="form-control-file" name="img">
                            </div>
                            <br>
                            <div class="user-box">
                            </div>
                            <br>
                            <div class="nb-3">
                                <button type="submit" class="btn btn-success mb-3" name="submit">Confirm</button>
                                <button type="button" class="btn btn-danger mb-3" name="annulez">annulez</button>
                            </div>
                        </form>
                    </div>

                </div>
            <?php } ?>
            <!-- Post /////-->


            <?php
            $req = "SELECT p.*, u.username
                FROM posts p
                JOIN users u ON p.user_id = u.id order by p.id DESC";
            $result = mysqli_query($conn, $req);

            
            

            if (!$_SESSION["utilisateur"]) {


                while ($row = mysqli_fetch_assoc($result)) {


                    ?>
                    <!-- ITEM -->
                    <form method="post" action="#" enctype="multipart/form-data">
                        <div class="card my-3">
                            <div class="card-header bg-white border-0 py-2">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <a href="#">
                                            <img class="rounded-circle" src="https://picsum.photos/80/80/?random?image=1"
                                                width="45" alt="" />
                                        </a>
                                        <div class="ml-3">
                                            <div class="h6 m-0">
                                                <a href="#"></a>
                                                <?php echo $row['username'] ?> <a href="#">
                                                    <?php echo $_SESSION["email"] ?>
                                                </a>
                                            </div>
                                            <div class="text-muted h8">Hace 5 miin <i class="fa fa-globe"
                                                    aria-hidden="true"></i></div>
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

                            <div class="card-body pt-0 pb-2">
                                <?php echo $row['p.media'] ?>

                            </div>
                            <img class="card-img-top rounded-0" src="<?php echo "images/" . $row['text'] ?>" alt="Card image cap">
                            <div class="card-footer bg-white border-0 p-0">
                                <div class="d-flex justify-content-between align-items-center py-2 mx-3 border-bottom">
                                    <div>

                                    </div>
                                    <div class="h7"> 3279 <a href="#"></a> 44845 veces <a href="#">compartido</a></div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center my-1">
                                    <div class="col">
                                        <a class="btn icon-btn btn-primary" href="#?id=<?php echo $row['user_id']; ?>"> <i
                                                class="fa fa-mail-forward"></i><span
                                                class="glyphicon btn-glyphicon glyphicon-share img-circle text-info"></span>Share</a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                <?php }
            } else {

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <!--- \\\\\\\Post-->
                    <form method="post" action="#" enctype="multipart/form-data">
                        <div class="card gedf-card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-2">
                                            <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                        </div>
                                        <div class="ml-2">
                                            <div class="h5 m-0">
                                                <?php echo $row['username'] ?>
                                            </div>
                                            <div class="h7 text-muted"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="dropdown">
                                            <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-h"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                                <div class="h6 dropdown-header"></div>
                                                <a class="dropdown-item" href="#">Save</a>
                                                <a class="dropdown-item" href="#">Hide</a>
                                                <a class="dropdown-item" href="#">Report</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> Hace 10 min</div>
                                <a class="card-link" href="#">
                                    <h5 class="card-title">Totam non adipisci hic! Possimus ducimus amet, dolores illo ipsum
                                        quos
                                        cum.</h5>
                                </a>
                                <div class="card-body pt-0 pb-2">
                                    <img class="card-img-top rounded-0" src="<?php echo "images/" . $row['text'] ;?>"
                                        alt="Card image cap" style="width: 280 px; height : 280px;">
                                </div>

                                <p class="card-text">
                                    <?php echo $row['media'] ?>

                                    <a href="#"
                                        target="_blank">https://mega.nz/#!1J01nRIb!lMZ4B_DR2UWi9SRQK5TTzU1PmQpDtbZkMZjAIbv97hU</a>
                                </p>
                            </div>
                            <div class="card-footer">
                    <?php if ($_SESSION['like']) {
                        # code...
                    ?>
                                <a class="btn icon-btn btn-success"
                                    href="./model/jaime_et_coment.php?id=<?php echo $row['id']; ?>" id="likeButton"
                                    name="like"><i class="fa fa-thumbs-up "  aria-hidden="true" id="likeButton"></i><span
                                        class="glyphicon btn-glyphicon glyphicon-thumbs-up img-circle text-primary"
                                        id="likeButton"></span>Like</a>
                                        <?php }else{?>
                                            <a class="btn icon-btn btn-primary"
                                            href="./model/jaime_et_coment.php?id=<?php echo $row['id']; ?>" id="likeButton"
                                            name="like"><i class="fa fa-thumbs-up "  aria-hidden="true" id="likeButton"></i><span
                                                class="glyphicon btn-glyphicon glyphicon-thumbs-up img-circle text-primary"
                                                id="likeButton"></span>Like</a>
                                      <?php  } ?>

                                      <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal3"> <a class="btn icon-btn btn-primary" href="#?id=<?php echo $row['id']; ?>"> <i
                                        class="fa fa-mail-forward"></i><span
                                        class="glyphicon btn-glyphicon glyphicon-share img-circle text-info"></span>Share</a></button>

                                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">  <a href="index.php?id2=<?php echo $row['id'] ?>" class="dropdown-item" title="commander" name="clients">
                                                    <i class="fa fa-send"></i>
                                                    <?php $id2= $row['id'] ?>
                                                    commenter
                                                </a></button>

                            </div>
                           
                                
<!-- Modal-pour commenter -->
<div class="modal show" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" id="myMOdal1">

      <!-- En-tête du modal -->
      <div class="modal-header">
        <h4 class="modal-title">faite un commentaire</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Contenu du modal -->
      <div class="modal-body">
      <form  method="post" action="index.php?id2=<?php echo $row['id']; ?>">
             <textarea class="form-control " name="message"  ></textarea>
             <br>
             <button type="submit"  class="btn btn-success mb-3" name="comment"><i class="fa fa-send"></i> commente</button>
      </form>
      </div>

      <!-- Pied du modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal-pour paatager -->
<div class="modal show" id="myModal3">
  <div class="modal-dialog">
    <div class="modal-content" id="myMOdal1">

      <!-- En-tête du modal -->
      <div class="modal-header">
        <h4 class="modal-title">faite un commentaire</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Contenu du modal -->
      <div class="modal-body">
      
      <a href=" https://wa.me/+221762793498?text=Je suis iteresse pas votre produit" target="_blank" class="text-decoration-none" title="Aller sur whatsapp" area-label="whatsapp">
							<i class="bi-whatsapp-fill"></i>
						</a>
             <button type="submit"  class="btn btn-primary mb-3" >patager avec  <i class="fa fa-facebook"></i></button>
             <button type="submit"  class="btn btn-danger mb-3" >patager avec  <i class="fa fa-instagram"></i> </button>
             <button type="submit"  class="btn btn-info mb-3" >patager avec  <i class="fa fa-linkedin"></i></button>
             <button type="submit"  class="btn btn- mb-3" >patager avec  <i class="fa fa-twitter"></i></button>
             <button type="submit"  class="btn btn-success mb-3" >patager avec  <i class="fa fa-whatsapp"></i></button>
      
      </div>

      <!-- Pied du modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>

    </div>
  </div>
</div>


                              
                            


                        </div>
                    </form>
                <?php }
            } ?>
            <!-- Post /////-->
        </div>

        <div class="col-md-3">
            <div class="card gedf-card">
            <div class="card">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./images/airplane-3702676_1920.jpg" class="d-block w-100" alt="Image 1">
      </div>
      <div class="carousel-item">
        <img src="./images/apple.jpg" class="d-block w-100" alt="Image 2">
      </div>
      <div class="carousel-item">
        <img src="./images/money-3115981_1920.jpg" class="d-block w-100" alt="Image 3">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Précédent</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Suivant</span>
    </a>
  </div>
  <div class="card-body">
    <h5 class="card-title">un reseau chic pour les vrais</h5>
    <p class="card-text">tous droits reserver pour un projet</p>
  </div>
</div>

            </div>


            <div class="card gedf-card">
                <div class="card-body">
                <div class="card-body">
    <h5 class="card-title">Mon Réseau</h5>
    <p class="card-text">Chers membres de mon réseau,</p>
    <p class="card-text">Je voulais vous exprimer ma gratitude pour votre présence et votre soutien précieux. Votre participation active dans mon réseau a contribué à son développement et à son succès.</p>
    <p class="card-text">Chacun de vous apporte une expertise unique et des idées innovantes qui enrichissent notre communauté. C'est grâce à vous que nous pouvons échanger des connaissances, collaborer sur des projets et explorer de nouvelles opportunités.</p>
    <p class="card-text">Je suis inspiré par votre passion, votre dévouement et votre motivation à atteindre l'excellence. Ensemble, nous formons une communauté solide, propice à l'apprentissage et à la croissance professionnelle.</p>
    <p class="card-text">N'hésitez pas à partager vos idées, vos réalisations et vos aspirations au sein du réseau. Nous sommes là pour nous soutenir mutuellement et pour célébrer nos succès collectifs.</p>
    <p class="card-text">Je suis reconnaissant de vous avoir dans mon réseau et j'espère continuer à construire des relations durables et fructueuses avec chacun d'entre vous.</p>
    <p class="card-text">Restons connectés, partageons nos expériences et poursuivons ensemble notre chemin vers l'excellence professionnelle.</p>
    <p class="card-text">Cordialement,</p>
    <p class="card-text">christopher manoumbou</p>
  </div>
                </div>
            </div>
        </div>
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
