
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Catalog Data', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Catalog Names', true), array('controller' => 'catalog_names', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Catalog Names', true), array('controller' => 'catalog_names', 'action' => 'add')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Catalog Fields', true), array('controller' => 'catalog_fields', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Catalog Fields', true), array('controller' => 'catalog_fields', 'action' => 'add')); ?> </li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Catalog Datas');?></h1>
          <div class="table-responsive">
          
				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('catalog_names_id');?></th>
													<th><?php echo $this->Paginator->sort('catalog_fields_id');?></th>
													<th><?php echo $this->Paginator->sort('catalog_data');?></th>
													<th><?php echo $this->Paginator->sort('catalog_data_description');?></th>
													<th><?php echo $this->Paginator->sort('create');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($catalogDatas as $catalogData):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $catalogData['CatalogData']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($catalogData['CatalogNames']['catalog_name'], array('controller' => 'catalog_names', 'action' => 'view', $catalogData['CatalogNames']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($catalogData['CatalogFields']['catalog_field'], array('controller' => 'catalog_fields', 'action' => 'view', $catalogData['CatalogFields']['id'])); ?>
		</td>
		<td><?php echo $catalogData['CatalogData']['catalog_data']; ?>&nbsp;</td>
		<td><?php echo $catalogData['CatalogData']['catalog_data_description']; ?>&nbsp;</td>
		<td><?php echo $catalogData['CatalogData']['create']; ?>&nbsp;</td>
		<td><?php echo $catalogData['CatalogData']['modified']; ?>&nbsp;</td>
		<td><?php echo $catalogData['CatalogData']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $catalogData['CatalogData']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $catalogData['CatalogData']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $catalogData['CatalogData']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $catalogData['CatalogData']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
				</table>
				<p>
					<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
						));
						?>				</p>

				<ul class="pagination">
							<?php 
	
							echo $this->Paginator->prev( '«' ,array('tag'=>'li'),null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li')); 
						
	?>							<?php 
	
							echo $this->Paginator->numbers(array('separator' => null,'tag'=>'li'));
						
	?>						<?php 
	
							echo $this->Paginator->next( '»' , array('tag'=>'li'), null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
	?>				</ul>
          </div>
        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->





