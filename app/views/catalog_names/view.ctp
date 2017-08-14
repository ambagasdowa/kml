<div class="catalogNames view">
<h2><?php  __('Catalog Name');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogName['CatalogName']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogName['CatalogName']['catalog_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogName['CatalogName']['catalog_description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogName['CatalogName']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogName['CatalogName']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogName['CatalogName']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Catalog Name', true), array('action' => 'edit', $catalogName['CatalogName']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Catalog Name', true), array('action' => 'delete', $catalogName['CatalogName']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $catalogName['CatalogName']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Catalog Names', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Catalog Name', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
