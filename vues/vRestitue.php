

<?php 
if (isset($message))
  {
?>
    <div class="container"><?php echo $message ?> </div>
<?php
  }
?>
 
<!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form action="" method=post>
    <fieldset>
      <legend>Entrez les données sur la date de restitution </legend>
      <label>Id Visiteur:</label> <input type="text" name="idVis" size="10" />
      <label>Id Vehicule:</label> <input type="text" name="idVeh" size="10" />  
      <label>Date Restitution:</label> <input type="date" name="dateRet" size="12" />
      <label>Etat du vehicule:</label> <input type="checkbox" name="etat">
       en panne <input type="checkbox" name="etat"> bon etat
       </fieldset>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>



