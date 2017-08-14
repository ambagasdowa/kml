
<div class="casetasViewResumeStands view">
<h2><?php  __('Casetas View Resume Stand');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Controls Files Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasViewResumeStand['CasetasViewResumeStand']['casetas_controls_files_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Historical Conciliations Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasViewResumeStand['CasetasViewResumeStand']['casetas_historical_conciliations_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Percent Montos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasViewResumeStand['CasetasViewResumeStand']['percent_montos']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Percent Cruces'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasViewResumeStand['CasetasViewResumeStand']['percent_cruces']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cruces Totales'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasViewResumeStand['CasetasViewResumeStand']['cruces_totales']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Monto Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasViewResumeStand['CasetasViewResumeStand']['monto_total']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Filename'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasViewResumeStand['CasetasViewResumeStand']['_filename']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasViewResumeStand['CasetasViewResumeStand']['cia']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Montos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasViewResumeStand['CasetasViewResumeStand']['_montos']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cruces'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasViewResumeStand['CasetasViewResumeStand']['cruces']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Standings Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasViewResumeStand['CasetasViewResumeStand']['casetas_standings_name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Casetas View Resume Stand', true), array('action' => 'edit', $casetasViewResumeStand['CasetasViewResumeStand']['casetas_historical_conciliations_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Casetas View Resume Stand', true), array('action' => 'delete', $casetasViewResumeStand['CasetasViewResumeStand']['casetas_historical_conciliations_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasViewResumeStand['CasetasViewResumeStand']['casetas_historical_conciliations_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas View Resume Stands', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas View Resume Stand', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
