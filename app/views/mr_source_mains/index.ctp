<?php
// SecureCalendar index
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>

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
	
</style>

	<div class="container-fluid">

	<div id="dashboard_links" class="col-xs-6 col-sm-2 pull-right">
			<ul id="tabbed" class="nav nav-pills nav-stacked">
				<li role="presentation" class="active">
					<a href="#stats_secure_app" id="stats_secure_app_tab" data-toggle="tab">
						<i class="fa fa-home"></i>&nbsp;&nbsp;Inicio
					</a>
				</li>
				
				<li role="presentation">
					<a href="#perfil" id="perfil-tab" data-toggle="tab">
						<i class="fa fa-cubes"></i>&nbsp;&nbsp;Configuraci&oacute;n de cursos
					</a>
				</li>
			</ul>
	</div>
	
		<div class="col-xs-6 col-sm-10">
			<div id="tabbedContent" class='tab-content'>
			
			
				<div class="tab-pane fade in active" id="stats_secure_app">

						<div id="load_stats_secure_app">
						
								<div class="row">

								<div class="col-md-offset-1 col-sm-11 col-md-11">
								<ul class="list-group list-inline">
										<li class="list-group-item">
											<?php echo $this->Html->link(__('New Mr Source Main', true), array('action' => 'add')); ?>			</li>
														<li>
											<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
										</li>
								</ul>
								</div>
								
								<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
								<h1 class="page-header"><?php __('Main Account Configuration (Mr Source Mains)');?></h1>
								<div class="table-responsive">
										<span class="filter-container">
											<table class="order-table table table-bordered table-hover table-striped responstable">
											<thead>
												<tr>
																				<th><?php echo $this->Paginator->sort('id');?></th>
																				<th><?php echo $this->Paginator->sort('rangeaccounta');?></th>
																				<th><?php echo $this->Paginator->sort('rangeaccountb');?></th>
																				<th><?php echo $this->Paginator->sort('segmenta');?></th>
																				<th><?php echo $this->Paginator->sort('segmentb');?></th>
																				<th><?php echo $this->Paginator->sort('_key');?></th>
																				<th><?php echo $this->Paginator->sort('_status');?></th>
																				<th class="actions" colspan="3"><?php __('Actions');?></th>
														
												</tr>
											</thead>
											<?php
											$i = 0;
											foreach ($mrSourceMains as $mrSourceMain):
												$class = null;
												if ($i++ % 2 == 0) {
													$class = ' class="altrow"';
												}
											?>
								<tr<?php echo $class;?>>
									<td><?php echo $mrSourceMain['MrSourceMain']['id']; ?>&nbsp;</td>
									<td><?php echo $mrSourceMain['MrSourceMain']['rangeaccounta']; ?>&nbsp;</td>
									<td><?php echo $mrSourceMain['MrSourceMain']['rangeaccountb']; ?>&nbsp;</td>
									<td><?php echo $mrSourceMain['MrSourceMain']['segmenta']; ?>&nbsp;</td>
									<td><?php echo $mrSourceMain['MrSourceMain']['segmentb']; ?>&nbsp;</td>
									<td><?php echo $mrSourceMain['MrSourceMain']['_key']; ?>&nbsp;</td>
									<td><?php echo $mrSourceMain['MrSourceMain']['_status']; ?>&nbsp;</td>
									<td class="actions">
										<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mrSourceMain['MrSourceMain']['id'])); ?>
									</td>
									<td class="actions">
										<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mrSourceMain['MrSourceMain']['id'])); ?>
									</td>
									<td class="actions">
										<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mrSourceMain['MrSourceMain']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mrSourceMain['MrSourceMain']['id'])); ?>
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
						</div>

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
												<p>
													<table class="order-table table table-bordered table-hover table-striped responstable">
														<tr>
															<th>ID</th>
															<th>Min</th>
															<th>Max</th>
															<th>Total</th>
															<th>Real</th>
															<th>Presupuesto</th>
															<th>Company</th>
															<th>Period</th>
															<th>Key</th>
														</tr>
														<?php
															foreach ($monitor_mr_costos as $costos_mon) {
																e('<tr>');
																foreach ($costos_mon['MrViewMonitorCosto'] as $mon_costo_name => $mon_costo_data) {
																	e('<td>'.$mon_costo_data.'</td>');
																}
																e('</tr>');
															}
														?>
													</table>
												</p>
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
												<p>
													<table class="order-table table table-bordered table-hover table-striped responstable">
														<tr>
															<th>ID</th>
															<th>Consulta</th>
															<th>Ultima Actualizaci&oacute;n</th>
															<th>Disponible desde</th>
															<th>Siguiente Actualizaci&oacute;n <div id='consulta'><?php e(date('h:m:s'))?></div></th>
															<th id="monitor_consultas" ></th>
															<th>ETA</th>
														</tr>
														<?php
															foreach ($monitor_mr as $data_mon) {
																foreach ($data_mon as $mon_name => $mon_values) {
																	e('<tr>');
																	foreach ($mon_values as $data) {
																		e('<td>'.$data.'</td>');
																	}
																	e('</tr>');
																}
															}
														?>
													</table>
												</p>
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

<script>
	$(document).ready(function (){
// 		$('.monitor_consultas').load('time.php');
// 		setTimeout($('.monitor_consultas').load('time.php'),1000);
// 		$(".monitor_consultas").load('time.php',function(e){setTimeout(e,1000)});
// 		setTimeout("alert('Boom!');", 2000);
// 		setInterval($('#monitor_consultas').load('#consulta'), 1000);
		
// 		$.ajax({
// 			url: "yourphpfile",
// 			data: <data you want your php file to read>
// 			success: function(data) {
// 								$('#myTable').html(data);
// 							}
// 		});
	});
</script>