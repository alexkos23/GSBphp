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


  
   $unIdVeh=lireDonneePost("idVeh", "");

     if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape= 2;
  declarerPanne($unIdVeh, $tabErreurs);
                  }

 include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."erreur.php");
include($repVues."vDeclarerPanne.php") ;   
include($repVues."pied.php") ;







?>
  