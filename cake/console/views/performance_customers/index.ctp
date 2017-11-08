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
				<?php echo $this->Html->link(__('New Performance Customer', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Performance Customers');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('AccrRevAcct');?></th>
													<th><?php echo $this->Paginator->sort('AccrRevSub');?></th>
													<th><?php echo $this->Paginator->sort('AcctNbr');?></th>
													<th><?php echo $this->Paginator->sort('Addr1');?></th>
													<th><?php echo $this->Paginator->sort('Addr2');?></th>
													<th><?php echo $this->Paginator->sort('AgentID');?></th>
													<th><?php echo $this->Paginator->sort('ApplFinChrg');?></th>
													<th><?php echo $this->Paginator->sort('ArAcct');?></th>
													<th><?php echo $this->Paginator->sort('ArSub');?></th>
													<th><?php echo $this->Paginator->sort('Attn');?></th>
													<th><?php echo $this->Paginator->sort('AutoApply');?></th>
													<th><?php echo $this->Paginator->sort('BankID');?></th>
													<th><?php echo $this->Paginator->sort('BillAddr1');?></th>
													<th><?php echo $this->Paginator->sort('BillAddr2');?></th>
													<th><?php echo $this->Paginator->sort('BillAttn');?></th>
													<th><?php echo $this->Paginator->sort('BillCity');?></th>
													<th><?php echo $this->Paginator->sort('BillCountry');?></th>
													<th><?php echo $this->Paginator->sort('BillFax');?></th>
													<th><?php echo $this->Paginator->sort('BillName');?></th>
													<th><?php echo $this->Paginator->sort('BillPhone');?></th>
													<th><?php echo $this->Paginator->sort('BillSalut');?></th>
													<th><?php echo $this->Paginator->sort('BillState');?></th>
													<th><?php echo $this->Paginator->sort('BillThruProject');?></th>
													<th><?php echo $this->Paginator->sort('BillZip');?></th>
													<th><?php echo $this->Paginator->sort('CardExpDate');?></th>
													<th><?php echo $this->Paginator->sort('CardHldrName');?></th>
													<th><?php echo $this->Paginator->sort('CardNbr');?></th>
													<th><?php echo $this->Paginator->sort('CardType');?></th>
													<th><?php echo $this->Paginator->sort('City');?></th>
													<th><?php echo $this->Paginator->sort('ClassId');?></th>
													<th><?php echo $this->Paginator->sort('ConsolInv');?></th>
													<th><?php echo $this->Paginator->sort('Country');?></th>
													<th><?php echo $this->Paginator->sort('CrLmt');?></th>
													<th><?php echo $this->Paginator->sort('Crtd_DateTime');?></th>
													<th><?php echo $this->Paginator->sort('Crtd_Prog');?></th>
													<th><?php echo $this->Paginator->sort('Crtd_User');?></th>
													<th><?php echo $this->Paginator->sort('CuryId');?></th>
													<th><?php echo $this->Paginator->sort('CuryPrcLvlRtTp');?></th>
													<th><?php echo $this->Paginator->sort('CuryRateType');?></th>
													<th><?php echo $this->Paginator->sort('CustFillPriority');?></th>
													<th><?php echo $this->Paginator->sort('CustId');?></th>
													<th><?php echo $this->Paginator->sort('DfltShipToId');?></th>
													<th><?php echo $this->Paginator->sort('DocPublishingFlag');?></th>
													<th><?php echo $this->Paginator->sort('DunMsg');?></th>
													<th><?php echo $this->Paginator->sort('EMailAddr');?></th>
													<th><?php echo $this->Paginator->sort('Fax');?></th>
													<th><?php echo $this->Paginator->sort('InvtSubst');?></th>
													<th><?php echo $this->Paginator->sort('LanguageID');?></th>
													<th><?php echo $this->Paginator->sort('LUpd_DateTime');?></th>
													<th><?php echo $this->Paginator->sort('LUpd_Prog');?></th>
													<th><?php echo $this->Paginator->sort('LUpd_User');?></th>
													<th><?php echo $this->Paginator->sort('Name');?></th>
													<th><?php echo $this->Paginator->sort('NoteId');?></th>
													<th><?php echo $this->Paginator->sort('OneDraft');?></th>
													<th><?php echo $this->Paginator->sort('PerNbr');?></th>
													<th><?php echo $this->Paginator->sort('Phone');?></th>
													<th><?php echo $this->Paginator->sort('PmtMethod');?></th>
													<th><?php echo $this->Paginator->sort('PrcLvlId');?></th>
													<th><?php echo $this->Paginator->sort('PrePayAcct');?></th>
													<th><?php echo $this->Paginator->sort('PrePaySub');?></th>
													<th><?php echo $this->Paginator->sort('PriceClassID');?></th>
													<th><?php echo $this->Paginator->sort('PrtMCStmt');?></th>
													<th><?php echo $this->Paginator->sort('PrtStmt');?></th>
													<th><?php echo $this->Paginator->sort('S4Future01');?></th>
													<th><?php echo $this->Paginator->sort('S4Future02');?></th>
													<th><?php echo $this->Paginator->sort('S4Future03');?></th>
													<th><?php echo $this->Paginator->sort('S4Future04');?></th>
													<th><?php echo $this->Paginator->sort('S4Future05');?></th>
													<th><?php echo $this->Paginator->sort('S4Future06');?></th>
													<th><?php echo $this->Paginator->sort('S4Future07');?></th>
													<th><?php echo $this->Paginator->sort('S4Future08');?></th>
													<th><?php echo $this->Paginator->sort('S4Future09');?></th>
													<th><?php echo $this->Paginator->sort('S4Future10');?></th>
													<th><?php echo $this->Paginator->sort('S4Future11');?></th>
													<th><?php echo $this->Paginator->sort('S4Future12');?></th>
													<th><?php echo $this->Paginator->sort('Salut');?></th>
													<th><?php echo $this->Paginator->sort('SetupDate');?></th>
													<th><?php echo $this->Paginator->sort('ShipCmplt');?></th>
													<th><?php echo $this->Paginator->sort('ShipPctAct');?></th>
													<th><?php echo $this->Paginator->sort('ShipPctMax');?></th>
													<th><?php echo $this->Paginator->sort('SICCode1');?></th>
													<th><?php echo $this->Paginator->sort('SICCode2');?></th>
													<th><?php echo $this->Paginator->sort('SingleInvoice');?></th>
													<th><?php echo $this->Paginator->sort('SlsAcct');?></th>
													<th><?php echo $this->Paginator->sort('SlsperId');?></th>
													<th><?php echo $this->Paginator->sort('SlsSub');?></th>
													<th><?php echo $this->Paginator->sort('State');?></th>
													<th><?php echo $this->Paginator->sort('Status');?></th>
													<th><?php echo $this->Paginator->sort('StmtCycleId');?></th>
													<th><?php echo $this->Paginator->sort('StmtType');?></th>
													<th><?php echo $this->Paginator->sort('TaxDflt');?></th>
													<th><?php echo $this->Paginator->sort('TaxExemptNbr');?></th>
													<th><?php echo $this->Paginator->sort('TaxID00');?></th>
													<th><?php echo $this->Paginator->sort('TaxID01');?></th>
													<th><?php echo $this->Paginator->sort('TaxID02');?></th>
													<th><?php echo $this->Paginator->sort('TaxID03');?></th>
													<th><?php echo $this->Paginator->sort('TaxLocId');?></th>
													<th><?php echo $this->Paginator->sort('TaxRegNbr');?></th>
													<th><?php echo $this->Paginator->sort('Terms');?></th>
													<th><?php echo $this->Paginator->sort('Territory');?></th>
													<th><?php echo $this->Paginator->sort('TradeDisc');?></th>
													<th><?php echo $this->Paginator->sort('User1');?></th>
													<th><?php echo $this->Paginator->sort('User2');?></th>
													<th><?php echo $this->Paginator->sort('User3');?></th>
													<th><?php echo $this->Paginator->sort('User4');?></th>
													<th><?php echo $this->Paginator->sort('User5');?></th>
													<th><?php echo $this->Paginator->sort('User6');?></th>
													<th><?php echo $this->Paginator->sort('User7');?></th>
													<th><?php echo $this->Paginator->sort('User8');?></th>
													<th><?php echo $this->Paginator->sort('Zip');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($performanceCustomers as $performanceCustomer):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['id']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['AccrRevAcct']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['AccrRevSub']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['AcctNbr']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Addr1']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Addr2']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['AgentID']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['ApplFinChrg']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['ArAcct']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['ArSub']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Attn']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['AutoApply']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BankID']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BillAddr1']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BillAddr2']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BillAttn']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BillCity']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BillCountry']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BillFax']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BillName']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BillPhone']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BillSalut']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BillState']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BillThruProject']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['BillZip']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['CardExpDate']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['CardHldrName']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['CardNbr']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['CardType']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['City']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['ClassId']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['ConsolInv']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Country']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['CrLmt']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Crtd_DateTime']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Crtd_Prog']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Crtd_User']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['CuryId']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['CuryPrcLvlRtTp']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['CuryRateType']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['CustFillPriority']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['CustId']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['DfltShipToId']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['DocPublishingFlag']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['DunMsg']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['EMailAddr']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Fax']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['InvtSubst']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['LanguageID']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['LUpd_DateTime']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['LUpd_Prog']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['LUpd_User']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Name']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['NoteId']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['OneDraft']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['PerNbr']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Phone']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['PmtMethod']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['PrcLvlId']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['PrePayAcct']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['PrePaySub']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['PriceClassID']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['PrtMCStmt']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['PrtStmt']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['S4Future01']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['S4Future02']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['S4Future03']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['S4Future04']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['S4Future05']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['S4Future06']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['S4Future07']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['S4Future08']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['S4Future09']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['S4Future10']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['S4Future11']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['S4Future12']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Salut']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['SetupDate']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['ShipCmplt']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['ShipPctAct']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['ShipPctMax']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['SICCode1']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['SICCode2']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['SingleInvoice']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['SlsAcct']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['SlsperId']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['SlsSub']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['State']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Status']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['StmtCycleId']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['StmtType']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['TaxDflt']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['TaxExemptNbr']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['TaxID00']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['TaxID01']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['TaxID02']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['TaxID03']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['TaxLocId']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['TaxRegNbr']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Terms']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Territory']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['TradeDisc']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['User1']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['User2']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['User3']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['User4']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['User5']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['User6']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['User7']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['User8']; ?>&nbsp;</td>
		<td><?php echo $performanceCustomer['PerformanceCustomer']['Zip']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $performanceCustomer['PerformanceCustomer']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $performanceCustomer['PerformanceCustomer']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $performanceCustomer['PerformanceCustomer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $performanceCustomer['PerformanceCustomer']['id'])); ?>
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