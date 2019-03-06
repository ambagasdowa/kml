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

			<div id="print" class="pull-right">
				<i class="fa fa-print" aria-hidden="true"></i>
			</div>
		</div>

	</div>


	<div class="row">
 	 <div class="twelve columns">
 		 <div id="chart" class="chart" >
 					 <div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">
 						 <!-- graphics -->
 					 </div>
 		 </div>
 	 </div>
  </div>

<div class="con">
<div id="cont" style="height: 10px; margin: 0 auto"></div>
</div>


<div class="row">
<?php
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
 ?>
 </div>


<div id="first-datatable-output" class="table-responsive">

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



		<table id="table_det" class="display order-table table table-bordered table-hover table-striped responstable">
		<thead>
			<tr>
				<th><?php echo 'Unidad';?></th>
				<th><?php echo 'Estatus';?></th>
				<!-- <th><?php echo 'Tipo_status';?></th> -->
				<th><?php echo 'Operador';?></th>
				<th><?php echo 'Remolque';?></th>
				<!-- <th><?php echo 'Area';?></th> -->
				<th><?php echo 'Operacion';?></th>
				<th>Descripci&oacute;n</th>
				<th><?php echo 'Fecha Compromiso';?></th>
				<!-- <th><?php echo 'Status_viaje';?></th> -->
				<!-- <th><?php echo 'Desc_viaje';?></th> -->
				<!-- <th><?php echo 'Status_taller';?></th> -->
				<!-- <th><?php echo 'Desc_taller';?></th> -->
				<!-- <th><?php echo 'Iseditable';?></th> -->
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ($disponibilidadViewRptUnidadesGstIndicators as $key => $disponibilidadViewRptUnidadesGstIndicator) {
			// code...
		?>
		<tr id="<?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'] ?>">
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad']; ?>&nbsp;</td>
			<td><?php
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
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['operador']; ?>&nbsp;</td>
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['remolque']; ?>&nbsp;</td>
			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['area']; ?>&nbsp;</td> -->
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['segmento']; ?>&nbsp;</td>
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
																						'class'=>'u-full-width form-control',
																						'id'=>'compromise_'.$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						// 'data-unidad'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						// 'data-status'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																						// 'placeholder' => $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['estatus'],
																						// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'selected'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
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

		$(".update_status").select2();
		$(".update_status").on('select2:select', function (e) {
				// e.stopPropagation();
				// e.preventDefault();
		    var data = e.params.data;
		    // console.log(data);
				console.log(this);
				console.log($(this).attr('data-unidad'));
				console.log($(this).attr('data-status'));

				var description = "description_"+$(this).attr('data-unidad');
				var compromise = "compromise_"+$(this).attr('data-unidad');
// or ajax

				// desc = document.getElementById(description).innerText;
				// comp = document.getElementById(compromise).innerText;

				desc = document.getElementById(description).value;
				comp = document.getElementById(compromise).value;

				console.log(desc);
				console.log(comp);

				if ( (desc === '' || desc === null || desc === undefined) || (comp === '' || comp === null || comp === undefined) ) {
						// return true
						console.log('void');
						alert('descripcion y compromiso son obligatorios');
						save = true
				} else {
						// return false
						console.log('notvoid');
						save = false
				var post_data = {
													'unidad':$(this).attr('data-unidad'),
													'id_status':$(this).attr('data-status'),
													'description':desc,
													'compromise':comp
												};

				var str_to_pass = JSON.stringify(post_data);
				console.log(str_to_pass);
				data_code = base64_encode(str_to_pass);
				var urlStruct = "<?php echo Dispatcher::baseUrl();?>/DisponibilidadViewRptUnidadesGstIndicators/add/save:" + data_code;
				console.log(urlStruct);

				// Assign handlers immediately after making the request,
// and remember the jqxhr object for this request
						var jqxhr = $.post( urlStruct, function() {
						  alert( "success" );
						})
						  .done(function() {
						    alert( "second success" );
						  })
						  .fail(function() {
						    alert( "error" );
						  })
						  .always(function() {
						    alert( "finished" );
						  });
				}
		});


		//
			Highcharts.chart('the-chart', {
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
					width:1200,
					title: {
							text: 'Indicadores de Disponibilidad de Unidades'
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
									text: 'Numero de Unidades'
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
							pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Unidades <br/>'
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
