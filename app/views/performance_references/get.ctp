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


	<div class="row">
		<div class="one columns">
			<div id="print" class="pull-right">
				<i class="fa fa-print" aria-hidden="true"></i>
			</div>
		</div>
		<div class="three columns ">
				&nbsp;
		</div>
		<div id="colsBtn" class="eight columns ">
			&nbsp;
		</div>
	</div>


<div id="first-datatable-output">

		<table id="tableFilter" class="table table-bordered">

		<thead>
			<tr>
					<!-- <th><?php echo 'id'; ?></th> -->
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
						<th><?php echo ('deliver');?></th>
						<th><?php echo ('aprobacionFactura');?></th>
						<th><?php echo ('proved');?></th>
						<th><?php echo ('fechaPromesaPago');?></th>
						<th><?php echo ('promise');?></th>
						<th><?php echo ('fechaPago');?></th>
						<th><?php echo ('payment');?></th>
						<!-- <th><?php echo ('MES');?></th> -->
						<!-- <th><?php echo ('DIA');?></th> -->
			</tr>

		</thead>

		<tbody>
		<?php
			foreach ($performanceReferences as $performanceReference):
		?>
				<tr>
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['id']; ?>&nbsp;</td> -->
					<td>
						<?php
									echo
									// $this->Html->link($performanceReference['PerformanceViewFactura']['performance_customers_id'], array('controller' => 'performance_customers', 'action' => 'view', $performanceReference['PerformanceCustomers']['id'],array('div'=>false,'id'=>$performanceReference['PerformanceViewFactura']['id'])));
									//
									$this->Html->link(
																			$performanceReference['PerformanceViewFactura']['performance_customers_id'],
																			// array('action' => 'get', null),
																			array('controller' => 'performance_customers', 'action' => 'view', $performanceReference['PerformanceCustomers']['id']),
																			array(
																						'id'=>'get_factura_'.$performanceReference['PerformanceViewFactura']['id'],
																						'data-id'=>$performanceReference['PerformanceViewFactura']['performance_customers_id'],
																						'data-reference' => $performanceReference['PerformanceViewFactura']['id'],
																						'data-empresa' => $performanceReference['PerformanceViewFactura']['Empresa'],
																						'div'=>false
																					)
																		);
						?>
					</td>
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Empresa']; ?>&nbsp;</td> -->
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['TipoDocumento']; ?>&nbsp;</td> -->
					<td><?php echo $performanceReference['PerformanceViewFactura']['Folio']; ?>&nbsp;</td>
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Nombre']; ?>&nbsp;</td> -->
					<!-- <td><?php echo utf8_encode($performanceReference['PerformanceViewFactura']['Nombre']); ?>&nbsp;</td> -->
					<!-- <td><?php echo iconv("CP1252", "UTF-8", $performanceReference['PerformanceViewFactura']['Nombre']); ?>&nbsp;</td> -->
					<td><?php echo $performanceReference['PerformanceViewFactura']['Flete']; ?>&nbsp;</td>
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Iva']; ?>&nbsp;</td> -->
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Retencion']; ?>&nbsp;</td> -->
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Total']; ?>&nbsp;</td> -->
					<td><?php echo $performanceReference['PerformanceViewFactura']['Referencia']; ?>&nbsp;</td>
					<td><?php echo $performanceReference['PerformanceViewFactura']['Lote']; ?>&nbsp;</td>
					<!-- <td><?php echo $performanceReference['PerformanceViewFactura']['Descripcion']; ?>&nbsp;</td> -->
					<td>
							<?php
									!empty($performanceReference['PerformanceViewFactura']['ElaboracionFactura']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['ElaboracionFactura']))) : e('&infin;') ;
							?>
								&nbsp;
					</td>
					<td>
							<?php
									!empty($performanceReference['PerformanceViewFactura']['entregaFacturaCliente']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['entregaFacturaCliente']))) : e('&infin;') ;
							?>
								&nbsp;
					</td>
					<td class="days"><?php echo $performanceReference['PerformanceViewFactura']['deliver']; ?>&nbsp;</td>
					<td>
							<?php
									!empty($performanceReference['PerformanceViewFactura']['aprobacionFactura']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['aprobacionFactura']))) : e('&infin;') ;
							?>
								&nbsp;
					</td>
					<td class="days"><?php echo $performanceReference['PerformanceViewFactura']['proved']; ?>&nbsp;</td>
					<td>
							<?php
									!empty($performanceReference['PerformanceViewFactura']['fechaPromesaPago']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['fechaPromesaPago']))) : e('&infin;') ;
							?>
								&nbsp;
					</td>
					<td class="days"><?php echo $performanceReference['PerformanceViewFactura']['promise']; ?>&nbsp;</td>
					<td>
							<?php
									!empty($performanceReference['PerformanceViewFactura']['fechaPago']) ? e(date('Y-m-d',strtotime($performanceReference['PerformanceViewFactura']['fechaPago']))) : e('&infin;') ;
							?>
								&nbsp;
					</td>
					<td class="days"><?php echo $performanceReference['PerformanceViewFactura']['payment']; ?>&nbsp;</td>
				</tr>

			<?php endforeach; ?>

				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;Promedio</td>
					<td id="mean1">&nbsp;</td>
					<td>&nbsp;Promedio</td>
					<td id="mean2">&nbsp;</td>
					<td>&nbsp;Promedio</td>
					<td id="mean3">&nbsp;</td>
					<td>&nbsp;Promedio</td>
					<td id="mean4">&nbsp;</td>
				</tr>
			</tbody>
		</table>

		<div id="paging-first-datatable"></div>

</div>
