
<div class="projectionsViewIndicatorsDispatchPeriodsFullOps view">
<h2><?php  __('Projections View Indicators Dispatch Periods Full Op');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Company'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['company']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['id_area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Flota'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['id_flota']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Flota'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['flota']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Fraccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['id_fraccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fraccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['fraccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cyear'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['cyear']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['mes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kms'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['kms']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subtotal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['subtotal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Peso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['peso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Non Zero'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['non_zero']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections View Indicators Dispatch Periods Full Op', true), array('action' => 'edit', $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections View Indicators Dispatch Periods Full Op', true), array('action' => 'delete', $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsViewIndicatorsDispatchPeriodsFullOp['ProjectionsViewIndicatorsDispatchPeriodsFullOp']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections View Indicators Dispatch Periods Full Ops', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections View Indicators Dispatch Periods Full Op', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
