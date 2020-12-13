<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
 
$unId=lireDonneePost("id", "");


if (count($_POST)==0)
{
  $etape = 1;
}
if(count($_POST)==1 )
{
  $etape = 2;
  $leVehicule=rechercherVehicule($unId, $tabErreurs);
  
}
 
 
 
// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."erreur.php");
if ($etape==1)
{
include($repVues."vRechercherFormVehicule.php") ; 
}
if ($etape==2)
{
  include($repVues."vRechercherVehicule.php") ; 
}
include($repVues."pied.php") ;
?>
    
