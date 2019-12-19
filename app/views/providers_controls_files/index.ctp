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




<!-- ================================================================================================= -->
<!-- @NOTE  =====   Get the Files ====  -->

<?php 	echo $this->Session->flash();?>



		<div class="container-mod">

					<div class="row">
							<div class="twelve columns ">
								<h6 class="docs-header">Proveedores</h6>
						</div>
					</div>

		</div>




		<div class="container-mod">
<!-- ['BalanzaViewUdnsRpt']['Empleado'] -->
					<div class="row">
						<?php echo $this->Form->create('AddenumViewAlbaranRelations',array('enctype' => 'multipart/form-data','class'=>'form','id'=>'pform'));?>

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
																			'BatNbr',
																			 array
																						(
																							'type'=>'text',
																							'class'=>'search_udn u-full-width form-control',
																							'id'=>'to',
																							'placeholder' => 'LOTE',
																							// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
								                              // 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																							'div'=>FALSE,
																							'label'=>FALSE,
																							// 'options'=>$bssus,
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

				// $(".search_udn").select2();

					$("#send_query").on('click', function(event) {

								// $('[data-toggle="datepicker"]').datepicker(options_datepicker);

								event.stopPropagation();
								event.preventDefault();

								var data_code = $(this).attr('id');
								var serial = JSON.stringify($("#pform").serializeArray());
								console.log(serial);
								data_code = base64_encode(serial);
								console.log(data_code);
								var urlStruct = "<?php echo Dispatcher::baseUrl();?>/AddenumViewAlbaranRelations/get/data:"+data_code;
								console.log(urlStruct);
								console.log("loaded...");

								$( ".updateSearchResult" ).html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span><div>');

								// $( ".updateSearchResult" ).load(urlStruct);
								$( ".updateSearchResult" ).load(urlStruct,function(responseText, statusText, xhr) {


									// Add Table UIX
									var table_a = $('#table_res').DataTable(
										Object.assign( {}, options_datatable, calculate_row([],[]) )
									 );
									// End table

									// ALERT check this behavior
									// NOTE add the file dispatcher inside send_query

									table_a.$("input[id^='update_']").on('keydown', function(e) {
									// Ensure 'value' binding is fired on enter in IE
					        if ((e.keyCode || e.which) === 13 || e.which === 9) {
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
													$.post("<?php echo Dispatcher::baseUrl();?>/AddenumViewAlbaranRelations/update/data:"+data_code,function(data){
// NOTE
													  }).done(function(data){
																// alert('response is : ' + data );
															if ( $("#update_pedido_"+batnbr).val() && $("#update_albaran_"+batnbr).val() ) {
																	$('#link_'+batnbr).html('<a href="<?php echo Dispatcher::baseUrl();?>/AddenumViewAlbaranRelations/link/id:'+batnbr+'" id="get_'+batnbr+'" data-id="'+batnbr+'" data-name="'+batnbr+'_'+remision+'">Descargar</a>');
															}
													});
												} else {
													console.log('data is null');
												}
											} // End key
										}); //End on keydown


		}); //NOTE end file dispatch


					});
			});


	</script>






<div id="viewForm">
				<span>
						<h2><?php __('Add Providers Files Control'); ?></h2>
				</span>

				<?php echo $this->Form->create('ProvidersControlsFile',array('enctype' => 'multipart/form-data','class'=>'form'));?>

				<div class="providersControlsFile form">
				<?php
										e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
												echo $this->Form->file('ProvidersControlsFile.45645.xml', array('type'=>'file','label'=>false));
										e('</span>');
										e('<br />');
										e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
												echo $this->Form->file('ProvidersControlsFile.45645.pdf', array('type'=>'file','data-batnbr'=>'45645','label'=>false));
										e('</span>');
										e('<br />');
										e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
												echo $this->Form->file('ProvidersControlsFile.45645.order', array('type'=>'file','data-batnbr'=>'45645','label'=>false));
										e('</span>');
				?>


				<?php
										e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
												echo $this->Form->file('ProvidersControlsFile.34635.xml', array('type'=>'file','label'=>false));
										e('</span>');
										e('<br />');
										e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
												echo $this->Form->file('ProvidersControlsFile.34635.pdf', array('type'=>'file','data-batnbr'=>'45645','label'=>false));
										e('</span>');
										e('<br />');
										e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
												echo $this->Form->file('ProvidersControlsFile.34635.order', array('type'=>'file','data-batnbr'=>'45645','label'=>false));
										e('</span>');
				?>

						<div class="form-group pull-right">
								<?php
								 echo $this->Form->end( array('div'=>false,'class'=>'btn btn-success'));
								?>
						</div>
				</div>

</div> <!--end viewForm-->

<!-- ================================================================================================= -->
<!-- NOTE build -- view for upload files and update status H to U with insert into report **EE** table -->
<!-- set table  -->






<!-- ================================================================================================= -->



    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Providers Controls File', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Providers Controls Files');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('providers_events_id');?></th>
													<th><?php echo $this->Paginator->sort('user_id');?></th>
													<th><?php echo $this->Paginator->sort('labelname');?></th>
													<th><?php echo $this->Paginator->sort('_filename');?></th>
													<th><?php echo $this->Paginator->sort('_pathname');?></th>
													<th><?php echo $this->Paginator->sort('_extname');?></th>
													<th><?php echo $this->Paginator->sort('_md5sum');?></th>
													<th><?php echo $this->Paginator->sort('_file_size');?></th>
													<th><?php echo $this->Paginator->sort('_atime');?></th>
													<th><?php echo $this->Paginator->sort('_mtime');?></th>
													<th><?php echo $this->Paginator->sort('_ctime');?></th>
													<th><?php echo $this->Paginator->sort('_username');?></th>
													<th><?php echo $this->Paginator->sort('_datetime_login');?></th>
													<th><?php echo $this->Paginator->sort('_ip_remote');?></th>
													<th><?php echo $this->Paginator->sort('created');?></th>
													<th><?php echo $this->Paginator->sort('modified');?></th>
													<th><?php echo $this->Paginator->sort('providers_standings_id');?></th>
													<th><?php echo $this->Paginator->sort('providers_parents_id');?></th>
													<th><?php echo $this->Paginator->sort('_status');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>

					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($providersControlsFiles as $providersControlsFile):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['id']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['providers_events_id']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['user_id']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['labelname']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['_filename']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['_pathname']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['_extname']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['_md5sum']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['_file_size']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['_atime']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['_mtime']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['_ctime']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['_username']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['_datetime_login']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['_ip_remote']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['created']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['modified']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['providers_standings_id']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['providers_parents_id']; ?>&nbsp;</td>
		<td><?php echo $providersControlsFile['ProvidersControlsFile']['_status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $providersControlsFile['ProvidersControlsFile']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $providersControlsFile['ProvidersControlsFile']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $providersControlsFile['ProvidersControlsFile']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $providersControlsFile['ProvidersControlsFile']['id'])); ?>
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

    <script>
			$(document).ready(function () {

			});
    </script>
