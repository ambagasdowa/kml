
<div class="ocUsers view">
<h2><?php  __('Oc User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Uid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ocUser['OcUser']['uid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Displayname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ocUser['OcUser']['displayname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ocUser['OcUser']['password']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Oc User', true), array('action' => 'edit', $ocUser['OcUser']['uid'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Oc User', true), array('action' => 'delete', $ocUser['OcUser']['uid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ocUser['OcUser']['uid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Oc Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oc User', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
