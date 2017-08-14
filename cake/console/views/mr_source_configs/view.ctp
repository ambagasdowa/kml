<div class="mrSourceConfigs view">
<h2><?php  __('Mr Source Config');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceConfig['MrSourceConfig']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SubAccount'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceConfig['MrSourceConfig']['SubAccount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Company'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceConfig['MrSourceConfig']['company']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Period'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceConfig['MrSourceConfig']['period']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Key'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceConfig['MrSourceConfig']['_key']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceConfig['MrSourceConfig']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mr Source Config', true), array('action' => 'edit', $mrSourceConfig['MrSourceConfig']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mr Source Config', true), array('action' => 'delete', $mrSourceConfig['MrSourceConfig']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mrSourceConfig['MrSourceConfig']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mr Source Configs', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mr Source Config', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
