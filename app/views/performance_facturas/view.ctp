
<div class="performanceFacturas view">
<h2><?php  __('Performance Factura');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceFactura['PerformanceFactura']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Performance Customers'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($performanceFactura['PerformanceCustomers']['id'], array('controller' => 'performance_customers', 'action' => 'view', $performanceFactura['PerformanceCustomers']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Performance References'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($performanceFactura['PerformanceReferences']['id'], array('controller' => 'performance_references', 'action' => 'view', $performanceFactura['PerformanceReferences']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('EntregaFacturaCliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceFactura['PerformanceFactura']['entregaFacturaCliente']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('AprobacionFactura'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceFactura['PerformanceFactura']['aprobacionFactura']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('FechaPromesaPago'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceFactura['PerformanceFactura']['fechaPromesaPago']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('FechaPago'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceFactura['PerformanceFactura']['fechaPago']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($performanceFactura['User']['name'], array('controller' => 'users', 'action' => 'view', $performanceFactura['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceFactura['PerformanceFactura']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceFactura['PerformanceFactura']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $performanceFactura['PerformanceFactura']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Performance Factura', true), array('action' => 'edit', $performanceFactura['PerformanceFactura']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Performance Factura', true), array('action' => 'delete', $performanceFactura['PerformanceFactura']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $performanceFactura['PerformanceFactura']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Performance Facturas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performance Factura', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Performance Customers', true), array('controller' => 'performance_customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performance Customers', true), array('controller' => 'performance_customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Performance References', true), array('controller' => 'performance_references', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performance References', true), array('controller' => 'performance_references', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
