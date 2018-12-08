
<div class="balanzaViewUdnsRpts view">
<h2><?php  __('Balanza View Udns Rpt');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cuenta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Cuenta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Entidades'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Entidades']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Empresa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Empresa']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('UnidadNegocio'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['UnidadNegocio']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripción'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Descripción']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('TranDesc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['TranDesc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Periodo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Periodo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ExtRefNbr'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['ExtRefNbr']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['User1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Empleado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Empleado']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('BatNbr'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['BatNbr']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Funcionario'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Funcionario']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Inicial'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Inicial']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cargo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Cargo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Crédito'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Crédito']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Final'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Final']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Balanza View Udns Rpt', true), array('action' => 'edit', $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['BatNbr'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Balanza View Udns Rpt', true), array('action' => 'delete', $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['BatNbr']), null, sprintf(__('Are you sure you want to delete # %s?', true), $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['BatNbr'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Balanza View Udns Rpts', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Balanza View Udns Rpt', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
