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
//warning
// pr($warning);


// exit();
	header ("Expires: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/vnd.ms-excel");
	header ("Content-Disposition: attachment; filename=Rentabilidad".$standings_name.".xls" );
	header ("Content-Description: Exported as XLS" );

// pr($warning);exit();
?>

								<style>
                  /* NOTE tabular section */
										.wrap {
											display: flex;
										/*	display:inline-block; */
											align-items: center;
										/*  justify-content: center;*/
											overflow:auto;
										}

										.main_table {
										/*  border: 1px solid #555;*/
												border: 1px solid #000;
											/*	display:flex;*/
										}

										.main{
											white-space: nowrap;
										}

										.sum {
											width:90px;
											
										}
										.left{
											align-items:left;
										}
                </style>



<table class="main">
	

	<?php foreach ($rentabilidadViewMainLiquidations as $unidad => $liquidacion): ?>
<td> 
<table id="main_container_<?php echo $unidad ?>" class="main_table">

				<tr>	
					<td colspan="<?php echo $tds+2 ?>">
							<b><?php echo $unidad; ?></b>
					</td>
				</tr>

		<!--insert by Bsu-->
				<td>
					<table id="left_menu">
						<!--	<tr><td>Unidad</td></tr> -->
							<tr><td>Unidad de Negocio</td></tr>
							<tr><td>Liquidacion</td></tr>
							<tr><td>Viajes</td></tr>
							<tr><td>Dias de Viaje</td></tr>
							<tr><td>Duracion en d&iacute;as</td></tr>
							<tr><td>Kms Camion Lleno</td></tr>
							<tr><td>Kms Camion Vacio</td></tr>
							<tr><td>QtyCombustible</td></tr>
							<tr><td>Rendimiento Reseteo</td></tr>
							<tr><td>Rendimiento Calculado</td></tr>
							<tr><td>Ingreso Total Ruta</td></tr>
							<tr><td>Combustible</td></tr>
							<tr><td>Casetas</td></tr>
							<tr><td>ConceptosSueldo</td></tr>
							<tr><td>Otros</td></tr>
							<tr><td>Costo Directo del Viaje</td></tr>			
						</table>
				</td>



		<?php foreach ($liquidacion as $no_liquidacion => $rentabilidadViewMainLiquidation): ?>

				<td id="main_content_<?php echo $no_liquidacion ?>">

					<table id="<?php echo $no_liquidacion?>" width="100%">

				<!--			<tr><td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['Unidad']; ?>&nbsp;</td></tr> -->
							<tr><td colspan="2"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['UnidadNegocio']; ?>&nbsp;</td></tr>
							<tr><td colspan="2"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['liquidacion']; ?>&nbsp;</td></tr>
							<tr><td colspan="2"><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['viajes']; ?>&nbsp;</td></tr>
							<tr>
									<td>
										<?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['del']; ?>
									</td>
									<td>
										<?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['al'];?>
									</td>
							</tr>

							<tr><td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['DuracionViaje']; ?>&nbsp;</td><td>&nbsp;</td></tr> 
							<tr><td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCaminoLleno']; ?>&nbsp;</td><td>&nbsp;</td></tr>
							<tr><td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCamionVacio']; ?>&nbsp;</td><td>&nbsp;</td></tr>
							<tr><td><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyCombustible'] ,2 ,'.' ,',' ); ?>&nbsp;</td><td>&nbsp;</td></tr>
							<tr><td><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['rendimiento_reseteo'] ,2 ,'.' ,',' ); ?>&nbsp;</td><td>&nbsp;</td></tr>
							<tr><td><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['RendViaje'] ,2 ,'.' ,',' ); ?>&nbsp;</td><td>&nbsp;</td></tr>
							<tr><td><?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['IngresoTotalRuta'] ,2 ,'.' ,',' ); ?>&nbsp;</td><td>&nbsp;</td></tr>

							<tr>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['COMBUSTIBLE'] ,2 ,'.' ,',' ); ?>
								</td>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_combustible'] ,2 ,'.' ,',' ) . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CASETAS'],2,'.',','); ?>
								</td>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_casetas'],2,'.',',') . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CONCEPTOS_SUELDO'],2,'.',','); ?>
								</td>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_conceptos_sueldo'],2,'.',',') . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['OTROS'],2,'.',','); ?>
								</td>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_otros'],2,'.',',') . ' %'; ?>
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CostoDirectoViaje'],2,'.',','); ?>
								</td>
								<td>
										<?php echo number_format($rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['percent_CostoDirectoViaje'],2,'.',',') . ' %'; ?>
								</td>
							</tr>				
