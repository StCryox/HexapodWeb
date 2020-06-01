
<?php 
if (isset($success_message) && !empty($success_message)) {
?>
<div class="alert alert-success" role="alert">
  <?php echo $success_message; ?>
</div>
<?php
}
?>

<?php 
if (isset($error_message) && !empty($error_message)) {
?>
<div class="alert alert-danger" role="alert">
  <?php echo $error_message; ?>
</div>
<?php
}
?>
<form>
  <div class="form-group">
    <label for="nom"> </label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <select class="form-control">
  <option value="avancer">Avancer</option>
  <option value="reculer">Reculer</option>
  <option value="droite"> Droite</option>
  <option value="gauche">Gauche</option>
</select>
<select class="form-control">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<form name="formulaire" id="form" method="post" action="index.php?controller=parcours&action=create&postback">
<input id="test" type="text" name="valeur">
<button type="button">Click Me!</button>

<input type="submit" value="Valider"/>
</form>


<script >
  document.getElementById("form").addEventListener("click", function(event){
    let valeur = document.getElementById('test').value;
    console.log(valeur);
    var test = valeur;
  });
</script>