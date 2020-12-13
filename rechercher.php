<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
 
     
$unMat=lireDonneePost("mat", "");


if (count($_POST)==0)
{
  $etape = 1;
}
if(count($_POST)==1 )
{
  $etape = 2;
  $legsb=rechercher($unMat, $tabErreurs);
  
}
 
 
 
 
 
// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."erreur.php");
if ($etape==1)
{
include($repVues."vRechercherForm.php") ; 
}
if ($etape==2)
{
  include($repVues."vRechercher.php") ; 
}
include($repVues."pied.php") ;
?>
    
