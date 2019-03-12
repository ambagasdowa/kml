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
				<?php echo $this->Html->link(__('New Georeference Tbl Positions Documents Gst Indicator', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Georeference Tbl Positions Documents Gst Indicators');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('AsignacionDesc');?></th>
													<th><?php echo $this->Paginator->sort('Seguimiento');?></th>
													<th><?php echo $this->Paginator->sort('StatusDescription');?></th>
													<th><?php echo $this->Paginator->sort('statdesc');?></th>
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
													<th><?php echo $this->Paginator->sort('control_id');?></th>
													<th><?php echo $this->Paginator->sort('created');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($georeferenceTblPositionsDocumentsGstIndicators as $georeferenceTblPositionsDocumentsGstIndicator):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['id']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['AsignacionDesc']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['Seguimiento']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['StatusDescription']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['statdesc']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['enBase']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['inBase']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['DescriptionViaje']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['traceroute']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['Area']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['Unidad']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['Asignacion']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['status_asignacion']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['seguimiento_actual']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['FechaAsignacion']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['Viaje']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['Despachado']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['Operador']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['Latitud']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['Longitud']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['FechaPosition']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['id_geocerca']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['base']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['max_latitud']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['min_latitud']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['max_longitud']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['min_longitud']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['control_id']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['created']; ?>&nbsp;</td>
		<td><?php echo $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $georeferenceTblPositionsDocumentsGstIndicator['GeoreferenceTblPositionsDocumentsGstIndicator']['id'])); ?>
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