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
				<?php echo $this->Html->link(__('New Georeference View Positions Hist Gst Indicator', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Georeference View Positions Hist Gst Indicators');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('AsignacionDesc');?></th>
													<th><?php echo $this->Paginator->sort('Seguimiento');?></th>
													<th><?php echo $this->Paginator->sort('enBase');?></th>
													<th><?php echo $this->Paginator->sort('inBase');?></th>
													<th><?php echo $this->Paginator->sort('DescriptionViaje');?></th>
													<th><?php echo $this->Paginator->sort('traceroute');?></th>
													<th><?php echo $this->Paginator->sort('Area');?></th>
													<th><?php echo $this->Paginator->sort('Unidad');?></th>
													<th><?php echo $this->Paginator->sort('Asignacion');?></th>
													<th><?php echo $this->Paginator->sort('status_asignacion');?></th>
													<th><?php echo $this->Paginator->sort('seguimiento_actual');?></th>
													<th><?php echo $this->Paginator->sort('FechaAsignacion');?></th>
													<th><?php echo $this->Paginator->sort('Viaje');?></th>
													<th><?php echo $this->Paginator->sort('Despachado');?></th>
													<th><?php echo $this->Paginator->sort('Operador');?></th>
													<th><?php echo $this->Paginator->sort('Latitud');?></th>
													<th><?php echo $this->Paginator->sort('Longitud');?></th>
													<th><?php echo $this->Paginator->sort('FechaPosition');?></th>
													<th><?php echo $this->Paginator->sort('id_geocerca');?></th>
													<th><?php echo $this->Paginator->sort('base');?></th>
													<th><?php echo $this->Paginator->sort('max_latitud');?></th>
													<th><?php echo $this->Paginator->sort('min_latitud');?></th>
													<th><?php echo $this->Paginator->sort('max_longitud');?></th>
													<th><?php echo $this->Paginator->sort('min_longitud');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($georeferenceViewPositionsHistGstIndicators as $georeferenceViewPositionsHistGstIndicator):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['id']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['AsignacionDesc']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['Seguimiento']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['enBase']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['inBase']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['DescriptionViaje']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['traceroute']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['Area']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['Unidad']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['Asignacion']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['status_asignacion']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['seguimiento_actual']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['FechaAsignacion']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['Viaje']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['Despachado']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['Operador']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['Latitud']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['Longitud']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['FechaPosition']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['id_geocerca']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['base']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['max_latitud']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['min_latitud']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['max_longitud']; ?>&nbsp;</td>
		<td><?php echo $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['min_longitud']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $georeferenceViewPositionsHistGstIndicator['GeoreferenceViewPositionsHistGstIndicator']['id'])); ?>
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