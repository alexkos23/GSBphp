<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
  require($repInclude . "_init.inc.php");

   $id="";
  /*if (isset($_GET['categ']))
  {
  $cat = $_GET['categ'];
  }*/  
  $levehicule = listervehicule();
  if (isset($_GET['id']))
  {
  $levehicule = listervehicule();
  }

  
  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vListerVehicules.php");
  include($repVues."pied.php") ;
  ?>
    
