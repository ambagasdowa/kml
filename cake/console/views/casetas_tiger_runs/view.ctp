
<div class="casetasTigerRuns view">
<h2><?php  __('Casetas Tiger Run');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasTigerRun['CasetasTigerRun']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bussines Unit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasTigerRun['CasetasTigerRun']['bussines_unit']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Controls Files Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasTigerRun['CasetasTigerRun']['casetas_controls_files_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasTigerRun['CasetasTigerRun']['user_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasTigerRun['CasetasTigerRun']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasTigerRun['CasetasTigerRun']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Casetas Tiger Run', true), array('action' => 'edit', $casetasTigerRun['CasetasTigerRun']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Casetas Tiger Run', true), array('action' => 'delete', $casetasTigerRun['CasetasTigerRun']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasTigerRun['CasetasTigerRun']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Tiger Runs', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Tiger Run', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
