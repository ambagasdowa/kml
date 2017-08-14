<span>
	<?php
// 		echo $this->Form->input('casetas_units_id',array('placeholder'=>'casetas_units_id','class'=>'input'));
		e($this->Form->input('CasetasControlsUser.casetas_units_id',
						array('type'=>'select',
								'empty'=>'Unidad de Negocio',
								'label'=>false,
								'div'=>false,
// 								'placeholder'=>'casetas_units_id',
								'class'=>'input',
								'options'=>array_map('strtoupper',$bsu)
// 											  'class'=>'form-control',
// 											  'style'=>"font-size:70%;"
// 									      'empty'=>'Empresa'
						)
				)
		);
	?>
</span>