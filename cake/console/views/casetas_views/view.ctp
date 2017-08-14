
<div class="casetasViews view">
<h2><?php  __('Casetas View');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Unidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['id_unidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['unit']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('No Tarjeta Iave'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['no_tarjeta_iave']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alpha Num Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['alpha_num_code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alpha Location'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['alpha_location']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alpha Location 1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['alpha_location_1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Filename'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['_filename']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('No Viaje'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['no_viaje']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha Cruce'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['fecha_cruce']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('F Despachado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['f_despachado']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha Fin Viaje'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['fecha_fin_viaje']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Float Data'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['float_data']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hora Cruce'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['hora_cruce']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['cia']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Monto Archivo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['Monto_archivo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Next'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['_next']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha Inicio'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['fecha_inicio']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha Fin'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['fecha_fin']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description Casetas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['description_casetas']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Historical Conciliations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasView['CasetasHistoricalConciliations']['casetas_controls_files_id'], array('controller' => 'casetas_historical_conciliations', 'action' => 'view', $casetasView['CasetasHistoricalConciliations']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Controls Files'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasView['CasetasControlsFiles']['_filename'], array('controller' => 'casetas_controls_files', 'action' => 'view', $casetasView['CasetasControlsFiles']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Standings'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasView['CasetasStandings']['casetas_standings_name'], array('controller' => 'casetas_standings', 'action' => 'view', $casetasView['CasetasStandings']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Parents'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasView['CasetasParents']['casetas_parents_name'], array('controller' => 'casetas_parents', 'action' => 'view', $casetasView['CasetasParents']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasView['CasetasView']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Casetas View', true), array('action' => 'edit', $casetasView['CasetasView']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Casetas View', true), array('action' => 'delete', $casetasView['CasetasView']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasView['CasetasView']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Views', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas View', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Historical Conciliations', true), array('controller' => 'casetas_historical_conciliations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Historical Conciliations', true), array('controller' => 'casetas_historical_conciliations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Controls Files', true), array('controller' => 'casetas_controls_files', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Controls Files', true), array('controller' => 'casetas_controls_files', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Controls Events', true), array('controller' => 'casetas_controls_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Controls Event', true), array('controller' => 'casetas_controls_events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Pendings', true), array('controller' => 'casetas_pendings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Pending', true), array('controller' => 'casetas_pendings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Conciliations', true), array('controller' => 'casetas_conciliations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Conciliation', true), array('controller' => 'casetas_conciliations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Not Conciliations', true), array('controller' => 'casetas_not_conciliations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Not Conciliation', true), array('controller' => 'casetas_not_conciliations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Logs', true), array('controller' => 'casetas_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Log', true), array('controller' => 'casetas_logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Casetas Controls Events');?></h3>
	<?php if (!empty($casetasView['CasetasControlsEvent'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Casetas Corporations Id'); ?></th>
		<th><?php __('Casetas Units Id'); ?></th>
		<th><?php __('Casetas Events Id'); ?></th>
		<th><?php __('Casetas View Id'); ?></th>
		<th><?php __('Casetas Events From'); ?></th>
		<th><?php __('Casetas Events To'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Casetas Standings Id'); ?></th>
		<th><?php __('Casetas Parents Id'); ?></th>
		<th><?php __(' Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($casetasView['CasetasControlsEvent'] as $casetasControlsEvent):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $casetasControlsEvent['id'];?></td>
			<td><?php echo $casetasControlsEvent['user_id'];?></td>
			<td><?php echo $casetasControlsEvent['casetas_corporations_id'];?></td>
			<td><?php echo $casetasControlsEvent['casetas_units_id'];?></td>
			<td><?php echo $casetasControlsEvent['casetas_events_id'];?></td>
			<td><?php echo $casetasControlsEvent['casetas_view_id'];?></td>
			<td><?php echo $casetasControlsEvent['casetas_events_from'];?></td>
			<td><?php echo $casetasControlsEvent['casetas_events_to'];?></td>
			<td><?php echo $casetasControlsEvent['created'];?></td>
			<td><?php echo $casetasControlsEvent['modified'];?></td>
			<td><?php echo $casetasControlsEvent['casetas_standings_id'];?></td>
			<td><?php echo $casetasControlsEvent['casetas_parents_id'];?></td>
			<td><?php echo $casetasControlsEvent['_status'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'casetas_controls_events', 'action' => 'view', $casetasControlsEvent['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'casetas_controls_events', 'action' => 'edit', $casetasControlsEvent['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'casetas_controls_events', 'action' => 'delete', $casetasControlsEvent['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasControlsEvent['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Casetas Controls Event', true), array('controller' => 'casetas_controls_events', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Casetas Pendings');?></h3>
	<?php if (!empty($casetasView['CasetasPending'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Casetas View Id'); ?></th>
		<th><?php __('Casetas Controls Files Id'); ?></th>
		<th><?php __('Casetas Controls Events Id'); ?></th>
		<th><?php __('Casetas Standings Id'); ?></th>
		<th><?php __('Casetas Parents Id'); ?></th>
		<th><?php __(' Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($casetasView['CasetasPending'] as $casetasPending):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $casetasPending['id'];?></td>
			<td><?php echo $casetasPending['casetas_view_id'];?></td>
			<td><?php echo $casetasPending['casetas_controls_files_id'];?></td>
			<td><?php echo $casetasPending['casetas_controls_events_id'];?></td>
			<td><?php echo $casetasPending['casetas_standings_id'];?></td>
			<td><?php echo $casetasPending['casetas_parents_id'];?></td>
			<td><?php echo $casetasPending['_status'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'casetas_pendings', 'action' => 'view', $casetasPending['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'casetas_pendings', 'action' => 'edit', $casetasPending['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'casetas_pendings', 'action' => 'delete', $casetasPending['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasPending['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Casetas Pending', true), array('controller' => 'casetas_pendings', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Casetas Conciliations');?></h3>
	<?php if (!empty($casetasView['CasetasConciliation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Casetas View Id'); ?></th>
		<th><?php __('Casetas Controls Files Id'); ?></th>
		<th><?php __('Casetas Controls Events Id'); ?></th>
		<th><?php __('Casetas Standings Id'); ?></th>
		<th><?php __('Casetas Parents Id'); ?></th>
		<th><?php __(' Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($casetasView['CasetasConciliation'] as $casetasConciliation):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $casetasConciliation['id'];?></td>
			<td><?php echo $casetasConciliation['casetas_view_id'];?></td>
			<td><?php echo $casetasConciliation['casetas_controls_files_id'];?></td>
			<td><?php echo $casetasConciliation['casetas_controls_events_id'];?></td>
			<td><?php echo $casetasConciliation['casetas_standings_id'];?></td>
			<td><?php echo $casetasConciliation['casetas_parents_id'];?></td>
			<td><?php echo $casetasConciliation['_status'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'casetas_conciliations', 'action' => 'view', $casetasConciliation['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'casetas_conciliations', 'action' => 'edit', $casetasConciliation['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'casetas_conciliations', 'action' => 'delete', $casetasConciliation['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasConciliation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Casetas Conciliation', true), array('controller' => 'casetas_conciliations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Casetas Not Conciliations');?></h3>
	<?php if (!empty($casetasView['CasetasNotConciliation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Casetas View Id'); ?></th>
		<th><?php __('Casetas Controls Files Id'); ?></th>
		<th><?php __('Casetas Controls Events Id'); ?></th>
		<th><?php __('Casetas Standings Id'); ?></th>
		<th><?php __('Casetas Parents Id'); ?></th>
		<th><?php __(' Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($casetasView['CasetasNotConciliation'] as $casetasNotConciliation):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $casetasNotConciliation['id'];?></td>
			<td><?php echo $casetasNotConciliation['casetas_view_id'];?></td>
			<td><?php echo $casetasNotConciliation['casetas_controls_files_id'];?></td>
			<td><?php echo $casetasNotConciliation['casetas_controls_events_id'];?></td>
			<td><?php echo $casetasNotConciliation['casetas_standings_id'];?></td>
			<td><?php echo $casetasNotConciliation['casetas_parents_id'];?></td>
			<td><?php echo $casetasNotConciliation['_status'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'casetas_not_conciliations', 'action' => 'view', $casetasNotConciliation['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'casetas_not_conciliations', 'action' => 'edit', $casetasNotConciliation['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'casetas_not_conciliations', 'action' => 'delete', $casetasNotConciliation['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasNotConciliation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Casetas Not Conciliation', true), array('controller' => 'casetas_not_conciliations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Casetas Logs');?></h3>
	<?php if (!empty($casetasView['CasetasLog'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Casetas View Id'); ?></th>
		<th><?php __('Casetas Controls Files Id'); ?></th>
		<th><?php __('Casetas Controls Events Id'); ?></th>
		<th><?php __('Casetas Standings Id'); ?></th>
		<th><?php __('Casetas Parents Id'); ?></th>
		<th><?php __(' Status'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($casetasView['CasetasLog'] as $casetasLog):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $casetasLog['id'];?></td>
			<td><?php echo $casetasLog['casetas_view_id'];?></td>
			<td><?php echo $casetasLog['casetas_controls_files_id'];?></td>
			<td><?php echo $casetasLog['casetas_controls_events_id'];?></td>
			<td><?php echo $casetasLog['casetas_standings_id'];?></td>
			<td><?php echo $casetasLog['casetas_parents_id'];?></td>
			<td><?php echo $casetasLog['_status'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'casetas_logs', 'action' => 'view', $casetasLog['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'casetas_logs', 'action' => 'edit', $casetasLog['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'casetas_logs', 'action' => 'delete', $casetasLog['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasLog['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Casetas Log', true), array('controller' => 'casetas_logs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
