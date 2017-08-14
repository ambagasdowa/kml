<div class="mrSourceControls view">
<h2><?php  __('Mr Source Control');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceControl['MrSourceControl']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Source Company'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceControl['MrSourceControl']['source_company']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Key'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceControl['MrSourceControl']['_key']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceControl['MrSourceControl']['_description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceControl['MrSourceControl']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mr Source Control', true), array('action' => 'edit', $mrSourceControl['MrSourceControl']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mr Source Control', true), array('action' => 'delete', $mrSourceControl['MrSourceControl']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mrSourceControl['MrSourceControl']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mr Source Controls', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mr Source Control', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
