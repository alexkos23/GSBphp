

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
 
      </caption>
      <thead>
        <tr>
          <th>Id </th>
          <th>Marque </th>
          <th>Modele </th>
          <th>Etat </th>
            
          
          
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($levehicule))
    { 
 ?>     
        <tr>
            <td><?php echo $levehicule[$i]["id"]?></td> 
            <td><?php echo $levehicule[$i]["marque"]?></td>
            <td><?php echo $levehicule[$i]["modele"]?></td> 
            <td><?php echo $levehicule[$i]["etat"]?></td>
            
            
            
             
        </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 