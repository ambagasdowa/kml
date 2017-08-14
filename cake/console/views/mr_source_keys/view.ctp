<div class="mrSourceKeys view">
<h2><?php  __('Mr Source Key');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceKey['MrSourceKey']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Key'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceKey['MrSourceKey']['_key']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceKey['MrSourceKey']['_description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceKey['MrSourceKey']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mr Source Key', true), array('action' => 'edit', $mrSourceKey['MrSourceKey']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mr Source Key', true), array('action' => 'delete', $mrSourceKey['MrSourceKey']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mrSourceKey['MrSourceKey']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mr Source Keys', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mr Source Key', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
