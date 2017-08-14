<?php //debug($this->Paginator->params);?>
<?php
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
// 	setlocale(LC_MONETARY, 'es_MX');
?>

<?php //var_dump($casetas);  ?>

<?php
		//  Teisa_v_casetas_conciliacion2
// 		debug($_SESSION['Auth']['User']);
// debug($casetas_resume);
// debug($casetas_resume_stand);
// debug($this->$resume_stand());
// 	echo Dispatcher::baseUrl()."/Casetas/ResumeStand";

// debug($this->Paginator->counter(array('format' => '%page%')));

?>



	<script>
// 		function printContent(el){
// 			var restorepage = $('body').html();
// 			var printcontent = $('#' + el).clone();
// 			$('body').empty().html(printcontent);
// 				window.print();
// 			$('body').html(restorepage);
// 		}
	</script>

<!-- 	<button id="print" onclick="printContent('#resume_print');" >Print</button> -->

<style>
	/* unvisited link */
	.modded-link:link {
		display:block !important;
		background-color:#999;
		color: #444;
	}
	/* mouse over link */
	.modded-link:hover {
		 font-weight: bold;
	}
	.panel-default {
		background-color: rgba(255, 255, 255, 0.3); /* Color white with alpha 0.9*/
	}
	.panel-label {
		background-color: rgba(255, 255, 255, 0.3);
		border-radius:10px;
		padding:6px;
	}

	.list .inline{
		display: inline;
	}

	.casetas_load:hover{
		cursor:pointer;
		background-color: rgba(132, 215, 189, 0.3); /* Color white with alpha 0.9*/
	}

	.menu_load:hover{
		background-color: rgba(132, 215, 189, 0.3); /* Color white with alpha 0.9*/
		border-radius:6px;
		padding:3px;
/* 		cursor:pointer; */
	}
	.space{
		padding:10px;
	}
	.center{
		text-align:center !important;
	}

	.resume{
		color:black;
		font-weight:bold;
	}

	.header { color: red}

	.open_detail{
		cursor:pointer;
	}

    .disabled {
        pointer-events: none ;
        cursor: not-allowed;
/*         cursor: no-drop; */
    }

/*	.help_manual {
		position: fixed;
		bottom: 15px;
		right: 5%;
		cursor: pointer;
		z-index:150;
	}*/

</style>

	<div class="container-fluid">

<!-- 	<div id="spin" class="loadingDiv" style="display:none;" ><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div> -->
<span><?php echo $this->element('casetas/help_manual');?></span>

<!-- 	<span class="actions"><a href="#">TEXT</a></span> -->

