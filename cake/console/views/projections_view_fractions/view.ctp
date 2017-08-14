
<div class="projectionsViewFractions view">
<h2><?php  __('Projections View Fraction');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewFraction['ProjectionsViewFraction']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Corporations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsViewFraction['ProjectionsCorporations']['id'], array('controller' => 'projections_corporations', 'action' => 'view', $projectionsViewFraction['ProjectionsCorporations']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Fraccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewFraction['ProjectionsViewFraction']['id_fraccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Desc Producto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewFraction['ProjectionsViewFraction']['desc_producto']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections View Fraction', true), array('action' => 'edit', $projectionsViewFraction['ProjectionsViewFraction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections View Fraction', true), array('action' => 'delete', $projectionsViewFraction['ProjectionsViewFraction']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsViewFraction['ProjectionsViewFraction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections View Fractions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections View Fraction', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'add')); ?> </li>
	</ul>
</div>
