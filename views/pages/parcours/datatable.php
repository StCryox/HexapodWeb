<div class="container">
  <?php 
   if (isset($this->_success_message) && !empty($this->_success_message)) {
  ?>
    <h4 class="text-center">
      <div class="alert alert-success" role="alert">
        <?php echo $this->_success_message; ?>
      </div>
    </h4>
  <?php
   }
  ?>

  <?php 
   if (isset($this->_error_message) && !empty($this->_error_message)) {
  ?>
    <h4 class="text-center">
      <div class="alert alert-danger" role="alert">
        <?php echo $this->_error_message; ?>
      </div>
    </h4>
  <?php
   }
  ?>
  <div class="row">
      <table class="table table-striped table-bordered" style="width:100%" id="parcoursTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th colspan="3">Commande</th>                                     
          </tr>
        </thead>   
        <tbody id="parcoursTBody">
          <?php
          foreach ($this->parcoursList as $parcours)
          {
          ?>
            <tr>
              <td>
                <?php echo $parcours->id; ?>
                <input class="idShow" type="hidden" value="<?php echo $parcours->id; ?>">
              </td>
              <td>
                <?php echo $parcours->name; ?>
                <input class="nameShow" type="hidden" value="<?php echo $parcours->name; ?>">
              </td>
              <td>
                <?php echo $parcours->command; ?>
                <input class="commandShow" type="hidden" value="<?php echo $parcours->command; ?>">
              </td>
              <td>
              <a href='#&id=<?php echo $parcours->id;?>'>
                  <button type='button' class="btn btn-info" onclick="ShowForm_edit()">
                    <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                      <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                    </svg>
                  </button>
                </a>
              </td> 
              <td>
                <a href='?controller=parcours&action=datatable&delete&id=<?php echo $parcours->id; ?>'>
                  <button type='button' class="btn btn-danger">
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
              <form id="form" method="post" action="?controller=parcours&action=datatable&postback#add-cell">
                <td>
                  <?PHP
                  if(!empty($jsondata)) {
                    $last_id = end($jsondata);
                    echo $last_id->id+1;
                  }
                  else echo "1";
                  ?>                  
                </td>
                <td><input type="text" name="name" class="form-control" placeholder="nom"></td>
                <td>
                  <select class="form-control" name="command1" id="command1">
                    <option value="z">Avancer</option>
                    <option value="s">Reculer</option>
                    <option value="d">Droite</option>
                    <option value="q">Gauche</option>
                  </select>
                  <select class="form-control" name="command2" id="command2">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                  <input type="text" name="command" class="form-control" value="" id="commandFull" style="display:none;">
                </td>
                <td>
                  <button id="add_row" type="button" class="btn btn-info" onclick="add_rowData()">
                    <svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                      <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                    </svg>
                  </button>
                </td>
                <td>
                  <button type="submit" class="btn btn-success">
                    <svg class="bi bi-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                    </svg>
                  </button>
                </td>
              </form>                                     
            </tr>
        </tbody>
      </table>
  </div>

  <div class="row">
      <table class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>Commande</th>                                     
          </tr>
        </thead>   
        <tbody>
            <tr>
              <td id="commandAddRowValue"></td>                         
            </tr>
        </tbody>
      </table>
</div>

  <div class="row" id="form_edit" style='display: none;'>
      <table class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th colspan="3">Commande</th>                                     
          </tr>
        </thead>   
        <tbody>
            <tr>
              <form id="form" method="post" action="?controller=parcours&action=datatable&update">
                <td id="idPutShow">
                </td>
                <td>
                  <input type="hidden" id="idPut" name="idPutVal" class="form-control">
                  <input type="text" id="namePut" name="namePutVal" class="form-control">
                </td>
                <td>
                  <input type="text" id="commandPut" name="commandPutVal" class="form-control">
                </td>
                <td colspan="2">
                  <center><button type="submit" class="btn btn-success" onclick="HideForm_edit()">
                    <svg class="bi bi-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                    </svg>
                  </button></center>
                </td>
              </form>                                     
            </tr>
        </tbody>
      </table>
  </div>
</div>
