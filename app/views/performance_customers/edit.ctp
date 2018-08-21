
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
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
    // NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
    // $evaluate = false;
    // $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
    // blog
    $evaluate = true;
    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
?>

      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li>
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PerformanceCustomer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PerformanceCustomer.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Performance Customers', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>

			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Performance Customer'); ?>			</span>
		</h2>

          <?php echo $this->Form->create('PerformanceCustomer',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="performanceCustomers form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('AccrRevAcct',array('placeholder'=>'AccrRevAcct','class'=>'input'));
		echo $this->Form->input('AccrRevSub',array('placeholder'=>'AccrRevSub','class'=>'input'));
		echo $this->Form->input('AcctNbr',array('placeholder'=>'AcctNbr','class'=>'input'));
		echo $this->Form->input('Addr1',array('placeholder'=>'Addr1','class'=>'input'));
		echo $this->Form->input('Addr2',array('placeholder'=>'Addr2','class'=>'input'));
		echo $this->Form->input('AgentID',array('placeholder'=>'AgentID','class'=>'input'));
		echo $this->Form->input('ApplFinChrg',array('placeholder'=>'ApplFinChrg','class'=>'input'));
		echo $this->Form->input('ArAcct',array('placeholder'=>'ArAcct','class'=>'input'));
		echo $this->Form->input('ArSub',array('placeholder'=>'ArSub','class'=>'input'));
		echo $this->Form->input('Attn',array('placeholder'=>'Attn','class'=>'input'));
		echo $this->Form->input('AutoApply',array('placeholder'=>'AutoApply','class'=>'input'));
		echo $this->Form->input('BankID',array('placeholder'=>'BankID','class'=>'input'));
		echo $this->Form->input('BillAddr1',array('placeholder'=>'BillAddr1','class'=>'input'));
		echo $this->Form->input('BillAddr2',array('placeholder'=>'BillAddr2','class'=>'input'));
		echo $this->Form->input('BillAttn',array('placeholder'=>'BillAttn','class'=>'input'));
		echo $this->Form->input('BillCity',array('placeholder'=>'BillCity','class'=>'input'));
		echo $this->Form->input('BillCountry',array('placeholder'=>'BillCountry','class'=>'input'));
		echo $this->Form->input('BillFax',array('placeholder'=>'BillFax','class'=>'input'));
		echo $this->Form->input('BillName',array('placeholder'=>'BillName','class'=>'input'));
		echo $this->Form->input('BillPhone',array('placeholder'=>'BillPhone','class'=>'input'));
		echo $this->Form->input('BillSalut',array('placeholder'=>'BillSalut','class'=>'input'));
		echo $this->Form->input('BillState',array('placeholder'=>'BillState','class'=>'input'));
		echo $this->Form->input('BillThruProject',array('placeholder'=>'BillThruProject','class'=>'input'));
		echo $this->Form->input('BillZip',array('placeholder'=>'BillZip','class'=>'input'));
		echo $this->Form->input('CardExpDate',array('placeholder'=>'CardExpDate','class'=>'input'));
		echo $this->Form->input('CardHldrName',array('placeholder'=>'CardHldrName','class'=>'input'));
		echo $this->Form->input('CardNbr',array('placeholder'=>'CardNbr','class'=>'input'));
		echo $this->Form->input('CardType',array('placeholder'=>'CardType','class'=>'input'));
		echo $this->Form->input('City',array('placeholder'=>'City','class'=>'input'));
		echo $this->Form->input('ClassId',array('placeholder'=>'ClassId','class'=>'input'));
		echo $this->Form->input('ConsolInv',array('placeholder'=>'ConsolInv','class'=>'input'));
		echo $this->Form->input('Country',array('placeholder'=>'Country','class'=>'input'));
		echo $this->Form->input('CrLmt',array('placeholder'=>'CrLmt','class'=>'input'));
		echo $this->Form->input('Crtd_DateTime',array('placeholder'=>'Crtd_DateTime','class'=>'input'));
		echo $this->Form->input('Crtd_Prog',array('placeholder'=>'Crtd_Prog','class'=>'input'));
		echo $this->Form->input('Crtd_User',array('placeholder'=>'Crtd_User','class'=>'input'));
		echo $this->Form->input('CuryId',array('placeholder'=>'CuryId','class'=>'input'));
		echo $this->Form->input('CuryPrcLvlRtTp',array('placeholder'=>'CuryPrcLvlRtTp','class'=>'input'));
		echo $this->Form->input('CuryRateType',array('placeholder'=>'CuryRateType','class'=>'input'));
		echo $this->Form->input('CustFillPriority',array('placeholder'=>'CustFillPriority','class'=>'input'));
		echo $this->Form->input('CustId',array('placeholder'=>'CustId','class'=>'input'));
		echo $this->Form->input('DfltShipToId',array('placeholder'=>'DfltShipToId','class'=>'input'));
		echo $this->Form->input('DocPublishingFlag',array('placeholder'=>'DocPublishingFlag','class'=>'input'));
		echo $this->Form->input('DunMsg',array('placeholder'=>'DunMsg','class'=>'input'));
		echo $this->Form->input('EMailAddr',array('placeholder'=>'EMailAddr','class'=>'input'));
		echo $this->Form->input('Fax',array('placeholder'=>'Fax','class'=>'input'));
		echo $this->Form->input('InvtSubst',array('placeholder'=>'InvtSubst','class'=>'input'));
		echo $this->Form->input('LanguageID',array('placeholder'=>'LanguageID','class'=>'input'));
		echo $this->Form->input('LUpd_DateTime',array('placeholder'=>'LUpd_DateTime','class'=>'input'));
		echo $this->Form->input('LUpd_Prog',array('placeholder'=>'LUpd_Prog','class'=>'input'));
		echo $this->Form->input('LUpd_User',array('placeholder'=>'LUpd_User','class'=>'input'));
		echo $this->Form->input('Name',array('placeholder'=>'Name','class'=>'input'));
		echo $this->Form->input('NoteId',array('placeholder'=>'NoteId','class'=>'input'));
		echo $this->Form->input('OneDraft',array('placeholder'=>'OneDraft','class'=>'input'));
		echo $this->Form->input('PerNbr',array('placeholder'=>'PerNbr','class'=>'input'));
		echo $this->Form->input('Phone',array('placeholder'=>'Phone','class'=>'input'));
		echo $this->Form->input('PmtMethod',array('placeholder'=>'PmtMethod','class'=>'input'));
		echo $this->Form->input('PrcLvlId',array('placeholder'=>'PrcLvlId','class'=>'input'));
		echo $this->Form->input('PrePayAcct',array('placeholder'=>'PrePayAcct','class'=>'input'));
		echo $this->Form->input('PrePaySub',array('placeholder'=>'PrePaySub','class'=>'input'));
		echo $this->Form->input('PriceClassID',array('placeholder'=>'PriceClassID','class'=>'input'));
		echo $this->Form->input('PrtMCStmt',array('placeholder'=>'PrtMCStmt','class'=>'input'));
		echo $this->Form->input('PrtStmt',array('placeholder'=>'PrtStmt','class'=>'input'));
		echo $this->Form->input('S4Future01',array('placeholder'=>'S4Future01','class'=>'input'));
		echo $this->Form->input('S4Future02',array('placeholder'=>'S4Future02','class'=>'input'));
		echo $this->Form->input('S4Future03',array('placeholder'=>'S4Future03','class'=>'input'));
		echo $this->Form->input('S4Future04',array('placeholder'=>'S4Future04','class'=>'input'));
		echo $this->Form->input('S4Future05',array('placeholder'=>'S4Future05','class'=>'input'));
		echo $this->Form->input('S4Future06',array('placeholder'=>'S4Future06','class'=>'input'));
		echo $this->Form->input('S4Future07',array('placeholder'=>'S4Future07','class'=>'input'));
		echo $this->Form->input('S4Future08',array('placeholder'=>'S4Future08','class'=>'input'));
		echo $this->Form->input('S4Future09',array('placeholder'=>'S4Future09','class'=>'input'));
		echo $this->Form->input('S4Future10',array('placeholder'=>'S4Future10','class'=>'input'));
		echo $this->Form->input('S4Future11',array('placeholder'=>'S4Future11','class'=>'input'));
		echo $this->Form->input('S4Future12',array('placeholder'=>'S4Future12','class'=>'input'));
		echo $this->Form->input('Salut',array('placeholder'=>'Salut','class'=>'input'));
		echo $this->Form->input('SetupDate',array('placeholder'=>'SetupDate','class'=>'input'));
		echo $this->Form->input('ShipCmplt',array('placeholder'=>'ShipCmplt','class'=>'input'));
		echo $this->Form->input('ShipPctAct',array('placeholder'=>'ShipPctAct','class'=>'input'));
		echo $this->Form->input('ShipPctMax',array('placeholder'=>'ShipPctMax','class'=>'input'));
		echo $this->Form->input('SICCode1',array('placeholder'=>'SICCode1','class'=>'input'));
		echo $this->Form->input('SICCode2',array('placeholder'=>'SICCode2','class'=>'input'));
		echo $this->Form->input('SingleInvoice',array('placeholder'=>'SingleInvoice','class'=>'input'));
		echo $this->Form->input('SlsAcct',array('placeholder'=>'SlsAcct','class'=>'input'));
		echo $this->Form->input('SlsperId',array('placeholder'=>'SlsperId','class'=>'input'));
		echo $this->Form->input('SlsSub',array('placeholder'=>'SlsSub','class'=>'input'));
		echo $this->Form->input('State',array('placeholder'=>'State','class'=>'input'));
		echo $this->Form->input('Status',array('placeholder'=>'Status','class'=>'input'));
		echo $this->Form->input('StmtCycleId',array('placeholder'=>'StmtCycleId','class'=>'input'));
		echo $this->Form->input('StmtType',array('placeholder'=>'StmtType','class'=>'input'));
		echo $this->Form->input('TaxDflt',array('placeholder'=>'TaxDflt','class'=>'input'));
		echo $this->Form->input('TaxExemptNbr',array('placeholder'=>'TaxExemptNbr','class'=>'input'));
		echo $this->Form->input('TaxID00',array('placeholder'=>'TaxID00','class'=>'input'));
		echo $this->Form->input('TaxID01',array('placeholder'=>'TaxID01','class'=>'input'));
		echo $this->Form->input('TaxID02',array('placeholder'=>'TaxID02','class'=>'input'));
		echo $this->Form->input('TaxID03',array('placeholder'=>'TaxID03','class'=>'input'));
		echo $this->Form->input('TaxLocId',array('placeholder'=>'TaxLocId','class'=>'input'));
		echo $this->Form->input('TaxRegNbr',array('placeholder'=>'TaxRegNbr','class'=>'input'));
		echo $this->Form->input('Terms',array('placeholder'=>'Terms','class'=>'input'));
		echo $this->Form->input('Territory',array('placeholder'=>'Territory','class'=>'input'));
		echo $this->Form->input('TradeDisc',array('placeholder'=>'TradeDisc','class'=>'input'));
		echo $this->Form->input('User1',array('placeholder'=>'User1','class'=>'input'));
		echo $this->Form->input('User2',array('placeholder'=>'User2','class'=>'input'));
		echo $this->Form->input('User3',array('placeholder'=>'User3','class'=>'input'));
		echo $this->Form->input('User4',array('placeholder'=>'User4','class'=>'input'));
		echo $this->Form->input('User5',array('placeholder'=>'User5','class'=>'input'));
		echo $this->Form->input('User6',array('placeholder'=>'User6','class'=>'input'));
		echo $this->Form->input('User7',array('placeholder'=>'User7','class'=>'input'));
		echo $this->Form->input('User8',array('placeholder'=>'User8','class'=>'input'));
		echo $this->Form->input('Zip',array('placeholder'=>'Zip','class'=>'input'));
	?>
						<?php 	echo $this->Form->input('name',array('type'=>'text','label'=>false,'placeholder'=>'Nombre de la politica'));
									echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion de la politica','rows'=>'5','cols'=>'80'));
								e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
									echo $this->Form->file('upload', array('type'=>'file','label'=>false));
								e('</span>');
								?><!-- 					</table> -->
<!-- 				</div>  -->
          <!--end table response-->
					<?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?><?php echo $this->Form->end(__('Submit', true));?>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->
