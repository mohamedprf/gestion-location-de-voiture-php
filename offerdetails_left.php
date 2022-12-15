<?php 
include("connection.php");
session_start ();
//variable contenu id de vehicule 
$id_v = $_GET['id_v'];
$garEM = $_GET['GarEM'];
$garRES = $_GET['GarRES'];
$dateEM = $_GET['DTem'];
$H_em = $_GET['H_em'];
$dateRES = $_GET['DTres'];
$H_res = $_GET['H_res'];
$cin = $_GET['cin'];
           
// les variable recupere pour modefier les donne de client

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Left Sidebar template - Progressus Bootstrap template</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="reserv_lien">
					<li><a href="reserv.php"><strong>1</strong>   <span>Donne location</span></a></li>
					<li><a href="offerselect.php"><strong>2</strong>    <span>Vehicule</span></a></li>
					<li><a href="offerdetails_left.php"><strong>3</strong>    <span>Detaille</span></a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">
		
		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">Detaille personne</li>
		</ol>

		<div class="row">
						 <?php 
			
			if (isset($_SESSION['cin']) && isset($_SESSION['password'])) {
			echo '<p>Vous êtes connecté en tant que : <u> '.$_SESSION['cin'].'</u> <a href="authentification-logout.php">Deconnection</a></p>';
			}
			 ?>
			 			<article>

			</article>
			<!-- Sidebar -->
			<aside class="col-md-4 sidebar sidebar-left">

				<div class="row widget">
					<div class="col-xs-12">
					</div>
				</div>
				<div class="row widget">
					<div class="col-xs-12">
							<?php 
                 $sql = "SELECT * FROM `vehicule` WHERE `id_v`=".$id_v;
                 $result = $conn->query($sql);
                 $row = $result->fetch_assoc();
                 
                 ?>
						
						<ul class="list-unstyled list-spaces">
						<li><br><span class="small text-muted"><img src="<?php echo $row["image"]?>" alt="" class='td_image'></span></li>
						<li><span class="title_D"><h4><?php echo $row['marque']; ?></h4></span></li>
						<li></br><h4>Depart</h4></br></li>
						<li><span class="small text-muted"><h4><?php echo $garEM; ?><h4></span></li>
						<li><span class="small text-muted"><h4><?php echo $dateEM; ?> à <?php echo $H_em; ?> heures</h4></li>
						<li></br><h4>Retour</h4></br></li>
						<li><span class="small text-muted"><h4><?php echo $garRES; ?></h4></li>
						<li><span class="small text-muted"><h4><?php echo $dateRES; ?> à <?php echo $H_res; ?> heures</h4></li>
						<li></br><h4>RÉquipement du véhicule</h4></br></li>
						<li><img src="assets/images/a5.png"> <span class="small text-muted">climatisation</span></li>
						<li><img src="assets/images/a1.png"> <span class="small text-muted">Boite de vitesse manuelle</span></li>
						<li><img src="assets/images/a3.png"> <span class="small text-muted">5 Portes</span></li>
						<li></br><h4>Capacité</h4></br></li>
						<li><img src="assets/images/a2.png"> <span class="small text-muted">5 Personnes</span></li>
						<li><img src="assets/images/a4.png"> <span class="small text-muted">2 Valises</span></li>
					</ul>
					</div>
				</div>
				<div class="row widget">
					<div class="col-xs-12">
						
					</div>
				</div>

			</aside>
			<!-- /Sidebar -->
            <div >
			<!-- Article main content -->
			<article class="col-md-8 maincontent">
			
				<header class="page-header">
					<h1 class="title_D" >Détails personnels</h1>
					<?php 
					
			     //$cin = $_SESSION['cin'];	             
                 $sql1 = "SELECT * FROM `client` WHERE `cin`='$cin'";
                 $result1 = $conn->query($sql1);
                 $row1 = $result1->fetch_assoc();
                 
                 $id_cl = $row1['id_cl'];
                 
       
