
<div class="projectionsAccesses view">
<h2><?php  __('Projections Access');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsAccess['ProjectionsAccess']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Controls Users'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsAccess['ProjectionsControlsUsers']['id'], array('controller' => 'projections_controls_users', 'action' => 'view', $projectionsAccess['ProjectionsControlsUsers']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Access Modules'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsAccess['ProjectionsAccessModules']['id'], array('controller' => 'projections_access_modules', 'action' => 'view', $projectionsAccess['ProjectionsAccessModules']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections View Bussiness Units'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsAccess['ProjectionsViewBussinessUnits']['name'], array('controller' => 'projections_view_bussiness_units', 'action' => 'view', $projectionsAccess['ProjectionsViewBussinessUnits']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsAccess['ProjectionsAccess']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsAccess['ProjectionsAccess']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsAccess['ProjectionsAccess']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections Access', true), array('action' => 'edit', $projectionsAccess['ProjectionsAccess']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections Access', true), array('action' => 'delete', $projectionsAccess['ProjectionsAccess']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsAccess['ProjectionsAccess']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Accesses', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Access', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Controls Users', true), array('controller' => 'projections_controls_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Controls Users', true), array('controller' => 'projections_controls_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Access Modules', true), array('controller' => 'projections_access_modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Access Modules', true), array('controller' => 'projections_access_modules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections View Bussiness Units', true), array('controller' => 'projections_view_bussiness_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections View Bussiness Units', true), array('controller' => 'projections_view_bussiness_units', 'action' => 'add')); ?> </li>
	</ul>
</div>
