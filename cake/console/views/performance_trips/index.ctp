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
				<?php echo $this->Html->link(__('New Performance Trip', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Performance Trips');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('id_area');?></th>
													<th><?php echo $this->Paginator->sort('id_unidad');?></th>
													<th><?php echo $this->Paginator->sort('id_configuracionviaje');?></th>
													<th><?php echo $this->Paginator->sort('id_tipo_operacion');?></th>
													<th><?php echo $this->Paginator->sort('id_fraccion');?></th>
													<th><?php echo $this->Paginator->sort('id_flota');?></th>
													<th><?php echo $this->Paginator->sort('no_viaje');?></th>
													<th><?php echo $this->Paginator->sort('num_guia');?></th>
													<th><?php echo $this->Paginator->sort('no_guia');?></th>
													<th><?php echo $this->Paginator->sort('f_despachado');?></th>
													<th><?php echo $this->Paginator->sort('fecha_guia');?></th>
													<th><?php echo $this->Paginator->sort('fecha_ingreso');?></th>
													<th><?php echo $this->Paginator->sort('fecha_modifico');?></th>
													<th><?php echo $this->Paginator->sort('mes');?></th>
													<th><?php echo $this->Paginator->sort('cliente');?></th>
													<th><?php echo $this->Paginator->sort('kms_viaje');?></th>
													<th><?php echo $this->Paginator->sort('kms_real');?></th>
													<th><?php echo $this->Paginator->sort('subtotal');?></th>
													<th><?php echo $this->Paginator->sort('peso');?></th>
													<th><?php echo $this->Paginator->sort('configuracion_viaje');?></th>
													<th><?php echo $this->Paginator->sort('tipo_de_operacion');?></th>
													<th><?php echo $this->Paginator->sort('flota');?></th>
													<th><?php echo $this->Paginator->sort('area');?></th>
													<th><?php echo $this->Paginator->sort('fraccion');?></th>
													<th><?php echo $this->Paginator->sort('company');?></th>
													<th><?php echo $this->Paginator->sort('trip_count');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($performanceTrips as $performanceTrip):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $performanceTrip['PerformanceTrip']['id']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['id_area']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['id_unidad']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['id_configuracionviaje']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['id_tipo_operacion']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['id_fraccion']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['id_flota']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['no_viaje']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['num_guia']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['no_guia']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['f_despachado']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['fecha_guia']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['fecha_ingreso']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['fecha_modifico']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['mes']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['cliente']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['kms_viaje']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['kms_real']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['subtotal']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['peso']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['configuracion_viaje']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['tipo_de_operacion']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['flota']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['area']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['fraccion']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['company']; ?>&nbsp;</td>
		<td><?php echo $performanceTrip['PerformanceTrip']['trip_count']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $performanceTrip['PerformanceTrip']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $performanceTrip['PerformanceTrip']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $performanceTrip['PerformanceTrip']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $performanceTrip['PerformanceTrip']['id'])); ?>
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