<!-- Until hir is the work -->
						</table>
				  </td>

		<?php endforeach; ?>

					<td>
						<table>
							<tr><td colspan="2">SUMA</td></tr>
							<tr><td colspan="2">&nbsp;</td></tr>
							<tr><td colspan="2"><?php echo $sum_data[$unidad]['viajes'] ?> </td></tr>
							<tr><td colspan="2">&nbsp;</td></tr>
							<tr><td class="left"> <?php echo $sum_data[$unidad]['DuracionViaje'] ?></td><td>&nbsp;</td></tr>
							<tr><td class="left"> <?php echo $sum_data[$unidad]['KmsCaminoLleno'] ?></td><td>&nbsp;</td></tr>
							<tr><td class="left"> <?php echo $sum_data[$unidad]['KmsCamionVacio'] ?></td><td>&nbsp;</td></tr>
							<tr><td class="left"> <?php echo number_format ($sum_data[$unidad]['qtyCombustible'],2,'.',',') ?> </td><td>&nbsp;</td></tr>
							<tr><td class="left"> <?php echo number_format ($sum_data[$unidad]['rendimiento_reseteo']/$tds,2,'.',',') ?> </td><td>&nbsp;</td></tr>
							<tr><td class="left"> <?php echo number_format (($sum_data[$unidad]['KmsCaminoLleno']+$sum_data[$unidad]['KmsCamionVacio'])/$sum_data[$unidad]['qtyCombustible'],2,'.',',') ?> </td><td>&nbsp;</td></tr>
							<tr><td class="left"> <?php echo number_format ($sum_data[$unidad]['IngresoTotalRuta'],2,'.',',') ?></td><td>&nbsp;</td></tr>
							<tr>
								<td>
										<?php echo number_format($sum_data[$unidad]['Combustible'],2,'.',',') ?></td>
								<td class="sum">
										<?php echo number_format( ( ($sum_data[$unidad]['Combustible'] / $sum_data[$unidad]['IngresoTotalRuta']) * 100 ),2,'.',',') . ' %'; ?> &nbsp;
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format( $sum_data[$unidad]['Casetas'],2,'.',',') ?>
								</td>
								<td class="sum">
										<?php echo number_format( ( ( $sum_data[$unidad]['Casetas'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ,2,'.',',') .' %'; ?> &nbsp;
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format($sum_data[$unidad]['ConceptosSueldo'],2,'.',',') ?>
								</td>
								<td class="sum">
										<?php echo number_format( ( ( $sum_data[$unidad]['ConceptosSueldo'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ,2,'.',',') . ' %'; ?> &nbsp;
								</td>
							</tr>
							<tr>
								<td>
										<?php echo number_format($sum_data[$unidad]['Otros'],2,'.',',') ?>
								</td>
								<td class="sum">
										<?php echo number_format( ( ( $sum_data[$unidad]['Otros'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ,2,'.',',') . ' %'; ?> &nbsp;
								</td> 
							</tr>

							<tr>
								<td>
										<?php echo number_format($sum_data[$unidad]['CostoDirectoViaje'] ,2,'.',','); ?>
								</td>
								<td class="sum">
										<?php echo number_format( ( ( $sum_data[$unidad]['CostoDirectoViaje'] / $sum_data[$unidad]['IngresoTotalRuta'] ) * 100 ) ,2,'.',',') . ' %'; ?>&nbsp;
								</td> 
							</tr>

						</table>
					</td>

</table>

<p>&nbsp;</p>
</td>
<?php endforeach; ?>


</table>
