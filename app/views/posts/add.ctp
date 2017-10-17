<?php
// blog
$evaluate = true;
$requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
?>


<div class="container">
<?php echo $this->Form->create('Post');?>
	<fieldset>
		<legend><?php __('Add Post'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('status');
		echo $this->Form->input('current_date_time');
	?>
	</fieldset>
<?php
		// echo $this->Form->end(__('Submit', true));
		echo $this->Form->submit(__('Crear', true), array('div' => false,'class'=>"button button-primary"));
?>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Posts', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>


</div>
