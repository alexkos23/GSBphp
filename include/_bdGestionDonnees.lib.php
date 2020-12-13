<?php

// MODIFs A FAIRE
// Ajouter en t�tes 
// Voir : jeu de caract�res � la connection

/** 
 * Se connecte au serveur de donn�es                     
 * Se connecte au serveur de donn�es � partir de valeurs
 * pr�d�finies de connexion (h�te, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succ�s obtenu, le bool�en false 
 * si probl�me de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='3306';
    $PARAM_nom_bd='gsbvisiteurs'; // le nom de votre base de donn�es
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe='root'; // mot de passe de l'utilisateur pour se connecter
    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
    return $connect;
                                               
    //$hote = "localhost";
    // $login = "root";
    // $mdp = "";
    // return mysql_connect($hote, $login, $mdp);
}


/** 
 * Ferme la connexion au serveur de donn�es.
 * Ferme la connexion au serveur de donn�es identifi�e par l'identifiant de 
 * connexion $idCnx.
 * @param resource $idCnx identifiant de connexion
 * @return void  
 */
function deconnecterServeurBD($idCnx) {

}


function lister()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="select * from visiteur";
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $gsb[$i]['Mat']=$ligne->VIS_MATRICULE;
          $gsb[$i]['Nom']=$ligne->VIS_NOM;
          $gsb[$i]['Prenom']=$ligne->VIS_PRENOM;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $gsb;
}
function ajouter($unMat, $unNom, $unPrenom, &$tabErr) 
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$unMat."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : le matricule existe d�j� !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Cr�er la requ�te d'ajout 
       $requete="insert into visiteur"
       ."(VIS_MATRICULE,VIS_NOM,VIS_PRENOM) values ('"
       .$unMat."','"
       .$unNom."','"
       .$unPrenom."')";
  
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le visiteur a �t� correctement ajout�";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout du visiteur a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
  echo $requete;
}
  
   function supprimer($unMat, &$tabErr)
{
    $connexion = connecterServeurBD();
    
    $gsb = array();
    $requete="select * from visiteur";
      $requete=$requete." where VIS_MATRICULE='".$unMat."';";
      $jeuResultat=$connexion->query($requete);
     $ligne = $jeuResultat->fetch();
     if ($ligne)
     { 
          
    $requete="delete from visiteur";
    $requete=$requete." where VIS_MATRICULE='".$unMat."';";
    
    // Lancer la requ�te supprimer
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le visiteur a �t� correctement supprim�";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la suppression du visiteur a �chou� !!!";
          ajouterErreur($tabErr, $message);
        
       }
      
        } 
       
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}



function rechercher($unMat, &$tabErr)
{
 // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();

  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {

    // V�rifier que le matricule saisie n'existe pas d�ja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$unMat."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet

    $ligne = $jeuResultat->fetch();
    if($ligne)
    {

          $gsb['mat']=$ligne->VIS_MATRICULE;
          $gsb['nom']=$ligne->VIS_NOM;
          $gsb['prenom']=$ligne->VIS_PRENOM;
          $ligne=$jeuResultat->fetch();

    }
    else
    {
      $message="Echec de l'ajout : le matricule n'existe pas d�j� !";
      ajouterErreur($tabErr, $message);
     }
     }
       $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $gsb;

}



function modifier($unMat, $unNom, $unPrenom,&$tabErr)
{
  
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$unMat."';";
              
   
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    // Cr�er la requ�te de modification 
  
    $requete= "UPDATE `gsbvisiteurs`.`visiteur` SET `VIS_MATRICULE` = '$unMat',
    `VIS_NOM` = '$unNom',
    `VIS_PRENOM` = '$unPrenom' WHERE `visiteur`.`VIS_MATRICULE`='$unMat';";
         
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le visiteur a �t� correctement modifi�";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la modification du visiteur a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 
        
    }
  


function listervehicule()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      $requete="select * from vehicule";
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $vehicule[$i]['id']=$ligne->id;
          $vehicule[$i]['marque']=$ligne->marque;
          $vehicule[$i]['modele']=$ligne->modele;
          $vehicule[$i]['etat']=$ligne->etat;
           
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $vehicule;
}

