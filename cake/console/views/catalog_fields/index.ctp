
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Catalog Field', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Catalog Names', true), array('controller' => 'catalog_names', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Catalog Names', true), array('controller' => 'catalog_names', 'action' => 'add')); ?> </li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Catalog Fields');?></h1>
          <div class="table-responsive">
          
				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('catalog_names_id');?></th>
													<th><?php echo $this->Paginator->sort('catalog_field');?></th>
													<th><?php echo $this->Paginator->sort('catalog_field_description');?></th>
													<th><?php echo $this->Paginator->sort('create');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($catalogFields as $catalogField):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $catalogField['CatalogField']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($catalogField['CatalogNames']['catalog_name'], array('controller' => 'catalog_names', 'action' => 'view', $catalogField['CatalogNames']['id'])); ?>
		</td>
		<td><?php echo $catalogField['CatalogField']['catalog_field']; ?>&nbsp;</td>
		<td><?php echo $catalogField['CatalogField']['catalog_field_description']; ?>&nbsp;</td>
		<td><?php echo $catalogField['CatalogField']['create']; ?>&nbsp;</td>
		<td><?php echo $catalogField['CatalogField']['modified']; ?>&nbsp;</td>
		<td><?php echo $catalogField['CatalogField']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $catalogField['CatalogField']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $catalogField['CatalogField']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $catalogField['CatalogField']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $catalogField['CatalogField']['id'])); ?>
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





