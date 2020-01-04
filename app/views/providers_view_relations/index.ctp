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
				<?php echo $this->Html->link(__('New Providers View Relation', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Providers View Relations');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('BatNbr');?></th>
													<th><?php echo $this->Paginator->sort('CpnyID');?></th>
													<th><?php echo $this->Paginator->sort('Status');?></th>
													<th><?php echo $this->Paginator->sort('Module');?></th>
													<th><?php echo $this->Paginator->sort('JrnlType');?></th>
													<th><?php echo $this->Paginator->sort('ap_status');?></th>
													<th><?php echo $this->Paginator->sort('VendId');?></th>
													<th><?php echo $this->Paginator->sort('PerPost');?></th>
													<th><?php echo $this->Paginator->sort('PONbr');?></th>
													<th><?php echo $this->Paginator->sort('RefNbr');?></th>
													<th><?php echo $this->Paginator->sort('DocType');?></th>
													<th><?php echo $this->Paginator->sort('DocDesc');?></th>
													<th><?php echo $this->Paginator->sort('Crtd_DateTime');?></th>
													<th><?php echo $this->Paginator->sort('LUpd_DateTime');?></th>
													<th><?php echo $this->Paginator->sort('name');?></th>
													<th><?php echo $this->Paginator->sort('xml');?></th>
													<th><?php echo $this->Paginator->sort('voucher');?></th>
													<th><?php echo $this->Paginator->sort('order');?></th>
													<th><?php echo $this->Paginator->sort('Acct');?></th>
													<th><?php echo $this->Paginator->sort('totalAmt');?></th>
													<th><?php echo $this->Paginator->sort('UUID');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($providersViewRelations as $providersViewRelation):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['id']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['BatNbr']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['CpnyID']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['Status']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['Module']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['JrnlType']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['ap_status']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['VendId']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['PerPost']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['PONbr']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['RefNbr']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['DocType']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['DocDesc']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['Crtd_DateTime']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['LUpd_DateTime']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['name']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['xml']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['voucher']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['order']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['Acct']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['totalAmt']; ?>&nbsp;</td>
		<td><?php echo $providersViewRelation['ProvidersViewRelation']['UUID']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $providersViewRelation['ProvidersViewRelation']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $providersViewRelation['ProvidersViewRelation']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $providersViewRelation['ProvidersViewRelation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $providersViewRelation['ProvidersViewRelation']['id'])); ?>
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