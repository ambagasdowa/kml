
<div class="providersImportedDatabases view">
<h2><?php  __('Providers Imported Database');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers Imported Files Controls'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($providersImportedDatabase['ProvidersImportedFilesControls']['id'], array('controller' => 'providers_imported_files_controls', 'action' => 'view', $providersImportedDatabase['ProvidersImportedFilesControls']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers View Companies Units'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($providersImportedDatabase['ProvidersViewCompaniesUnits']['id'], array('controller' => 'providers_view_companies_units', 'action' => 'view', $providersImportedDatabase['ProvidersViewCompaniesUnits']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers Units Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['providers_units_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers Units Desc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['providers_units_desc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Keypri'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['keypri']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id File'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['id_file']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZCpnyId'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZCpnyId']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZBatNbr'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZBatNbr']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZRcptDate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZRcptDate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZVendId'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZVendId']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZCuryRcptCtrlAmt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZCuryRcptCtrlAmt']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZAPBatNbr'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZAPBatNbr']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZAPRefno'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZAPRefno']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZAPDocDate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZAPDocDate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZEstatus'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZEstatus']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZInvcNbr'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZInvcNbr']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZInvcDate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZInvcDate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZPerPost'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZPerPost']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZPayDate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZPayDate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZUUID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZUUID']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZAcct'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZAcct']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZFechaPago'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZFechaPago']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZMontoPago'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZMontoPago']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZRefPago'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZRefPago']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tstamp'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['tstamp']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ztbknbr'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['Ztbknbr']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Exportado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['exportado']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Florensia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['florensia']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipocomprobante'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['tipocomprobante']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($providersImportedDatabase['User']['name'], array('controller' => 'users', 'action' => 'view', $providersImportedDatabase['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers Standings Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['providers_standings_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers Parents Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['providers_parents_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedDatabase['ProvidersImportedDatabase']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Providers Imported Database', true), array('action' => 'edit', $providersImportedDatabase['ProvidersImportedDatabase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Providers Imported Database', true), array('action' => 'delete', $providersImportedDatabase['ProvidersImportedDatabase']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $providersImportedDatabase['ProvidersImportedDatabase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers Imported Databases', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Providers Imported Database', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers Imported Files Controls', true), array('controller' => 'providers_imported_files_controls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Providers Imported Files Controls', true), array('controller' => 'providers_imported_files_controls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers View Companies Units', true), array('controller' => 'providers_view_companies_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Providers View Companies Units', true), array('controller' => 'providers_view_companies_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
