<?php
include("connect.php");

// pour utilisateurs

$login = $_POST['login'];
$password = $_POST['password'];


$sqladmin = mysql_query("SELECT login,password FROM admin WHERE login='$login' AND password='$password'");

if(mysql_fetch_row($sqladmin))
{

				// dans ce cas, tout est ok, on peut démarrer notre session
				session_start ();
				// on enregistre les paramètres du visiteur comme variables de session ($identifiant et $motdepasse)
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['password'] = $_POST['password'];

				// on redirige le visiteur vers la page de la section membre
				header ('location: administration.php');
}		
else {
			// Le visiteur n'a pas été reconnu comme étant membre du site. On utilise alors un petit javascript lui signalant ce fait
			echo 'vous-etes pas administrateur de SOFINI';
			echo "__";
			echo $login;
			echo "__";
			echo $password;
			// puis on le redirige vers la page d'accueil
			//echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

/*
// pour les utilisateurs

$sqluser = mysql_query("SELECT identifiant,motdepasse FROM inscription WHERE identifiant='$identifiant' AND motdepasse='$motdepasse'");

if(mysql_fetch_row($sqluser))
{

				// dans ce cas, tout est ok, on peut démarrer notre session
				session_start ();
				// on enregistre les paramètres du visiteur comme variables de session ($identifiant et $motdepasse)
				$_SESSION['identifiant'] = $_POST['identifiant'];
				$_SESSION['motdepasse'] = $_POST['motdepasse'];

				// on redirige le visiteur vers la page de la section membre
				header ('location: Utilisateur.php');
}		
else {
			// Le visiteur n'a pas été reconnu comme étant membre du site. On utilise alors un petit javascript lui signalant ce fait
			echo 'vous-etes non incrit dans le site.';
			// puis on le redirige vers la page d'accueil
			echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}
*/
?>