<!-- 	<span id="help_casetas"> -->
<!-- 		<a class="help_manual" href="#inline_manual"><i class="fa fa-question-circle fa-3x" aria-hidden="true"></i>&nbsp;</a> -->
<!-- 	</span> -->

	<?php 	echo $this->Session->flash();?>


	<div id="dashboard_links" class="col-xs-6 col-sm-2 pull-right">
			<ul id="tabbed" class="nav nav-pills nav-stacked">
				<li role="presentation" class="active">
					<a href="#stats_secure_app" id="stats_secure_app_tab" data-toggle="tab">
						<i class="fa fa-home"></i>&nbsp;&nbsp;Inicio
					</a>
				</li>

				<li role="presentation">
					<a href="#perfil" id="perfil-tab" data-toggle="tab">
						<i class="fa fa-cubes"></i>&nbsp;&nbsp;Configuraci&oacute;n
					</a>
				</li>

				<li><span><?php echo $this->element('casetas/search_conciliations');?></span></li>
			</ul>
	</div>

		<div class="col-xs-6 col-sm-10">
			<div id="tabbedContent" class='tab-content'>


				<div class="tab-pane fade in active resume_print" id="stats_secure_app">

					<div id="app">
					<?php if (count($casetas_resume) > 0 ) { ?>
						<table class="table " width="100%">
					<?php
						$i = 0;
						foreach ($casetas_resume as $id_caseta_resume  ) {
							if ($i++ % 2 == 0) {
								e('<tr />');
							}
// 							pr($id_caseta_resume['CasetasViewResume']['_filename']);
							e('<td width="50%">');
								e('<div class="panel panel-default">');
									e('<div class="panel-heading"> Archivo Decenal : <strong>'.$id_caseta_resume['CasetasViewResume']['_filename'].' <span class="pull-right">&nbsp;&nbsp;'.date('Y-m-d',$id_caseta_resume['CasetasViewResume']['_ctime']).'&nbsp;');

									$code = '<code>'.$id_caseta_resume['CasetasViewResume']['casetas_standings_name'].'</code>';

									if($id_caseta_resume['CasetasViewResume']['fileStatId'] === 11){
										echo strip_tags($code);

										if ($id_caseta_resume['CasetasViewResume']['fileParentId'] === 2){
                                            e('&nbsp;&nbsp;');
													echo
														$this->Html->link(
																							'Cerrar Conciliacion',
																							array(
																										'controller'=>'Casetas',
																										'action'=>'closeFile',
																										'casetas_controls_files_id'=>$id_caseta_resume['CasetasViewResume']['id'],
																										'user_id'=>$_SESSION['Auth']['User']['id'],
																										'casetas_units_id'=>$id_caseta_resume['CasetasViewResume']['casetas_units_id']),
																										array(
																														'class' => 'inline pull-right',
																														'id' 		=> 'conciliationClose'
																														// 'onclick' => 'sure();'
																												 )
																										// sprintf(__('La Conciliacion se cerrara # %s?', true), 'Aceptar')
																						 );
								 		}
											// more statements ...
									}else {
										echo $code;
									}
									e('</span></strong>&nbsp;</div>');
									// close header panel

									echo '<span class="run panel-label casetas_load inline text-primary pull-right"><h4>';
									$disabled_link = ($id_caseta_resume['CasetasViewResume']['fileParentId'] === 2) ? null : 'disabled' ;
// 									debug($disabled_link);
                  echo $this->Html->link('Iniciar Conciliacion', array('controller'=>'Casetas','action'=>'tiger_casetas','casetas_controls_files_id'=>$id_caseta_resume['CasetasViewResume']['id'],'user_id'=>$_SESSION['Auth']['User']['id'],'casetas_units_id'=>$id_caseta_resume['CasetasViewResume']['casetas_units_id'],'casetas_page'=>$this->Paginator->counter(array('format' => '%page%'))), array('class' => $disabled_link));

									echo '&nbsp;<i class="fa fa-play '.$disabled_link.'" aria-hidden="true"></i></h4></span>';

// 									e('<div class="panel-heading"><h5><strong><p class="text-center">'.$id_caseta_resume['CasetasViewResume']['casetas_standings_name'].'</p></strong></h5>');

										e('<div class="panel-body">');
											e('<div class="panel-heading"><h4><strong><p class="text-center">'.strtoupper($id_caseta_resume['CasetasViewResume']['_area']).'</p></strong></h3>');

											e('<dl class="dl-horizontal">');
											foreach ($id_caseta_resume['CasetasViewResume'] as $indxCasetaResume => $dataCasetaResume) {

// 												if ($indxCasetaResume != 'id' AND $indxCasetaResume != '_area' AND $indxCasetaResume != '_filename' AND $indxCasetaResume != 'casetas_units_id' AND $indxCasetaResume != 'casetas_event_name' AND $indxCasetaResume != 'casetas_parents_name' AND $indxCasetaResume != 'casetas_standings_name' AND $indxCasetaResume != 'view_monto' AND $indxCasetaResume != '_montos' AND $indxCasetaResume != 'cruces' AND $indxCasetaResume != 'view_cruces')  {
// 													e('<dt><h4><strong>'.$indxCasetaResume.' :</strong></h4></dt>');
// 													e('<dd><h4><strong>'.$dataCasetaResume.'</strong></h4></dd>');
// 												}

												if($indxCasetaResume == 'monto_conciliado') {
													e('<dt><h4><strong>Monto Conciliado :</strong></h4></dt>');
													e('<dd><h4><strong>$ '.number_format(money_format('%i',$dataCasetaResume), 2, '.', ',') .'</strong></h4></dd>');
												}

												if($indxCasetaResume == '_montos') {
													e('<dt><h4><strong> Monto I+D :</strong></h4></dt>');
													e('<dd><h4><strong>$ '. number_format(sprintf("%01.2f",$dataCasetaResume), 2, '.', ',') .'</strong></h4></dd>');
												}

												if($indxCasetaResume == 'cruces') {
													e('<dt><h4><strong> Cruces I+D :</strong></h4></dt>');
													e('<dd><h4><strong>'.number_format($dataCasetaResume, 0, '.', ',').'</strong></h4></dd>');
												}

												if($indxCasetaResume == 'cruces_conciliados') {
													e('<dt><h4><strong>Cruces Conciliados :</strong></h4></dt>');
													e('<dd><h4><strong> '.number_format($dataCasetaResume, 0, '.', ',').'</strong></h4></dd>');
												}

												if($indxCasetaResume == 'percent_montos') {
													e('<dt><h4><strong>Monto Conciliados :</strong></h4></dt>');
													e('<dd><h4><strong> '.round($dataCasetaResume,2).' %</strong></h4></dd>');
												}

												if($indxCasetaResume == 'percent_cruces') {
													e('<dt><h4><strong>Cruces Conciliados :</strong></h4></dt>');
													e('<dd><h4><strong> '.round($dataCasetaResume,2).' %</strong></h4></dd>');
												}

												if($indxCasetaResume == 'counter') {
													e('<dt><h4><strong>Veces Conciliadas :</strong></h4></dt>');
													e('<dd><h4><strong> '.number_format($dataCasetaResume, 0, '.', ',').'</strong></h4></dd>');
												}
// 												if($indxCasetaResume == 'historical_id') {
// 													e('<dt><h4><strong>Detail :</strong></h4></dt>');
// 													e('<dd><h4><strong> '.number_format($dataCasetaResume, 0, '.', ',').'</strong></h4></dd>');
// 												}

											}
											e('</dl>');
											if($id_caseta_resume['CasetasViewResume']['fileStatId'] === 11){
												e('<span id="_caseta_load_'.$id_caseta_resume['CasetasViewResume']['id'].'" class="pull-right inline text-primary panel-label casetas_load"><h4>Detalle de Conciliaci&oacute;n <strong>'.$id_caseta_resume['CasetasViewResume']['id'].'&nbsp;<i class="fa fa-sort-desc" aria-hidden="true"></i></strong></h4></span>');
											}

										e('</div>');
									e('</div>');

										echo '<div class="panel-footer" id="_caseta_show_'.$id_caseta_resume['CasetasViewResume']['id'].'" style="display:none;">';
										e('<h4 class="resume">Res&uacute;men de Conciliaci&oacute;n</h4>');
										e('<table id="casetas_detail" class="table table-bordered table-hover table-striped responstable">');
// 										e('<tbody class="resume_detail">');
										e('<tr>');
										e('<th>Descripci&oacute;n</th>');
										e('<th colspan="2" class="center" >Monto</th>');
										e('<th colspan="2" class="center" >Cruces</th>');
										e('<th colspan="2" class="center" >Export</th>');
										e('</tr><tr>');

										e('<td >&nbsp;</td>');
										e('<td>Pesos</td>');
										e('<td class="center">%</td>');
										e('<td>Cantidad</td>');
										e('<td class="center">%</td>');
										e('<td class="center">xls</td>');
										e('</tr>');


										foreach($casetas_resume_stand as $resume_data){

											if ($resume_data['CasetasViewResumeStand']['casetas_controls_files_id'] === $id_caseta_resume['CasetasViewResume']['id'] and $resume_data['CasetasViewResumeStand']['casetas_historical_conciliations_id'] == $id_caseta_resume['CasetasViewResume']['historical_id']) {

												if ($resume_data['CasetasViewResumeStand']['casetas_standings_id'] == '1') {
													e('<tr id="conciliations" class="conciliations" data-id="'.$id_caseta_resume['CasetasViewResume']['id'].'">');
												} else if ($resume_data['CasetasViewResumeStand']['casetas_standings_id'] == '9') {
													e('<tr id="ungroup" class="ungroup">');
												} else {
													e('<tr id="group_'.$id_caseta_resume['CasetasViewResume']['id'].'" class="group">');
												}

												foreach ($resume_data['CasetasViewResumeStand'] as $table_name => $table_data) {

													if($table_name == 'casetas_standings_name' ) {
															if($resume_data['CasetasViewResumeStand']['casetas_standings_id'] !== 1 AND $resume_data['CasetasViewResumeStand']['casetas_standings_id'] !== 9 ){
																echo '<td class="view_'.$resume_data['CasetasViewResumeStand']['casetas_standings_id'].'">';
															} else {
																echo '<td class="view_'.$resume_data['CasetasViewResumeStand']['casetas_standings_id'].'">';
															}
														echo $this->Html->link(__(html_entity_decode(htmlentities($table_data,ENT_XHTML,'ISO-8859-1')), true), array('controller'=>'CasetasViews','action' => 'index','casetas_historical_conciliations_id'=>$id_caseta_resume['CasetasViewResume']['historical_id'],'casetas_controls_files_id'=>$id_caseta_resume['CasetasViewResume']['id'],'casetas_standings_id'=>$resume_data['CasetasViewResumeStand']['casetas_standings_id'],'sort'=>'id','direction'=>'asc'),array(/*'target'=>'_blank'*/));

														echo '</td>';
													}

													if($table_name == 'cruces_totales') {
														e('<td>'.$table_data.'</td>');
														if ($resume_data['CasetasViewResumeStand']['casetas_standings_id'] !== 1 AND $resume_data['CasetasViewResumeStand']['casetas_standings_id'] !== 9) {

														if(!isset($cruces_totales[$id_caseta_resume['CasetasViewResume']['id']])){
															$cruces_totales[$id_caseta_resume['CasetasViewResume']['id']] = null;
														}
														$cruces_totales[$id_caseta_resume['CasetasViewResume']['id']] += $table_data;
														}
													}
													if($table_name == 'percent_montos' OR $table_name == 'percent_cruces'){
														e('<td>'.round($table_data,2).' %</td>');

														if ($resume_data['CasetasViewResumeStand']['casetas_standings_id'] !== 1 AND $resume_data['CasetasViewResumeStand']['casetas_standings_id'] !== 9) {
														if ($table_name == 'percent_montos') {
															if (!isset($percent_montos_total[$id_caseta_resume['CasetasViewResume']['id']])) {
																$percent_montos_total[$id_caseta_resume['CasetasViewResume']['id']] = null;
															}
// 															pr($table_data);
														$percent_montos_total[$id_caseta_resume['CasetasViewResume']['id']] += $table_data;
														}

														if ($table_name == 'percent_cruces') {
															if (!isset($percent_cruces_total[$id_caseta_resume['CasetasViewResume']['id']])) {
																$percent_cruces_total[$id_caseta_resume['CasetasViewResume']['id']] = null;
															}
// 															pr($table_data);
                                                            if ($resume_data['CasetasViewResumeStand']['casetas_standings_id'] == 5) {
                                                                $percent_cruces_total[$id_caseta_resume['CasetasViewResume']['id']] = 0;
                                                            } else {
                                                                $percent_cruces_total[$id_caseta_resume['CasetasViewResume']['id']] += $table_data;
                                                            }
														}

														}

													}

													if($table_name == 'monto_total'){
														e('<td>$ '.number_format(sprintf("%01.2f",$table_data), 2, '.', ',').' </td>');

														if ($resume_data['CasetasViewResumeStand']['casetas_standings_id'] !== 1 AND $resume_data['CasetasViewResumeStand']['casetas_standings_id'] !== 9) {
															if (!isset($monto_total[$id_caseta_resume['CasetasViewResume']['id']])) {
																$monto_total[$id_caseta_resume['CasetasViewResume']['id']] = null;
															}
// 															debug($resume_data['CasetasViewResumeStand']['casetas_standings_id']);
															$monto_total[$id_caseta_resume['CasetasViewResume']['id']] += $table_data;
														}
													}
												}

												// export section
    e('<td>&nbsp;');
        echo $this->Html->link('xls', array('controller'=>'CasetasViews','action' => 'export','casetas_historical_conciliations_id'=>$id_caseta_resume['CasetasViewResume']['historical_id'],'casetas_controls_files_id'=>$id_caseta_resume['CasetasViewResume']['id'],'casetas_standings_id'=>$resume_data['CasetasViewResumeStand']['casetas_standings_id'],'sort'=>'id','direction'=>'asc'),array(/*'target'=>'_blank'*/));
    e('</td>');


	e('</tr>');
											}
										}

										e('<tr id="stand_'.$id_caseta_resume['CasetasViewResume']['id'].'" class="open_detail" data-id="open_detail_'.$id_caseta_resume['CasetasViewResume']['id'].'"><td id="det_menu_'.$id_caseta_resume['CasetasViewResume']['id'].'"><i id="det_icon_'.$id_caseta_resume['CasetasViewResume']['id'].'" class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp; Cruces No Correspondidos de I+D en LIS :</td> <td id="deter_'.$id_caseta_resume['CasetasViewResume']['id'].'" > $ '.number_format(sprintf("%01.2f",$monto_total[$id_caseta_resume['CasetasViewResume']['id']]), 2, '.', ',').'</td><td id="deter_'.$id_caseta_resume['CasetasViewResume']['id'].'" >'.round($percent_montos_total[$id_caseta_resume['CasetasViewResume']['id']],2).' % </td><td id="deter_'.$id_caseta_resume['CasetasViewResume']['id'].'" >'.number_format($cruces_totales[$id_caseta_resume['CasetasViewResume']['id']], 0, '.', ',').'</td><td id="deter_'.$id_caseta_resume['CasetasViewResume']['id'].'" >'.round($percent_cruces_total[$id_caseta_resume['CasetasViewResume']['id']],2).' % </td></tr>');

										e('</table>');
										echo '</div>';

								e('</div>');
							e('</td>');

// 							debug($cruces_totales[$resume_data['CasetasViewResumeStand']['casetas_standings_id']]);
// 							debug($monto_total[$resume_data['CasetasViewResumeStand']['casetas_standings_id']]);
// 							debug($percent_cruces_total[$resume_data['CasetasViewResumeStand']['casetas_standings_id']]);
// 							debug($percent_montos_total[$resume_data['CasetasViewResumeStand']['casetas_standings_id']]);

// 							debug($cruces_totales[$id_caseta_resume['CasetasViewResume']['id']]);
// 							debug($monto_total[$id_caseta_resume['CasetasViewResume']['id']]);
// 							debug($percent_cruces_total[$id_caseta_resume['CasetasViewResume']['id']]);
// 							debug($percent_montos_total[$id_caseta_resume['CasetasViewResume']['id']]);

							echo 	'<script>$(document).ready(function () {'.
								'$( "#_caseta_load_'.$id_caseta_resume['CasetasViewResume']['id'].'" ).click(function() {'.
									'$( "#_caseta_show_'.$id_caseta_resume['CasetasViewResume']['id'].'" ).toggle(["slow"]);'.
									'console.log("catcha_'.$id_caseta_resume['CasetasViewResume']['id'].'");'.
									'});'.
								'});//end document.ready</script>';
						}
					?>
						</table>
						<?php } else {?>
							<div class="container">
								<header>
								<?php e($this->Html->image('gst/help_manual/gst.png'),array('alt' => 'Manual'))?>
							<!--         <img src="assets/img/logo.svg"> -->
									<h1 class="text-uppercase">m&oacute;dulo conciliador de casetas</h1>
	<!-- 								<p class="lead text-center text-muted text-uppercase" style="color:#fff;">m&oacute;dulo conciliador de casetas</p> -->
								</header>
							</div>
						<?php }?>
					</div>
						 <!--PAGINATOR-->
						<p>
							<?php
							echo $this->Paginator->counter(array(
							'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
							));
							?>
						</p>
						<ul class="pagination">
							<?php
							echo $this->Paginator->prev( '«' ,array('tag'=>'li'),null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
							?>
							<?php
							echo $this->Paginator->numbers(array('separator' => null,'tag'=>'li'));
							?>
							<?php
							echo $this->Paginator->next( '»' , array('tag'=>'li'), null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
							?>
						</ul>

				</div>

				<div  class="tab-pane fade in" id="perfil">
<!-- 				TABS -->
				<div id="start_tabs_nav">

				<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-justified" role="tablist">
						<li role="presentation" class="active modded-link">
							<a href="#loadSecureTopics" aria-controls="loadSecureTopics" role="tab" data-toggle="tab" class="modded-link">Summary</a>
						</li>

						<li role="presentation">
							<a href="#loadSecureTopicsTypes" aria-controls="loadSecureTopicsTypes" role="tab" data-toggle="tab" class="modded-link">Monitor</a>
						</li>

					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="loadSecureTopics">

							<br/>

							<div class="panel panel-default">
							<!-- Default panel contents -->
								<div class="panel-heading">General Summary</div>

<!-- 								<div class="panel-body"> -->
<!-- 									<p>Stats</p> -->
<!-- 								</div> -->

							<!-- Table -->
								<table class="table " width="100%">
									<tr>
										<td width="50%">
											<div id="container_charts" >

											</div>
										</td>
										<td width="50%">
											<div id="container_charting" ><p>...</p></div>
										</td>
									</tr>
									<tr>
										<td width="50%">
											<div id="container_courses_stats" ><p>...</p></div>
										</td>
										<td width="50%">
											<div id="container_courses_acomplished" ><p>...</p></div>
										</td>
									</tr>
								</table>

							</div>
						</div>

						<div role="tabpanel" class="tab-pane fade" id="loadSecureTopicsTypes">
							<br/>

							<div class="panel panel-default">
							<!-- Default panel contents -->
								<div class="panel-heading">Status Monitor </div>

<!-- 								<div class="panel-body"> -->
<!-- 									<p>Stats</p> -->
<!-- 								</div> -->

							<!-- Table -->
								<table class="table " width="100%">
									<tr>
										<td width="50%">
											<div id="mon_consultas" >

											</div>
										</td>
										<td width="50%">
											<div id="container_charting" ></div>
										</td>
									</tr>
									<tr>
										<td width="50%">
											<div id="container_courses_stats" ></div>
										</td>
										<td width="50%">
											<div id="container_courses_acomplished" ></div>
										</td>
									</tr>
								</table>

							</div>
						</div>
					</div> <!--ends tab content-->

				</div> <!--ends_tabs_nav-->
	<!-- 			TABS -->
				</div> <!--end perfil-->
			</div>
		</div>

	<!-- Optional: clear the XS cols if their content doesn't match in height -->
	<div class="clearfix visible-xs-block">div</div>

	<!--   <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div> -->
	</div> <!--container-fluid-->
<!--End Container-->







	<script >

		$(document).ready(function() {

			// NOTE Prevent about close the conciliation
			$("#conciliationClose").click(function(event) {
					var answer = confirm ("¿Estás seguro de Cerrar esta conciliación?");
						console.log(answer);
					if (answer == true) {
							var sure = confirm ("Este Proceso es irreversible , si no está seguro presione Cancelar.");
							if (sure == true) {
								console.log('ok , nothing to do about , go then') ;
							} else {
								event.preventDefault();
								console.log('2nd try');
							}
					} else {
							event.preventDefault();
							console.log('1st try');
				  }

			});

			// hide the not conciliations group
			$('.group').hide();
			// search all not conciliations detail rows
			var a = $("TR[data-id^='open_detail_']");
			$.each( a, function( i, val ) {
// 					console.log($(this).attr('id'));
				var stand_id = $(this).attr('data-id').split('_')['2'];
// 					console.log($(this).attr('data-id'));
// 					console.log($(this).attr('data-id').length);
// 					console.log($(this).attr('data-id').split('_'));
// 				remove and append (re-order)
				$('#group_' + stand_id).append().before($('#stand_' + stand_id));
			});
// 				catch the click event
			$('.open_detail').click(function(e) {
// 				console.log($(this).attr('data-id'));
				var group_id = $(this).attr('data-id').split('_')['2'];

				$("TR[id^='group_" + group_id + "']").toggle('fast',function () {

					if ($("TR[id^='group_" + group_id + "']").is(":visible")) {
						console.log('tr hide results for ' + group_id);

						$("TD[id^='deter_" + group_id).hide();
// 						$("TD[id^='deter_" + group_id).hide('fast',function(){
							$("#det_menu_" + group_id).attr('colspan', '5');
							$("#det_icon_" + group_id).removeAttr("class");
							$("#det_icon_" + group_id).attr('class', 'fa fa-minus-square-o');

// 						});
						// /.attr()
						// $("element").attr("id", "newId");
						// $("element").attr("disabled", true);
						// //.removeAttr()
						// $("element").removeAttr("id");
						// $("element").removeAttr("disabled");
					} else {
						console.log('tr show results for ' + group_id);

// 						$("TD[id^='deter_" + group_id).show('fast',function(){
							$("#det_menu_" + group_id).removeAttr('colspan');
							$("#det_icon_" + group_id).removeAttr("class");
							$("#det_icon_" + group_id).attr('class', 'fa fa-plus-square-o');
// 						});
							$("TD[id^='deter_" + group_id).show('slow');

					}
				});
// 				$('.group').toggle();
			});

			/**LOADING*/
			$('.run a').on( 'click', function (e){
// 					.ajaxStart(function () {
// // 						$loading.show();
// 						$.fancybox.showLoading();
// 					})
// 					.ajaxStop(function () {
// // 						$loading.hide();
// 						$.fancybox.hideLoading();
// 					});
				console.log( $(this).val());
				console.log( $(this).attr('href'));
// $.fancybox.showLoading();
// $.fancybox.helpers.overlay.open({parent: $('body'), closeClick : false});

// To hide
// $.fancybox.hideLoading();
// $.fancybox.helpers.overlay.close();

				$.ajax({
					beforeSend: function(){
								console.log( 'beforeSend' );
								$.fancybox.showLoading();
								$.fancybox.helpers.overlay.open({parent: $('body'), closeClick : false});
							},
					complete: function(){
								console.log( 'complete');
								$.fancybox.hideLoading();
// 								$.fancybox.helpers.overlay.close();
				               },
					success: function() {}
				});
// 				jQuery.ajaxSetup({
// 					beforeSend: function(){
// 								console.log( 'beforeSend' );
// 							},
// 					complete: function(){
// 								$('#loadingDiv').hide();
// 								console.log( $(this).attr('complete'));
// 							},
// 					success: function() {}
// 				});
			});
		});
	</script>
