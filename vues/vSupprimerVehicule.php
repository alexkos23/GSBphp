<script type="text/javascript">
//<![CDATA[

function valider(){
 frm=document.forms['formAjout'];
  // si le prix est positif
  if(frm.elements['prix'].value >0) {
    // les donn�es sont ok, on peut envoyer le formulaire    
    return true;
  }
  else {
    // sinon on affiche un message
    alert("Le prix doit �tre positif !");
    // et on indique de ne pas envoyer le formulaire
    return false;
  }
}
//]]>
</script>

<!--Saisie des informations dans un formulaire!-->
<div class="container">
<form name="formAjout" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Entrez les donn�es sur le vehicule a supprimer </legend>
    <label>Modele :  </label> <input type="text" placeholder="Entrer le modele�"name="modele" size="10" /><br />
  </fieldset>
  <button type="submit" class="btn btn-primary">Supprimer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>
