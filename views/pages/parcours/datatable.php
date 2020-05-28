<div class="container">
	<div class="row">
		<div class="span5">
            <table class="table table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Username</th>
                      <th>Date registered</th>
                      <th>Status</th>                                          
                  </tr>
              </thead>   
              <tbody>
               <?php
                    foreach ($parcoursList as $parcours)
                    {
                ?>
                 <tr>
                    <td><?php echo $parcours->name; ?></td>
                    <td><?php echo $parcours->command; ?></td>
                    <td><span class="label label-success">Active</span>
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
