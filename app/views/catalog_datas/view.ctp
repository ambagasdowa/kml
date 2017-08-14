<div class="catalogDatas view">
<h2><?php  __('Catalog Data');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogData['CatalogData']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Names'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($catalogData['CatalogNames']['catalog_name'], array('controller' => 'catalog_names', 'action' => 'view', $catalogData['CatalogNames']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Fields'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($catalogData['CatalogFields']['catalog_field'], array('controller' => 'catalog_fields', 'action' => 'view', $catalogData['CatalogFields']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Data'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogData['CatalogData']['catalog_data']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Data Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogData['CatalogData']['catalog_data_description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogData['CatalogData']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogData['CatalogData']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogData['CatalogData']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Catalog Data', true), array('action' => 'edit', $catalogData['CatalogData']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Catalog Data', true), array('action' => 'delete', $catalogData['CatalogData']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $catalogData['CatalogData']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Catalog Datas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Catalog Data', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Catalog Names', true), array('controller' => 'catalog_names', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Catalog Names', true), array('controller' => 'catalog_names', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Catalog Fields', true), array('controller' => 'catalog_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Catalog Fields', true), array('controller' => 'catalog_fields', 'action' => 'add')); ?> </li>
	</ul>
</div>
