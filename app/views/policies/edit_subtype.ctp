<?php echo $this->Session->flash();?>
<?php
	echo $this->Form->input('policies_subtypes_id',array('label'=>'Clasificación','type'=>'select','class'=>'form-control','options'=> $policies_subtype));
?>
