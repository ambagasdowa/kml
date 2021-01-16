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
				$xds = $tds ;
		?>



<div class="con">
<div id="cont" style="height: 10px; margin: 0 auto">

		<div class="nobreak">
		<p>
			<?php
						echo
								$this->Html->link(
																		__('Exportar', true),
																		array('action' => 'export', null),
																		array('id'=>'export','div'=>false,'class'=>'btn btn-primary btn-sm pull-right','tabindex'=>'6')
																	);
			?>
		</p>
		</div>

</div>
</div>




<div id="first-datatable-output" class="wrap">

<!-- NOTE  Start the Dashboard -->

	<?php foreach ($rentabilidadViewMainLiquidations as $unidad => $liquidacion): ?>
 
<table id="main_container_<?php echo $unidad ?>" class="main_table">

				<tr>	
					<td colspan="<?php echo $tds+4 ?>">
							<b><?php echo $unidad.' '.$tds; ?> </b>
					</td>
				</tr>

		<!--insert by Bsu-->
				<td class="_cell_fix_lenght">&nbsp;</td>
				<td>
					<table id="left_menu">
						<!--	<tr><td>Unidad</td></tr> -->
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Unidad de Negocio&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Liquidacion&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Viajes&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Dias de Viaje&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Duracion en d&iacute;as&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Kms Camion Lleno&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Kms Camion Vacio&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;QtyCombustible&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Rendimiento Reseteo&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Rendimiento Calculado&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Ingreso Total Ruta&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Combustible&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Casetas&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;ConceptosSueldo&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Otros&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell _celll_first_row">&nbsp;Costo Directo del Viaje&nbsp;</td></tr>			
						</table>
				</td>



		<?php foreach ($liquidacion as $no_liquidacion => $rentabilidadViewMainLiquidation): ?>

				<td id="main_content_<?php echo $no_liquidacion ?>">

					<table id="<?php echo $no_liquidacion?>" width="100%">

				<!--			<tr><td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['Unidad']; ?>&nbsp;</td></tr> -->
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['UnidadNegocio']; ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['liquidacion']; ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['viajes']; ?>&nbsp;</td></tr>
							<tr>
									<td class="_cell_header _xls_cell">
										<?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['del']; ?>
									</td>
									<td class="_cell_header _xls_cell">
										<?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['al'];?>
									</td>
							</tr>

							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['DuracionViaje']; ?>&nbsp;</td></tr> 

							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCaminoLleno']; ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCamionVacio']; ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyCombustible'] ); ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['rendimiento_reseteo'] ,2, '.', ',' ); ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['RendViaje'] ,2, '.', ',' ); ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell _cell_view"><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['IngresoTotalRuta'] ); ?>&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell">&nbsp;</td></tr>

							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['COMBUSTIBLE'] ); ?>
								</td>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_combustible'] ) . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CASETAS']); ?>
								</td>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_casetas']) . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CONCEPTOS_SUELDO']); ?>
								</td>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_conceptos_sueldo']) . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['OTROS']); ?>
								</td>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_otros']) . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CostoDirectoViaje']); ?>
								</td>
								<td class="_cell_header _xls_cell" >
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_CostoDirectoViaje']) . ' %'; ?>
								</td>
							</tr>				
<!-- Until hir is the work -->
						</table>
				  </td>

		<?php endforeach; ?>

					<td>
						<table>
							<tr><td colspan="2" class="_cell_header _xls_cell">SUMA</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"><?php echo $sum_data[$unidad]['viajes'] ?> </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo $sum_data[$unidad]['DuracionViaje'] ?>   </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo $sum_data[$unidad]['KmsCaminoLleno'] ?> </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo $sum_data[$unidad]['KmsCamionVacio'] ?> </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo number_format ($sum_data[$unidad]['qtyCombustible']) ?> </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo number_format ($sum_data[$unidad]['rendimiento_reseteo']/($xds) ,2,'.',',') ?> </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell"> <?php echo number_format (($sum_data[$unidad]['KmsCaminoLleno'] + $sum_data[$unidad]['KmsCamionVacio'])/$sum_data[$unidad]['qtyCombustible'] ,2,'.',',') ?> </td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell _cell_view"> <?php echo number_format ($sum_data[$unidad]['IngresoTotalRuta']) ?></td></tr>
							<tr><td colspan="2" class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr>
								<td class="_cell_header _xls_cell">

										<?php echo number_format($sum_data[$unidad]['Combustible']) ?></td>
								<td class="sum _cell_header _xls_cell">
										<?php echo number_format( ( ($sum_data[$unidad]['Combustible'] / $sum_data[$unidad]['IngresoTotalRuta']) * 100 )) . ' %'; ?> &nbsp;
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format( $sum_data[$unidad]['Casetas']) ?>
								</td>
								<td class="sum _cell_header _xls_cell">
										<?php echo number_format( ( ( $sum_data[$unidad]['Casetas'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ) .' %'; ?> &nbsp;
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($sum_data[$unidad]['ConceptosSueldo']) ?>
								</td>
								<td class="sum _cell_header _xls_cell">
										<?php echo number_format( ( ( $sum_data[$unidad]['ConceptosSueldo'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ) . ' %'; ?> &nbsp;
								</td>
							</tr>
							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($sum_data[$unidad]['Otros']) ?>
								</td>
								<td class="sum _cell_header _xls_cell">
										<?php echo number_format( ( ( $sum_data[$unidad]['Otros'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ) . ' %'; ?> &nbsp;
								</td> 
							</tr>

							<tr>
								<td class="_cell_header _xls_cell">
										<?php echo number_format($sum_data[$unidad]['CostoDirectoViaje'] ); ?>
								</td>
								<td class="sum _cell_header _xls_cell">
										<?php echo number_format( ( ( $sum_data[$unidad]['CostoDirectoViaje'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ) . ' %'; ?>&nbsp;
								</td> 
							</tr>

						</table>
					</td>
					<td class="_cell_fix_lenght">&nbsp;
				<!--     <table>	
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
							<tr><td class="_cell_header _xls_cell">&nbsp;</td></tr>
						</table> -->
					</td>
</table>

<p>&nbsp;</p>
<?php endforeach; ?>
<!--end container-->
<!--end table static_frame-->

</div>

