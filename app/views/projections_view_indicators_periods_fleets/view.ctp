
<div class="projectionsViewIndicatorsPeriodsFleets view">
<h2><?php  __('Projections View Indicators Periods Fleet');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Company'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['company']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['id_area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Flota'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['id_flota']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Flota'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['flota']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Fraccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['id_fraccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fraccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['fraccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cyear'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['cyear']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['mes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kms'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['kms']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subtotal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['subtotal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Peso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['peso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dsubtotal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['dsubtotal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dpeso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['dpeso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subsubtotal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['subsubtotal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subpeso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['subpeso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Non Zero'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['non_zero']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections View Indicators Periods Fleet', true), array('action' => 'edit', $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections View Indicators Periods Fleet', true), array('action' => 'delete', $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections View Indicators Periods Fleets', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections View Indicators Periods Fleet', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
