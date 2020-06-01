<div class="container">
  <div class="row">
    <div class="span5">
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Commande</th>
            <th>modifier</th>
            <th>supprimer</th>                                           
          </tr>
        </thead>   
        <tbody>
          <?php
          foreach ($parcoursList as $parcours)
          {
          ?>
            <tr>
              <td><?php echo $parcours->id; ?></td>
              <td><?php echo $parcours->name; ?></td>
              <td><?php echo $parcours->command; ?></td>
              <td>
                <a href='index.php?controller=parcours&action=edit&update&id=<?php echo $parcours->id; ?>'>
                 <button type='button'>modifier
                 </button>
                </a>
              </td> 
              <td>
                <a href='index.php?controller=parcours&action=datatable&delete&id=<?php echo $parcours->id; ?>'>
                  <button type='button'>
                    <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                  </button>
                </a>
              </td>                                       
            </tr>
          <?php
          }
          ?>
            <tr id="add-cell">
              <form name="formulaire" id="form" method="post" action="?controller=parcours&action=datatable&postback#add-cell">
                <td>ID</td>
                <td><input type="text" name="name" class="form-control" placeholder="nom"></td>
                <td>
                  <select class="form-control" name="command1" id="command1">
                    <option value="avancer">Avancer</option>
                    <option value="reculer">Reculer</option>
                    <option value="droite"> Droite</option>
                    <option value="gauche">Gauche</option>
                  </select>
                  <select class="form-control" name="command2" id="command2">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td>
                  <button onclick="testaa()" id="add_row" type="button" class="btn btn-primary">ajouter</button>
                  <button type="submit" class="btn btn-primary">créer</button>
                <td>
              </form>                                     
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>


<script >
function testaa() {
  let valeur1 = document.getElementById('command1').value;
    let valeur2 = document.getElementById('command2').value;
    console.log(valeur1);
    console.log(valeur2);
    var valeur = valeur1."pendant".valeur2."secondes.";
    console.log(valeur);
    console.log("test");
}
  /*document.getElementById("add_row").addEventListener("click", function(event){
    let valeur1 = document.getElementById('command1').value;
    let valeur2 = document.getElementById('command2').value;
    console.log(valeur1);
    console.log(valeur2);
    var valeur = valeur1."pendant".valeur2."secondes.";
    console.log(valeur);
    console.log("test");
  });*/
</script>