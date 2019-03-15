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

			<!-- <div <?php // $user_mod ? print 'id="noprint" style="display:none;"' : print 'id="print"' ; ?> class="pull-right">
				<i class="fa fa-print" aria-hidden="true"></i>
			</div> -->
		</div>

	</div>


	<div class="row">
 	 <div class="twelve columns">
 		 <div id="chart" class="chart" style="display:none;" >
 					 <div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">
 						 <!-- graphics -->
 					 </div>
 		 </div>
 	 </div>
  </div>

<div class="con">
<div id="cont" style="height: 20px; margin: 0 auto"></div>
</div>


<div class="row">
<?php
// echo '<div class="two columns"><i class="fa fa-barcode"></i></div>';
// echo '<div class="two columns"></div>';
// echo
// 			$this->Form->input
// 												(
// 													'searchbox',
// 													 array
// 																(
// 																	'type'=>'text',
// 																	'class'=>'search_udn u-full-width form-control',
// 																	'id'=>'FilterAll',
// 																	'placeholder' => 'Filtro General',
// 																	// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
// 																	// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
// 																	'div'=>FALSE,
// 																	'label'=>FALSE,
// 																	// 'options'=>array(1=>'ATSA IZUCAR - SIVESA ORIZABA',2=>'ATSA MIXQUI - SIVESA ORIZABA',3=>'CALIZA MIXQUI - FANAL TULTITLAN'),
// 																	'tabindex'=>'2'
// 																)
// 												);
// 	echo '</div>';
 ?>
 </div>


