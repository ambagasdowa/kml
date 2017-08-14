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
				<?php echo $this->Html->link(__('New Projections Bsu Presupuesto', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'add')); ?> 
</li>
			<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Projections Bsu Presupuestos');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('user_id');?></th>
													<th><?php echo $this->Paginator->sort('cyear');?></th>
													<th><?php echo $this->Paginator->sort('cmonth');?></th>
													<th><?php echo $this->Paginator->sort('projections_corporations_id');?></th>
													<th><?php echo $this->Paginator->sort('id_area');?></th>
													<th><?php echo $this->Paginator->sort('id_fraccion');?></th>
													<th><?php echo $this->Paginator->sort('fraction');?></th>
													<th><?php echo $this->Paginator->sort('bsu_name');?></th>
													<th><?php echo $this->Paginator->sort('bsu_label');?></th>
													<th><?php echo $this->Paginator->sort('data');?></th>
													<th><?php echo $this->Paginator->sort('data_desc');?></th>
													<th><?php echo $this->Paginator->sort('created');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('_status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($projectionsBsuPresupuestos as $projectionsBsuPresupuesto):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectionsBsuPresupuesto['User']['name'], array('controller' => 'users', 'action' => 'view', $projectionsBsuPresupuesto['User']['id'])); ?>
		</td>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['cyear']; ?>&nbsp;</td>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['cmonth']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectionsBsuPresupuesto['ProjectionsCorporations']['id'], array('controller' => 'projections_corporations', 'action' => 'view', $projectionsBsuPresupuesto['ProjectionsCorporations']['id'])); ?>
		</td>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['id_area']; ?>&nbsp;</td>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['id_fraccion']; ?>&nbsp;</td>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['fraction']; ?>&nbsp;</td>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['bsu_name']; ?>&nbsp;</td>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['bsu_label']; ?>&nbsp;</td>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['data']; ?>&nbsp;</td>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['data_desc']; ?>&nbsp;</td>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['created']; ?>&nbsp;</td>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['modified']; ?>&nbsp;</td>
		<td><?php echo $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['_status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsBsuPresupuesto['ProjectionsBsuPresupuesto']['id'])); ?>
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