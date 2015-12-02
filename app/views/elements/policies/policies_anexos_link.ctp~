<?php //link?>

<?php
		echo $this->Form->input('PoliciesAnexo.policies_type',
											array(	'class'=>'',
													'type'=>'select',
													'class'=>'form-control',
													'label'=>false,
													'options'=>$policies_types
													)
								);

		echo $this->Form->input('PoliciesAnexo.format_id',array('type'=>'select','label'=>false,'class'=>'form-control','options'=> $policies_format));
		
		echo $this->Form->input('PoliciesAnexo.user_id',array('class'=>'input','placeholder'=>'User','label'=>false,'tag'=>'p'));
		echo $this->Form->input('PoliciesAnexo.group_id',array('class'=>'input','placeholder'=>'Group','label'=>false));

		echo $this->Form->input('PoliciesAnexo.name',array('type'=>'text','label'=>false,'placeholder'=>'Nombre del enlace','class'=>'input'));
		echo $this->Form->input('PoliciesAnexo.description',
												array(	'type'=>'textarea',
														'class'=>'placeholder',
														'label'=>false,
														'placeholder'=>'Descripcion del enlace','rows'=>'5','cols'=>'98'
													)
								);
								
		echo $this->Form->file('PoliciesAnexo.upload', array('type'=>'file','class'=>'input'));

		echo $this->Form->input('PoliciesAnexo.status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'));
		echo $this->Form->input('PoliciesAnexo.link',array('type'=>'hidden','class'=>'form-control','value'=>'true'));
?>