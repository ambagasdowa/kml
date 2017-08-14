<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username',array('placeholder'=>'Nombre de Usuario','label'=>false));
		echo $this->Form->input('password',array('value'=>'','placeholder'=>'Password','label'=>false));
		echo $this->Form->input('group_id',array('class'=>'form-control'));
		echo $this->Form->input('number_id',array('type'=>'text','placeholder'=>'Numero de Empleado','label'=>false));
		echo $this->Form->input('languaje',array('placeholder'=>'Languaje','label'=>false));
		echo $this->Form->input('status',
				array(
						'type'=>'select',
						'options'=>array('Active'=>'Active','Inactive'=>'Inactive'),
						'class'=>'form-control',
						'label'=>false,
						'placeholder'=>'Status'
						)
		);
		echo $this->Form->input('company_id',array('type'=>'select','options'=>$company,'class'=>'form-control'));
// 		echo $this->Form->input('current_date_time');
// 		echo $this->Form->input('last_access');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('User.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts', true), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>