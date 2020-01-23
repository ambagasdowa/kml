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
		<?php $addenumViewAlbaranRelations ? : e('<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
						<strong>No se encontraron Registros </strong>
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

 </div>


<div id="first-datatable-output" class="table-responsive">

		<table id="table_res" class="table table-striped table-bordered">
		<thead>
			<tr>
				<!-- <th><?php echo 'xml';?></th> -->
				<!-- <th><?php echo 'pdf';?></th> -->
				<!-- <th><?php echo 'index';?></th> -->
				<th><?php echo 'RefNbr';?></th>
				<th><?php echo 'BatNbr';?></th>
				<th><?php echo 'no_remision';?></th>
				<!-- <th><?php echo '@xsi:schemaLocation';?></th> -->
				<th><?php echo 'IdFactura';?></th>
				<!-- <th><?php echo 'Version';?></th> -->
				<th><?php echo 'FechaTimbrado';?></th>
				<!-- <th><?php echo 'IdTransaccion';?></th> -->
				<th><?php echo 'Transaccion';?></th>
				<!-- <th><?php echo 'eu:OrdenesCompra/eu:Secuencia/@consec';?></th> -->
				<th><?php echo 'IdPedido';?></th>
				<th><?php echo 'Albaran';?></th>
				<!-- <th><?php echo 'MonedaCve';?></th> -->
				<!-- <th><?php echo 'TipoCambio';?></th> -->
				<th><?php echo 'SubtotalM';?></th>
				<th><?php echo 'TotalM';?></th>
				<th><?php echo 'ImpuestoM';?></th>
				<th><?php echo 'BaseImpuesto';?></th>
				<!-- <th><?php echo 'CadenaOriginal';?></th> -->
				<th><?php echo 'Guia';?></th>
				<!-- <th><?php echo 'no_viaje';?></th> -->
				<th><?php echo 'subtotal';?></th>
				<!-- <th><?php echo 'desc_flete';?></th> -->
				<!-- <th><?php echo 'observacion';?></th> -->
				<!-- <th><?php echo 'FlagIsDisminution';?></th> -->
				<!-- <th><?php echo 'FlagIsProvision';?></th> -->
				<!-- <th><?php echo 'PerPost';?></th> -->
				<!-- <th><?php echo 'fecha_guia';?></th> -->
				<th><?php echo 'Addenda';?></th>
				<th><?php echo 'status_guia';?></th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ($addenumViewAlbaranRelations as $key => $addenumViewAlbaranRelation) {
			// code...
		?>

		<tr>
			<!-- <td data-xml="<?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['xml'];?>" >&nbsp;</td> -->
			<!-- <td data-pdf="<?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['pdf'];?>" >&nbsp;</td> -->
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['index']; ?>&nbsp;</td> -->
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['RefNbr']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_remision']; ?>&nbsp;</td>
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['@xsi:schemaLocation']; ?>&nbsp;</td> -->
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['IdFactura']; ?>&nbsp;</td>
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['Version']; ?>&nbsp;</td> -->
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['FechaMensaje']; ?>&nbsp;</td>
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['IdTransaccion']; ?>&nbsp;</td> -->
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['Transaccion']; ?>&nbsp;</td>
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['Secuencia']; ?>&nbsp;</td> -->
			<td id="petition_<?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr'];?>">
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
																						'id'=>'update_pedido_'.$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr'],
																						'data-id'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr'],
																						'data-refnbr'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['RefNbr'],
																						'data-noguia'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_guia'],
																						'data-guia'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['num_guia'],
																						'data-remision'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_remision'],
																						'data-name' => $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr'].'_'.$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_remision'],
																						'data-type'=>'IdPedido',
																						'data-idx'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['idx'],
																						'placeholder' => 'Pedido',
																						'value'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['IdPedido'],
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
			<td id="aldebaran_<?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr'];?>">
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
																						'id'=>'update_albaran_'.$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr'],
																						'data-id'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr'],
																						'data-refnbr'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['RefNbr'],
																						'data-noguia'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_guia'],
																						'data-guia'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['num_guia'],
																						'data-remision'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_remision'],
																						'data-name' => $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr'].'_'.$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_remision'],
																						'data-type'=>'Albaran',
																						'data-idx'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['idx'],
																						'placeholder' => 'Albaran',
																						'value'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['Albaran'],
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
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['MonedaCve']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['TipoCambio']; ?>&nbsp;</td> -->
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['SubtotalM']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['TotalM']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['ImpuestoM']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BaseImpuesto']; ?>&nbsp;</td>
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['CadenaOriginal']; ?>&nbsp;</td> -->
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['num_guia']; ?>&nbsp;</td>
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_viaje']; ?>&nbsp;</td> -->
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['subtotal']; ?>&nbsp;</td>
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['desc_flete']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['observacion']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['FlagIsDisminution']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['FlagIsProvision']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['PerPost']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['fecha_guia']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['addenum']; ?>&nbsp;</td> -->
			<td id="link_<?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr'];?>">
				<?php
					if (isset($addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['IdPedido']) && isset($addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['Albaran'])) {
						// code...

							echo
										$this->Html->link('Descargar'
									,array(
													 'controller'=>'AddenumViewAlbaranRelations'
													,'action' => 'link'
													// ,'xml_string'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['addenum']
												  ,'id'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr']
												  // ,'standings_name'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr'].'_'.$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_remision']
													// ,'sort'=>'id'
													// ,'direction'=>'asc'
												)
										,array(
													// 'target'=>'_blank'
													 'id'=>'get_'.$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr']
													,'data-id'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr']
													// ,'data-addenum'=>$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['addenum']
													,'data-name' => $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr'].'_'.$addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_remision']
												)
						);
					} else {
						echo '&nbsp;';
					}
				?>
			</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['status_guia']; ?>&nbsp;</td>

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
