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
				<?php echo $this->Html->link(__('New Providers Imported Database', true), array('action' => 'add')); ?>			</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Providers Imported Files Controls', true), array('controller' => 'providers_imported_files_controls', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Providers Imported Files Controls', true), array('controller' => 'providers_imported_files_controls', 'action' => 'add')); ?> 
</li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Providers View Companies Units', true), array('controller' => 'providers_view_companies_units', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Providers View Companies Units', true), array('controller' => 'providers_view_companies_units', 'action' => 'add')); ?> 
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
          <h1 class="page-header"><?php __('Providers Imported Databases');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('providers_imported_files_controls_id');?></th>
													<th><?php echo $this->Paginator->sort('providers_view_companies_units_id');?></th>
													<th><?php echo $this->Paginator->sort('providers_units_name');?></th>
													<th><?php echo $this->Paginator->sort('providers_units_desc');?></th>
													<th><?php echo $this->Paginator->sort('keypri');?></th>
													<th><?php echo $this->Paginator->sort('id_file');?></th>
													<th><?php echo $this->Paginator->sort('ZCpnyId');?></th>
													<th><?php echo $this->Paginator->sort('ZBatNbr');?></th>
													<th><?php echo $this->Paginator->sort('ZRcptDate');?></th>
													<th><?php echo $this->Paginator->sort('ZVendId');?></th>
													<th><?php echo $this->Paginator->sort('ZCuryRcptCtrlAmt');?></th>
													<th><?php echo $this->Paginator->sort('ZAPBatNbr');?></th>
													<th><?php echo $this->Paginator->sort('ZAPRefno');?></th>
													<th><?php echo $this->Paginator->sort('ZAPDocDate');?></th>
													<th><?php echo $this->Paginator->sort('ZEstatus');?></th>
													<th><?php echo $this->Paginator->sort('ZInvcNbr');?></th>
													<th><?php echo $this->Paginator->sort('ZInvcDate');?></th>
													<th><?php echo $this->Paginator->sort('ZPerPost');?></th>
													<th><?php echo $this->Paginator->sort('ZPayDate');?></th>
													<th><?php echo $this->Paginator->sort('ZUUID');?></th>
													<th><?php echo $this->Paginator->sort('ZAcct');?></th>
													<th><?php echo $this->Paginator->sort('ZFechaPago');?></th>
													<th><?php echo $this->Paginator->sort('ZMontoPago');?></th>
													<th><?php echo $this->Paginator->sort('ZRefPago');?></th>
													<th><?php echo $this->Paginator->sort('tstamp');?></th>
													<th><?php echo $this->Paginator->sort('Ztbknbr');?></th>
													<th><?php echo $this->Paginator->sort('exportado');?></th>
													<th><?php echo $this->Paginator->sort('florensia');?></th>
													<th><?php echo $this->Paginator->sort('tipocomprobante');?></th>
													<th><?php echo $this->Paginator->sort('created');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('user_id');?></th>
													<th><?php echo $this->Paginator->sort('providers_standings_id');?></th>
													<th><?php echo $this->Paginator->sort('providers_parents_id');?></th>
													<th><?php echo $this->Paginator->sort('_status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($providersImportedDatabases as $providersImportedDatabase):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($providersImportedDatabase['ProvidersImportedFilesControls']['id'], array('controller' => 'providers_imported_files_controls', 'action' => 'view', $providersImportedDatabase['ProvidersImportedFilesControls']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($providersImportedDatabase['ProvidersViewCompaniesUnits']['id'], array('controller' => 'providers_view_companies_units', 'action' => 'view', $providersImportedDatabase['ProvidersViewCompaniesUnits']['id'])); ?>
		</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['providers_units_name']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['providers_units_desc']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['keypri']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['id_file']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZCpnyId']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZBatNbr']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZRcptDate']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZVendId']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZCuryRcptCtrlAmt']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZAPBatNbr']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZAPRefno']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZAPDocDate']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZEstatus']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZInvcNbr']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZInvcDate']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZPerPost']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZPayDate']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZUUID']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZAcct']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZFechaPago']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZMontoPago']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['ZRefPago']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['tstamp']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['Ztbknbr']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['exportado']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['florensia']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['tipocomprobante']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['created']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['modified']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($providersImportedDatabase['User']['name'], array('controller' => 'users', 'action' => 'view', $providersImportedDatabase['User']['id'])); ?>
		</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['providers_standings_id']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['providers_parents_id']; ?>&nbsp;</td>
		<td><?php echo $providersImportedDatabase['ProvidersImportedDatabase']['_status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $providersImportedDatabase['ProvidersImportedDatabase']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $providersImportedDatabase['ProvidersImportedDatabase']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $providersImportedDatabase['ProvidersImportedDatabase']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $providersImportedDatabase['ProvidersImportedDatabase']['id'])); ?>
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