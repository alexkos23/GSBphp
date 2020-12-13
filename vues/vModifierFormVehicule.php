<!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form action="" method=post>
    <input type="hidden" name="etape" value="3" />

    <fieldset>
      <legend>Entrez les données sur la fleur à modifier </legend>
      <label> Id :</label>
      <label><?php echo $leVehicule["id"]; ?> </label>
      <input type="hidden" name="Idcache" value="<?php echo $leVehicule["id"]; ?>" /><br />
      <label>Marque :</label>
      <input type="text" name="marque" value="<?php echo $leVehicule["marque"]; ?>" size="20" /><br />
      <label>Modele :</label>
      <input type="text" name="modele" value="<?php echo $leVehicule["modele"]; ?>" size="10" /><br /> 
    </fieldset>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>



