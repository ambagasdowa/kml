<?php
	//source_company
?>

<?php if ((int)$loadView === 0 ) {?>
	<?php echo $this->element('mreporter/add_source_control',array('bussinessUnit'=>$bussinessUnit,'sourceKeys'=>$sourceKeys)); ?>
<?php }?>
		<?php
			echo $this->Form->input('MrSourceAccount.company',
												array(
														'type'=>'select',
														'empty'=>'Seleccione Registro',
														'class'=>'form-control',
														'options'=>$bussinessUnit
														)
									);
		?>
		
		
