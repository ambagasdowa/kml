
<div class="georeferenceViewPositionsDashMainGstIndicators view">
<h2><?php  __('Georeference View Positions Dash Main Gst Indicator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['Area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unidades'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['unidades']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('StatusDescription'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['StatusDescription']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Despacho'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['despacho']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Periodo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['periodo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Georeference View Positions Dash Main Gst Indicator', true), array('action' => 'edit', $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Georeference View Positions Dash Main Gst Indicator', true), array('action' => 'delete', $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $georeferenceViewPositionsDashMainGstIndicator['GeoreferenceViewPositionsDashMainGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Georeference View Positions Dash Main Gst Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Georeference View Positions Dash Main Gst Indicator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
