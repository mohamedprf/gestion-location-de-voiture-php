<?php
include("connect.php");

if(isset($_GET['delete'])){
$id_f = $_GET['id_f'];


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

<h1>Gestion des Factures

<?php
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

if(isset($_GET['delete'])){
	$DeleteQuery = "DELETE from facture WHERE id_f='$id_f'";      
	mysqli_query($conn,$DeleteQuery);
		}

$sql = "SELECT * FROM `facture`";
$myData = mysqli_query($conn,$sql);

?>
<div id='afficher'>
<table>
<tr>
<th>id_facture</th>
<th>id_client</th>
<th>id_vehicule</th>
<th>id_garage</th>
<th>id_cheque</th>
<th>id_carte</th>
<th>date_facture</th>
<th>sous total</th>
<th>totale</th>
<th>tva</th>
</tr>
<?php 

while($record = mysqli_fetch_array($myData)){

?>
<form action=gestion_facture.php method=GET>
<tr>
<td><input type=text name=id_f value="<?php echo $record[0]; ?>" /></td>
<td><input type=text name=id_cl value=" <?php echo $record[1]; ?>" /></td>
<td><input type=text name=id_v value="<?php echo $record[2]; ?>" /></td>
<td><input type=text name=id_g value="<?php echo $record[3]; ?>" /></td>
<td><input type=text name=id_cheque value="<?php echo $record[4]; ?>" /></td>
<td><input type=text name=id_carte value="<?php echo $record[5]; ?>" /></td>
<td><input type=text name=date_facture value="<?php echo $record[6]; ?>" /></td>
<td><input type=text name=sous_totale value="<?php echo $record[7]; ?>" /></td>
<td><input type=text name=totale value="<?php echo $record[8]; ?>" /></td>
<td><input type=text name=tva value="<?php echo $record[9]; ?>" /></td>
<td><button class='submit1' name=delete /></td>
</tr>
</form>
<?php
}
?>

</div>
<?php 
}
else {
		//echo '<meta http-equiv="refresh" content="0;URL=index.php">';
		echo"Aucun donne !!";
}
mysqli_close($conn);
?>

</div>

</center>
</div>
</body>
</html>
