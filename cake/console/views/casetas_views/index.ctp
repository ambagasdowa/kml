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
				<?php echo $this->Html->link(__('New Casetas View', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Casetas Historical Conciliations', true), array('controller' => 'casetas_historical_conciliations', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Casetas Historical Conciliations', true), array('controller' => 'casetas_historical_conciliations', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Casetas Controls Files', true), array('controller' => 'casetas_controls_files', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Casetas Controls Files', true), array('controller' => 'casetas_controls_files', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Casetas Controls Events', true), array('controller' => 'casetas_controls_events', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Casetas Controls Event', true), array('controller' => 'casetas_controls_events', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Casetas Pendings', true), array('controller' => 'casetas_pendings', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Casetas Pending', true), array('controller' => 'casetas_pendings', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Casetas Conciliations', true), array('controller' => 'casetas_conciliations', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Casetas Conciliation', true), array('controller' => 'casetas_conciliations', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Casetas Not Conciliations', true), array('controller' => 'casetas_not_conciliations', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Casetas Not Conciliation', true), array('controller' => 'casetas_not_conciliations', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Casetas Logs', true), array('controller' => 'casetas_logs', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Casetas Log', true), array('controller' => 'casetas_logs', 'action' => 'add')); ?> 
</li>
			<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Casetas Views');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('id_unidad');?></th>
													<th><?php echo $this->Paginator->sort('unit');?></th>
													<th><?php echo $this->Paginator->sort('no_tarjeta_iave');?></th>
													<th><?php echo $this->Paginator->sort('alpha_num_code');?></th>
													<th><?php echo $this->Paginator->sort('alpha_location');?></th>
													<th><?php echo $this->Paginator->sort('alpha_location_1');?></th>
													<th><?php echo $this->Paginator->sort('_filename');?></th>
													<th><?php echo $this->Paginator->sort('no_viaje');?></th>
													<th><?php echo $this->Paginator->sort('fecha_cruce');?></th>
													<th><?php echo $this->Paginator->sort('f_despachado');?></th>
													<th><?php echo $this->Paginator->sort('fecha_fin_viaje');?></th>
													<th><?php echo $this->Paginator->sort('float_data');?></th>
													<th><?php echo $this->Paginator->sort('hora_cruce');?></th>
													<th><?php echo $this->Paginator->sort('cia');?></th>
													<th><?php echo $this->Paginator->sort('Monto_archivo');?></th>
													<th><?php echo $this->Paginator->sort('_next');?></th>
													<th><?php echo $this->Paginator->sort('fecha_inicio');?></th>
													<th><?php echo $this->Paginator->sort('fecha_fin');?></th>
													<th><?php echo $this->Paginator->sort('description_casetas');?></th>
													<th><?php echo $this->Paginator->sort('casetas_historical_conciliations_id');?></th>
													<th><?php echo $this->Paginator->sort('casetas_controls_files_id');?></th>
													<th><?php echo $this->Paginator->sort('created');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('casetas_standings_id');?></th>
													<th><?php echo $this->Paginator->sort('casetas_parents_id');?></th>
													<th><?php echo $this->Paginator->sort('_status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($casetasViews as $casetasView):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $casetasView['CasetasView']['id']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['id_unidad']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['unit']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['no_tarjeta_iave']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['alpha_num_code']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['alpha_location']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['alpha_location_1']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['_filename']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['no_viaje']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['fecha_cruce']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['f_despachado']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['fecha_fin_viaje']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['float_data']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['hora_cruce']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['cia']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['Monto_archivo']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['_next']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['fecha_inicio']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['fecha_fin']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['description_casetas']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($casetasView['CasetasHistoricalConciliations']['casetas_controls_files_id'], array('controller' => 'casetas_historical_conciliations', 'action' => 'view', $casetasView['CasetasHistoricalConciliations']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($casetasView['CasetasControlsFiles']['_filename'], array('controller' => 'casetas_controls_files', 'action' => 'view', $casetasView['CasetasControlsFiles']['id'])); ?>
		</td>
		<td><?php echo $casetasView['CasetasView']['created']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['modified']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($casetasView['CasetasStandings']['casetas_standings_name'], array('controller' => 'casetas_standings', 'action' => 'view', $casetasView['CasetasStandings']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($casetasView['CasetasParents']['casetas_parents_name'], array('controller' => 'casetas_parents', 'action' => 'view', $casetasView['CasetasParents']['id'])); ?>
		</td>
		<td><?php echo $casetasView['CasetasView']['_status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $casetasView['CasetasView']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $casetasView['CasetasView']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $casetasView['CasetasView']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasView['CasetasView']['id'])); ?>
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





