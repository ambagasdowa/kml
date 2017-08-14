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
				<?php echo $this->Html->link(__('New Casetas View Not Conciliation', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Casetas Historical Conciliations', true), array('controller' => 'casetas_historical_conciliations', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Casetas Historical Conciliations', true), array('controller' => 'casetas_historical_conciliations', 'action' => 'add')); ?> 
</li>
			<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Casetas View Not Conciliations');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('period_iave_id');?></th>
													<th><?php echo $this->Paginator->sort('fecha_ini');?></th>
													<th><?php echo $this->Paginator->sort('fecha_fin');?></th>
													<th><?php echo $this->Paginator->sort('name');?></th>
													<th><?php echo $this->Paginator->sort('no_viaje');?></th>
													<th><?php echo $this->Paginator->sort('f_despachado');?></th>
													<th><?php echo $this->Paginator->sort('fecha_real_viaje');?></th>
													<th><?php echo $this->Paginator->sort('fecha_real_fin_viaje');?></th>
													<th><?php echo $this->Paginator->sort('id_unidad');?></th>
													<th><?php echo $this->Paginator->sort('iave_catalogo');?></th>
													<th><?php echo $this->Paginator->sort('id_ruta');?></th>
													<th><?php echo $this->Paginator->sort('desc_ruta');?></th>
													<th><?php echo $this->Paginator->sort('id_caseta');?></th>
													<th><?php echo $this->Paginator->sort('diff_length_hours');?></th>
													<th><?php echo $this->Paginator->sort('no_de_ejes');?></th>
													<th><?php echo $this->Paginator->sort('orden');?></th>
													<th><?php echo $this->Paginator->sort('desc_caseta');?></th>
													<th><?php echo $this->Paginator->sort('monto_iave');?></th>
													<th><?php echo $this->Paginator->sort('tarifas');?></th>
													<th><?php echo $this->Paginator->sort('trliq_fecha_ingreso');?></th>
													<th><?php echo $this->Paginator->sort('_filename');?></th>
													<th><?php echo $this->Paginator->sort('casetas_controls_files_id');?></th>
													<th><?php echo $this->Paginator->sort('casetas_historical_conciliations_id');?></th>
													<th><?php echo $this->Paginator->sort('fecha_conciliacion');?></th>
													<th><?php echo $this->Paginator->sort('_modified');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($casetasViewNotConciliations as $casetasViewNotConciliation):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['id']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['period_iave_id']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['fecha_ini']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['fecha_fin']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['name']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['no_viaje']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['f_despachado']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['fecha_real_viaje']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['fecha_real_fin_viaje']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['id_unidad']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['iave_catalogo']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['id_ruta']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['desc_ruta']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['id_caseta']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['diff_length_hours']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['no_de_ejes']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['orden']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['desc_caseta']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['monto_iave']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['tarifas']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['trliq_fecha_ingreso']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['_filename']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['casetas_controls_files_id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($casetasViewNotConciliation['CasetasHistoricalConciliations']['casetas_controls_files_id'], array('controller' => 'casetas_historical_conciliations', 'action' => 'view', $casetasViewNotConciliation['CasetasHistoricalConciliations']['id'])); ?>
		</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['fecha_conciliacion']; ?>&nbsp;</td>
		<td><?php echo $casetasViewNotConciliation['CasetasViewNotConciliation']['_modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $casetasViewNotConciliation['CasetasViewNotConciliation']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $casetasViewNotConciliation['CasetasViewNotConciliation']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $casetasViewNotConciliation['CasetasViewNotConciliation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasViewNotConciliation['CasetasViewNotConciliation']['id'])); ?>
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