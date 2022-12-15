<?php 
include("connection.php");
session_start ();
//$id_c= $_SESSION['cin'];
$garEM = $_GET['GarEM'];
$garRES = $_GET['GarRES'];
$dateEM = $_GET['DTem'];
$H_em = $_GET['H_em'];
$dateRES = $_GET['DTres'];
$H_res = $_GET['H_res'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>About - Progressus Bootstrap template</title>

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
			
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">véhicule</li>
		</ol>

		<div class="row">
			 <?php 
			
			if (isset($_SESSION['cin']) && isset($_SESSION['password'])) {
			echo '<p>Vous êtes connecté en tant que : <u> '.$_SESSION['cin'].'</u> <a href="authentification-logout.php">Deconnection</a></p>';
			}
			 ?>
			<!-- Article main content -->
			
				<article >
				<ul class="lien-reserv">
				<li><img src="assets/images/16917.png" alt="" class='flech-im'><?php echo $garEM; ?></li>
				<li><?php echo $dateEM; ?></li>
				<li><?php echo $H_em; ?></li>
				<li><img src="assets/images/16917.png" alt="" class='flech-im'><?php echo $garRES; ?></li>
				<li><?php echo $dateRES; ?></li>
				<li><?php echo $H_res; ?><li>
				</ul>
		    	</article>

			<article class="col-sm-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">Flotte de véhicules</h1>
				</header>							
			</article>
		</div>
	</div>	<!-- /container -->
	
<?php 
$cin = $_SESSION['cin'];

$sql = "SELECT * FROM vehicule";
$result = $conn->query($sql);

//$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());


while($row = $result->fetch_assoc()) {

// id vihecule 
$id_v = $row['id_v'];

?>
		<table class='table_un' align="center">
				<tr>
		<td><img src="<?php echo $row["image"]?>" alt="" class='td_image'></td>
				<td>
				       <table class='table_deux'>
				       <tr>
				       <td><p class="marque"><?php echo $row['marque']; ?></p></td>
				       </tr>
				       <tr>
				       <td>MAROC | IDMR</td>
				       </tr>
				       <tr>
				       <td><img src="assets/images/a5.png">A/C
				       <img src="assets/images/a1.png" >M
				       <img src="assets/images/a2.png" >5
				       <img src="assets/images/a3.png" >5
				       <img src="assets/images/a4.png" >2
				       </td>
				       </tr>
				       <tr><th>
				       <p>Inclus dans cette offre:</p></th>
				       </tr>
				        <tr><td>
				       <img src="assets/images/Vv.png">Kilométrage illimité</td>
				       </tr>
				       <tr>
				       
				       </table>
				</td>
				<td align="center"> <h2><i>A partie</i></h2><h1><?php echo $row['prix']; ?> <img src="assets/images/euro.png" width="20" height="20" ></h1>
				 <?php echo "<a href=offerdetails_left.php?id_v=".$id_v."&GarEM=".$garEM."&GarRES=".$garRES."&DTem=".$dateEM."&H_em=".$H_em."&DTres=".$dateRES."&H_res=".$H_res."&cin=".$cin.">";  
                echo " <input type='submit' value='Choisir ce véhicule' class='Vehicule_res'>";
                echo "</a>";
                ?>
				</td>
				</tr>
		</table>
		<?php
		} 
//$conn->close();
?>	

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
							<p class="follow-me-icons clearfix">
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
								<a href="index.html">Home</a> | 
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
