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
				$requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
		?>


	<div class="row head_datetime">
<div>&nbsp;</div>
		<div class="six columns"></div>

		<div class="one columns dash_datetime">
			Periodo
		</div>
		<div class="one columns dash_datetime">
			del
		</div>
		<div class="one columns dash_datetime">
			<?php echo $dashboard['inicio'] ?>
		</div>
		<div class="one columns dash_datetime">
			al
		</div>
		<div class="one columns dash_datetime">
			<?php echo $dashboard['fin'] ?>
		</div>

		<div class="one columns dash_datetime pull-right">
			Unidad de Negocio <?php echo $dashboard['bsu'] ?>
		</div>

<div>&nbsp;</div>
	</div>



	<div class="row noprint">

		<div class="two colums">

		</div>

		<div class="ten colums">
			Filtrar: <input type="text" id="kwd_search" value=""/>

			<div id="print" class="pull-right">
				<i class="fa fa-print" aria-hidden="true"></i>
			</div>
		</div>

	</div>


<div id="first-datatable-output">

		<table id="tableFilter" class="table table-bordered dropdown-filter-table dropdown-processed">

		<thead>
			<tr id="detail_header" class="detail_header">

						<th class="firts-header-element">Nombre</th>
						<th><?php echo ('RFC');?></th>
						<!-- <th><?php echo ('Empresa');?></th> -->
						<!-- <th><?php echo ('TipoDocumento');?></th> -->
						<th><?php echo ('Folio');?></th>
						<!-- <th><?php echo ('Nombre');?></th> -->
						<th><?php echo ('Flete');?></th>
						<!-- <th><?php echo ('Iva');?></th> -->
						<!-- <th><?php echo ('Retencion');?></th> -->
						<!-- <th><?php echo ('Total');?></th> -->
						<th><?php echo ('Referencia');?></th>
						<th><?php echo ('Lote');?></th>
						<!-- <th><?php echo ('Descripcion');?></th> -->
						<th><?php echo ('ElaboracionFactura');?></th>
						<th><?php echo ('entregaFacturaCliente');?></th>
						<th><?php echo ('Entrega');?></th>
						<th><?php echo ('aprobacionFactura');?></th>
						<th><?php echo ('Aprobacion');?></th>
						<th><?php echo ('fechaPromesaPago');?></th>
						<th><?php echo ('PromesaPago');?></th>
						<th><?php echo ('fechaPago');?></th>
						<th><?php echo ('Pago');?></th>
						<!-- <th><?php echo ('MES');?></th> -->
						<!-- <th><?php echo ('DIA');?></th> -->
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
				<tr class="dropdown-container_<?php print($performanceReferencesKey)?>">

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
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Empresa']; ?></td> -->
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['TipoDocumento']; ?></td> -->
					<td><?php echo $performanceReference['PerformanceViewFactura']['Folio']; ?></td>
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Nombre']; ?></td> -->
					<!-- <td><?php echo utf8_encode($performanceReference['PerformanceViewFactura']['Nombre']); ?></td> -->
					<!-- <td><?php echo iconv("CP1252", "UTF-8", $performanceReference['PerformanceViewFactura']['Nombre']); ?></td> -->
					<td><?php echo $performanceReference['PerformanceViewFactura']['Flete']; ?></td>
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Iva']; ?></td> -->
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Retencion']; ?></td> -->
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Total']; ?></td> -->
					<td><?php echo $performanceReference['PerformanceViewFactura']['Referencia']; ?></td>
					<td><?php echo $performanceReference['PerformanceViewFactura']['Lote']; ?></td>
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Descripcion']; ?></td> -->
					<td>
							<?php
									!empty($performanceReference['PerformanceViewFactura']['ElaboracionFactura']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['ElaboracionFactura']))) : e('&infin;') ;
							?>

					</td>
					<td>
							<?php
									!empty($performanceReference['PerformanceViewFactura']['entregaFacturaCliente']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['entregaFacturaCliente']))) : e('&infin;') ;
							?>

					</td>
					<td class="deliver_<?php print($performanceReferencesKey)?>" data-days="<?php echo $performanceReference['PerformanceViewFactura']['deliver']; ?>"><?php echo $performanceReference['PerformanceViewFactura']['deliver']; ?></td>
					<td>
							<?php
									!empty($performanceReference['PerformanceViewFactura']['aprobacionFactura']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['aprobacionFactura']))) : e('&infin;') ;
							?>

					</td>
					<td class="proved_<?php print($performanceReferencesKey)?>" data-days="<?php echo $performanceReference['PerformanceViewFactura']['proved']; ?>"><?php echo $performanceReference['PerformanceViewFactura']['proved']; ?></td>
					<td>
							<?php
									!empty($performanceReference['PerformanceViewFactura']['fechaPromesaPago']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['fechaPromesaPago']))) : e('&infin;') ;
							?>

					</td>
					<td class="promise_<?php print($performanceReferencesKey)?>" data-days="<?php echo $performanceReference['PerformanceViewFactura']['promise']; ?>"><?php echo $performanceReference['PerformanceViewFactura']['promise']; ?></td>
					<td>
							<?php
									!empty($performanceReference['PerformanceViewFactura']['fechaPago']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['fechaPago']))) : e('&infin;') ;
							?>

					</td>
					<td class="payment_<?php print($performanceReferencesKey)?>" data-days="<?php echo $performanceReference['PerformanceViewFactura']['payment']; ?>"><?php echo $performanceReference['PerformanceViewFactura']['payment']; ?></td>
				</tr>

			<?php
					endforeach;
			?>
			<tr id="resume_footer" class="resume_compact_footer success">
				<td><?php echo $performanceReferencesIdx[$performanceReferencesKey]; ?></td>
				<td><?php print($performanceReferencesKey)?></td>
				<td id="footer_dropdown_qty_<?php print($performanceReferencesKey)?>">
					<?php
						echo count($performanceReferencesResume[$performanceReferencesKey]['deliver']);
					?>
				</td>

				<td id="_footer_td" class="compact_footer"></td>
				<td id="_footer_td" class="compact_footer">
					<?php
						// echo array_sum($performanceReferencesResume[$performanceReferencesKey]['deliver']);
					?>
				</td>
				<td id="_footer_td" class="compact_footer"></td>
				<td id="_footer_td" class="compact_footer"></td>
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
												count($performanceReferencesResume[$performanceReferencesKey]['deliver'])
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
												count($performanceReferencesResume[$performanceReferencesKey]['proved'])
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
												count($performanceReferencesResume[$performanceReferencesKey]['promise'])
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
												count($performanceReferencesResume[$performanceReferencesKey]['payment'])
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
