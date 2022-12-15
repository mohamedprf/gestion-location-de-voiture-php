<?php
include("connect.php");

if(isset($_GET['delete'])){
$id = $_GET['id'];


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

<h1>Gestion des Message</h1>


<?php
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

if(isset($_GET['delete'])){
	$DeleteQuery = "DELETE from contact WHERE id='$id'";      
	mysqli_query($conn,$DeleteQuery);
		}

$sql = "SELECT * FROM `contact`";
$myData = mysqli_query($conn,$sql);

?>
<div id='afficher'>
<table>
<tr>
<th>id</th>
<th>nom</th>
<th>email</th>
<th>phone</th>
<th>message</th>
</tr>
<?php 

while($record = mysqli_fetch_array($myData)){

?>
<form action=gestion_messag.php method=GET>
<tr>
<td><input type=text name=id value="<?php echo $record[0]; ?>" /></td>
<td><input type=text name=nom value=" <?php echo $record[1]; ?>" /></td>
<td><input type=text name=email value="<?php echo $record[2]; ?>" /></td>
<td><input type=text name=phone value="<?php echo $record[3]; ?>" /></td>
<td><input type=text name=msg value="<?php echo $record[4]; ?>" /></td>
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
		echo"makin walo";
}
mysqli_close($conn);
?>

</div>

</center>
</div>
</body>
</html>
