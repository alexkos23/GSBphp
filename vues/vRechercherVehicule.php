

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($cat))
    {
?>
        <h3><?php echo $cat;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>Id</th>
          <th>Marque</th>
          <th>Modele</th>
          
          
        </tr>
      </thead>
      <tbody>       
        <tr>
            <td><?php echo $leVehicule["id"]?></td> 
            <td><?php echo $leVehicule["marque"]?></td>
            <td><?php echo $leVehicule["modele"]?></td>
        </tr>
   
       </tbody>       
     </table>    
  </div>
