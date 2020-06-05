function ShowForm_edit(element) {
    $("#form_edit").show();
    let idShow,nameShow,commandShow,idS,nameS,commandS,i;

    idS = document.getElementsByClassName('idShow');
    nameS = document.getElementsByClassName('nameShow');
    commandS = document.getElementsByClassName('commandShow');
      
    $('#parcoursTBody').find('tr').click( function(){
      
    rowID = $(this).index()+1;
   
    idShow = idS[rowID-1].value;
    nameShow = nameS[rowID-1].value;
    commandShow = commandS[rowID-1].value; 
    
    document.getElementById('idPutShow').innerHTML  = idShow;
    document.getElementById('idPut').value  = idShow;//Not used for now
    document.getElementById('namePut').value = nameShow;
    //document.getElementById('commandPutAdd').value = commandShow; Not used for now
    
      for (i=0;i<commandShow.length;i++)
      {
        document.getElementById('commandPut').value = commandShow.replace(/<\/br\>/g, "");
      }
 
    });
    
  }
  
  function HideForm_edit() {
     $("#form_edit").hide();
  }
  
  function add_rowData(){
    let val1,val2,value_to_text,second,commandPOST,dataPOST,command,RowData;

    val1 = document.getElementById("command1").value;
    val2 = document.getElementById("command2").value;

    value_to_text = '';
    second = '';

    // POSTBACK
    commandPOST = val1 + '+' + val2 + ';';
    dataPOST = stockage(commandPOST);
    document.getElementById('commandFull').value = dataPOST;
        
      switch (val1) {
        case 'z':
          value_to_text = val1.replace("z", "Avancer");
        break;
        case 'q':
          value_to_text = val1.replace("q", "Tourner à gauche");
        break;
        case 's':
          value_to_text = val1.replace("s", "Reculer");
          break;
        case 'd':
          value_to_text = val1.replace("d", "Tourner à droite");
          break;
      }

    if(val2 == 1) second = ' seconde';
    else second = ' secondes';
    
    command = value_to_text + ' pendant ' + val2 + second + '.' + '</br>';
    RowData = view(command);
    document.getElementById('commandAddRowValue').innerHTML = RowData;

  }

  var commandBrut = '';
  function stockage(stockage){
    commandBrut += stockage;
    return commandBrut;
  }

  var commandBeautify = '';
  function view(stockage){
    commandBeautify += stockage;
    return commandBeautify;
  }
