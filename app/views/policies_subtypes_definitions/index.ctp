
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Policies Subtypes Definition', true), array('action' => 'add')); ?>			</li>
				          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Policies Subtypes Definitions');?></h1>
          <div class="table-responsive">
          
				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
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
				foreach ($policiesSubtypesDefinitions as $policiesSubtypesDefinition):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['id']; ?>&nbsp;</td>
		<td><?php echo $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['name']; ?>&nbsp;</td>
		<td><?php echo $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['description']; ?>&nbsp;</td>
		<td><?php echo $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['create']; ?>&nbsp;</td>
		<td><?php echo $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['modified']; ?>&nbsp;</td>
		<td><?php echo $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['id'])); ?>
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





