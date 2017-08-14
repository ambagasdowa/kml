
<div class="projectionsViewIndicatorsPeriodsFullFleets view">
<h2><?php  __('Projections View Indicators Periods Full Fleet');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet']['area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fraccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet']['fraccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cyear'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet']['cyear']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet']['mes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kms'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet']['kms']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subsubtotal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet']['subsubtotal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subpeso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet']['subpeso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Non Zero'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet']['non_zero']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections View Indicators Periods Full Fleet', true), array('action' => 'edit', $projectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections View Indicators Periods Full Fleet', true), array('action' => 'delete', $projectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections View Indicators Periods Full Fleets', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections View Indicators Periods Full Fleet', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
