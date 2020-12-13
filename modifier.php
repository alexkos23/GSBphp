<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Modifier"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  


// D�terminer l'�tape et lire les donn�es POST


     if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  if (count($_POST)==1)
  {
   $uneMat=lireDonneePost("mat", "");
   $legsb = rechercher($uneMat, $tabErreurs);
    // Si une fleur est trouv�e, on passe � l'�tape suivante
    //var_dump($lafleur);
    if (count($legsb)>0)
    {
      $etape = 2;
    }
    else
    {
      // Aucune fleur n'est trouv�e
      // Afficher un message d'erreur
      $message="Echec de la modification : le visiteur n'existe pas !";
      ajouterErreur($tabErreurs, $message);
      // Revenir � l'�tape 1
      $etape = 1;
    }
     }
  else
  {
    $etape = 3;
    $uneMat=$_POST["mat"];
    $unNom=$_POST["nom"];
    $unPrenom=$_POST["prenom"];
    modifier($uneMat, $unNom, $unPrenom,$tabErreurs);
    // Message de r�ussite pour l'affichage
    if (nbErreurs($tabErreurs)==0)
    {
      $reussite = 1;
      $messageActionOk = "Le visiteur a �t� correctement modifi�e";
    }
  }
}

 include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape==1 )
{
include($repVues."vModifierRefForm.php") ;   
}
if ($etape==2)
{
include ($repVues."vModifierForm.php") ; 
}
if ($etape==3)
{
  include($repVues."vAccueil.php");
}
include($repVues."pied.php") ;







?>
  
