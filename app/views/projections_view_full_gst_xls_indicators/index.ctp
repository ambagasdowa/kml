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
		// $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
		// $requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
		$requiere = $evaluate ? e($this->element('kml/rentabilidad/rentabilidad')) : e($this->element('requiere/norequiere') );
		?>

		<!-- temporal style  -->

		<style media="screen">

		.ninja-scroll {
			scroll-behavior: smooth;
			overflow-x: auto;
			/*overflow-y: auto;*/
		}
		.avg {
			font-style: italic;
			text-decoration: overline;
		}

		select::-ms-expand {
			display: none;
		}

		.detail_header {
			display: none;
		}

		.head_datetime{
			display: none;
		}

		.container-mod{
			position: relative;
			width: 100%;
			max-width: 95%;
			margin: 0 auto;
			padding: 0 20px;
			box-sizing: border-box;
		}

		.colorbax {
			position: relative;
			width: 100%;
			min-width: 95%;
			margin: 0 auto;
			padding: 0 20px;
			box-sizing: border-box;
		}

		.current {
			display: inline-block;  /* For IE11/ MS Edge bug */
			pointer-events: none;
			cursor: default;
			color:gray !important;
			text-decoration: none;
		}

		.current > a {
		  color: gray !important;
		  display: inline-block;  /* For IE11/ MS Edge bug */
		  pointer-events: none;
		  text-decoration: none;
		}

		/**PAGINATOR STYLE*/
		.easyPaginateNav{
			position: fixed;
			bottom: 1%;
			left: 35%;
			cursor: pointer;
			z-index:150;
		}

		.icon{
		  transition:all 0.5s;
		  opacity:0;
		}

		.link_external:hover .icon{
		  opacity:1;
		}


		</style>


		<div class="container-mod">

					<div class="row">
							<div class="twelve columns ">
								<h6 class="docs-header">Reporter</h6>
						</div>
					</div>

		</div>




		<div class="container-mod">
<!-- ['BalanzaViewUdnsRpt']['Empleado'] -->
					<div class="row">
						<?php echo $this->Form->create('ProjectionsViewFullGstXlsIndicators',array('enctype' => 'multipart/form-data','class'=>'form','id'=>'pform'));?>

						<?php

						echo '<div class="two columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>';
						echo
									$this->Form->input
																		(
																			'dateini',
																			 array
																						(
																							'type'=>'text',
																							// 'class'=>'performance_dateini u-full-width form-control init-focus',
																							'class'=>'performance_dateini datepicker ll-skin-melon u-full-width form-control',
																							'id'=>'inserted',
																							'data-toggle'=>'datepicker',
																							'placeholder' => 'Fecha',
																							'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'tabindex'=>'1'
																						)
																		);
						echo '</div>';

						echo '<div class="two columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>';
						echo
									$this->Form->input
																		(
																			'dateend',
																			 array
																						(
																							'type'=>'text',
																							// 'class'=>'performance_dateini u-full-width form-control init-focus',
																							'class'=>'performance_dateend datepicker ll-skin-melon u-full-width form-control',
																							'id'=>'inserted',
																							'data-toggle'=>'datepicker',
																							'placeholder' => 'Fecha',
																							'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							'tabindex'=>'1'
																						)
																		);
						echo '</div>';

						?>


						<?php
						echo '<div class="two columns input-group">';
						echo '<div class="input-group-addon"><i class="fa fa-barcode"></i></div>';
						echo
									$this->Form->input
																		(
																			'id_area',
																			 array
																						(
																							'type'=>'select',
																							'class'=>'search_udn u-full-width form-control',
																							'id'=>'to',
																							'style'=>'width:100%;',
																							'placeholder' => 'Unidad de Negocio',
																							'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
								                              'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							// 'empty' => 'TODO',
																							'options'=>$bssus,
																							'tabindex'=>'2'
																						)
																		);
							echo '</div>';

						?>

						<!-- <div class="row"> -->
							<div class="label one columns input-group">
								<?php
											echo
													$this->Html->link(
																							__('Buscar ...', true),
																							array('action' => 'get', null),
																							array('id'=>'send_query','div'=>false,'class'=>'btn btn-primary btn-sm pull-right','tabindex'=>'6')
																						);
								?>
							</div>
						<!-- </div> -->
					</div>

				</div>
				<!--container-->

				<div id="breakspace" class="">
					&nbsp;
				</div>

				<div id="printThis" class="container-mod ninja-scroll">
					<div id="updateSearchResult" class="updateSearchResult"></div>
				</div>


				<div id="breakspace" class="">
					&nbsp;
				</div>

	<script type="text/javascript">


		  $(document).ready(function () {

				$('[data-toggle="datepicker"]').datepicker(options_datepicker);

				$(".search_udn").select2();

					$("#send_query").on('click', function(event) {

								// $('[data-toggle="datepicker"]').datepicker(options_datepicker);

								event.stopPropagation();
								event.preventDefault();

								var data_code = $(this).attr('id');
								var serial = JSON.stringify($("#pform").serializeArray());
								console.log(serial);
								data_code = base64_encode(serial);
								console.log(data_code);
								var urlStruct = "<?php echo Dispatcher::baseUrl();?>/ProjectionsViewFullGstXlsIndicators/get/data:"+data_code;
								console.log(urlStruct);
								console.log("loaded...");

								$( ".updateSearchResult" ).html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span><div>');

								// $( ".updateSearchResult" ).load(urlStruct);
								$( ".updateSearchResult" ).load(urlStruct,function(responseText, statusText, xhr) {

									alert(responseText);
									// NOTE from hir start the work
									// Add Table UIX
									// var table_a = $('#table_res').DataTable(
									// 	Object.assign( {}, options_datatable, calculate_row([],[]) )
									//  );
									// End table

									// ALERT check this behavior
									// NOTE add the file dispatcher inside send_query

									$("input[id^='update_']").on('keydown', function(e) {
									// table_a.$("input[id^='update_']").on('keydown', function(e) {
									// Ensure 'value' binding is fired on enter in IE
					        // if ((e.keyCode || e.which) === 13 || e.which === 9) {
										console.log('....');
												var posted_data = {
																					'batnbr':$(this).attr('data-id'),
																					'name':$(this).attr('data-name'),
																					'type':$(this).attr('data-type'),
																					'RefNbr':$(this).attr('data-refnbr'),
																					'noguia':$(this).attr('data-noguia'),
																					'guia':$(this).attr('data-guia'),
																					'idx':$(this).attr('data-idx'),
																					'data':$(this).val()
																				};

												var string_to_pass = JSON.stringify(posted_data);
												console.log(string_to_pass);
												data_code = base64_encode(string_to_pass);

												batnbr = $(this).attr('data-id');
												remision = $(this).attr('data-remision');
												if ($(this).val()) {
													$.post("<?php echo Dispatcher::baseUrl();?>/ProjectionsViewFullGstXlsIndicator/update/data:"+data_code,function(data){
// NOTE
													  }).done(function(data){
																alert('response is for a table in modal: ' + data );

// NOTE add table options
// var table_a = $('#table_res').DataTable(
// 	Object.assign( {}, options_datatable, calculate_row([],[]) )
//  );
// then
	// table_a.$(this) ... etc

															// if ( $("#update_pedido_"+batnbr).val() && $("#update_albaran_"+batnbr).val() ) {
															// 		$('#link_'+batnbr).html('<a href="<?php //echo Dispatcher::baseUrl();?>/ProjectionsViewFullGstXlsIndicator/link/id:'+batnbr+'" id="get_'+batnbr+'" data-id="'+batnbr+'" data-name="'+batnbr+'_'+remision+'">Descargar</a>');
															// }

													});
												} else {
													console.log('data is null');
												}
											// } // End key
										}); //End on keydown


		}); //NOTE end file dispatch


					});
			});


	</script>



