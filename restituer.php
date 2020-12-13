<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Modifier"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  


// Déterminer l'étape et lire les données POST


   $unIdVis=lireDonneePost("idVis", "");
   $unIdVeh=lireDonneePost("idVeh", "");
   $uneDateRetour=lireDonneePost("dateRet", "");

     if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape= 2;
  modifierEmprunt($unIdVis, $unIdVeh, $uneDateRetour, $tabErreurs);
                  }

 include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."erreur.php");
include($repVues."vRestitue.php") ;   
include($repVues."pied.php") ;







?>
  
           