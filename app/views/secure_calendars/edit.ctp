<?php //EDIT ?>

<?php //debug($secureStructures); ?>


	<div id="dialog" style="color:black;width:620px;">

			<div class="modal-body">
				<?php echo $this->Form->create('SecureCalendar');?>
					<fieldset>
						<legend><?php __('Edit SecureCalendar'); ?></legend>
					<?php
						echo $this->Form->input('id',array('class'=>'form-control'));
						echo $this->Form->input('title',array('class'=>'form-control'));
					?>
<!--					<div class="checkbox">
						<label>Allday
						<input type="checkbox" name="data[SecureCalendar][allday]" <?php //($this->data['SecureCalendar']['allday']) ? e('checked') : e(''); ?>>
						<i class="fa fa-square-o"></i>
						</label>
					</div>-->
					<div class="checkbox">
						<label>Editable
						<input type="checkbox" name="data[SecureCalendar][editable]" <?php $this->data['SecureCalendar']['editable'] ? e('checked') : e('');?>>
						<i class="fa fa-square-o"></i>
						</label>
					</div>

					<?php
// 								echo $this->Form->input('allday',array('class'=>'form-control'));
// 								echo $this->Form->input('editable',array('class'=>'form-control'));
// 						echo $this->Form->input('url',array('class'=>'form-control'));
						
								/** NOTE @SecureStructures <section>*/
								echo $this->Form->input(
												'SecureStructure.id',
															array(
																'type'=>'hidden',
																'value'=>$secureStructures['SecureStructure']['id']
																)
												);
								echo $this->Form->input(
												'SecureStructure.group_id',
															array(
																'placeholder'=>'group_id',
																'class'=>'input',
																'selected'=>$secureStructures['SecureStructure']['group_id'],
																'label'=>'Grupo'
																)
												);
								echo $this->Form->input(
												'SecureStructure.user_id',
															array(
																'placeholder'=>'user_id',
																'class'=>'input',
																'selected'=>$secureStructures['SecureStructure']['user_id'],
																'label'=>'Usuario'
																)
												);
								echo $this->Form->input(
												'SecureStructure.secure_topics_id',
															array(
																'placeholder'=>'secure_topics_id',
																'class'=>'input',
																'selected'=>$secureStructures['SecureStructure']['secure_topics_id'],
																'label'=>'Tema'
																)
												);
								echo $this->Form->input(
												'SecureStructure.secure_topics_types_id',
															array(
																'placeholder'=>'secure_topics_types_id',
																'class'=>'input',
																'selected'=>$secureStructures['SecureStructure']['secure_topics_types_id'],
																'label'=>'Documento'
																)
												);
								echo $this->Form->input(
												'SecureStructure.secure_gpo_chiefs_id',
															array(
																'placeholder'=>'secure_gpo_chiefs_id',
																'class'=>'input',
																'selected'=>$secureStructures['SecureStructure']['secure_gpo_chiefs_id'],
																'label'=>'Responsable'
																)
												);
								echo $this->Form->input(
												'SecureStructure.secure_goes_id',
															array(
																'placeholder'=>'secure_goes_id',
																'class'=>'input',
																'selected'=>$secureStructures['SecureStructure']['secure_goes_id'],
																'label'=>'Dirigido a :'
																)
												);
								echo $this->Form->input(
												'SecureStructure.secure_calendars_id',
															array(
																'placeholder'=>'secure_calendars_id',
																'class'=>'input',
																'selected'=>$secureStructures['SecureStructure']['secure_calendars_id'],
																'label'=>'Calendar:'
																)
												);
								
						
						
// 						echo $this->Form->input('constraint',array('class'=>'form-control'));
						echo $this->Form->text('color',array('type'=>'color','value'=>$this->data['SecureCalendar']['color'],'onchange'=>"clickColor(0, -1, -1, 5)",'class'=>'form-control'));
// 						echo $this->Form->input('rendering',array('class'=>'form-control'));
// 						echo $this->Form->input('overlap',array('class'=>'form-control'));
						echo $this->Form->input('description',array('class'=>'form-control'));
// 								echo $this->Form->input('create');
// 								echo $this->Form->input('status');
					?>
					</fieldset>

					<div>&nbsp;</div>
					<div class="form-group pull-right">
						<?php echo $this->Form->end(array('div'=>false,'class'=>'btn btn-success'));?>
<!-- 								<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> -->
					</div>

			</div>
	</div>