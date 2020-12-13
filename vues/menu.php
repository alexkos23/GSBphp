<?php
$est=!estConnecte();
?>
  <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./indexzz.php">Acc</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./indexzz.php">Accueil</a>
              </li>
      <?php
              if (estConnecte())
{

  ?>
              
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Visiteurs  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="lister.php">Lister</a></li>
                      <li><a href="ajouter.php">Ajouter</a></li>
                       <li><a href="supprimer.php">Supprimer</a></li>
                      <li><a href="modifier.php">Modifier</a></li>
                       <li><a href="rechercher.php">Rechercher</a></li>
                  </ul>
              </li>
               <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Vehicules  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="listerVehicules.php">Lister</a></li>
                      <li><a href="ajouterVehicules.php">Ajouter</a></li>
                       <li><a href="supprimerVehicules.php">Supprimer</a></li>
                      <li><a href="modifierVehicules.php">Modifier</a></li>
                       <li><a href="rechercherVehicules.php">Rechercher</a></li>
                  </ul>
              </li>
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Emprunt  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="emprunterVehicules.php">Emprunter Vehicules</a></li>
                      <li><a href="restituer.php">Restituer Vehicules</a></li>
                       <li><a href="listerEmprunt.php">Lister Emprunt</a></li>
                  </ul>
              </li>
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Panne  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="listerPanne.php">Lister Panne</a></li>
                      <li><a href="declarerPanne.php">Declarer Panne</a></li>
                      <li><a href="supprimerPanne.php">Supprimer Panne</a></li>
                      
                  </ul>
              </li>
              <li class="active">
                <a href="deconnecter.php">Se Deconnecter</a>
              </li>
   <?php
}
                      
if (!estConnecte())
{
?>
              <li class="nav">
                <a href="inscrire.php" >Inscription</a> 
              </li>
              <li class="nav">  
                <a href="identifier.php" >Identification</a> 
              </li>   
<?php
}   
?>                  
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>

