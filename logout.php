<?php 
session_start();
session_destroy(); // sessions löschen
unset($_SESSION['userid']);

//coockies löschen
setcookie("identifier","",time()-(3600*24*365)); 
setcookie("securitytoken","",time()-(3600*24*365)); 

require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

include("templates/header.inc.php");
?>

<div class="container main-container">
Der Logout war erfolgreich. <a href="login.php">Zurück zum Login</a> oder
 <a href="index.php">Zurück zur Hauptseite</a>.
</div>
