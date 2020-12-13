

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
     

      </caption>
      <?php
    if (isset($cat))
    {
?>
        <h3><?php echo $cat;?></h3>
<?php    
    }
?>
      <thead>
        <tr>
          <th>Matricule</th>
          <th>Nom</th>
          <th>Prenom</th>
        </tr>
      </thead>
      <tbody>  
   
        <tr>
            <td><?php echo $legsb["mat"]?></td>
            <td><?php echo $legsb["nom"]?></td>
            <td><?php echo $legsb["prenom"]?></td>
        </tr>
   
       </tbody>       
     </table>    
  </div>

 
