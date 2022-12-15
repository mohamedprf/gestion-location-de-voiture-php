<?php
include("connect.php");

if(isset($_POST['add']) OR isset($_POST['update']) OR isset($_POST['delete'])){
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$cin = $_POST['cin'];
$phone = $_POST['phone'];
$password = $_POST['password'];

}
?>
<html>
<head>
<title>Admin | SOFINI</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" media="screen and (min-width:0px)" style="css" href="style.css">
</head>
<body>

<div id="container">
<center>

<div id="gestion">

<h3><img src="images/retoure.png" alt="retoure" /><a href="administration.php">Retoure vers l'administration</a></h3>

<h1>Gestion des clients</h1>


<?php
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

if(isset($_POST['update'])){
$UpdateQuery = "UPDATE client SET nom='$nom', prenom='$prenom, adresse='$adresse', cin='$cin', phone='$phone', password='$password' WHERE cin='$cin'";               
mysqli_query($conn,$UpdateQuery);
	}else if(isset($_POST['delete'])){
	$DeleteQuery = "DELETE from client WHERE cin='$cin'";      
	mysqli_query($conn,$DeleteQuery);
		}else if(isset($_POST['add'])){
		$AddQuery = "INSERT INTO `GLV`.`client`(`id_cl`,nom,prenom,adresse,cin,phone,password) VALUES (NULL,'$nom','$prenom','$adresse','$cin','$phone','$password')";         
		mysqli_query($conn,$AddQuery);
			}

$sql = "SELECT * FROM client";
$myData = mysqli_query($conn,$sql);

?>
<div id='afficher'>
<table>
<tr>
<th>non</th>
<th>Prenom</th>
<th>adresse</th>
<th>cin</th>
<th>phone</th>
<th>password</th>
</tr>
<?php 

while($record = mysqli_fetch_row($myData)){

?>
<form action=gestion_client.php method=POST>
<tr>

<td><input type=text name=nom value="<?php echo $record[1]; ?>" </td>
<td><input type=text name=prenom value="<?php echo $record[2]; ?>" </td>
<td><input type=text name=adresse value=" <?php echo $record[3]; ?>" </td>
<td><input type=text name=cin value="<?php echo $record[4]; ?>" </td>
<td><input type=text name=phone value="<?php echo $record[5]; ?>" </td>
<td><input type=text name=password value="<?php echo $record[6]; ?>" </td>
<td><button class='submit' name=update /><button class='submit1' name=delete /></td>
</tr>
</form>
<?php
}
?>
<form action=gestion_client.php method=POST>
<tr>
<td><input type=text name=nom ></td>
<td><input type=text name=prenom ></td>
<td><input type=text name=adresse ></td>
<td><input type=text name=cin ></td>
<td><input type=text name=phone ></td>
<td><input type=text name=password ></td>
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
