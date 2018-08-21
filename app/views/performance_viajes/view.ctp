
	<?php
	    // NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
	    // $evaluate = false;
	    // $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
	    // blog
	    $evaluate = true;
	    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
			$requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
	?>


<div class="performanceViajes view">
<h2><?php  __('Performance Viaje');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceViaje['PerformanceViaje']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Performance No Guia Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceViaje['PerformanceViaje']['performance_no_guia_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Performance Num Guia Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceViaje['PerformanceViaje']['performance_num_guia_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Performance No Viaje Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceViaje['PerformanceViaje']['performance_no_viaje_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Corporations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($performanceViaje['ProjectionsCorporations']['id'], array('controller' => 'projections_corporations', 'action' => 'view', $performanceViaje['ProjectionsCorporations']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceViaje['PerformanceViaje']['id_area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Performance Bsus'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($performanceViaje['PerformanceBsus']['label'], array('controller' => 'performance_bsus', 'action' => 'view', $performanceViaje['PerformanceBsus']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RecepcionEvidencias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceViaje['PerformanceViaje']['recepcionEvidencias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('EntregaEvidenciasCliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceViaje['PerformanceViaje']['entregaEvidenciasCliente']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ValidacionEvidenciasCliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceViaje['PerformanceViaje']['validacionEvidenciasCliente']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($performanceViaje['User']['name'], array('controller' => 'users', 'action' => 'view', $performanceViaje['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceViaje['PerformanceViaje']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceViaje['PerformanceViaje']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceViaje['PerformanceViaje']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Performance Viaje', true), array('action' => 'edit', $performanceViaje['PerformanceViaje']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Performance Viaje', true), array('action' => 'delete', $performanceViaje['PerformanceViaje']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $performanceViaje['PerformanceViaje']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Performance Viajes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performance Viaje', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Performance Bsus', true), array('controller' => 'performance_bsus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performance Bsus', true), array('controller' => 'performance_bsus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
