<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$unIdVisiteur=lireDonneePost("IdVis", "");
$unIdVehicule=lireDonneePost("IdVeh", "");
$uneDateEmprunt=lireDonneePost("DateEmp", "");


if (count($_POST)==0)
{
  $etape = 1;
}

else if (count($_POST)==1)
  {
   $legsb = rechercherEmprunt($unIdVisiteurt, $unIdVehicule, $tabErreurs);
    // Si une fleur est trouvée, on passe à l'étape suivante
    //var_dump($lafleur);
    if (count($legsb)>0)
    {
      $etape = 2;
    }
         }
else
{
  $etape = 2;
  ajouterEmprunt($unIdVisiteur, $unIdVehicule, $uneDateEmprunt, $tabErreurs);      
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."erreur.php");
include($repVues."vEmprunterForm.php") ;
include($repVues."pied.php") ;
?>
  
