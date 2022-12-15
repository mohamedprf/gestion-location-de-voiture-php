<?php 
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Progressus - Free business bootstrap template by GetTemplate</title>

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

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="Vehicule.php">Vehicule</a></li>
                     
					<li><a href="Qui_sommes_nous.html">Qui_sommes_nous</a></li>

					<li><a href="contact.php">Contact</a></li>
					<li><a class="btn" href="signup.php">SIGN IN / SIGN UP</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header -->
	
	<header id="head">

<div id="form">
	<!-- insere formulaire de reservation -->

<form action="signin.php" method="GET">

<p>Garage Reservation </p>
                               <!-- ville de depart -->
					          <input class= "input_DEP" list="browsers" name="GarEM" placeholder="garage d'emprunt" required>
                              <datalist id="browsers">
<?php 
$sql1 = "SELECT `nomgar` FROM `garage`";
$result1 = $conn->query($sql1);

//$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());


while($row1 = $result1->fetch_assoc()) {

// id vihecule 

?>
                              <option value="<?php echo $row1['nomgar']; ?>">
 <?php
		} 

?>	
                              </datalist>
                              </br></br>
                              <input class= "input_DEP" list="browsers" name="GarRES" placeholder="garage de restitution" required>
                              <datalist id="browsers">
                              <?php
while($row1 = $result1->fetch_assoc()) {

// id vihecule 

?>
                              <option value="<?php echo $row1['nomgar']; ?>">
 <?php
		} 

?>	
                              </datalist>
                              </br></br>         
                    <p>DAte And Time Res</p>
                    <input class= "DT_res" type="date" name="DTem" required><input class = "HR" type="time" name="wakeup">  
                    <p>DAte And Time Ret</p>
                    <input class= "DT_res" type="date" name="DTres" required><input class = "HR" type="time" name="wakeup">
                    </br>
                    <input name="valider" type="submit" value="reserve" class="submit"> 

</form>
</div>

	<!--
	
		<div class="container">
			<div class="row">
				<h1 class="lead">AWESOME, CUSTOMIZABLE, FREE</h1>
				<p class="tagline">PROGRESSUS: free business bootstrap template by <a href="http://www.gettemplate.com/?utm_source=progressus&amp;utm_medium=template&amp;utm_campaign=progressus">GetTemplate</a></p>
				<p><a class="btn btn-default btn-lg" role="button">MORE INFO</a> <a class="btn btn-action btn-lg" role="button">DOWNLOAD NOW</a></p>
			</div>
		</div>
		-->
	</header>
	
	<!-- /Header -->

	<!-- Intro -->
	
	<div class="container text-center">
		<br> <br>
		<h1 class="thin">Pour réserver rapidement !</h1>
		<p class="text-muted">
			Réservez dès maintenant votre voiture de rêve à la station Parchim Aéroport<br> 
		</p>
	</div>
	<!-- /Intro-->
		
	<!-- Highlights - jumbotron -->
	<div class="jumbotron top-space">
		<div class="container">
			
			<h3 class="text-center thin">Offres Spéciales</h3>
			
			<div class="row">
				<div class="col-md-3 col-sm-6 highlight">
				
					<div class="h-caption"><h4><img src="assets/PRODUIT/prod9.png" width="259" height="170"></i>MASERATI QUATTROPORTE SQ4</h4></div>
					<div class="h-body text-center">
                    <a href="signin.php"><input name="valider" type="submit" value="reserve" class="index_res"></a> 
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><img src="assets/PRODUIT/7B-sml.png" width="259" height="170"></i>PORSCHE CAYENNE S</h4></div>
					<div class="h-body text-center">
                    <a href="signin.php"><input name="valider" type="submit" value="reserve" class="index_res"></a> 
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><img src="assets/PRODUIT/PROD5.png" width="259" height="170"></i>BMW M4 Coupé</h4></div>
					<div class="h-body text-center">
                    <a href="signin.php"><input name="valider" type="submit" value="reserve" class="index_res"></a> 
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><img src="assets/PRODUIT/PROD6.png" width="259" height="170"></i>MERCEDES-BENZ</h4></div>
					<div class="h-body text-center">
                    <a href="signin.php"><input name="valider" type="submit" value="reserve" class="index_res"></a> 
					</div>
				</div>
			</div> <!-- /row  -->
		
		</div>
	</div>
	<!-- /Highlights -->

	<!-- container -->
	<!-- /container -->
	
	<!-- Social links. @TODO: replace by link/instructions in template -->
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
	<!-- /social links -->


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