<?php
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = true;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Mr Source Config', true), array('action' => 'add')); ?>			</li>
				          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Mr Source Configs');?></h1>
          <div class="table-responsive">
          
				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id');?></th>
						<th><?php echo $this->Paginator->sort('SubAccount');?></th>
						<th><?php echo $this->Paginator->sort('company');?></th>
						<th><?php echo $this->Paginator->sort('period');?></th>
						<th><?php echo $this->Paginator->sort('_key');?></th>
						<th><?php echo $this->Paginator->sort('_status');?></th>
						<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($mrSourceConfigs as $mrSourceConfig):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $mrSourceConfig['MrSourceConfig']['id']; ?>&nbsp;</td>
		<td><?php echo $mrSourceConfig['MrSourceConfig']['SubAccount']; ?>&nbsp;</td>
		<td><?php echo $mrSourceConfig['MrSourceConfig']['company']; ?>&nbsp;</td>
		<td><?php echo $mrSourceConfig['MrSourceConfig']['period']; ?>&nbsp;</td>
		<td><?php echo $mrSourceConfig['MrSourceConfig']['_key']; ?>&nbsp;</td>
		<td><?php echo $mrSourceConfig['MrSourceConfig']['_status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mrSourceConfig['MrSourceConfig']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mrSourceConfig['MrSourceConfig']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mrSourceConfig['MrSourceConfig']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mrSourceConfig['MrSourceConfig']['id'])); ?>
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





