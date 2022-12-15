<?php
// On démarre la session (ceci est indispensable dans toutes les pages de de la section membre)
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

		// On teste pour voir si les variables ont bien été enregistrées
		 echo '<html>';
		 echo '<head>';
		 echo '<title>Administration | SOFINI</title>';
		 echo '<meta http-equiv="Content-type" content="text/html; charset=UTF-8">';
         echo '<link rel="stylesheet" media="screen and (min-width:0px)" style="css" href="style.css">';
		 echo '</head>';

		 echo '<body><center>';
		 echo '<div id="container">';
		 echo '<div id="utilisateur"><h3>Bienvenue <u>'.$_SESSION['login'].'</u> Adiministrateur de Progressus </h3><a href="authentification-logout.php">Deconnection</a></div>';
		 echo '<div id="admin">';
		 echo '<img src="assets/images/Logo-Auto.png"/>';
		 echo '</div>';
		 
		 echo '<div id="cssmenu">
<ul>
   <li class="has-sub"><a href=""><span>Espaces</span></a>
   <ul>
         <li><a href="gestion_client.php"><span>Client</span></a></li>
         <li><a href="gestion-administrateurs.php"><span>Administrateur</span></a></li>
   </ul>
   </li>
   <li class="has-sub"><a href=""><span>garage</span></a>
      <ul>
         <li><a href="gestion_v.php"><span>Vehicule</span></a></li>
         <li><a href="gestion_gar.php"><span>garage</span></a></li>
      </ul>
   </li>
   <li class="has-sub"><a href="gestion_facture.php"><span>Facture</span></a></li>
   <li class="has-sub"><a href="gestion_messag.php"><span>messages</span></a></li>
</ul>
</div>';
         echo '<div id="admin"><p>NB : Pour la gestion des operation cliquer sur les liens<br/>vous trouvez des boutton pour les operation :<br/>Ajouter - Modifier - et supprimer. </p></div>';
         echo '</center></body>';
		 echo '</html>';
}
else {
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}
?>