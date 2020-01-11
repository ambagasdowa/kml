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
		<div></div>

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

		<div></div>

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
		<?php $providersViewRelations ? : e('<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
						<strong>No se encontraron Registros Asociados </strong>
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

			<!-- <div id="print" class="pull-right"> -->
				<!-- <i class="fa fa-print" aria-hidden="true"></i> -->
			<!-- </div> -->
		</div>

	</div>
<!--
	<div class="row">
 	 <div class="twelve columns">
 		 <div id="chart" class="chart" >
 					 <div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">

 					 </div>
 		 </div>
 	 </div>
  </div> -->

<div class="con">
<div id="cont" style="height: 10px; margin: 0 auto"></div>
</div>


<div class="row">

 </div>

 <?php
			 echo $this->Form->create(
																 'ProvidersControlsFile'
																 ,array(
																				 'enctype' => 'multipart/form-data'
																				 ,'class'=>'form'
																				 ,'id'=>'tform'
																			 )
																 );
 ?>

<div id="first-datatable-output" class="table-responsive">

		<table id="table_res" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>BatNbr</th>
				<th>CpnyID</th>
				<th>Status</th>
				<!-- <th>Module</th> -->
				<!-- <th>JrnlType</th> -->
				<!-- <th>ap_status</th> -->
				<th>VendId</th>
				<!-- <th>PerPost</th> -->
				<th>PONbr</th>
				<th>RefNbr</th>
				<!-- <th>DocType</th> -->
				<!-- <th>DocDesc</th> -->
				<th>Fecha</th>
				<th>Factura</th>
				<th>name</th>
				<th>xml</th>
				<th>voucher</th>
				<th>order</th>
				<!-- <th>Acct</th> -->
				<th>totalAmt</th>
				<th>UUID</th>
				<!-- <th>a</th> -->
				<!-- <th>b</th> -->
				<th>x</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ($providersViewRelations as $key => $providersViewRelation) {
			// code...
		?>

		<tr>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['id']; ?></td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['BatNbr']; ?></td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['CpnyID']; ?></td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['Status']; ?></td>
			<!-- <td><?php echo $providersViewRelation['ProvidersViewRelation']['Module']; ?></td> -->
			<!-- <td><?php echo $providersViewRelation['ProvidersViewRelation']['JrnlType']; ?></td> -->
			<!-- <td><?php echo $providersViewRelation['ProvidersViewRelation']['ap_status']; ?></td> -->
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['VendId']; ?></td>
			<!-- <td><?php echo $providersViewRelation['ProvidersViewRelation']['PerPost']; ?></td> -->
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['PONbr']; ?></td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['RefNbr']; ?></td>
			<!-- <td><?php echo $providersViewRelation['ProvidersViewRelation']['DocType']; ?></td> -->
			<!-- <td><?php echo $providersViewRelation['ProvidersViewRelation']['DocDesc']; ?></td> -->
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['InvDate']; ?></td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['InvcNbr']; ?></td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['name']; ?></td>

			<!-- <td><?php echo $providersViewRelation['ProvidersViewRelation']['xml']; ?></td> -->
			<td id="xml_<?php echo $providersViewRelation['ProvidersViewRelation']['BatNbr'];?>">
				<?php
					if ($providersViewRelation['ProvidersViewRelation']['xml']) {
						// code...
						// echo $providersViewRelation['ProvidersViewRelation']['xml'];
						echo '<i class="fa fa-file-text"></i>';
					} else {
					echo '<label class="fileContainer"><i class="fa fa-upload"></i>';
					echo
								$this->Form->File
																	(
																		'Providers'.$providersViewRelation['ProvidersViewRelation']['BatNbr'].'xml',
																		 array
																					(
																						'type'=>'file',
																						// 'class'=>'xls u-full-width form-control',
																						'width'=>'60',
																						'id'=>'upload_xml_'.trim($providersViewRelation['ProvidersViewRelation']['BatNbr']),
																						'name'=>'xml_'.trim($providersViewRelation['ProvidersViewRelation']['BatNbr']).'_'.trim($providersViewRelation['ProvidersViewRelation']['CpnyID']).'_'.trim($providersViewRelation['ProvidersViewRelation']['RefNbr']).'_'.'1',
																						'data-id'=>$providersViewRelation['ProvidersViewRelation']['BatNbr'],
																						'data-refnbr'=>$providersViewRelation['ProvidersViewRelation']['RefNbr'],
																						'data-ponbr'=>$providersViewRelation['ProvidersViewRelation']['PONbr'],
																						'data-vendid'=>$providersViewRelation['ProvidersViewRelation']['vendid'],
																						'data-CpnyId'=>$providersViewRelation['ProvidersViewRelation']['CpnyID'],
																						'data-type'=>'xml',
																						'data-id'=>$providersViewRelation['ProvidersViewRelation']['id'],
																						'placeholder' => 'Archivo Xml',
																						// 'value'=>$providersViewRelation['ProvidersViewRelation']['IdPedido'],
																						// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																						'div'=>FALSE,
																						'label'=>FALSE
																						// 'options'=>array(1=>'ATSA IZUCAR - SIVESA ORIZABA',2=>'ATSA MIXQUI - SIVESA ORIZABA',3=>'CALIZA MIXQUI - FANAL TULTITLAN'),
																						// 'tabindex'=>'2'
																					)
																	);
						// echo $this->Form->file('ProvidersControlsFile.45645.xml', array('type'=>'file','label'=>false));
					}
					echo '</label>';
				?>
				<!-- <input type="submit" value="submit"/> -->
			</td>
			<td>
				<?php
					if ($providersViewRelation['ProvidersViewRelation']['voucher']) {
						// code...
						// echo $providersViewRelation['ProvidersViewRelation']['voucher'];
						echo '<i class="fa fa-file-pdf-o"></i>';
					} else {
						echo '<label class="fileContainer"><i class="fa fa-upload"></i>';
						echo
									$this->Form->File
																		(
																			'Providers'.$providersViewRelation['ProvidersViewRelation']['BatNbr'].'pdf',
																			 array
																						(
																							'type'=>'file',
																							// 'class'=>'xls u-full-width form-control',
																							'width'=>'60',
																							'id'=>'upload_pdf_'.$providersViewRelation['ProvidersViewRelation']['BatNbr'],
																							'name'=>'voucher_'.trim($providersViewRelation['ProvidersViewRelation']['BatNbr']).'_'.trim($providersViewRelation['ProvidersViewRelation']['CpnyID']).'_'.trim($providersViewRelation['ProvidersViewRelation']['RefNbr']).'_'.'2',
																							'data-id'=>'voucher_'.$providersViewRelation['ProvidersViewRelation']['BatNbr'],
																							'data-refnbr'=>$providersViewRelation['ProvidersViewRelation']['RefNbr'],
																							'data-ponbr'=>$providersViewRelation['ProvidersViewRelation']['PONbr'],
																							'data-vendid'=>$providersViewRelation['ProvidersViewRelation']['vendid'],
																							'data-CpnyId'=>$providersViewRelation['ProvidersViewRelation']['CpnyID'],
																							'data-type'=>'pdf',
																							'data-id'=>$providersViewRelation['ProvidersViewRelation']['id'],
																							'placeholder' => 'Archivo pdf',
																							// 'value'=>$providersViewRelation['ProvidersViewRelation']['IdPedido'],
																							// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																							// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE
																							// 'options'=>array(1=>'ATSA IZUCAR - SIVESA ORIZABA',2=>'ATSA MIXQUI - SIVESA ORIZABA',3=>'CALIZA MIXQUI - FANAL TULTITLAN'),
																							// 'tabindex'=>'2'
																						)
																		);
							// echo $this->Form->file('ProvidersControlsFile.45645.xml', array('type'=>'file','label'=>false));
						}
						echo '</label>';
				?>
			</td>
			<td>
				<?php
					if ($providersViewRelation['ProvidersViewRelation']['order']) {
						// code...
						// echo $providersViewRelation['ProvidersViewRelation']['order'];
						echo '<i class="fa fa-file-pdf-o"></i>';
					} else {
						echo '<label class="fileContainer"><i class="fa fa-upload"></i>';
						echo
									$this->Form->File
																		(
																			'Providers'.$providersViewRelation['ProvidersViewRelation']['BatNbr'].'xml',
																			 array
																						(
																							'type'=>'file',
																							// 'class'=>'xls u-full-width form-control',
																							'width'=>'60',
																							'id'=>'upload_order_'.$providersViewRelation['ProvidersViewRelation']['BatNbr'],
																							'name'=>'order_'.trim($providersViewRelation['ProvidersViewRelation']['BatNbr']).'_'.trim($providersViewRelation['ProvidersViewRelation']['CpnyID']).'_'.trim($providersViewRelation['ProvidersViewRelation']['RefNbr']).'_'.'3',
																							'data-id'=>'order_'.$providersViewRelation['ProvidersViewRelation']['BatNbr'],
																							'data-refnbr'=>$providersViewRelation['ProvidersViewRelation']['RefNbr'],
																							'data-ponbr'=>$providersViewRelation['ProvidersViewRelation']['PONbr'],
																							'data-vendid'=>$providersViewRelation['ProvidersViewRelation']['vendid'],
																							'data-CpnyId'=>$providersViewRelation['ProvidersViewRelation']['CpnyID'],
																							'data-type'=>'pdf',
																							'data-id'=>$providersViewRelation['ProvidersViewRelation']['id'],
																							'placeholder' => 'Archivo Pdf',
																							// 'value'=>$providersViewRelation['ProvidersViewRelation']['IdPedido'],
																							// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																							// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE
																							// 'options'=>array(1=>'ATSA IZUCAR - SIVESA ORIZABA',2=>'ATSA MIXQUI - SIVESA ORIZABA',3=>'CALIZA MIXQUI - FANAL TULTITLAN'),
																							// 'tabindex'=>'2'
																						)
																		);
							// echo $this->Form->file('ProvidersControlsFile.45645.xml', array('type'=>'file','label'=>false));
						}
						echo '</label>';
				?>
			</td>
			<!-- <td><?php echo $providersViewRelation['ProvidersViewRelation']['Acct']; ?></td> -->
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['totalAmt']; ?></td>
			<td><?php echo $providersViewRelation['ProvidersViewRelation']['UUID']; ?></td>


			<td id="link_<?php echo $providersViewRelation['ProvidersViewRelation']['BatNbr'];?>">
				<?php
					// if (isset($providersViewRelation['ProvidersViewRelation']['IdPedido']) && isset($providersViewRelation['ProvidersViewRelation']['Albaran'])) {
						// code...
							echo
										$this->Html->link('Subir'
									,array(
													 'controller'=>'ProvidersControlsFile'
													,'action' => 'upload'
													// ,'xml_string'=>$providersViewRelation['ProvidersViewRelation']['addenum']
												  // ,'id'=>$providersViewRelation['ProvidersViewRelation']['BatNbr']
												  // ,'standings_name'=>$providersViewRelation['ProvidersViewRelation']['BatNbr'].'_'.$providersViewRelation['ProvidersViewRelation']['no_remision']
													// ,'sort'=>'id'
													// ,'direction'=>'asc'
												)
										,array(
													// 'target'=>'_blank'
													'id'=>'upload_'.$providersViewRelation['ProvidersViewRelation']['BatNbr'],
													'data-id'=>$providersViewRelation['ProvidersViewRelation']['BatNbr'],
													// ,'data-addenum'=>$providersViewRelation['ProvidersViewRelation']['addenum']
													'data-name' => $providersViewRelation['ProvidersViewRelation']['BatNbr'].'_'.$providersViewRelation['ProvidersViewRelation']['no_remision'],
												)
						);
					// } else {
					// 	echo '';
					// }
				?>
			</td>

		</tr>
	<?php }//endforeach; ?>
		</tbody>
		<?php /*
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
		*/?>
		</table>
</div>

<?php
			// echo $this->Form->end(__('Submit', true));
			echo $this->Form->end();
?>
