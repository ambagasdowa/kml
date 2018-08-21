
<div class="projectionsViewBussinessUnits view">
<h2><?php  __('Projections View Bussiness Unit');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewBussinessUnit['ProjectionsViewBussinessUnit']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Corporations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsViewBussinessUnit['ProjectionsCorporations']['id'], array('controller' => 'projections_corporations', 'action' => 'view', $projectionsViewBussinessUnit['ProjectionsCorporations']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewBussinessUnit['ProjectionsViewBussinessUnit']['id_area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewBussinessUnit['ProjectionsViewBussinessUnit']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections View Bussiness Unit', true), array('action' => 'edit', $projectionsViewBussinessUnit['ProjectionsViewBussinessUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections View Bussiness Unit', true), array('action' => 'delete', $projectionsViewBussinessUnit['ProjectionsViewBussinessUnit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsViewBussinessUnit['ProjectionsViewBussinessUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections View Bussiness Units', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections View Bussiness Unit', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'add')); ?> </li>
	</ul>
</div>