function ajouterVehicule($unModele, $uneMarque,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from vehicule";
    $requete=$requete." where modele = '".$unModele."';";    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : la r�f�rence existe d�j� !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Cr�er la requ�te d'ajout 
       $requete="insert into vehicule"
       ."(marque,modele) values ('"
       .$uneMarque."','"
       .$unModele."');";
    echo($requete);
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le vehicule a �t� correctement ajout�e";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout du vehicule a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function supprimerVehicule($unModele,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from vehicule";
    $requete=$requete." where modele = '".$unModele."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
       // Cr�er la requ�te d'ajout 
       $requete="delete from vehicule";
       $requete=$requete." where modele = '".$unModele."';"; 
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete);
        if ($ok)
        {
          $message = "Le vehicule a �t� correctement supprim�";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la suppression du vehicule a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 
    }
    else
    {
      $message="Echec de la suppression !";
      ajouterErreur($tabErr, $message);
        // Si la requ�te a r�ussi
      
    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}
function rechercherVehicule($id, &$tabErr)
{
 // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();

  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {

    // V�rifier que le matricule saisie n'existe pas d�ja
    $requete="select * from vehicule";
    $requete=$requete." where id = '".$id."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet

    $ligne = $jeuResultat->fetch();
    if($ligne)
    {

          $vehicule['id']=$ligne->id;
          $vehicule['marque']=$ligne->marque;
          $vehicule['modele']=$ligne->modele; 
          $ligne=$jeuResultat->fetch();

    }
    else
    {
      $message="Echec de la recherche : l'id n'existe pas !";
      ajouterErreur($tabErr, $message);
     }
     }
       $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $vehicule;

}



function modifierVehicule($id, $marque, $modele, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();

  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {

    // V�rifier que le matricule saisie n'existe pas d�ja

      // Cr�er la requ�te d'ajout 
       $requete="UPDATE GSB.vehicule SET marque = '$marque',
    modele = '$modele'
     WHERE vehicule.id='$id';";




        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le vehicule a �t� correctement modifier";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la modification du vehicule a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 


    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}






function ajouterEmprunt($IdVisiteur, $MatVehicule, $DateEmprunt, &$tabErr) 
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from emprunt";
    $requete=$requete." where id_visiteur = '".$IdVisiteur."'or id_vehicule= '".$MatVehicule."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : L'emprunt existe d�j� !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Cr�er la requ�te d'ajout 
       $requete="insert into emprunt"
       ."(id_visiteur,id_vehicule,date_emprunt) values ('"
       .$IdVisiteur."','"
       .$MatVehicule."','"
       .$DateEmprunt."')";
  
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "L'emprunt a �t� correctement ajout�";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout de l'emprunt a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
  echo $requete;
}


function restituerVehicule($IdVisiteur, $MatVehicule, $DateEmprunt, $DateRestitution, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();

  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {

    // V�rifier que le matricule saisie n'existe pas d�ja

      // Cr�er la requ�te d'ajout 
       $requete="UPDATE GSB.emprunt SET id_visiteur = '$IdVisiteur',
    id_vehicule = '$MatVehicule'     ,  date_emprunt = '$DateEmprunt'     ,        date_restitution = '$DateRestitution' 
     WHERE 'emprunt'.'id_visiteur'='$IdVisiteur' AND 'emprunt'.'id_vehicule'='$MatVehicule';";




        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le vehicule a �t� correctement modifier";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la modification du vehicule a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 


    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
  echo $requete;
}

function listerEmprunt()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      $requete="select * from emprunt where date_restitution is NULL;";
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $emprunt[$i]['idVis']=$ligne->id_visiteur;
          $emprunt[$i]['idVeh']=$ligne->id_vehicule;
          $emprunt[$i]['dateEmp']=$ligne->date_emprunt;
           
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $emprunt;
}

function rechercherEmprunt($unIdVis, $unIdVeh, $uneDateEmp, &$tabErr)
{
 // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();

  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {

    // V�rifier que le matricule saisie n'existe pas d�ja
    $requete="select * from emprunt";
    $requete=$requete." where id_visiteur = '".$unIdVis."' and id_vehicule ='".$unIdVeh."';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet

    $ligne = $jeuResultat->fetch();
    if($ligne)
    {

          $emprunt['idVis']=$ligne->id_visiteur;
          $emprunt['idVeh']=$ligne->id_vehicule;
          $emprunt['dateEmp']=$ligne->date_emprunt;
          $ligne=$jeuResultat->fetch();

    }
    else
    {
      $message="Echec de l'ajout : cet emprunt existe d�j� !";
      ajouterErreur($tabErr, $message);
     }
     }
       $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $emprunt;
  echo $requete;

}


