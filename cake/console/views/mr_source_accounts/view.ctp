<div class="mrSourceAccounts view">
<h2><?php  __('Mr Source Account');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceAccount['MrSourceAccount']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SubAccount'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceAccount['MrSourceAccount']['SubAccount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Key'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceAccount['MrSourceAccount']['_key']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceAccount['MrSourceAccount']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mr Source Account', true), array('action' => 'edit', $mrSourceAccount['MrSourceAccount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mr Source Account', true), array('action' => 'delete', $mrSourceAccount['MrSourceAccount']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mrSourceAccount['MrSourceAccount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mr Source Accounts', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mr Source Account', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
