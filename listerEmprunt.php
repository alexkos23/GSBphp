<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
  require($repInclude . "_init.inc.php");

  $lemprunt = listerEmprunt();
  
  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vListerEmprunt.php");
  include($repVues."pied.php") ;
  ?>
    
