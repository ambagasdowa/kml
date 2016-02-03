
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Tralix', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Tralixes');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id_tralix');?></th>
													<th><?php echo $this->Paginator->sort('id_empresa');?></th>
													<th><?php echo $this->Paginator->sort('uuid');?></th>
													<th><?php echo $this->Paginator->sort('fecha');?></th>
													<th><?php echo $this->Paginator->sort('rfc');?></th>
													<th><?php echo $this->Paginator->sort('claveFactura');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($tralixes as $tralix):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $tralix['Tralix']['id_tralix']; ?>&nbsp;</td>
		<td><?php echo $tralix['Tralix']['id_empresa']; ?>&nbsp;</td>
		<td><?php echo $tralix['Tralix']['uuid']; ?>&nbsp;</td>
		<td><?php echo $tralix['Tralix']['fecha']; ?>&nbsp;</td>
		<td><?php echo $tralix['Tralix']['rfc']; ?>&nbsp;</td>
		<td><?php echo $tralix['Tralix']['claveFactura']; ?>&nbsp;</td>
		<td><?php echo $tralix['Tralix']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tralix['Tralix']['id_tralix'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tralix['Tralix']['id_tralix'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tralix['Tralix']['id_tralix']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tralix['Tralix']['id_tralix'])); ?>
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





