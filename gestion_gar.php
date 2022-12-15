<?php
include("connect.php");

if(isset($_GET['add']) OR isset($_GET['update']) OR isset($_GET['delete'])){
$id_g = $_GET['id_g'];
$nomgar = $_GET['nomgar'];
$adressegar = $_GET['adressegar'];
$villegar = $_GET['villegar'];


}
?>
<html>
<head>
<title>Admin | Progresse</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" media="screen and (min-width:0px)" style="css" href="style.css">
</head>
<body>

<div id="container">
<center>

<div id="gestion">

<h3><img src="images/retoure.png" alt="retoure" /><a href="administration.php">Retoure vers l'administration</a></h3>

<h1>Gestion des Garages</h1>


<?php
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

if(isset($_GET['update'])){
$UpdateQuery = "UPDATE `GLV`.`garage` SET nomgar='$nomgar', adressegar='$adressegar', villegar='$villegar' WHERE `vehicule`.`id_g`='$id_g'";               
mysqli_query($conn,$UpdateQuery);
	}else if(isset($_GET['delete'])){
	$DeleteQuery = "DELETE from garage WHERE id_g='$id_g'";      
	mysqli_query($conn,$DeleteQuery);
		}else if(isset($_GET['add'])){
		$AddQuery = "INSERT INTO `GLV`.`garage` (`id_g`, `nomgar`, `adressegar`, `villegar`) VALUES (NULL,'$nomgar', '$adressegar', '$villegar');";         
		mysqli_query($conn,$AddQuery);
			}

$sql = "SELECT * FROM `garage`";
$myData = mysqli_query($conn,$sql);

?>
<div id='afficher'>
<table>
<tr>
<th>id_g</th>
<th>nomgar</th>
<th>adressegar</th>
<th>villegar</th>
</tr>
<?php 

while($record = mysqli_fetch_array($myData)){

?>
<form action=gestion_gar.php method=GET>
<tr>
<td><input type=text name=id_g value="<?php echo $record[0]; ?>" /></td>
<td><input type=text name=nomgar value=" <?php echo $record[1]; ?>" /></td>
<td><input type=text name=adressegar value="<?php echo $record[2]; ?>" /></td>
<td><input type=text name=villegar value="<?php echo $record[3]; ?>" /></td>
<td><button class='submit' name=update /><button class='submit1' name=delete /></td>
</tr>
</form>
<?php
}
?>
<form action=gestion_gar.php method=GET>
<tr>
<td><input type=text name=id_g ></td>
<td><input type=text name=nomgar ></td>
<td><input type=text name=adressegar ></td>
<td><input type=text name=villegar ></td>
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
