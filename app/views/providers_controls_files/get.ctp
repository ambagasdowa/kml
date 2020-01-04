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
		* @package       PerformanceReferences
		* @subpackage    Get
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
		    // $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
				// $requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
				$requiere = $evaluate ? e($this->element('kml/rentabilidad/rentabilidad')) : e($this->element('requiere/norequiere') );
				// var_dump($rendViewFullGstCoreIndicators);exit();

		?>


<div style="display:none;">
		<div id="json_one">
			<?php print($json_parsing_level_one) ?>
		</div>
		<div id="json_two">
			<?php print($json_parsing_level_two) ?>
		</div>
</div>

	<div class="row head_datetime">
		<div>&nbsp;</div>

			<div class="six columns"></div>

			<div class="one columns dash_datetime">
				Periodo
			</div>
			<div class="one columns dash_datetime">
				del
			</div>
			<div id="date-ini" class="one columns dash_datetime">
				<?php echo $dashboard['inicio'] ?>
			</div>
			<div class="one columns dash_datetime">
				al
			</div>
			<div id="date-end" class="one columns dash_datetime">
				<?php echo $dashboard['fin'] ?>
			</div>

			<div class="one columns dash_datetime pull-right">
				Unidad de Negocio <?php echo $dashboard['bsu'] ?>
			</div>

		<div>&nbsp;</div>

	</div>

	<!-- <div class="row">
		<div class="twelve columns">
			<div id="chart" class="chart" style="display:none;" >
						<div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">
						</div>
			</div>
		</div>
	</div> -->

	<div class="row">
		<?php $providersViewRelations ? : e('<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
						<strong>No se encontraron Registros Asociados </strong>
				</div>'); ?>
	</div>

	<div class="row noprint">
		<?php	echo $this->Session->flash();?>
	</div>

	<div class="row noprint">

		<div class="two colums">

		</div>

		<div class="ten colums">
			<!-- <input type="text" id="kwd_search" value="" placeholder="Buscar"/> -->

			<!-- <a id="details" class="button button-primary" href="#">Totales</a>

			<a id="charting" class="button button-primary" href="#">Graficas</a>

			<a id="upd_checkboxes" class="button button-primary" href="#">Guardar</a> -->

			<!-- <div id="print" class="pull-right"> -->
				<!-- <i class="fa fa-print" aria-hidden="true"></i> -->
			<!-- </div> -->
		</div>

	</div>
<!--
	<div class="row">
 	 <div class="twelve columns">
 		 <div id="chart" class="chart" >
 					 <div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">

 					 </div>
 		 </div>
 	 </div>
  </div> -->

<div class="con">
<div id="cont" style="height: 10px; margin: 0 auto"></div>
</div>


<div class="row">
<?php
// echo '<div class="two columns"><i class="fa fa-barcode"></i></div>';
// echo '<div class="two columns"></div>';
// echo
// 			$this->Form->input
// 												(
// 													'searchbox',
// 													 array
// 																(
// 																	'type'=>'text',
// 																	'class'=>'search_udn u-full-width form-control',
// 																	'id'=>'myInput',
// 																	'placeholder' => 'Filtro General',
// 																	// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
// 																	// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
// 																	'div'=>FALSE,
// 																	'label'=>FALSE,
// 																	// 'options'=>array(1=>'ATSA IZUCAR - SIVESA ORIZABA',2=>'ATSA MIXQUI - SIVESA ORIZABA',3=>'CALIZA MIXQUI - FANAL TULTITLAN'),
// 																	'tabindex'=>'2'
// 																)
// 												);\
// 	echo '</div>';
 ?>
 </div>


<div id="first-datatable-output" class="table-responsive">

		<table id="table_res" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>BatNbr</th>
				<th>CpnyID</th>
				<th>Status</th>
				<th>Module</th>
				<th>JrnlType</th>
				<th>ap_status</th>
				<th>VendId</th>
				<th>PerPost</th>
				<th>PONbr</th>
				<th>RefNbr</th>
				<th>DocType</th>
				<!-- <th>DocDesc</th> -->
				<th>Crtd_DateTime</th>
				<th>LUpd_DateTime</th>
				<th>name</th>
				<th>xml</th>
				<th>voucher</th>
				<th>order</th>
				<th>Acct</th>
				<th>totalAmt</th>
				<th>UUID</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ($providersViewRelations as $key => $providersViewRelation) {
			// code...
		?>

		<tr>
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
			<!-- <td><?php echo $providersViewRelation['ProvidersViewRelation']['DocDesc']; ?>&nbsp;</td> -->
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['InvDate']; ?>&nbsp;</td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['InvcNbr']; ?>&nbsp;</td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['name']; ?>&nbsp;</td>

			<!-- <td><?php echo $providersViewRelation['ProvidersViewRelation']['xml']; ?>&nbsp;</td> -->
			<td id="petition_<?php echo $providersViewRelation['ProvidersViewRelation']['BatNbr'];?>">
				<?php
					echo
								$this->Form->input
																	(
																		'xml',
																		 array
																					(
																						'type'=>'text',
																						// 'class'=>'xls u-full-width form-control',
																						'width'=>'60',
																						'id'=>'update_pedido_'.$providersViewRelation['ProvidersViewRelation']['BatNbr'],
																						'data-id'=>$providersViewRelation['ProvidersViewRelation']['BatNbr'],
																						'data-refnbr'=>$providersViewRelation['ProvidersViewRelation']['RefNbr'],
																						'data-ponbr'=>$providersViewRelation['ProvidersViewRelation']['PONbr'],
																						'data-vendid'=>$providersViewRelation['ProvidersViewRelation']['vendid'],
																						'data-CpnyId'=>$providersViewRelation['ProvidersViewRelation']['CpnyID'],
																						'data-type'=>'xml',
																						'data-id'=>$providersViewRelation['ProvidersViewRelation']['id'],
																						'placeholder' => 'Archivo Xml',
																						// 'value'=>$providersViewRelation['ProvidersViewRelation']['IdPedido'],
																						// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																						'div'=>FALSE,
																						'label'=>FALSE
																						// 'options'=>array(1=>'ATSA IZUCAR - SIVESA ORIZABA',2=>'ATSA MIXQUI - SIVESA ORIZABA',3=>'CALIZA MIXQUI - FANAL TULTITLAN'),
																						// 'tabindex'=>'2'
																					)
																	);
				?>
			</td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['voucher']; ?>&nbsp;</td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['order']; ?>&nbsp;</td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['Acct']; ?>&nbsp;</td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['totalAmt']; ?>&nbsp;</td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['UUID']; ?>&nbsp;</td>

			<td id="petition_<?php echo $providersViewRelation['ProvidersViewRelation']['BatNbr'];?>">
				<?php
					echo
								$this->Form->input
																	(
																		'IdPedido',
																		 array
																					(
																						'type'=>'text',
																						// 'class'=>'xls u-full-width form-control',
																						'width'=>'60',
																						'id'=>'update_pedido_'.$providersViewRelation['ProvidersViewRelation']['BatNbr'],
																						'data-id'=>$providersViewRelation['ProvidersViewRelation']['BatNbr'],
																						'data-refnbr'=>$providersViewRelation['ProvidersViewRelation']['RefNbr'],
																						'data-noguia'=>$providersViewRelation['ProvidersViewRelation']['no_guia'],
																						'data-guia'=>$providersViewRelation['ProvidersViewRelation']['num_guia'],
																						'data-remision'=>$providersViewRelation['ProvidersViewRelation']['no_remision'],
																						'data-name' => $providersViewRelation['ProvidersViewRelation']['BatNbr'].'_'.$providersViewRelation['ProvidersViewRelation']['no_remision'],
																						'data-type'=>'IdPedido',
																						'data-idx'=>$providersViewRelation['ProvidersViewRelation']['idx'],
																						'placeholder' => 'Pedido',
																						'value'=>$providersViewRelation['ProvidersViewRelation']['IdPedido'],
																						// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																						'div'=>FALSE,
																						'label'=>FALSE
																						// 'options'=>array(1=>'ATSA IZUCAR - SIVESA ORIZABA',2=>'ATSA MIXQUI - SIVESA ORIZABA',3=>'CALIZA MIXQUI - FANAL TULTITLAN'),
																						// 'tabindex'=>'2'
																					)
																	);
				?>
			</td>
			<td id="aldebaran_<?php echo $providersViewRelation['ProvidersViewRelation']['BatNbr'];?>">
				<?php
					echo
								$this->Form->input
																	(
																		'Albaran',
																		 array
																					(
																						'type'=>'text',
																						// 'class'=>'xls u-full-width form-control',
																						'width'=>'60',
																						'id'=>'update_albaran_'.$providersViewRelation['ProvidersViewRelation']['BatNbr'],
																						'data-id'=>$providersViewRelation['ProvidersViewRelation']['BatNbr'],
																						'data-refnbr'=>$providersViewRelation['ProvidersViewRelation']['RefNbr'],
																						'data-noguia'=>$providersViewRelation['ProvidersViewRelation']['no_guia'],
																						'data-guia'=>$providersViewRelation['ProvidersViewRelation']['num_guia'],
																						'data-remision'=>$providersViewRelation['ProvidersViewRelation']['no_remision'],
																						'data-name' => $providersViewRelation['ProvidersViewRelation']['BatNbr'].'_'.$providersViewRelation['ProvidersViewRelation']['no_remision'],
																						'data-type'=>'Albaran',
																						'data-idx'=>$providersViewRelation['ProvidersViewRelation']['idx'],
																						'placeholder' => 'Albaran',
																						'value'=>$providersViewRelation['ProvidersViewRelation']['Albaran'],
																						// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																						'div'=>FALSE,
																						'label'=>FALSE
																						// 'options'=>array(1=>'ATSA IZUCAR - SIVESA ORIZABA',2=>'ATSA MIXQUI - SIVESA ORIZABA',3=>'CALIZA MIXQUI - FANAL TULTITLAN'),
																						// 'tabindex'=>'2'
																					)
																	);
				?>
			</td>

			<td id="link_<?php echo $providersViewRelation['ProvidersViewRelation']['BatNbr'];?>">
				<?php
					if (isset($providersViewRelation['ProvidersViewRelation']['IdPedido']) && isset($providersViewRelation['ProvidersViewRelation']['Albaran'])) {
						// code...

							echo
										$this->Html->link('Descargar'
									,array(
													 'controller'=>'AddenumViewAlbaranRelations'
													,'action' => 'link'
													// ,'xml_string'=>$providersViewRelation['ProvidersViewRelation']['addenum']
												  ,'id'=>$providersViewRelation['ProvidersViewRelation']['BatNbr']
												  // ,'standings_name'=>$providersViewRelation['ProvidersViewRelation']['BatNbr'].'_'.$providersViewRelation['ProvidersViewRelation']['no_remision']
													// ,'sort'=>'id'
													// ,'direction'=>'asc'
												)
										,array(
													// 'target'=>'_blank'
													 'id'=>'get_'.$providersViewRelation['ProvidersViewRelation']['BatNbr']
													,'data-id'=>$providersViewRelation['ProvidersViewRelation']['BatNbr']
													// ,'data-addenum'=>$providersViewRelation['ProvidersViewRelation']['addenum']
													,'data-name' => $providersViewRelation['ProvidersViewRelation']['BatNbr'].'_'.$providersViewRelation['ProvidersViewRelation']['no_remision']
												)
						);
					} else {
						echo '&nbsp;';
					}
				?>
			</td>

		</tr>
	<?php }//endforeach; ?>
		</tbody>
		<?php /*
		<tfoot>
	            <tr>
	                <th colspan="9" style="text-align:right">Total:</th>
	                <th></th>
	                <th></th>
	                <!-- <th></th> -->
	                <!-- <th></th> -->
	                <th class="rendimiento_totales"></th>
	            </tr>
	  </tfoot>
		*/?>
		</table>
</div>
