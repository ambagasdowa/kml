<div class="fieldViews view">
<h2><?php  __('Field View');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldView['FieldView']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('View Types'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($fieldView['ViewTypes']['view_name'], array('controller' => 'view_types', 'action' => 'view', $fieldView['ViewTypes']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field View Lenght'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldView['FieldView']['field_view_lenght']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field View Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldView['FieldView']['field_view_description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldView['FieldView']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldView['FieldView']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldView['FieldView']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Field View', true), array('action' => 'edit', $fieldView['FieldView']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Field View', true), array('action' => 'delete', $fieldView['FieldView']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fieldView['FieldView']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Field Views', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field View', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List View Types', true), array('controller' => 'view_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New View Types', true), array('controller' => 'view_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
