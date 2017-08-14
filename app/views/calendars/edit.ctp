<?php //EDIT ?>
	<div id="dialog" style="color:black;width:620px;">

			<div class="modal-body">
				<?php echo $this->Form->create('Calendar');?>
					<fieldset>
						<legend><?php __('Edit Calendar'); ?></legend>
					<?php
						echo $this->Form->input('id',array('class'=>'form-control'));
						echo $this->Form->input('title',array('class'=>'form-control'));
					?>
					<div class="checkbox">
						<label>Allday
						<input type="checkbox" name="data[Calendar][allday]" <?php ($this->data['Calendar']['allday']) ? e('checked') : e(''); ?>>
						<i class="fa fa-square-o"></i>
						</label>
					</div>
					<div class="checkbox">
						<label>Editable
						<input type="checkbox" name="data[Calendar][editable]" <?php $this->data['Calendar']['editable'] ? e('checked') : e('');?>>
						<i class="fa fa-square-o"></i>
						</label>
					</div>

					<?php
// 								echo $this->Form->input('allday',array('class'=>'form-control'));
// 								echo $this->Form->input('editable',array('class'=>'form-control'));
						echo $this->Form->input('url',array('class'=>'form-control'));
						echo $this->Form->input('constraint',array('class'=>'form-control'));
						echo $this->Form->text('color',array('type'=>'color','value'=>$this->data['Calendar']['color'],'onchange'=>"clickColor(0, -1, -1, 5)",'class'=>'form-control'));
						echo $this->Form->input('rendering',array('class'=>'form-control'));
						echo $this->Form->input('overlap',array('class'=>'form-control'));
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