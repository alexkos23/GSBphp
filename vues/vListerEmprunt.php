

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
     

      </caption>
      <thead>
        <tr>
          <th>Id Visiteur</th>
          <th>Id Vehicule</th>
          <th>Date Emprunt</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lemprunt))
    { 
 ?>     
        <tr>
            <td><?php echo $lemprunt[$i]["idVis"]?></td>
            <td><?php echo $lemprunt[$i]["idVeh"]?></td>
            <td><?php echo $lemprunt[$i]["dateEmp"]?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
