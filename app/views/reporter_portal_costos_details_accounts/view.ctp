
<div class="reporterPortalCostosDetailsAccounts view">
<h2><?php  __('Reporter Portal Costos Details Account');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Source Company'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['_source_company']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('UnidadNegocio'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['UnidadNegocio']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['mes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Account'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['account']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Real'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['Real']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Presupuesto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['Presupuesto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Period'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['_period']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripcion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['Descripcion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NombreEntidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['NombreEntidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('TipoTransaccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['TipoTransaccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Referencia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['Referencia']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ReferenciaExterna'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['ReferenciaExterna']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cyear'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['cyear']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reporter Portal Costos Details Account', true), array('action' => 'edit', $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Reporter Portal Costos Details Account', true), array('action' => 'delete', $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reporterPortalCostosDetailsAccount['ReporterPortalCostosDetailsAccount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reporter Portal Costos Details Accounts', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter Portal Costos Details Account', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
