
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Secure Structure', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Secure Topics', true), array('controller' => 'secure_topics', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Secure Topics', true), array('controller' => 'secure_topics', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Secure Topics Types', true), array('controller' => 'secure_topics_types', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Secure Topics Types', true), array('controller' => 'secure_topics_types', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Secure Gpo Chiefs', true), array('controller' => 'secure_gpo_chiefs', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Secure Gpo Chiefs', true), array('controller' => 'secure_gpo_chiefs', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Secure Gos', true), array('controller' => 'secure_gos', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Secure Goes', true), array('controller' => 'secure_gos', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Secure Calendars', true), array('controller' => 'secure_calendars', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Secure Calendars', true), array('controller' => 'secure_calendars', 'action' => 'add')); ?> 
</li>
			<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Secure Structures');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('group_id');?></th>
													<th><?php echo $this->Paginator->sort('user_id');?></th>
													<th><?php echo $this->Paginator->sort('secure_topics_id');?></th>
													<th><?php echo $this->Paginator->sort('secure_topics_types_id');?></th>
													<th><?php echo $this->Paginator->sort('secure_gpo_chiefs_id');?></th>
													<th><?php echo $this->Paginator->sort('secure_goes_id');?></th>
													<th><?php echo $this->Paginator->sort('secure_calendars_id');?></th>
													<th><?php echo $this->Paginator->sort('description');?></th>
													<th><?php echo $this->Paginator->sort('create');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($secureStructures as $secureStructure):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $secureStructure['SecureStructure']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($secureStructure['Group']['name'], array('controller' => 'groups', 'action' => 'view', $secureStructure['Group']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureStructure['User']['name'], array('controller' => 'users', 'action' => 'view', $secureStructure['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureStructure['SecureTopics']['name'], array('controller' => 'secure_topics', 'action' => 'view', $secureStructure['SecureTopics']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureStructure['SecureTopicsTypes']['name'], array('controller' => 'secure_topics_types', 'action' => 'view', $secureStructure['SecureTopicsTypes']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureStructure['SecureGpoChiefs']['name'], array('controller' => 'secure_gpo_chiefs', 'action' => 'view', $secureStructure['SecureGpoChiefs']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureStructure['SecureGoes']['name'], array('controller' => 'secure_gos', 'action' => 'view', $secureStructure['SecureGoes']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureStructure['SecureCalendars']['title'], array('controller' => 'secure_calendars', 'action' => 'view', $secureStructure['SecureCalendars']['id'])); ?>
		</td>
		<td><?php echo $secureStructure['SecureStructure']['description']; ?>&nbsp;</td>
		<td><?php echo $secureStructure['SecureStructure']['create']; ?>&nbsp;</td>
		<td><?php echo $secureStructure['SecureStructure']['modified']; ?>&nbsp;</td>
		<td><?php echo $secureStructure['SecureStructure']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $secureStructure['SecureStructure']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $secureStructure['SecureStructure']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $secureStructure['SecureStructure']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $secureStructure['SecureStructure']['id'])); ?>
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





