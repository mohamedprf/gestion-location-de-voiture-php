<?php
include("connection.php");
session_start ();
$cin = $_SESSION['cin'];

$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$cin = $_GET['cin'];
$adrs = $_GET['adrs'];
$phone = $_GET['phone'];
$id_cl = $_GET['id_cl'];
$id_v = $_GET['id_v'];
$garEM = $_GET['garEM'];
$cheque = $_GET['cheque'];
$carte = $_GET['carte'];
$date_ex = $_GET['Date_ex'];
$num_carte = $_GET['num_carte'];

$sql0 = "SELECT `id_g` FROM `garage` WHERE `nomgar`='$garEM'";
$result0 = $conn->query($sql0);
$row0 = $result0->fetch_assoc();

$id_gar = $row0['id_g'];

//isert les donne des cheque
if(isset($_GET['submit'])){

$insert_cheque = "INSERT INTO `GLV`.`cheque` (`id_cheque`, `numer_cheque`) VALUES (NULL, '$cheque')";
$conn->query($insert_cheque);

// insert les donne de carte bancaire

$insert_carte = "INSERT INTO `GLV`.`cartebancaire` (`id_carte`, `date_expiration`, `Nom_carte`, `num_carte`) VALUES (NULL, '$date_ex', '$carte', '$num_carte')";
$conn->query($insert_carte);

// Updeat les donne de client

$updeat_cl = "UPDATE `GLV`.`client` SET `nom` = '$nom', `prenom` = '$prenom', `adresse` = '$adrs', `cin`='$cin', `phone` = '$phone' WHERE `client`.`cin` = $cin ";
$conn->query($updeat_cl);

$sql2 = "SELECT `id_cheque` FROM `cheque` WHERE `numer_cheque`='$cheque'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$id_cheque = $row2['id_cheque'];



$sql3 = "SELECT `id_carte` FROM `cartebancaire` WHERE `num_carte`='$num_carte'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$id_carte = $row3['id_carte'];

$sqlV = "SELECT * FROM `vehicule` WHERE `id_v`='$id_v'";
$resultV = $conn->query($sqlV);
$rowV = $resultV->fetch_assoc();

$marque = $rowV['marque'];


}

$date = date("d-m-Y");

$insert_facture = "INSERT INTO `GLV`.`facture` (`id_f`, `id_cl`, `id_v`, `id_g`, `id_cheque`, `id_carte`, `date_f`, `sous_total`, `total`, `tva`) VALUES (NULL, '$id_cl', '$id_v', '$id_gar', '$id_cheque', '$id_carte', '$date', '230', '202', '200')";
$conn->query($insert_facture);
			
$sqlF = "SELECT `id_f` FROM `facture` WHERE `id_cl`='$id_cl'";
$resultF = $conn->query($sqlF);
$rowF = $resultF->fetch_assoc();
$id_F = $rowF['id_f'];

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
<!-- -->
<body onload="window.print()">
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

		<div class="row">
			 <?php 
			
			if (isset($_SESSION['cin']) && isset($_SESSION['password'])) {
			echo '<p>Vous êtes connecté en tant que : <u> '.$_SESSION['cin'].'</u> <a href="authentification-logout.php">Deconnection</a></p>';
			}
			 ?>
			<!-- Article main content -->
			<article class="facture" >

				<h3>Merci pour choix cette location</h3>
				<article class="border_fact">
				<h3 class="left_f">Facture N : <?php echo $id_F." 003" ; ?></h3></br>
				<h4 class="">La date de facture : <?php echo $date ;?></h4>
			<?php
			
			// afficher id de client
	/*		             
$sql1 = "SELECT * FROM `client` WHERE `cin`='$cin'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

$id_cl = $row1['id_cl'];
*/
//les variabe envoie donne de client

echo"<table class='table_v'>";
echo"<tr>";
echo "<th>detaille de client </th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>Nom : </span></th><th> <span>$nom</span></th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>Prenom : </span> </th><th><span>$prenom</span></th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>Cin : </span></th> <th><span>$cin</span></th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>Tel : </span></th> <th><span>$phone</span></th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>Adresse: </span></th> <th><span>$adrs</span></th>";
echo"</tr>";
echo"</table>";

echo"<table class='table_v'>";
echo"<tr>";
echo "<th> detaille de Vehicule </th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>Marque : </span></th> <th><span>".$rowV['marque']."</span></th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>modele : </span> </th><th><span>".$rowV['modele']."</span></th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>Numero : </span> </th><th><span>".$rowV['numero']."</span></th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>puissance: </span> </th><th><span>".$rowV['type']."</span></th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>prix: </span> </th><th><span>".$rowV['prix']."</span></th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>Nom de garage: </span></th><th> <span>".$rowV['nomGar']."</span></th>";
echo"</tr>";
echo"</table>";

echo"</br><table class='table_f'>";
echo"<tr>";
echo "<th><span>totale hore taxe : </span></th> <th><span>310.989 <img src='assets/images/euro.png' width='10' height=10' ></span></th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>TVA a 20% : </span></th> <th><span>30 <img src='assets/images/euro.png' width='10' height=10' ></span></th>";
echo"</tr>";
echo"<tr>";
echo "<th><span>Mantant totale : </span></th> <th><span>".$rowV['prix']."<img src='assets/images/euro.png' width='10' height=10' ></span></th>";
echo"</tr>";
echo"</table>";

$conn->close();
			?>
			</article>
			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-4 sidebar sidebar-right">



			</aside>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
	

	<footer id="footer" class="top-space">

	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>