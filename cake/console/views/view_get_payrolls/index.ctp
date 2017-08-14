
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New View Get Payroll', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('View Get Payrolls');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('Cvetno');?></th>
													<th><?php echo $this->Paginator->sort('Cvepue');?></th>
													<th><?php echo $this->Paginator->sort('Cvecia');?></th>
													<th><?php echo $this->Paginator->sort('Cveare');?></th>
													<th><?php echo $this->Paginator->sort('Cvetra');?></th>
													<th><?php echo $this->Paginator->sort('Apepat');?></th>
													<th><?php echo $this->Paginator->sort('Apemat');?></th>
													<th><?php echo $this->Paginator->sort('Nombre');?></th>
													<th><?php echo $this->Paginator->sort('Nomina');?></th>
													<th><?php echo $this->Paginator->sort('Company');?></th>
													<th><?php echo $this->Paginator->sort('Area');?></th>
													<th><?php echo $this->Paginator->sort('Departamento');?></th>
													<th><?php echo $this->Paginator->sort('Puesto');?></th>
													<th><?php echo $this->Paginator->sort('Baja');?></th>
													<th><?php echo $this->Paginator->sort('Numrfc');?></th>
													<th><?php echo $this->Paginator->sort('Curp');?></th>
													<th><?php echo $this->Paginator->sort('Numims');?></th>
													<th><?php echo $this->Paginator->sort('Cvecau');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($viewGetPayrolls as $viewGetPayroll):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['id']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Cvetno']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Cvepue']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Cvecia']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Cveare']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Cvetra']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Apepat']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Apemat']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Nombre']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Nomina']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Company']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Area']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Departamento']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Puesto']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Baja']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Numrfc']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Curp']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Numims']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Cvecau']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $viewGetPayroll['ViewGetPayroll']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $viewGetPayroll['ViewGetPayroll']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $viewGetPayroll['ViewGetPayroll']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $viewGetPayroll['ViewGetPayroll']['id'])); ?>
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





