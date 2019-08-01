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
		<?php $rendViewFullGstCoreIndicators ? : e('<div class="alert alert-success alert-dismissible fade in" role="alert">
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
// echo '<div class="two columns"><i class="fa fa-barcode"></i></div>';
echo '<div class="two columns"></div>';
echo
			$this->Form->input
												(
													'searchbox',
													 array
																(
																	'type'=>'text',
																	'class'=>'search_udn u-full-width form-control',
																	'id'=>'myInput',
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


		<table id="table_show" class="display order-table table table-bordered table-hover table-striped responstable">
		<thead>
			<tr>
				<!-- <th><?php echo $this->Paginator->sort('xml');?></th> -->
				<!-- <th><?php echo $this->Paginator->sort('pdf');?></th> -->
				<th><?php echo $this->Paginator->sort('index');?></th>
				<th><?php echo $this->Paginator->sort('RefNbr');?></th>
				<th><?php echo $this->Paginator->sort('BatNbr');?></th>
				<th><?php echo $this->Paginator->sort('no_remision');?></th>
				<!-- <th><?php echo $this->Paginator->sort('@xsi:schemaLocation');?></th> -->
				<th><?php echo $this->Paginator->sort('eu:TipoFactura/eu:IdFactura');?></th>
				<th><?php echo $this->Paginator->sort('eu:TipoFactura/eu:Version');?></th>
				<th><?php echo $this->Paginator->sort('eu:TipoFactura/eu:FechaMensaje');?></th>
				<th><?php echo $this->Paginator->sort('eu:TipoTransaccion/eu:IdTransaccion');?></th>
				<th><?php echo $this->Paginator->sort('eu:TipoTransaccion/eu:Transaccion');?></th>
				<th><?php echo $this->Paginator->sort('eu:OrdenesCompra/eu:Secuencia/@consec');?></th>
				<th><?php echo $this->Paginator->sort('eu:OrdenesCompra/eu:Secuencia/eu:IdPedido');?></th>
				<th><?php echo $this->Paginator->sort('eu:OrdenesCompra/eu:Secuencia/eu:EntradaAlmacen/eu:Albaran');?></th>
				<th><?php echo $this->Paginator->sort('eu:Moneda/eu:MonedaCve');?></th>
				<th><?php echo $this->Paginator->sort('eu:Moneda/eu:TipoCambio');?></th>
				<th><?php echo $this->Paginator->sort('eu:Moneda/eu:SubtotalM');?></th>
				<th><?php echo $this->Paginator->sort('eu:Moneda/eu:TotalM');?></th>
				<th><?php echo $this->Paginator->sort('eu:Moneda/eu:ImpuestoM');?></th>
				<th><?php echo $this->Paginator->sort('eu:ImpuestosR/eu:BaseImpuesto');?></th>
				<!-- <th><?php echo $this->Paginator->sort('CadenaOriginal');?></th> -->
				<th><?php echo $this->Paginator->sort('no_guia');?></th>
				<th><?php echo $this->Paginator->sort('no_viaje');?></th>
				<th><?php echo $this->Paginator->sort('subtotal');?></th>
				<th><?php echo $this->Paginator->sort('desc_flete');?></th>
				<th><?php echo $this->Paginator->sort('observacion');?></th>
				<th><?php echo $this->Paginator->sort('FlagIsDisminution');?></th>
				<th><?php echo $this->Paginator->sort('FlagIsProvision');?></th>
				<th><?php echo $this->Paginator->sort('status_guia');?></th>
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
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['index']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['RefNbr']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['BatNbr']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_remision']; ?>&nbsp;</td>
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['@xsi:schemaLocation']; ?>&nbsp;</td> -->
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:TipoFactura/eu:IdFactura']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:TipoFactura/eu:Version']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:TipoFactura/eu:FechaMensaje']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:TipoTransaccion/eu:IdTransaccion']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:TipoTransaccion/eu:Transaccion']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:OrdenesCompra/eu:Secuencia/@consec']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:OrdenesCompra/eu:Secuencia/eu:IdPedido']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:OrdenesCompra/eu:Secuencia/eu:EntradaAlmacen/eu:Albaran']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:Moneda/eu:MonedaCve']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:Moneda/eu:TipoCambio']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:Moneda/eu:SubtotalM']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:Moneda/eu:TotalM']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:Moneda/eu:ImpuestoM']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['eu:ImpuestosR/eu:BaseImpuesto']; ?>&nbsp;</td>
			<!-- <td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['CadenaOriginal']; ?>&nbsp;</td> -->
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_guia']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['no_viaje']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['subtotal']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['desc_flete']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['observacion']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['FlagIsDisminution']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['FlagIsProvision']; ?>&nbsp;</td>
			<td><?php echo $addenumViewAlbaranRelation['AddenumViewAlbaranRelation']['status_guia']; ?>&nbsp;</td>

		</tr>
	<?php }//endforeach; ?>
		</tbody>
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
		</table>
</div>
