
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Secure Control User', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Secure Structures', true), array('controller' => 'secure_structures', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Secure Structures', true), array('controller' => 'secure_structures', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List View Get Payrolls', true), array('controller' => 'view_get_payrolls', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New View Get Payrolls', true), array('controller' => 'view_get_payrolls', 'action' => 'add')); ?> 
</li>
			<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Secure Control Users');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('secure_structures_id');?></th>
													<th><?php echo $this->Paginator->sort('view_get_payrolls_id');?></th>
													<th><?php echo $this->Paginator->sort('date_courses');?></th>
													<th><?php echo $this->Paginator->sort('course_is_taken');?></th>
													<th><?php echo $this->Paginator->sort('description');?></th>
													<th><?php echo $this->Paginator->sort('create');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($secureControlUsers as $secureControlUser):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $secureControlUser['SecureControlUser']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($secureControlUser['SecureStructures']['id'], array('controller' => 'secure_structures', 'action' => 'view', $secureControlUser['SecureStructures']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureControlUser['ViewGetPayrolls']['Nombre'], array('controller' => 'view_get_payrolls', 'action' => 'view', $secureControlUser['ViewGetPayrolls']['id'])); ?>
		</td>
		<td><?php echo $secureControlUser['SecureControlUser']['date_courses']; ?>&nbsp;</td>
		<td><?php echo $secureControlUser['SecureControlUser']['course_is_taken']; ?>&nbsp;</td>
		<td><?php echo $secureControlUser['SecureControlUser']['description']; ?>&nbsp;</td>
		<td><?php echo $secureControlUser['SecureControlUser']['create']; ?>&nbsp;</td>
		<td><?php echo $secureControlUser['SecureControlUser']['modified']; ?>&nbsp;</td>
		<td><?php echo $secureControlUser['SecureControlUser']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $secureControlUser['SecureControlUser']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $secureControlUser['SecureControlUser']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $secureControlUser['SecureControlUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $secureControlUser['SecureControlUser']['id'])); ?>
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
          </div>
        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->





