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
			<!-- <input type="text" id="kwd_search" value="" placeholder="Buscar"/> -->

			<!-- <a id="details" class="button button-primary" href="#">Totales</a>

			<a id="charting" class="button button-primary" href="#">Graficas</a>

			<a id="upd_checkboxes" class="button button-primary" href="#">Guardar</a> -->

			<div id="print" class="pull-right">
				<i class="fa fa-print" aria-hidden="true"></i>
			</div>
		</div>

	</div>



<div id="first-datatable-output" class="table-responsive">


		<table class="order-table table table-bordered table-hover table-striped responstable">
		<thead>
			<tr>
					<th><?php echo 'Cuenta';?></th>
					<!-- <th><?php echo 'Entidades';?></th> -->
					<!-- <th><?php echo 'Empresa';?></th> -->
					<th><?php echo 'UnidadNegocio';?></th>
					<!-- <th><?php echo 'Descripción';?></th> -->
					<th><?php echo 'TranDesc';?></th>
					<th><?php echo 'Periodo';?></th>
					<th><?php echo 'ExtRefNbr';?></th>
					<!-- <th><?php echo 'User1';?></th> -->
					<th><?php echo 'Empleado';?></th>
					<th><?php echo 'BatNbr';?></th>
					<!-- <th><?php echo 'Name';?></th> -->
					<th><?php echo 'Funcionario';?></th>
					<th><?php echo 'Inicial';?></th>
					<th><?php echo 'Cargo';?></th>
					<th><?php echo 'Crédito';?></th>
					<th><?php echo 'Final';?></th>
			</tr>
		</thead>
		<?php
		foreach ($balanzaViewUdnsRpts as $balanzaViewUdnsRpt):
		?>
		<tr>
				<td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Cuenta']; ?>&nbsp;</td>
				<!-- <td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Entidades']; ?>&nbsp;</td> -->
				<!-- <td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Empresa']; ?>&nbsp;</td> -->
				<td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['UnidadNegocio']; ?>&nbsp;</td>
				<!-- <td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Descripción']; ?>&nbsp;</td> -->
				<td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['TranDesc']; ?>&nbsp;</td>
				<td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Periodo']; ?>&nbsp;</td>
				<td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['ExtRefNbr']; ?>&nbsp;</td>
				<!-- <td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['User1']; ?>&nbsp;</td> -->
				<td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Empleado']; ?>&nbsp;</td>
				<td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['BatNbr']; ?>&nbsp;</td>
				<!-- <td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Name']; ?>&nbsp;</td> -->
				<td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Funcionario']; ?>&nbsp;</td>
				<td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Inicial']; ?>&nbsp;</td>
				<td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Cargo']; ?>&nbsp;</td>
				<td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Crédito']; ?>&nbsp;</td>
				<td><?php echo $balanzaViewUdnsRpt['BalanzaViewUdnsRpt']['Final']; ?>&nbsp;</td>
		</tr>
	<?php endforeach; ?>
		</table>
</div>

<!-- if clients -->
<script type="text/javascript">
		$(document).ready(function(){

		});
</script>
