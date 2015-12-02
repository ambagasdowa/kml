<?php 
// 	debug($this->params);
?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Policies Filter', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Policies', true), array('controller' => 'policies', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Policies', true), array('controller' => 'policies', 'action' => 'add')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Policies Filters');?></h1>
          <div class="table-responsive">
          
				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('policies_id');?></th>
													<th><?php echo $this->Paginator->sort('group_id');?></th>
													<th><?php echo $this->Paginator->sort('view');?></th>
													<th><?php echo $this->Paginator->sort('create');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($policiesFilters as $policiesFilter):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $policiesFilter['PoliciesFilter']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($policiesFilter['Policies']['name'], array('controller' => 'policies', 'action' => 'view', $policiesFilter['Policies']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($policiesFilter['Group']['name'], array('controller' => 'groups', 'action' => 'view', $policiesFilter['Group']['id'])); ?>
		</td>
		<td><?php echo $policiesFilter['PoliciesFilter']['view']; ?>&nbsp;</td>
		<td><?php echo $policiesFilter['PoliciesFilter']['create']; ?>&nbsp;</td>
		<td><?php echo $policiesFilter['PoliciesFilter']['modified']; ?>&nbsp;</td>
		<td><?php echo $policiesFilter['PoliciesFilter']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $policiesFilter['PoliciesFilter']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $policiesFilter['PoliciesFilter']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $policiesFilter['PoliciesFilter']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $policiesFilter['PoliciesFilter']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
				</table>
				
				<p>
					<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
						));
						?>				
				</p>
				

				<ul class="pagination">
						<?php 
							echo $this->Paginator->prev( '«' ,array('tag'=>'li'),null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li')); 
						?>
						<?php 
							echo $this->Paginator->numbers(array('separator' => null,'tag'=>'li'));
						?>
						<?php 
							echo $this->Paginator->next( '»' , array('tag'=>'li'), null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
						?>
				</ul>


          </div>
        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->





