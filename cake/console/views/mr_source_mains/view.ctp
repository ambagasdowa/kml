<div class="mrSourceMains view">
<h2><?php  __('Mr Source Main');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceMain['MrSourceMain']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rangeaccounta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceMain['MrSourceMain']['rangeaccounta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rangeaccountb'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceMain['MrSourceMain']['rangeaccountb']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Segmenta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceMain['MrSourceMain']['segmenta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Segmentb'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceMain['MrSourceMain']['segmentb']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Key'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceMain['MrSourceMain']['_key']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mrSourceMain['MrSourceMain']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mr Source Main', true), array('action' => 'edit', $mrSourceMain['MrSourceMain']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mr Source Main', true), array('action' => 'delete', $mrSourceMain['MrSourceMain']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mrSourceMain['MrSourceMain']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mr Source Mains', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mr Source Main', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
