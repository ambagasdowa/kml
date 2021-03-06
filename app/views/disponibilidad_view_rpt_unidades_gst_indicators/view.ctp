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

			<div id="printHistorical" class="pull-right">
				<i class="fa fa-print" aria-hidden="true"></i>
			</div>
		</div>

	</div>





<div class="row">
<?php /*
echo '<div class="two columns"><i class="fa fa-barcode"></i></div>';
echo '<div class="two columns"></div>';
echo
			$this->Form->input
												(
													'searchbox',
													 array
																(
																	'type'=>'text',
																	'class'=>'search_udn u-full-width form-control',
																	'id'=>'FilterAll',
																	'placeholder' => 'Filtro General',
																	// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																	// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																	'div'=>FALSE,
																	'label'=>FALSE,
																	// 'options'=>array(1=>'ATSA IZUCAR - SIVESA ORIZABA',2=>'ATSA MIXQUI - SIVESA ORIZABA',3=>'CALIZA MIXQUI - FANAL TULTITLAN'),
																	'tabindex'=>'2'
																)
												);
	echo '</div>';
	*/
 ?>
 </div>



<!-- Activate Chart in Historical -->
 <div class="row">
	<div class="twelve columns">
		<!-- <div id="chart" class="chart" style="display:none;" > -->
		<div id="chart" class="chart" >
					<!-- <div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto"> -->
					<div id="the-charting" style="display:none; min-width:87%; margin: 0 auto">
						<!-- graphics -->
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
				<th>Fecha Compromiso</th>
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
			<td><?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['compromiso']; ?></td>
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

	// NOTE PRINT
	$("#printHistorical").on('click',function(e){

		$(".row").find(".head_datetime").removeClass("head_datetime").addClass("dash_datetime");

		var ids = "#printThis";

				$( ids ).printThis({
						debug: false,               // show the iframe for debugging
						importCSS: false,            // import page CSS
						importStyle: true,         // import style tags
						printContainer: true,       // grab outer container as well as the contents of the selector
						loadCSS: "<?php echo Dispatcher::baseUrl();?>/css/kml/performance_print.css",  // path to additional css file - use an array [] for multiple
						pageTitle: "&#8203;", // add title to print page
						removeInline: false,        // remove all inline styles from print elements
						printDelay: 333,            // variable print delay; depending on complexity a higher value may be necessary
						header: '<img src="<?php echo Dispatcher::baseUrl();?>/img/logotipos/gst/header_gs.png" width="100%">',               // prefix to html
						footer: '', // postfix to html <div class="footer_legend">© GST Software Development Department</div>
						base: false ,               // preserve the BASE tag, or accept a string for the URL
						formValues: false,           // preserve input/form values
						canvas: false,              // copy canvas elements (experimental)
						doctypeString: "",       // enter a different doctype for older markup
						removeScripts: false,       // remove script tags from print content
						copyTagClasses: false       // copy classes from the html & body tag
				});
	});

	// ================================================================================================================== //
	// Historical view mechanism
	// ================================================================================================================== //

var table_x = $('#table_hist').DataTable();

// ================================================================================================================== //
// Historical view mechanism
// ================================================================================================================== //


		//
			Highcharts.chart('the-charting', {
					chart: {
							type: 'pie',
							// type: 'column',
							backgroundColor: {
							            linearGradient: [0, 0, 500, 500],
							            stops: [
							                [0, 'rgb(255, 255, 255)'],
							                [1, 'rgb(240, 240, 255)']
							            ]
							 }
					},
					// width:1200,
					title: {
							text: 'Historial'
					},
					credits:{enabled:false},
					// colors: ['#058DC7','#3398d6','#6c99bb','#50B432','#b4c973', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'], // orig
					colors: ['#00649f','#01aac1','#00dbe7','#97ecc5','#1fab89','#62d2a2','#9df3c4','#d7fbe8','#f67280','#c06c84','#6c5b7b','#355c7d','#ffb400','#fffbe0','#2994b2','#474744'], // theme colores
					// colors:['#1a1334','#26294a',' #01545a','#017351','#03c383','#aad962','#fbbf45','#ef6a32','#ed0345','#a12a5e','#710162','#110141'], // darks theme
					// colors:["#bfb7e6", "#7d86c1", "#403874", "#261c4e", "#1f0937", "#574331", "#9d9121", "#a49959", "#b6b37e", "#91a3f5"], //cold_water
					// colors:["#043227", "#097168", "#ffcc88", "#fa482e", "#f4a32e"], // oldPapers
					// theme trover
					// colors:["#51574a", "#447c69", "#74c493", "#8e8c6d", "#e4bf80", "#e9d78e", "#e2975d", "#f19670", "#e16552", "#c94a53", "#be5168", "#a34974", "#993767", "#65387d", "#4e2472", "#9163b6", "#e279a3", "#e0598b", "#7c9fb0", "#5698c4", "#9abf88"],
					subtitle: {
							// text: 'Click en las columnas para ver el detalle del porcentaje por Unidad.'
					},
					xAxis: {
							type: 'category'
					},
					yAxis: {
							title: {
									text: 'Fecha Estatus'
							}
					},
					legend: {
							enabled: false
					},
					plotOptions: {
							series: {
									borderWidth: 0,
									dataLabels: {
											enabled: true,
											format: '{point.y}'
									}
							}
					},
					tooltip: {
							headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
							pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Estatus <br/>'
					},
					series: [{
							name: 'Unidades',
							colorByPoint: true,
							data: [ <?php print($json_parsing_level_one) ?> ]
					}] //,
					// drilldown: {
					// 		series: [ <?php //print($json_parsing_level_two) ?> ]
					// }
			}); // End the chart
			//
});
</script>
