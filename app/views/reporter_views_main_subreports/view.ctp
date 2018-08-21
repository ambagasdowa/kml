
<div class="reporterViewsMainSubreports view">
<h2><?php  __('Reporter Views Main Subreport');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreport['ReporterViewsMainSubreport']['ID']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RowFormatID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreport['ReporterViewsMainSubreport']['RowFormatID']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RowNumber'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreport['ReporterViewsMainSubreport']['RowNumber']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RowCode'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreport['ReporterViewsMainSubreport']['RowCode']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreport['ReporterViewsMainSubreport']['Description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RelatedRows'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreport['ReporterViewsMainSubreport']['RelatedRows']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type Of Block'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterViewsMainSubreport['ReporterViewsMainSubreport']['type_of_block']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reporter Views Main Subreport', true), array('action' => 'edit', $reporterViewsMainSubreport['ReporterViewsMainSubreport']['ID'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Reporter Views Main Subreport', true), array('action' => 'delete', $reporterViewsMainSubreport['ReporterViewsMainSubreport']['ID']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reporterViewsMainSubreport['ReporterViewsMainSubreport']['ID'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reporter Views Main Subreports', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter Views Main Subreport', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
