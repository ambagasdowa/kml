<?php //debug($mrSourceReports);?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Mr Source Report', true), array('action' => 'add')); ?>			</li>
				          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Mr Source Reports');?></h1>
          <div class="table-responsive">
          
				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('Mes');?></th>
													<th><?php echo $this->Paginator->sort('NoCta');?></th>
													<th><?php echo $this->Paginator->sort('NombreCta');?></th>
													<th><?php echo $this->Paginator->sort('PerEnt');?></th>
													<th><?php echo $this->Paginator->sort('Compañía');?></th>
													<th><?php echo $this->Paginator->sort('Tipo');?></th>
													<th><?php echo $this->Paginator->sort('Entidad');?></th>
													<th><?php echo $this->Paginator->sort('distinto');?></th>
													<th><?php echo $this->Paginator->sort('tipoTransacción');?></th>
													<th><?php echo $this->Paginator->sort('Referencia');?></th>
													<th><?php echo $this->Paginator->sort('FechaTransacción');?></th>
													<th><?php echo $this->Paginator->sort('Descripción');?></th>
													<th><?php echo $this->Paginator->sort('Abono');?></th>
													<th><?php echo $this->Paginator->sort('Cargo');?></th>
													<th><?php echo $this->Paginator->sort('UnidadNegocio');?></th>
													<th><?php echo $this->Paginator->sort('CentroCosto');?></th>
													<th><?php echo $this->Paginator->sort('NombreEntidad');?></th>
													<th><?php echo $this->Paginator->sort('_company');?></th>
													<th><?php echo $this->Paginator->sort('_period');?></th>
													<th><?php echo $this->Paginator->sort('_key');?></th>
													<th><?php echo $this->Paginator->sort('Presupuesto');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($mrSourceReports as $mrSourceReport):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $mrSourceReport['MrSourceReport']['id']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['Mes']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['NoCta']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['NombreCta']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['PerEnt']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['Compañía']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['Tipo']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['Entidad']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['distinto']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['tipoTransacción']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['Referencia']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['FechaTransacción']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['Descripción']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['Abono']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['Cargo']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['UnidadNegocio']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['CentroCosto']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['NombreEntidad']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['_company']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['_period']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['_key']; ?>&nbsp;</td>
		<td><?php echo $mrSourceReport['MrSourceReport']['Presupuesto']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mrSourceReport['MrSourceReport']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mrSourceReport['MrSourceReport']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mrSourceReport['MrSourceReport']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mrSourceReport['MrSourceReport']['id'])); ?>
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





