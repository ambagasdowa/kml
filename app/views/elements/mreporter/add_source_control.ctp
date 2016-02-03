<?php //element add_source_control?>

	<?php
		echo $this->Form->input('MrSourceControl.source_company',array('placeholder'=>'source_company','class'=>'input','options'=>$bussinessUnit));
		echo $this->Form->input('MrSourceControl._key',array('placeholder'=>'_key','class'=>'input','options'=>$sourceKeys));
		echo $this->Form->input('MrSourceControl._description',array('placeholder'=>'_description','class'=>'input'));
		echo $this->Form->input('MrSourceControl._add_control',array('type'=>'hidden','placeholder'=>'_description','value'=>TRUE));
// 		echo $this->Form->input('_status',array('placeholder'=>'_status','class'=>'input'));
	?>
