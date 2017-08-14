
<div class="reporterViewsMainSubreportsAccounts view">
<h2><?php  __('Reporter Views Main Subreports Account');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RowDetailID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['RowDetailID']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RowLinkID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['RowLinkID']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('DisplayOrder'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['DisplayOrder']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rangeaccounta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['rangeaccounta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rangeaccountb'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['rangeaccountb']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Segmenta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['segmenta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Segmentb'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['segmentb']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reporter Views Main Subreports Account', true), array('action' => 'edit', $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Reporter Views Main Subreports Account', true), array('action' => 'delete', $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reporter Views Main Subreports Accounts', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter Views Main Subreports Account', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
