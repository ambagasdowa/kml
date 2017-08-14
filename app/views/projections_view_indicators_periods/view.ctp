
<div class="projectionsViewIndicatorsPeriods view">
<h2><?php  __('Projections View Indicators Period');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Company'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['company']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id_area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Fraccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id_fraccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fraccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['fraccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cyear'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['cyear']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['mes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kms'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['kms']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subtotal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['subtotal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Peso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['peso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Non Zero'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['non_zero']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections View Indicators Period', true), array('action' => 'edit', $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections View Indicators Period', true), array('action' => 'delete', $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections View Indicators Periods', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections View Indicators Period', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