<!-- ==================================================================================== -->
<?php /*

    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Projections View Full Gst Xls Indicator', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Projections View Full Gst Xls Indicators');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('id_area');?></th>
													<th><?php echo $this->Paginator->sort('mes');?></th>
													<th><?php echo $this->Paginator->sort('id_tipo_operacion');?></th>
													<th><?php echo $this->Paginator->sort('projections_rp_definition');?></th>
													<th><?php echo $this->Paginator->sort('area');?></th>
													<th><?php echo $this->Paginator->sort('periodo');?></th>
													<th><?php echo $this->Paginator->sort('FlagIsDisminution');?></th>
													<th><?php echo $this->Paginator->sort('FlagIsProvision');?></th>
													<th><?php echo $this->Paginator->sort('FlagIsNextMonth');?></th>
													<th><?php echo $this->Paginator->sort('kms');?></th>
													<th><?php echo $this->Paginator->sort('subtotal');?></th>
													<th><?php echo $this->Paginator->sort('peso');?></th>
													<th><?php echo $this->Paginator->sort('viajes');?></th>
													<th><?php echo $this->Paginator->sort('year');?></th>
													<th><?php echo $this->Paginator->sort('tpo');?></th>
													<th><?php echo $this->Paginator->sort('fecha');?></th>
													<th><?php echo $this->Paginator->sort('id_month');?></th>
													<th><?php echo $this->Paginator->sort('is_current');?></th>
													<th><?php echo $this->Paginator->sort('labDays');?></th>
													<th><?php echo $this->Paginator->sort('labRestDays');?></th>
													<th><?php echo $this->Paginator->sort('labFullDays');?></th>
													<th><?php echo $this->Paginator->sort('PresupuestoIngresos');?></th>
													<th><?php echo $this->Paginator->sort('PresupuestoKms');?></th>
													<th><?php echo $this->Paginator->sort('PresupuestoTon');?></th>
													<th><?php echo $this->Paginator->sort('PresupuestoViajes');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>

					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($projectionsViewFullGstXlsIndicators as $projectionsViewFullGstXlsIndicator):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['id']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['id_area']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['mes']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['id_tipo_operacion']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['projections_rp_definition']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['area']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['periodo']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['FlagIsDisminution']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['FlagIsProvision']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['FlagIsNextMonth']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['kms']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['subtotal']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['peso']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['viajes']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['year']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['tpo']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['fecha']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['id_month']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['is_current']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['labDays']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['labRestDays']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['labFullDays']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['PresupuestoIngresos']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['PresupuestoKms']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['PresupuestoTon']; ?>&nbsp;</td>
		<td><?php echo $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['PresupuestoViajes']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsViewFullGstXlsIndicator['ProjectionsViewFullGstXlsIndicator']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
				</table>
			</span> <!--class="filter-container"-->
				<p>
					<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
						));
						?>				</p>

				<ul class="pagination">
							<?php

							echo $this->Paginator->prev( '«' ,array('tag'=>'li'),null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));

	?>							<?php

							echo $this->Paginator->numbers(array('separator' => null,'tag'=>'li'));

	?>						<?php

							echo $this->Paginator->next( '»' , array('tag'=>'li'), null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
	?>				</ul>
          </div>
        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->

*/ ?>