<div id="first-datatable-output" class="table-responsive">

		<table id="table_grp" class="display order-table table table-bordered table-hover table-striped responstable">
			<thead>
				<?php if ($model_id == 0) { ?>
					<th>area</th>
					<th>flete</th>
					<th>subtotal</th>
					<th>iva</th>
					<th>retencion</th>
					<th>total</th>
					<th>periodo</th>
				<?php } else if ($model_id == 1) { ?>
					<!-- <th>id</th> -->
					<!-- <th>id_area</th> -->
					<th>area</th>
					<th>viajes</th>
					<!-- <th>id_seguimiento</th> -->
					<th>TipoViaje</th>
					<th>periodo</th>
				<?php	}	?>
			</thead>
			<tbody>
				<?php
					foreach ($resumenViewGrands as $key => $resumenViewGrand) {
				?>
				<tr>
					<?php if ($model_id == 0) { ?>
						<td><?php echo $resumenViewGrand['ResumenViewMontofacturadoMensualGstIndicator']['area']; ?></td>
						<td><?php echo $resumenViewGrand['ResumenViewMontofacturadoMensualGstIndicator']['flete']; ?></td>
						<td><?php echo $resumenViewGrand['ResumenViewMontofacturadoMensualGstIndicator']['subtotal']; ?></td>
						<td><?php echo $resumenViewGrand['ResumenViewMontofacturadoMensualGstIndicator']['iva']; ?></td>
						<td><?php echo $resumenViewGrand['ResumenViewMontofacturadoMensualGstIndicator']['retencion']; ?></td>
						<td><?php echo $resumenViewGrand['ResumenViewMontofacturadoMensualGstIndicator']['total']; ?></td>
						<td><?php echo $resumenViewGrand['ResumenViewMontofacturadoMensualGstIndicator']['periodo']; ?></td>
					<?php } else if ($model_id == 1) { ?>
						<!-- <td><?php echo $resumenViewGrand['ResumenViewViajesMensualGstIndicator']['id']; ?></td> -->
						<!-- <td><?php echo $resumenViewGrand['ResumenViewViajesMensualGstIndicator']['id_area']; ?></td> -->
						<td><?php echo $resumenViewGrand['ResumenViewViajesMensualGstIndicator']['area']; ?></td>
						<td><?php echo $resumenViewGrand['ResumenViewViajesMensualGstIndicator']['viajes']; ?></td>
						<!-- <td><?php echo $resumenViewGrand['ResumenViewViajesMensualGstIndicator']['id_seguimiento']; ?></td> -->
						<td><?php echo $resumenViewGrand['ResumenViewViajesMensualGstIndicator']['TipoViaje']; ?></td>
						<td><?php echo $resumenViewGrand['ResumenViewViajesMensualGstIndicator']['periodo']; ?></td>
					<?php	}	?>
				</tr>
				<?php } ?>
			</tbody>
			<!-- <tfoot>

			</tfoot> -->
		</table>



		<table id="table_det" class="display order-table table table-bordered table-hover table-striped responstable">
		<thead>
			<tr>
				<?php if ($model_id == 0) { ?>
					<!-- <th>id</th> -->
					<!-- <th>id_area</th> -->
					<th>area</th>
					<th>flete</th>
					<th>subtotal</th>
					<th>iva</th>
					<th>retencion</th>
					<th>total</th>
					<th>unidad</th>
					<th>periodo</th>
				<?php } else if ($model_id == 1) { ?>
					<!-- <th>id</th> -->
					<!-- <th>id_area</th> -->
					<th>area</th>
					<th>viajes</th>
					<th>TipoViaje</th>
					<th>periodo</th>
					<!-- <th>id_destino</th> -->
					<th>poblacion</th>
				<?php	}	?>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ($resumenViewDetails as $key => $resumenViewDetail) {
		?>
		<tr>
			<?php if ($model_id == 0) { ?>
				<!-- <td><?php echo $resumenViewDetail['ResumenViewMontofacturadoUnidadGstIndicator']['id']; ?></td> -->
				<!-- <td><?php echo $resumenViewDetail['ResumenViewMontofacturadoUnidadGstIndicator']['id_area']; ?></td> -->
				<td><?php echo $resumenViewDetail['ResumenViewMontofacturadoUnidadGstIndicator']['area']; ?></td>
				<td><?php echo $resumenViewDetail['ResumenViewMontofacturadoUnidadGstIndicator']['flete']; ?></td>
				<td><?php echo $resumenViewDetail['ResumenViewMontofacturadoUnidadGstIndicator']['subtotal']; ?></td>
				<td><?php echo $resumenViewDetail['ResumenViewMontofacturadoUnidadGstIndicator']['iva']; ?></td>
				<td><?php echo $resumenViewDetail['ResumenViewMontofacturadoUnidadGstIndicator']['retencion']; ?></td>
				<td><?php echo $resumenViewDetail['ResumenViewMontofacturadoUnidadGstIndicator']['total']; ?></td>
				<td><?php echo $resumenViewDetail['ResumenViewMontofacturadoUnidadGstIndicator']['unidad']; ?></td>
				<td><?php echo $resumenViewDetail['ResumenViewMontofacturadoUnidadGstIndicator']['periodo']; ?></td>
			<?php } else if ($model_id == 1) { ?>
				<!-- <td><?php echo $resumenViewDetail['ResumenViewViajesMensualpoblacionGstIndicator']['id']; ?></td> -->
				<!-- <td><?php echo $resumenViewDetail['ResumenViewViajesMensualpoblacionGstIndicator']['id_area']; ?></td> -->
				<td><?php echo $resumenViewDetail['ResumenViewViajesMensualpoblacionGstIndicator']['area']; ?></td>
				<td><?php echo $resumenViewDetail['ResumenViewViajesMensualpoblacionGstIndicator']['viajes']; ?></td>
				<td><?php echo $resumenViewDetail['ResumenViewViajesMensualpoblacionGstIndicator']['TipoViaje']; ?></td>
				<td><?php echo $resumenViewDetail['ResumenViewViajesMensualpoblacionGstIndicator']['periodo']; ?></td>
				<!-- <td><?php echo $resumenViewDetail['ResumenViewViajesMensualpoblacionGstIndicator']['id_destino']; ?></td> -->
				<td><?php echo $resumenViewDetail['ResumenViewViajesMensualpoblacionGstIndicator']['poblacion']; ?></td>
			<?php	}	?>
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

});
</script>
