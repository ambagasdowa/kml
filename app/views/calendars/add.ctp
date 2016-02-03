<?php //debug($event);?>
<div class="calendars form">
<?php echo $this->Form->create('Calendar');?>
	<fieldset>
		<legend><?php __('Add Calendar'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('allday');
		echo $this->Form->input('editable');
// 		echo $this->Form->input('start');
// 		echo $this->Form->input('end');
		echo $this->Form->input('url');
		echo $this->Form->input('constraint');
		echo $this->Form->input('color');
		echo $this->Form->input('rendering');
		echo $this->Form->input('overlap');
		echo $this->Form->input('description');
		echo $this->Form->input('create');
		echo $this->Form->input('status');
	?>
	<?php e($this->Form->input('start',array('type'=>'hidden','value'=>$event['Calendar']['start'])));?>
	<?php e($this->Form->input('end',array('type'=>'hidden','value'=>$event['Calendar']['end'])));?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<!--<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Calendars', true), array('action' => 'index'));?></li>
	</ul>
</div>-->

<input type="button" value="Cancel" onclick="back();">
<script type="text/javascript">
    function back() {
        window.location.href ="Calendars/index";
    }
</script>