?> 
	<form action="imprimer.php" method="GET">
								<div class="top-margin">
									<label>Nom <span class="text-danger">*</span></label>
									<input name="nom" type="text" value="<?php echo $row1['nom']; ?>" class="form-control">
								</div>
								<div class="top-margin">
									<label>Prenom <span class="text-danger">*</span></label>
									<input name="prenom" type="text" value="<?php echo $row1['prenom']; ?>" class="form-control" required>

								</div>
								<div class="top-margin">
									<label>CIN <span class="text-danger">*</span></label>
									<input name="cin" type="text" value="<?php echo $row1['cin']; ?>" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>Adresse <span class="text-danger">*</span></label>
									<input name="adrs" type="text" value="<?php echo $row1['adresse']; ?>" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>Phone <span class="text-danger">*</span></label>
									<input name="phone" type="text" value="<?php echo $row1['phone']; ?>" class="form-control" required>
								</div>
                                <div class="top-margin">
                            	<input name="id_cl" type="text" value="<? echo $id_cl ;?>" style="opacity: 0">	<input name="id_v" type="text" value="<? echo $id_v ;?>" style="opacity: 0"> <input name="garEM" type="text" value="<? echo $garEM ;?>" style="opacity: 0">
                                <h3>Informations de paiement du conducteur</h3>
                                <div class="top-margin">
									<label>Numéro de Cheque <span class="text-danger">*</span></label>
									<input name="cheque" type="text" value="" class="form-control" placeholder="Numéro de cheque" >
								</div>
								</br>
									<label>Sélectionnez votre type de carte  <span class="text-danger">*</span></label>
									<input class="form-control" list="browsers" name="carte" placeholder="Selection Card">
                                    <datalist id="browsers">
                                    <option value="Card Visa">
                                    <option value="Master Card">
                                    <option value="American Express">
                                    <option value="Diners Club">
                                    <option value="Discover Network">
                                    </datalist>
								</div>
								<div class="top-margin">
							   <span class=""><img src="assets/images/cb_gauche.png" alt="" class=""></span>
							   <span class=""><img src="assets/images/cb_droite.png" alt="" class=""></span>
								</div>
								<div class="top-margin">
									<label>Date Expiration <span class="text-danger">*</span></label>
									<input name="Date_ex" type="text" value="" class="date_ex" placeholder="Exemple 07/17" >
								</div>
								<div class="top-margin">
									<label>Numéro de carte <span class="text-danger">*</span></label>
									<input name="num_carte" type="text" value="" class="form-control" placeholder="Numéro de carte" >
						     	</div>
								<hr>
                            <div id="prix">
                            <span class="titre" >Votre prix total:</span>
                            <span class="prix_f"><?php echo $row['prix']; ?> <img src="assets/images/euro.png" width="15" height="15" > </span>
                            </div>
								<div class="row">
									<div class="col-lg-8">
										<label class="checkbox">
											<input type="checkbox"> 
											I've read the <a href="page_terms.html">Terms and Conditions</a>
										</label>                        
									</div>
									<div class="col-lg-4 text-right">
							<input class='btn btn-action' name ='submit' type='submit' value='submit' />

									</div>
								</div>
								
							</form>
				</header>
			</article>
			
			<!-- /Article -->
       
		</div>
	</div>	<!-- /container -->
	

	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>+234 23 9873237<br>
								<a href="mailto:#">some.email@somewhere.com</a><br>
								<br>
								234 Hidden Pond Road, Ashland City, TN 37015
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Follow me</h3>
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Text widget</h3>
						<div class="widget-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
							<p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="#">Home</a> | 
								<a href="about.html">About</a> |
								<a href="sidebar-right.html">Sidebar</a> |
								<a href="contact.html">Contact</a> |
								<b><a href="signup.html">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2014, Your name. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a> 
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>
	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
<?

$insert_emprunte = "INSERT INTO `GLV`.`emprunter` (`id_cl`, `id_v`, `date_debut`, `date_fin`, `H_debut`, `H_fin`,
 `km_debut`, `km_fin`, `dist_parc`) VALUES ('$id_cl', '$id_v', '$dateEM', '$dateRES',
  '$H_em', '$H_res', '67', '76', '98')";
$conn->query($insert_emprunte);

$conn->close();
?>