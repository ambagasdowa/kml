
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Business Unit', true), array('action' => 'add')); ?>			</li>
				          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Business Units');?></h1>
          <div class="table-responsive">
          
				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('company_id');?></th>
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
				foreach ($businessUnits as $businessUnit):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $businessUnit['BusinessUnit']['id']; ?>&nbsp;</td>
		<td><?php echo $businessUnit['BusinessUnit']['company_id']; ?>&nbsp;</td>
		<td><?php echo $businessUnit['BusinessUnit']['name']; ?>&nbsp;</td>
		<td><?php echo $businessUnit['BusinessUnit']['description']; ?>&nbsp;</td>
		<td><?php echo $businessUnit['BusinessUnit']['create']; ?>&nbsp;</td>
		<td><?php echo $businessUnit['BusinessUnit']['modified']; ?>&nbsp;</td>
		<td><?php echo $businessUnit['BusinessUnit']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $businessUnit['BusinessUnit']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $businessUnit['BusinessUnit']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $businessUnit['BusinessUnit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $businessUnit['BusinessUnit']['id'])); ?>
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





