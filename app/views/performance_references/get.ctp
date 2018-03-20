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
		    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
				$requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
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

	<div class="row">
		<div class="twelve columns">
			<div id="chart" class="chart" style="display:none;" >
						<div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">
						</div>
			</div>
		</div>
	</div>

	<div class="row noprint">
		<?php	echo $this->Session->flash();?>
	</div>

	<div class="row noprint">

		<div class="two colums">

		</div>

		<div class="ten colums">
			<input type="text" id="kwd_search" value="" placeholder="Buscar"/>

			<a id="details" class="button button-primary" href="#">Totales</a>

			<a id="charting" class="button button-primary" href="#">Graficas</a>

			<div id="print" class="pull-right">
				<i class="fa fa-print" aria-hidden="true"></i>
			</div>
		</div>

	</div>

	<div class="row">
			<div class="twelve columns">
				<table class="table table-hover">
					<tr>
						<th colspan="<?php echo count($performanceGeneral)*2; ?>">Totales</th>
					</tr>
					<tr>
							<?php
								foreach ($performanceGeneral as $inx_gral => $gral_data) {
										echo "<td>{$inx_gral}</td>";
										echo "<td>{$gral_data}</td>";
								}
							?>
					</tr>
				</table>
			</div>
	</div>


<div id="first-datatable-output" class="table-responsive">

		<table id="tableFilter" class="table table-bordered table-hover">

		<thead  class="detail_header">
			<tr class="cache-header">
						<th class="firts-header-element">Nombre</th>
						<th><?php echo ('RFC');?></th>
						<!-- <th class="hideme">
							<input type="checkbox" id="checkbox-main" name="" />
							 <label for="checkbox-main"></label>
						</th> -->
						<!-- <th><?php echo ('TipoDocumento');?></th> -->
						<th><?php echo ('Folio');?></th>
						<!-- <th><?php echo ('Nombre');?></th> -->
						<th class="hideme"><?php echo ('Flete');?></th>
						<!-- <th><?php echo ('Iva');?></th> -->
						<!-- <th><?php echo ('Retencion');?></th> -->
						<th class="hideme"><?php echo ('Referencia');?></th>
						<th><?php echo ('Lote');?></th>
						<th><?php echo ('Monto');?></th>
						<th class="hideme"><?php echo ('Empresa');?></th>
						<!-- <th><?php echo ('Descripcion');?></th> -->
						<th class="hideme"><?php echo ('ElaboracionFactura');?></th>
						<th><?php echo ('EntregaFacturaCliente');?></th>
						<th><?php echo ('Entrega');?></th>
						<th><?php echo ('AprobacionFactura');?></th>
						<th><?php echo ('Aprobacion');?></th>
						<th><?php echo ('FechaPromesaPago');?></th>
						<th><?php echo ('PromesaPago');?></th>
						<th><?php echo ('FechaPago');?></th>
						<th><?php echo ('Pago');?></th>
			</tr>

		</thead>

		<tbody>

		<?php
			foreach ($performanceReferencesMod as $performanceReferencesKey => $performanceReferences) {
		?>

		<!-- <tr class="hidden-gan info"> -->
			<!-- <td><?php print($performanceReferencesKey)?></td> -->
			<!-- <td colspan="13"> -->
						<!-- <span data-id="<?php print($performanceReferencesKey)?>" class="dropdown-link" href="#"> -->
							<!-- <i id="_link_<?php print($performanceReferencesKey)?>" class="fa fa-plus-square-o" aria-hidden="true"></i> -->
						<!-- </span> -->
					<?php //echo $performanceReferencesIdx[$performanceReferencesKey]; ?>
			<!-- </td> -->
		<!-- </tr> -->

		<?php
			foreach ($performanceReferences as $performanceReference):
		?>
				<tr class="dropdown-container_<?php print($performanceReferencesKey)?>" data-filter="<?php echo $performanceReference['PerformanceViewFactura']['dmon'] ?>">

					<td><?php echo $performanceReferencesIdx[$performanceReferencesKey]; ?></td>
					<td class="item_<?php echo $performanceReferencesKey?>">
						<?php
									echo
									$this->Html->link(
																			$performanceReference['PerformanceViewFactura']['performance_customers_id'],
																			// array('action' => 'get', null),
																			array('controller' => 'performance_customers', 'action' => 'view', $performanceReference['PerformanceCustomers']['id']),
																			array(
																						'id'=>'get_factura_'.$performanceReference['PerformanceViewFactura']['id'],
																						'data-id'=>$performanceReference['PerformanceViewFactura']['performance_customers_id'],
																						'data-reference' => $performanceReference['PerformanceViewFactura']['id'],
																						'data-empresa' => $performanceReference['PerformanceViewFactura']['Empresa'],
																						'data-resume' => $performanceReference['PerformanceViewFactura']['performance_customers_id'],
																						'div'=>false
																					)
																		);
						?>
					</td>
					<!-- <td class="hideme check">
						<input type="checkbox" id="checkbox-<?php echo $performanceReference['PerformanceViewFactura']['Referencia'];?>" name="chk_group[]" class="small">
						 <label for="checkbox-<?php echo $performanceReference['PerformanceViewFactura']['Referencia']; ?>"></label>
					</td> -->
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['TipoDocumento']; ?></td> -->
					<td><?php echo $performanceReference['PerformanceViewFactura']['Folio']; ?></td>
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Nombre']; ?></td> -->
					<!-- <td><?php echo utf8_encode($performanceReference['PerformanceViewFactura']['Nombre']); ?></td> -->
					<!-- <td><?php echo iconv("CP1252", "UTF-8", $performanceReference['PerformanceViewFactura']['Nombre']); ?></td> -->

					<td class="hideme">
						<?php
						echo
						number_format(
								money_format(
										'%i',
										(
											$performanceReference['PerformanceViewFactura']['Flete']
										)
								), 2, '.', ','
						);
						?>
					</td>

					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Iva']; ?></td> -->
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Retencion']; ?></td> -->
					<td class="hideme"><?php echo $performanceReference['PerformanceViewFactura']['Referencia']; ?></td>
					<td class="hideme"><?php echo $performanceReference['PerformanceViewFactura']['Lote']; ?></td>
					<td class="hideme">
						<?php
						echo
						number_format(
								money_format(
										'%i',
										(
											$performanceReference['PerformanceViewFactura']['Total']
										)
								), 2, '.', ','
						);
						?>
					</td>
					<td class="hideme"><?php echo $performanceReference['PerformanceViewFactura']['Empresa']; ?></td>
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Descripcion']; ?></td> -->
					<td class="hideme">
							<?php
									!empty($performanceReference['PerformanceViewFactura']['ElaboracionFactura']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['ElaboracionFactura']))) : e('&infin;') ;
							?>
					</td>
					<td class="<?php e($performanceReferencesKey.'_'.$performanceReference['PerformanceViewFactura']['id'].'_') ?>entregaFacturaCliente">
							<?php
									!empty($performanceReference['PerformanceViewFactura']['entregaFacturaCliente']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['entregaFacturaCliente']))) : e('&infin;') ;
							?>
					</td>
					<td class="deliver_<?php print($performanceReferencesKey)?>" data-days="<?php echo $performanceReference['PerformanceViewFactura']['deliver']; ?>"><?php echo $performanceReference['PerformanceViewFactura']['deliver']; ?></td>
					<td class="<?php e($performanceReferencesKey.'_'.$performanceReference['PerformanceViewFactura']['id'].'_') ?>aprobacionFactura">
							<?php
									!empty($performanceReference['PerformanceViewFactura']['aprobacionFactura']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['aprobacionFactura']))) : e('&infin;') ;
							?>

					</td>
					<td class="proved_<?php print($performanceReferencesKey)?>" data-days="<?php echo $performanceReference['PerformanceViewFactura']['proved']; ?>"><?php echo $performanceReference['PerformanceViewFactura']['proved']; ?></td>
					<td class="<?php e($performanceReferencesKey.'_'.$performanceReference['PerformanceViewFactura']['id'].'_') ?>fechaPromesaPago">
							<?php
									!empty($performanceReference['PerformanceViewFactura']['fechaPromesaPago']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['fechaPromesaPago']))) : e('&infin;') ;
							?>

					</td>
					<td class="promise_<?php print($performanceReferencesKey)?>" data-days="<?php echo $performanceReference['PerformanceViewFactura']['promise']; ?>"><?php echo $performanceReference['PerformanceViewFactura']['promise']; ?></td>
					<td class="<?php e($performanceReferencesKey.'_'.$performanceReference['PerformanceViewFactura']['id'].'_') ?>fechaPago">
							<?php
									!empty($performanceReference['PerformanceViewFactura']['fechaPago']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['fechaPago']))) : e('&infin;') ;
							?>

					</td>
					<td class="payment_<?php print($performanceReferencesKey)?>" data-days="<?php echo $performanceReference['PerformanceViewFactura']['payment']; ?>">
						<?php echo $performanceReference['PerformanceViewFactura']['payment']; ?>
					</td>
				</tr>

			<?php
					endforeach;
			?>
			<tr id="resume_footer" class="resume_compact_footer success link_external">
				<td><?php echo $performanceReferencesIdx[$performanceReferencesKey]; ?></td>
				<td><?php print($performanceReferencesKey)?>
					<a id="this_link_<?php print($performanceReferencesKey)?>" href="#" class="link_search_ icon"
						 data-id="<?php print($performanceReferencesKey)?>"
						 data-empresa="<?php echo $performanceReference['PerformanceViewFactura']['Empresa']?>"
						 data-ini="<?php echo $dashboard['inicio'] ?>"
						 data-end="<?php echo $dashboard['fin'] ?>"
						 alt="Fechas para todos los registros de <?php print($performanceReferencesKey)?>"
						 title="Fechas para todos los registros"
						 ><i class="fa fa-external-link" aria-hidden="true"></i></a>
				</td>

				<!-- <td class="hideme checkbox_footer">
					<input type="checkbox" id="checkbox-footer-<?php print($performanceReferencesKey)?>" />
					 <label for="checkbox-footer-<?php print($performanceReferencesKey)?>"></label>
				</td> -->

				<td id="footer_dropdown_qty_<?php print($performanceReferencesKey)?>">
					<?php
						echo count($performanceReferencesResume[$performanceReferencesKey]['amount']);
					?>
				</td>

				<td id="_footer_td" class="hideme"></td>
				<td id="_footer_td" class="hideme">
					<?php
						// echo array_sum($performanceReferencesResume[$performanceReferencesKey]['deliver']);
					?>
				</td>
				<td id="_footer_td" class="compact_footer">Monto</td>
				<td id="footer_dropdown_promedio_payment_<?php print($performanceReferencesKey)?>">
					<?php
						// echo (array_sum($performanceReferencesResume[$performanceReferencesKey]['payment'])/count($performanceReferencesResume[$performanceReferencesKey]['payment'])) ;
						echo
						number_format(
								money_format(
										'%i',
										(
												array_sum($performanceReferencesResume[$performanceReferencesKey]['amount'])
													// /
												// count($performanceReferencesResume[$performanceReferencesKey]['payment'])
												// $subgeneral[$performanceReferencesKey]['payment']
										)
								), 2, '.', ','
						);
					?>
				</td>
				<td id="_footer_td" class="hideme"></td>
				<td id="_footer_td" class="hideme"></td>
				<td id="_footer_td" class="compact_footer">PromedioDiasEntrega</td>

				<td id="footer_dropdown_promedio_deliver_<?php print($performanceReferencesKey)?>">
					<?php
						// echo (array_sum($performanceReferencesResume[$performanceReferencesKey]['deliver'])/count($performanceReferencesResume[$performanceReferencesKey]['deliver'])) ;
						echo
						number_format(
								money_format(
										'%i',
										(
												array_sum($performanceReferencesResume[$performanceReferencesKey]['deliver'])
													/
												// count($performanceReferencesResume[$performanceReferencesKey]['deliver'])
												$subgeneral[$performanceReferencesKey]['deliver']
										)
								), 2, '.', ','
						);
					?>
				</td>
				<td id="_footer_td" class="compact_footer">PromedioDiasAprobacion</td>
				<td id="footer_dropdown_promedio_proved_<?php print($performanceReferencesKey)?>">
					<?php
						// echo (array_sum($performanceReferencesResume[$performanceReferencesKey]['proved'])/count($performanceReferencesResume[$performanceReferencesKey]['proved'])) ;
						echo
						number_format(
								money_format(
										'%i',
										(
												array_sum($performanceReferencesResume[$performanceReferencesKey]['proved'])
													/
												// count($performanceReferencesResume[$performanceReferencesKey]['proved'])
												$subgeneral[$performanceReferencesKey]['proved']
										)
								), 2, '.', ','
						);
					?>
				</td>
				<td id="_footer_td" class="compact_footer">PromedioDiasPromesa</td>
				<td id="footer_dropdown_promedio_promise_<?php print($performanceReferencesKey)?>">
					<?php
						// echo (array_sum($performanceReferencesResume[$performanceReferencesKey]['promise'])/count($performanceReferencesResume[$performanceReferencesKey]['promise'])) ;
						echo
						number_format(
								money_format(
										'%i',
										(
												array_sum($performanceReferencesResume[$performanceReferencesKey]['promise'])
													/
												// count($performanceReferencesResume[$performanceReferencesKey]['promise'])
												$subgeneral[$performanceReferencesKey]['promise']
										)
								), 2, '.', ','
						);
					?>
				</td>
				<td id="_footer_td" class="compact_footer">PromedioDiasPago</td>
				<td id="footer_dropdown_promedio_payment_<?php print($performanceReferencesKey)?>">
					<?php
						// echo (array_sum($performanceReferencesResume[$performanceReferencesKey]['payment'])/count($performanceReferencesResume[$performanceReferencesKey]['payment'])) ;
						echo
						number_format(
								money_format(
										'%i',
										(
												array_sum($performanceReferencesResume[$performanceReferencesKey]['payment'])
													/
												// count($performanceReferencesResume[$performanceReferencesKey]['payment'])
												$subgeneral[$performanceReferencesKey]['payment']
										)
								), 2, '.', ','
						);
					?>
				</td>

			</tr>
			<?php
				}
			?>


			</tbody>
		</table>

		<div id="paging-first-datatable"></div>

</div>

<!-- if clients -->
<script type="text/javascript">
		$(document).ready(function(){

			Highcharts.chart('the-chart', {
					chart: {
							type: 'column',
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
							text: 'Indicadores de Facturacion'
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
							text: 'Click en las columnas para ver el detalle del porcentaje por factura.'
					},
					xAxis: {
							type: 'category'
					},
					yAxis: {
							title: {
									text: 'Porcentajes'
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
											format: '{point.y:.2f}%'
									}
							}
					},
					tooltip: {
							headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
							pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> de <?php echo $performanceGeneral["Monto"]?><br/>'
					},
					series: [{
							name: 'Porcentajes',
							colorByPoint: true,
							data: [ <?php print($json_parsing_level_one) ?> ]
					}],
					drilldown: {
							series: [ <?php print($json_parsing_level_two) ?> ]
					}
			}); // End the chart
		});
</script>
