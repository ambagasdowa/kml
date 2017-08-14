<?php 
// var_dump($catalogDatas);
?>

		<?php
			echo $this->Form->input('FieldData.catalog_datas_id',
												array(
														'type'=>'select',
														'class'=>'form-control',
														'options'=>$catalogDatas,
														'selected'=> key($catalogDatas),
														'placeholder'=>'catalog_datas_id',
														'label'=>false,
														'empty'=> 'Nuevo'
														
														)
									);
		?>

