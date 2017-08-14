			<div id="dialog" style="color:black;width:620px;">

					<div class="modal-body">
						<?php echo $this->Form->create('Calendar');?>
							<fieldset>
								<legend><?php __('Add Calendar'); ?></legend>
							<?php
								echo $this->Form->input('title',array('class'=>'form-control'));
							?>
							<div class="checkbox">
								<label>Allday
									<input type="checkbox" name="data[Calendar][allday]" value="" >
									<i class="fa fa-square-o"></i>
								</label>
							</div>
							<div class="checkbox">
								<label>Editable
									<input type="checkbox" name="data[Calendar][editable]">
									<i class="fa fa-square-o"></i>
								</label>
							</div>
							<?php
								echo $this->Form->input('url',array('class'=>'form-control'));
								echo $this->Form->input('constraint',array('class'=>'form-control'));
								echo $this->Form->text('color',array('type'=>'color','value'=>"#ff0000",'onchange'=>"clickColor(0, -1, -1, 5)",'class'=>'form-control'));
								echo $this->Form->input('rendering',array('class'=>'form-control'));
								echo $this->Form->input('overlap',array('class'=>'form-control'));
								echo $this->Form->input('description',array('class'=>'form-control'));
// 								echo $this->Form->input('create');
// 								echo $this->Form->input('status');
							?>
							<?php e($this->Form->input('start',array('type'=>'hidden','value'=>$event['Calendar']['start'])));?>
							<?php e($this->Form->input('end',array('type'=>'hidden','value'=>$event['Calendar']['end'])));?>
							</fieldset>
							<div>&nbsp;</div>
							<div class="form-group pull-right">
								<?php echo $this->Form->end(array('div'=>false,'class'=>'btn btn-success'));?>
<!-- 								<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> -->
							</div>
					</div>
			</div>
