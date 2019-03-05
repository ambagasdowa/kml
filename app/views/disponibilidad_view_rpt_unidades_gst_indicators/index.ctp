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
				<?php echo $this->Html->link(__('New Disponibilidad View Rpt Unidades Gst Indicator', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Disponibilidad View Rpt Unidades Gst Indicators');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('unidad');?></th>
													<th><?php echo $this->Paginator->sort('estatus');?></th>
													<th><?php echo $this->Paginator->sort('tipo_status');?></th>
													<th><?php echo $this->Paginator->sort('operador');?></th>
													<th><?php echo $this->Paginator->sort('remolque');?></th>
													<th><?php echo $this->Paginator->sort('area');?></th>
													<th><?php echo $this->Paginator->sort('segmento');?></th>
													<th><?php echo $this->Paginator->sort('description');?></th>
													<th><?php echo $this->Paginator->sort('compromise');?></th>
													<th><?php echo $this->Paginator->sort('status_viaje');?></th>
													<th><?php echo $this->Paginator->sort('desc_viaje');?></th>
													<th><?php echo $this->Paginator->sort('status_taller');?></th>
													<th><?php echo $this->Paginator->sort('desc_taller');?></th>
													<th><?php echo $this->Paginator->sort('iseditable');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($disponibilidadViewRptUnidadesGstIndicators as $disponibilidadViewRptUnidadesGstIndicator):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['estatus']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['tipo_status']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['operador']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['remolque']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['area']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['segmento']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['description']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['compromise']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['status_viaje']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['desc_viaje']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['status_taller']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['desc_taller']; ?>&nbsp;</td>
		<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['iseditable']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'])); ?>
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