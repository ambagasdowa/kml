
<div class="reporterViewsMainReports view">
<h2><?php  __('Reporter Views Main Report');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Index Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainReport['ReporterViewsMainReport']['index_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainReport['ReporterViewsMainReport']['ID']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainReport['ReporterViewsMainReport']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainReport['ReporterViewsMainReport']['Description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reporter Views Main Report', true), array('action' => 'edit', $reporterViewsMainReport['ReporterViewsMainReport']['index_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Reporter Views Main Report', true), array('action' => 'delete', $reporterViewsMainReport['ReporterViewsMainReport']['index_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reporterViewsMainReport['ReporterViewsMainReport']['index_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reporter Views Main Reports', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter Views Main Report', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