function modifierEmprunt($unIdVis, $unIdVeh, $uneDateRetour, &$tabErr)
{
    $connexion= connecterServeurBD();
     if (TRUE) 
  {
   // $requete="select * from emprunt";
    //$requete=$requete." where id_visiteur = '".$unIdVis."' and id_vehicule ='".$unIdVeh."';";
    //$jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet

    //$ligne = $jeuResultat->fetch();
     // Si la connexion au SGBD � r�ussi
 
// if ($ligne)
  //     {
    // V�rifier que le matricule saisie n'existe pas d�ja

      // Cr�er la requ�te d'ajout 
       $requete="UPDATE gsbvisiteurs.emprunt SET date_restitution = '".$uneDateRetour."' 
       WHERE emprunt.id_visiteur = '".$unIdVis."' and emprunt.id_vehicule = '".$unIdVeh."';";




        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "L'emprunt a ete correctement modifier";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la modification de l'emprunt a echoue !!!";
          ajouterErreur($tabErr, $message);
        } 


    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probleme a la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
  echo $requete;


}
function identifier($nom, $mdp,&$tabErr)
{
  
  // Initialisation de l'identification a �chec
  $ligne = false;

   // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if ($connexion) 
  {    
    // V�rifier que nom et login existent
    $requete="select * from utilisateur where nom ='".$nom."' and mdp ='".$mdp."' ;";
 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    if ($ligne)
    {
        $i = $i + 1;
    }
    else
    {
      $message = "Echec de l'identification !!!";
      ajouterErreur($tabErr, $message);
    }
    // fermer le jeu de r�sultat
    $jeuResultat->closeCursor();
  }
  else
  {
    $message = "probleme � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
  // renvoyer les informations d'identification si r�ussi
  return $ligne;
  
  echo $requete;
}


function rechercherUtilisateur($log, $psw, &$tabErr)
{
    $connexion = connecterServeurBD();
      
    $requete="select * from utilisateur";
      $requete=$requete." where nom='".$log."' and mdp ='".$psw."';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    if ($ligne)
    {
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
      // Si la requ�te a r�ussi
  
  return $i;
                echo $requete;
}

function inscrire($nom, $mdp,&$tabErr)
{

   // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if ($connexion) 
  {
    // V�rifier que le nom saisi n'existe pas d�ja
    $requete="select * from utilisateur";
    $requete=$requete." where nom = '".$nom."';"; 

   $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    
    if($ligne)
    {
      $message="Echec de l'inscription : le nom existe deja !";
      ajouterErreur($tabErr, $message);
 
    }
    else
    {
      // Cr�er la requ�te d'ajout      
       $requete="insert into utilisateur"
       ."(nom,mdp,categorie) values ('"
       .$nom."','"
       .$mdp."','client');";
       
         // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
         
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Inscription effectuee";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'inscription a echoue !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function listerPanne()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      $requete="select * from vehicule where etat = 1;";
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $emprunt[$i]['idVeh']=$ligne->id;
          $emprunt[$i]['marque']=$ligne->marque;
          $emprunt[$i]['modele']=$ligne->modele; 
          $emprunt[$i]['etat']=$ligne->etat;
           
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $emprunt;
}


function declarerPanne($unIdVeh, &$tabErr)
{
    $connexion= connecterServeurBD();
     if (TRUE) 
  {
  // $requete="select * from vehicule";
  //$requete=$requete." where id_vehicule ='".$unIdVeh."';";
    //$jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet

    //$ligne = $jeuResultat->fetch();
    //Si la connexion au SGBD � r�ussi
 
 //if ($ligne)
  //{
    // V�rifier que le matricule saisie n'existe pas d�ja

      // Cr�er la requ�te d'ajout 
       $requete="UPDATE gsbvisiteurs.vehicule SET etat = 1 
       WHERE vehicule.id = '".$unIdVeh."';";




        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "La panne a ete correctement declare";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la declaration de la panne a echoue !!!";
          ajouterErreur($tabErr, $message);
        } 


    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probleme a la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
  echo $requete;
    

}
function supprimerPanne($unIdVeh, &$tabErr)
{
    $connexion= connecterServeurBD();
     if (TRUE) 
  {
   // $requete="select * from emprunt";
    //$requete=$requete." where id_visiteur = '".$unIdVis."' and id_vehicule ='".$unIdVeh."';";
    //$jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet

    //$ligne = $jeuResultat->fetch();
     // Si la connexion au SGBD � r�ussi
 
// if ($ligne)
  //     {
    // V�rifier que le matricule saisie n'existe pas d�ja

      // Cr�er la requ�te d'ajout 
       $requete="UPDATE gsbvisiteurs.vehicule SET etat = 0
       WHERE vehicule.id = '".$unIdVeh."';";




        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "La panne a ete correctement supprime";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la suppression de la panne a echoue !!!";
          ajouterErreur($tabErr, $message);
        } 


    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probleme a la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
  echo $requete;


}

?>
