

<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjout" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Entrez les données sur l'emprunt à ajouter </legend>  
    <label>Id Visiteur : </label> <input type="text" placeholder="Entrer l'id Visiteur…"name="IdVis" size="10" /><br /> 
    <label>Id Vehicule :</label> <input type="text" name="IdVeh" size="20" /><br />
    <label>Date :</label> <input type="date" name="DateEmp" size="10" /><br /> 
   
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>


