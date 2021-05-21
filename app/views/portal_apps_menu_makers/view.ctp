
<div class="mkMenuMakers view">
<h2><?php  __('Mk Menu Maker');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mkMenuMaker['MkMenuMaker']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Message'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mkMenuMaker['MkMenuMaker']['message']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mkMenuMaker['MkMenuMaker']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mkMenuMaker['MkMenuMaker']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mkMenuMaker['MkMenuMaker']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mk Menu Maker', true), array('action' => 'edit', $mkMenuMaker['MkMenuMaker']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mk Menu Maker', true), array('action' => 'delete', $mkMenuMaker['MkMenuMaker']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mkMenuMaker['MkMenuMaker']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mk Menu Makers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mk Menu Maker', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
