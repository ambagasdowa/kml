<?php
// SecureCalendar index
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>
<div class="reporterTableKeys view">
<h2><?php  __('Reporter Table Key');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterTableKey['ReporterTableKey']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Key'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterTableKey['ReporterTableKey']['_key']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterTableKey['ReporterTableKey']['_description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Row Detail Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterTableKey['ReporterTableKey']['row_detail_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterTableKey['ReporterTableKey']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterTableKey['ReporterTableKey']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterTableKey['ReporterTableKey']['user_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterTableKey['ReporterTableKey']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reporter Table Key', true), array('action' => 'edit', $reporterTableKey['ReporterTableKey']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Reporter Table Key', true), array('action' => 'delete', $reporterTableKey['ReporterTableKey']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reporterTableKey['ReporterTableKey']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reporter Table Keys', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter Table Key', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
