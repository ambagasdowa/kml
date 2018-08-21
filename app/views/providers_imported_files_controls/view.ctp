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
			
			.go_back:hover{
				background-color: rgba(82, 124, 143, 0.3); /* Color white with alpha 0.9*/
				border-radius:70%;
				color:#66BFFF;
			}
            .go_back {
                position: fixed;
                bottom: 15px;
                right: 10%;
                cursor: pointer;
                z-index:150;
            }
		</style>
	
		<span alt="Regresar" title="Regresar" onclick="goBack()">
			<i class="fa fa-chevron-circle-left fa-3x go_back searchlink" aria-hidden="true"></i>
		</span>
	
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li><input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter"></li>
          </ul>
        </div>
        
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Providers View Search Editions');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
<!-- 													<th><?php echo $this->Paginator->sort('providers_imported_files_controls_id');?></th> -->
													<th><?php echo $this->Paginator->sort('user_id');?></th>
													<th><?php echo $this->Paginator->sort('ZAPBatNbr');?></th>
													<th><?php echo $this->Paginator->sort('ZCnpyId');?></th>
													<th><?php echo $this->Paginator->sort('ZInvcDate');?></th>
													<th><?php echo $this->Paginator->sort('ZPerPost');?></th>
													<th><?php echo $this->Paginator->sort('ZCuryRcptCtrlAmt');?></th>
													<th><?php echo $this->Paginator->sort('ZInvcNbr');?></th>
													<th><?php echo $this->Paginator->sort('ZUUID');?></th>
													<th><?php echo $this->Paginator->sort('BatNbr');?></th>
													<th><?php echo $this->Paginator->sort('ZEstatus');?></th>
<!-- 													<th class="actions" colspan="3"><?php __('Actions');?></th> -->
							
					</tr>
				</thead>
				<?php
				
				if (count($providersViewSearchEditions) > 0) {
				$i = 0;
				foreach ($providersViewSearchEditions as $providersViewSearchEdition):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['id']; ?>&nbsp;</td>
<!--		<td>
			<?php echo $this->Html->link($providersViewSearchEdition['ProvidersImportedFilesControls']['id'], array('controller' => 'providers_imported_files_controls', 'action' => 'view', $providersViewSearchEdition['ProvidersImportedFilesControls']['id'])); ?>
		</td>-->
		<td>
			<?php echo $this->Html->link($providersViewSearchEdition['User']['name'], array('controller' => 'users', 'action' => 'view', $providersViewSearchEdition['User']['id'])); ?>
		</td>
		<td><?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZAPBatNbr']; ?>&nbsp;</td>
		<td><?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZCnpyId']; ?>&nbsp;</td>
		<td><?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZInvcDate']; ?>&nbsp;</td>
		<td><?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZPerPost']; ?>&nbsp;</td>
		<td><?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZCuryRcptCtrlAmt']; ?>&nbsp;</td>
		<td><?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZInvcNbr']; ?>&nbsp;</td>
		<td><?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZUUID']; ?>&nbsp;</td>
		<td><?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['BatNbr']; ?>&nbsp;</td>
		<td><?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZEstatus']; ?>&nbsp;</td>
<!--		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $providersViewSearchEdition['ProvidersViewSearchEdition']['id'])); ?>
		</td>-->
		<!--<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $providersViewSearchEdition['ProvidersViewSearchEdition']['id'])); ?>
		</td>-->
<!--		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $providersViewSearchEdition['ProvidersViewSearchEdition']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $providersViewSearchEdition['ProvidersViewSearchEdition']['id'])); ?>
		</td>-->
	</tr>
<?php
        endforeach;
        }

?>
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

    <script>
		function goBack() {
			window.history.back();
		}
	</script>
