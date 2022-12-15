<?php
include("connect.php");

if(isset($_GET['add']) OR isset($_GET['update']) OR isset($_GET['delete'])){
$image = $_GET['image'];
$marque = $_GET['marque'];
$modele = $_GET['modele'];
$numero = $_GET['numero'];
$puissance = $_GET['puissance'];
$type = $_GET['type'];
$prix = $_GET['prix'];
$omGar = $_GET['nomGar'];

}
?>
<html>
<head>
<title>Client | SOFINI</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" media="screen and (min-width:0px)" style="css" href="style.css">
</head>
<body>

<div id="container">
<center>

<div id="gestion">

<h3><img src="images/retoure.png" alt="retoure" /><a href="administration.php">Retoure vers l'administration</a></h3>

<h1>Gestion des Vehicule</h1>


<?php
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

if(isset($_GET['update'])){
$UpdateQuery = "UPDATE `GLV`.`vehicule` SET image='$image', marque='$marque', modele='$modele', numero='$numero', puissance='$puissance', type='$type', prix='$prix' WHERE `vehicule`.`image`='$image'";               
mysqli_query($conn,$UpdateQuery);
	}else if(isset($_GET['delete'])){
	$DeleteQuery = "DELETE from vehicule WHERE image='$image'";      
	mysqli_query($conn,$DeleteQuery);
		}else if(isset($_GET['add'])){
		$AddQuery = "INSERT INTO `GLV`.`vehicule` (`id_v`, `image`, `marque`, `modele`, `numero`, `puissance`, `type`, `prix`) VALUES (NULL, '$image', '$marque', '$modele', '$numero', '$puissance', '$type', '$prix',$nomGar);";         
		mysqli_query($conn,$AddQuery);
			}

$sql = "SELECT * FROM `vehicule`";
$myData = mysqli_query($conn,$sql);

?>
<div id='afficher'>
<table>
<tr>

<th>image</th>
<th>marque</th>
<th>modele</th>
<th>numero</th>
<th>puissance</th>
<th>type</th>
<th>prix</th>
<th>nomgarage</th>
</tr>
<?php 

while($record = mysqli_fetch_array($myData)){

?>
<form action=gestion_v.php method=GET>
<tr>


<td><input type=text name=image value="<?php echo $record[1]; ?>" /></td>
<td><input type=text name=marque value=" <?php echo $record[2]; ?>" /></td>
<td><input type=text name=modele value="<?php echo $record[3]; ?>" /></td>
<td><input type=text name=numero value="<?php echo $record[4]; ?>" /></td>
<td><input type=text name=puissance value="<?php echo $record[5]; ?>" /></td>
<td><input type=text name=type value="<?php echo $record[6]; ?>" /></td>
<td><input type=text name=prix value="<?php echo $record[7]; ?>" /></td>
<td><input type=text name=nomGar value="<?php echo $record[8]; ?>" </td>
<td><button class='submit' name=update /><button class='submit1' name=delete /></td>
</tr>
</form>
<?php
}
?>
<form action=gestion_v.php method=GET>
<tr>
<td><input type=text name=image ></td>
<td><input type=text name=marque ></td>
<td><input type=text name=modele ></td>
<td><input type=text name=numero ></td>
<td><input type=text name=puissance ></td>
<td><input type=text name=type ></td>
<td><input type=text name=prix ></td>
<td><input type=text name=nomGar ></td>
<td><input type=text ></td>
<td><button class='submit2' name='add'></td>
</form>
</table>
</div>
<?php 
}
else {
		//echo '<meta http-equiv="refresh" content="0;URL=index.php">';
		echo"makin walo";
}
mysqli_close($conn);
?>

</div>

</center>
</div>
</body>
</html>
