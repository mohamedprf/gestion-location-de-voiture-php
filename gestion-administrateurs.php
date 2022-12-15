<?php
include("connect.php");

if(isset($_POST['add']) OR isset($_POST['update']) OR isset($_POST['delete'])){
$login = $_POST['logint'];
$password = $_POST['password'];
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

<h1>Gestion des administrateurs</h1>


<?php
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

if(isset($_POST['update'])){
$UpdateQuery = "UPDATE admin SET login='$_POST[login]', password='$_POST[password]' WHERE login='$_POST[login]'";               
mysqli_query($conn,$UpdateQuery);
	}else if(isset($_POST['delete'])){
	$DeleteQuery = "DELETE from admin WHERE login='$_POST[login]'";      
	mysqli_query($conn,$DeleteQuery);
		}else if(isset($_POST['add'])){
		$AddQuery = "INSERT INTO admin(login,password) VALUES ('$login','$password')";         
		mysqli_query($conn,$AddQuery);
			}

$sql = "SELECT * FROM admin";
$myData = mysqli_query($conn,$sql);
echo "<div id='afficher'>
<table>
<tr>
<th>Identifiant</th>
<th>Mot de passe</th>
</tr>";
while($record = mysqli_fetch_row($myData)){
echo "<form action=gestion-administrateurs.php method=POST>";
echo "<tr>";
echo "<td>" . "<input type=text name=login value=" . $record[1] .  " </td>";
echo "<td>" . "<input type=text name=password value=" . $record[2] . " </td>";
echo "<td>" . "<button class='submit' name=update />" . "<button class='submit1' name=delete />" . " </td>";
echo "</tr>";
echo "</form>";
}
echo "<form action=gestion-administrateurs.php method=POST>";
echo "<tr>";
echo "<td><input type=text name=login /></td>";
echo "<td><input type=text name=password /></td>";
echo "<td><button class=submit2 name=add /></td>";
echo "</form>";
echo "</table>";
echo "</div>";
}
else {
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}
mysqli_close($conn);
?>

</div>

</center>
</div>
</body>
</html>
