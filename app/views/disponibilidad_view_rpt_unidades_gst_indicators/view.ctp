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


<!-- Activate Chart in Historical -->
 <div class="row">
	<div class="one column">&nbsp;</div>
	<div class="eleven columns">
		<!-- <div id="chart" class="chart" style="display:none;" > -->
		<div id="chart" class="chart" >
					<!-- <div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto"> -->
					<div>
						<!-- graphics -->
						<h1>Historico de la  Unidad <?php print($hist_unit)?></h1>
					</div>
		</div>
	</div>
 </div>


<div class="con">
	<div id="cont" style="height: 10px; margin: 0 auto"></div>
</div>

<div id="first-datatable-output" class="table-responsive">

<?php /*
		<table id="table_grp" class="display order-table table table-bordered table-hover table-striped responstable">
			<thead>
					<!-- <th><?php echo 'id';?></th> -->
					<th><?php echo 'Unidades';?></th>
					<!-- <th><?php echo 'id_status';?></th> -->
					<th><?php echo 'Estatus';?></th>
					<!-- <th><?php echo 'id_area';?></th> -->
					<!-- <th><?php echo 'Area';?></th> -->
			</thead>
			<tbody>
				<?php
					foreach ($disponibilidadViewRptGroupGstIndicators as $key => $disponibilidadViewRptGroupGstIndicator) {
				?>
				<tr>
					<!-- <td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['id']; ?></td> -->
					<td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['unidades']; ?></td>
					<!-- <td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['id_status']; ?></td> -->
					<td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['estatus']; ?></td>
					<!-- <td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['id_area']; ?></td> -->
					<!-- <td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['area']; ?></td> -->
				</tr>
				<?php } ?>
			</tbody>
			<!-- <tfoot>

			</tfoot> -->
		</table>
 */?>


		<table id="table_hist" style="width:100%;" class="display order-table table table-bordered table-hover table-striped responstable">
		<thead>
			<tr>
				<!-- <th>id</th> -->
				<th>Unidad</th>
				<th>Estatus</th>
				<th>Descripcion</th>
				<th>Fecha Cambio</th>
				<th>Fecha de Creacion</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ($disponibilidadViewHistoricalGstIndicators as $key => $disponibilidadViewHistoricalGstIndicator) {
			// code...
		?>
		<tr>
			<!-- <td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['id']; ?></td> -->
			<td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['unidad']; ?></td>
			<td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['estatus']; ?></td>
			<td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['descripcion']; ?></td>
			<td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['creacion']; ?></td>
			<td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['creacion']; ?></td>
		<?php /*
			<td>
						<?php
									// echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'];
									echo
									$this->Html->link(
																			$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																			// array('action' => 'get', null),
																			array('controller' => 'DisponibilidadViewRptUnidadesGstIndicator', 'action' => 'view', $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad']),
																			array(
																						'id'=>'historical_'.$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						'data-unidad'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						// 'data-reference' => $performanceReference['PerformanceViewFactura']['id'],
																						// 'data-empresa' => $performanceReference['PerformanceViewFactura']['Empresa'],
																						// 'data-resume' => $performanceReference['PerformanceViewFactura']['performance_customers_id'],
																						'div'=>false
																					)
																		);
						?>
			</td>
			<td style="width:20%;"><?php
			 			if ($disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['iseditable'] == true and $user_mod == true ) {
							echo
										$this->Form->input
																			(
																				'searchbox',
																				 array
																							(
																								'type'=>'select',
																								'class'=>'update_status u-full-width form-control',
																								'id'=>'myInput',
																								'style'=>'width:100%;margin:0 auto;overflow:auto;position:relative;overflow:hidden;',
																								'data-unidad'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																								'data-status'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																								'placeholder' => $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['estatus'],
																								// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																								// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																								'selected'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																								'div'=>FALSE,
																								'label'=>FALSE,
																								'options'=>$disponibilidadViewStatusGstIndicators
																								// 'tabindex'=>'2'
																							)
																			);
			 			} else {
							echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['estatus'];
						}

								// echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['tipo_status'];
					?>
			</td>
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['operador']; ?></td>
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['remolque']; ?></td>
			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['area']; ?>&nbsp;</td> -->
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['segmento']; ?></td>
			<td>
				<?php
				if ($disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['iseditable'] == true and $user_mod == true ) {
					echo
								$this->Form->input
																	(
																		'searchbox',
																		 array
																					(
																						'type'=>'text',
																						'class'=>'u-full-width form-control',
																						'id'=>'description_'.$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						// 'data-unidad'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						// 'data-status'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																						// 'placeholder' => $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['estatus'],
																						// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'selected'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																						'style'=>'width:100%;margin:0 auto;overflow:auto;position:relative;overflow:hidden;',
																						'div'=>FALSE,
																						'label'=>FALSE
																						// 'options'=>$disponibilidadViewStatusGstIndicators
																						// 'tabindex'=>'2'
																					)
																	);
				} else {
							echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['description'];
				}
				?>
			</td>
			<td>
				<?php
				if ($disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['iseditable'] == true and $user_mod == true ) {
					echo
								$this->Form->input
																	(
																		'searchbox',
																		 array
																					(
																						'type'=>'text',
																						'class'=>'calendar u-full-width form-control',
																						'id'=>'compromise_'.$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						// 'data-unidad'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						// 'data-status'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																						// 'placeholder' => $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['estatus'],
																						// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'selected'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																						'style'=>'width:100%;margin:0 auto;overflow:auto;position:relative;overflow:hidden;',
																						'div'=>FALSE,
																						'label'=>FALSE
																						// 'options'=>$disponibilidadViewStatusGstIndicators
																						// 'tabindex'=>'2'
																					)
																	);
				} else {
							echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['compromise'];
				}
				?>
			</td>
			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['status_viaje']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['desc_viaje']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['status_taller']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['desc_taller']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['iseditable']; ?>&nbsp;</td> -->
			 */?>
		</tr>
	<?php } //endforeach; ?>
		</tbody>
		<!-- <tfoot>
	            <tr>
	                <th colspan="11" style="text-align:right">Total:</th>
	                <th></th>
	                <th></th>
	                <th></th>
	            </tr>
	  </tfoot> -->
		</table>
</div>

<!-- if clients -->
<script type="text/javascript">
$(document).ready(function(){

	// const isEmptyValue = (value) => {
	//     if (value === '' || value === null || value === undefined) {
	//         return true
	//     } else {
	//         return false
	//     }
	// }


	// ================================================================================================================== //
	// Historical view mechanism
	// ================================================================================================================== //

//    var table_x = $('#table_hist').DataTable();

			var table_x = $('#table_hist').DataTable(
				Object.assign( {}
					, options_datatable
//				  , calculate_row([1])
				)
			 );

			//
});
</script>
