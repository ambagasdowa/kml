
<div class="reporterViewSpXs4zAccounts view">
<h2><?php  __('Reporter View Sp Xs4z Account');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rangeaccounta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewSpXs4zAccount['ReporterViewSpXs4zAccount']['rangeaccounta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Segmenta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewSpXs4zAccount['ReporterViewSpXs4zAccount']['segmenta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Segmentb'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewSpXs4zAccount['ReporterViewSpXs4zAccount']['segmentb']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Key'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewSpXs4zAccount['ReporterViewSpXs4zAccount']['_key']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reporter View Sp Xs4z Account', true), array('action' => 'edit', $reporterViewSpXs4zAccount['ReporterViewSpXs4zAccount']['_key'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Reporter View Sp Xs4z Account', true), array('action' => 'delete', $reporterViewSpXs4zAccount['ReporterViewSpXs4zAccount']['_key']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reporterViewSpXs4zAccount['ReporterViewSpXs4zAccount']['_key'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reporter View Sp Xs4z Accounts', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter View Sp Xs4z Account', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
