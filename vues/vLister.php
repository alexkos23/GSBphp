

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
     

      </caption>
      <thead>
        <tr>
          <th>Matricule</th>
          <th>Nom</th>
          <th>Prenom</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($legsb))
    { 
 ?>     
        <tr>
            <td><?php echo $legsb[$i]["Mat"]?></td>
            <td><?php echo $legsb[$i]["Nom"]?></td>
            <td><?php echo $legsb[$i]["Prenom"]?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
