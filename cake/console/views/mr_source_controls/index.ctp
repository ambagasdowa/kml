
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Mr Source Control', true), array('action' => 'add')); ?>			</li>
				          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Mr Source Controls');?></h1>
          <div class="table-responsive">
          
				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('source_company');?></th>
													<th><?php echo $this->Paginator->sort('_key');?></th>
													<th><?php echo $this->Paginator->sort('_description');?></th>
													<th><?php echo $this->Paginator->sort('_status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($mrSourceControls as $mrSourceControl):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $mrSourceControl['MrSourceControl']['id']; ?>&nbsp;</td>
		<td><?php echo $mrSourceControl['MrSourceControl']['source_company']; ?>&nbsp;</td>
		<td><?php echo $mrSourceControl['MrSourceControl']['_key']; ?>&nbsp;</td>
		<td><?php echo $mrSourceControl['MrSourceControl']['_description']; ?>&nbsp;</td>
		<td><?php echo $mrSourceControl['MrSourceControl']['_status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mrSourceControl['MrSourceControl']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mrSourceControl['MrSourceControl']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mrSourceControl['MrSourceControl']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mrSourceControl['MrSourceControl']['id'])); ?>
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





