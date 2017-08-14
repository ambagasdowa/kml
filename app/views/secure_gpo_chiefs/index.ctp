
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Secure Gpo Chief', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> 
</li>
			<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
	   <span class="secureGpoChiefs">
          <h1 class="page-header"><?php __('Secure Gpo Chiefs');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('group_id');?></th>
													<th><?php echo $this->Paginator->sort('name');?></th>
													<th><?php echo $this->Paginator->sort('description');?></th>
													<th><?php echo $this->Paginator->sort('create');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($secureGpoChiefs as $secureGpoChief):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $secureGpoChief['SecureGpoChief']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($secureGpoChief['Group']['name'], array('controller' => 'groups', 'action' => 'view', $secureGpoChief['Group']['id'])); ?>
		</td>
		<td><?php echo $secureGpoChief['SecureGpoChief']['name']; ?>&nbsp;</td>
		<td><?php echo $secureGpoChief['SecureGpoChief']['description']; ?>&nbsp;</td>
		<td><?php echo $secureGpoChief['SecureGpoChief']['create']; ?>&nbsp;</td>
		<td><?php echo $secureGpoChief['SecureGpoChief']['modified']; ?>&nbsp;</td>
		<td><?php echo $secureGpoChief['SecureGpoChief']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $secureGpoChief['SecureGpoChief']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $secureGpoChief['SecureGpoChief']['id']), array('data-edit'=>'linkSecureGpoChiefs_'.$secureGpoChief['SecureGpoChief']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $secureGpoChief['SecureGpoChief']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $secureGpoChief['SecureGpoChief']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
				</table>
			</span> <!--class="filter-container"-->
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
					<span class="pull-right">
						<?php echo $this->Html->link(__('New Secure Gpo Chief', true), array('action' => 'add'),array('class'=>'btn btn-success','id'=>'newSecureGpoChiefs')); ?>
					</span>
          </div>

          </span>
        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->





