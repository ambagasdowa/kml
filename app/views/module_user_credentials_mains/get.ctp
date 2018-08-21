<?php
      // echo '<div class="input text">';
      // debug($columns);
      echo $this->Form->input('ModuleUserCredentialsMain.model_name',array('type'=>'hidden','value'=>$modelname));

      echo $this->Form->input(
                              'ModuleUserCredentialsMain.database_name',
                                    array(
                                           'value'=>$table_name
                                          ,'placeholder'=>'database_name'
                                          ,'class'=>'database_name input'
                                          ,'readonly'=>'readonly'
                                        )
                             );

      echo $this->Form->input(
                              'ModuleUserCredentialsMain.database_column',
                                    array(
                                          'type'=>'select'
                                          ,'empty'=>'Selecciona Columna'
                                          ,'placeholder'=>'database_column input'
                                          ,'div'=>false
                                          ,'class'=>'search_input input'
                                          ,'options'=>$columns
                                          )
                              );
      // echo '</div>';
?>


<!-- <div class="input text">
    <label for="ModuleUserCredentialsMainDatabaseColumn">Database Column</label>
    <input
            name="data[ModuleUserCredentialsMain][database_column]"
            type="text"
            placeholder="database_column"
            class="input"
            id="ModuleUserCredentialsMainDatabaseColumn"
     />
</div> -->
