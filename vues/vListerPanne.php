

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
     

      </caption>
      <thead>
        <tr>
          <th>Id Vehicule</th>
          <th>Marque</th>
          <th>Modele</th>
          <th>Etat</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lemprunt))
    { 
 ?>     
        <tr>
            <td><?php echo $lemprunt[$i]["idVeh"]?></td>
            <td><?php echo $lemprunt[$i]["marque"]?></td>
            <td><?php echo $lemprunt[$i]["modele"]?></td>
            <td><?php echo $lemprunt[$i]["etat"]?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
              