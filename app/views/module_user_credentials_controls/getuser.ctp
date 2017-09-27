

<div style="page-break-after: always;">&nbsp;</div>
<?php
  // if ($user_id) {
      echo $this->Form->input('ModuleUserCredentialsControl.user_id',array('type'=>'hidden','value'=>$user_id));

      echo $this->Form->input(
                              'ModuleUserCredentialsControl.module_user_credentials_mains_id',
                                    array(
                                          'placeholder'=>'module_user_credentials_mains_id'
                                          ,'empty'=>'Seleccione'
                                          ,'div'=>false
                                          ,'class'=>'model_name search_data input'
                                         )
                              );
 // }
?>
<div style="page-break-after: always;">&nbsp;</div>
<div class="updateModuleColumn"></div>
