<?php 
		/**
		* 
		* PHP versions 4 and 5 
		* 
		* kml : Kamila Software 
		* Licensed under The MIT License  
		* Redistributions of files must retain the above copyright notice.
		* 
		* @copyright     Jesus Baizabal 
		* @link          http://baizabal.xyz 
		* @mail	     baizabal.jesus@gmail.com
		* @package       cake 
		* @subpackage    cake.cake.console.libs.templates.views 
		* @since         CakePHP(tm) v 1.2.0.5234 
		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php) 
		*/
		?>

		<?php
		// SecureCalendar index
			// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
			$evaluate = false;
			$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
		?>
		
		<style>
			/* unvisited link */
			.modded-link:link {
				display:block !important;
				background-color:#999;
				color: #444;
			}
			/* mouse over link */
			.modded-link:hover {
				font-weight: bold;
			}
			.panel-default {
				background-color: rgba(255, 255, 255, 0.3); /* Color white with alpha 0.9*/
			}
			
		</style>
	

    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Performance Reference', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Performance Customers', true), array('controller' => 'performance_customers', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Performance Customers', true), array('controller' => 'performance_customers', 'action' => 'add')); ?> 
</li>
			<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Performance References');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('performance_customers_id');?></th>
													<th><?php echo $this->Paginator->sort('Empresa');?></th>
													<th><?php echo $this->Paginator->sort('TipoDocumento');?></th>
													<th><?php echo $this->Paginator->sort('Folio');?></th>
													<th><?php echo $this->Paginator->sort('Nombre');?></th>
													<th><?php echo $this->Paginator->sort('Flete');?></th>
													<th><?php echo $this->Paginator->sort('Iva');?></th>
													<th><?php echo $this->Paginator->sort('Retencion');?></th>
													<th><?php echo $this->Paginator->sort('Total');?></th>
													<th><?php echo $this->Paginator->sort('Referencia');?></th>
													<th><?php echo $this->Paginator->sort('Lote');?></th>
													<th><?php echo $this->Paginator->sort('Descripcion');?></th>
													<th><?php echo $this->Paginator->sort('ElaboracionFactura');?></th>
													<th><?php echo $this->Paginator->sort('MES');?></th>
													<th><?php echo $this->Paginator->sort('DIA');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($performanceReferences as $performanceReference):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $performanceReference['PerformanceReference']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($performanceReference['PerformanceCustomers']['id'], array('controller' => 'performance_customers', 'action' => 'view', $performanceReference['PerformanceCustomers']['id'])); ?>
		</td>
		<td><?php echo $performanceReference['PerformanceReference']['Empresa']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['TipoDocumento']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['Folio']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['Nombre']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['Flete']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['Iva']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['Retencion']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['Total']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['Referencia']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['Lote']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['Descripcion']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['ElaboracionFactura']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['MES']; ?>&nbsp;</td>
		<td><?php echo $performanceReference['PerformanceReference']['DIA']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $performanceReference['PerformanceReference']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $performanceReference['PerformanceReference']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $performanceReference['PerformanceReference']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $performanceReference['PerformanceReference']['id'])); ?>
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

    <script>
	$(document).ready(function () {
		$(function () {
			$("table").stickyTableHeaders({fixedOffset: 22,marginTop: 22});
		});
		/*! Copyright (c) 2011 by Jonas Mosbech - https://github.com/jmosbech/StickyTableHeaders
			MIT license info: https://github.com/jmosbech/StickyTableHeaders/blob/master/license.txt */

	});
    </script>