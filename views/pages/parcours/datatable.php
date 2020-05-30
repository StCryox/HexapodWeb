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
                    <th><button type='button'>modifier</button></th> 
                    <th><a href='index.php?controller=parcours&action=datatable&delete&name=<?php echo $parcours->name; ?>' type='button'>supprimer</a></th> 
                    </td>                                       
                </tr>
               <?php
               }
               ?>
              </tbody>
            </table>
            </div>
	</div>
</div>
