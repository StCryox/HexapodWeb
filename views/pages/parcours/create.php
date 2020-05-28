
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

<form name="formulaire" id="form" method="post" action="index.php?controller=parcours&action=create&postback">
<input  type="text" name="valeur">
<button type="button">Click Me!</button>

<input type="submit" value="Valider"/>
</form>


<script >

document.getElementById("form").addEventListener("click", function(event){
  let valeur = document.forms["formulaire"].elements[0].value;

  console.log(valeur);
});


</script>