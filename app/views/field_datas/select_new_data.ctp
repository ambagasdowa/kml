<?php
//select new data
?>
	<?php if($select_new_data === ''){?>
		
		<?php
			echo $this->Form->input('FieldData.new_catalog_datas',
												array(
														'type'=>'text',
														'class'=>'input',
														'placeholder'=>'new_catalog_datas',
														'label'=>false
														)
									);
			echo $this->Form->input('FieldData.new_catalog_description',
												array(
														'type'=>'text',
														'class'=>'input',
														'placeholder'=>'Description',
														'label'=>false
														)
									);
		?>
		
	<?php } else {?>
		
		<?php
			echo $this->Form->input('FieldData.new_catalog_datas',
												array(
														'type'=>'hidden',
														'value'=>$select_new_data,
														'label'=>false
														)
									);
		?>
		
	<?php }?>