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
				<?php echo $this->Html->link(__('New Projections View Indicators Period', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Projections View Indicators Periods');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('company');?></th>
													<th><?php echo $this->Paginator->sort('id_area');?></th>
													<th><?php echo $this->Paginator->sort('area');?></th>
													<th><?php echo $this->Paginator->sort('id_fraccion');?></th>
													<th><?php echo $this->Paginator->sort('fraccion');?></th>
													<th><?php echo $this->Paginator->sort('cyear');?></th>
													<th><?php echo $this->Paginator->sort('mes');?></th>
													<th><?php echo $this->Paginator->sort('kms');?></th>
													<th><?php echo $this->Paginator->sort('subtotal');?></th>
													<th><?php echo $this->Paginator->sort('peso');?></th>
													<th><?php echo $this->Paginator->sort('non_zero');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($projectionsViewIndicatorsPeriods as $projectionsViewIndicatorsPeriod):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['company']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id_area']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['area']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id_fraccion']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['fraccion']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['cyear']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['mes']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['kms']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['subtotal']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['peso']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['non_zero']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsViewIndicatorsPeriod['ProjectionsViewIndicatorsPeriod']['id'])); ?>
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