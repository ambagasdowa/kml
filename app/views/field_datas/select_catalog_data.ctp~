<?php //select_catalog_data?>
	<?php
// 		echo $this->element('users/update_catalog');
	?>
	
		<?php
			echo $this->Form->input('FieldData.catalog_datas_search_id',
												array(
														'type'=>'select',
														'class'=>'form-control',
														'options'=>$catalogDatas,
														'selected'=> key($catalogDatas),
														'label'=>false,
														'empty'=> 'Nuevo'
														
														)
									);
		?>
	
		<?php
			e($ajax->observeField('FieldDataCatalogDatasSearchId',
												array('url'=>array(
																		'controller'=>'FieldDatas',
																		'action'=>'select_new_data'
															),
// 														"loading"=>"Element.hide(hide);Element.show('waiting');",
// 														"loading"=>"Effect.toggle('divNewCatalog', 'appear');",
														"update"=>"divNewCatalog"
												)
								)
			);
		?>
		
		
		<div id="divNewCatalog"></div>