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
				<?php echo $this->Html->link(__('New Performance View Viaje', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Performance Bsus', true), array('controller' => 'performance_bsus', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Performance Bsus', true), array('controller' => 'performance_bsus', 'action' => 'add')); ?>
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?>
</li>
			<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Performance View Viajes');?></h1>
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
													<th><?php echo $this->Paginator->sort('fecha_ingreso');?></th>
													<th><?php echo $this->Paginator->sort('fecha_guia');?></th>
													<th><?php echo $this->Paginator->sort('end');?></th>
													<th><?php echo $this->Paginator->sort('recepcionEvidencias');?></th>
													<th><?php echo $this->Paginator->sort('reception');?></th>
													<th><?php echo $this->Paginator->sort('fecha_modifico');?></th>
													<th><?php echo $this->Paginator->sort('aceptance');?></th>
													<th><?php echo $this->Paginator->sort('entregaEvidenciasCliente');?></th>
													<th><?php echo $this->Paginator->sort('deliver');?></th>
													<th><?php echo $this->Paginator->sort('validacionEvidenciasCliente');?></th>
													<th><?php echo $this->Paginator->sort('validation');?></th>
													<th><?php echo $this->Paginator->sort('mes');?></th>
													<th><?php echo $this->Paginator->sort('id_cliente');?></th>
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
													<th><?php echo $this->Paginator->sort('internal_id');?></th>
													<th><?php echo $this->Paginator->sort('id_area_viaje');?></th>
													<th><?php echo $this->Paginator->sort('performance_bsus_id');?></th>
													<th><?php echo $this->Paginator->sort('user_id');?></th>
													<th><?php echo $this->Paginator->sort('status');?></th>
													<th><?php echo $this->Paginator->sort('created');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>

					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($performanceViewViajes as $performanceViewViaje):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['id']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_area']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_unidad']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_configuracionviaje']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_tipo_operacion']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_fraccion']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_flota']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['no_viaje']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['num_guia']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['no_guia']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['f_despachado']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['fecha_ingreso']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['fecha_guia']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['end']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['recepcionEvidencias']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['reception']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['fecha_modifico']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['aceptance']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['entregaEvidenciasCliente']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['deliver']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['validacionEvidenciasCliente']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['validation']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['mes']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_cliente']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['cliente']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['kms_viaje']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['kms_real']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['subtotal']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['peso']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['configuracion_viaje']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['tipo_de_operacion']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['flota']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['area']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['fraccion']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['company']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['trip_count']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['internal_id']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_area_viaje']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($performanceViewViaje['PerformanceBsus']['label'], array('controller' => 'performance_bsus', 'action' => 'view', $performanceViewViaje['PerformanceBsus']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($performanceViewViaje['User']['name'], array('controller' => 'users', 'action' => 'view', $performanceViewViaje['User']['id'])); ?>
		</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['status']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['created']; ?>&nbsp;</td>
		<td><?php echo $performanceViewViaje['PerformanceViewViaje']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $performanceViewViaje['PerformanceViewViaje']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $performanceViewViaje['PerformanceViewViaje']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $performanceViewViaje['PerformanceViewViaje']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $performanceViewViaje['PerformanceViewViaje']['id'])); ?>
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
