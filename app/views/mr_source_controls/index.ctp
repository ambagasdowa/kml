<?php
	echo $ajax->form(array('type' => 'post',
		'options' => array(
			'model'=>'MrSourceControl',
			'update'=>'divUpdateSource',
			'loading' => "Element.hide('divUpdateSource');Element.show('loading');",
			'complete' => "Element.hide('loading');Effect.Grow('divUpdateSource',{duration: 2.0});",
			'url' => array(
				'controller' => 'MrSourceControls',
				'action' => 'updateSources'
			)
		)
	));
?>

				<script type="text/javascript">
					
// 					function submitform(path, params, method) {
// 						method = method || "post"; // Set method to post by default, if not specified.
// 
// 						// The rest of this code assumes you are not using a library.
// 						// It can be made less wordy if you use one.
// 						var form = document.createElement("form");
// 						form.setAttribute("method", method);
// 						form.setAttribute("action", path);
// 
// 						var addField = function( key, value ){
// 							var hiddenField = document.createElement("input");
// 							hiddenField.setAttribute("type", "hidden");
// 							hiddenField.setAttribute("name", key);
// 							hiddenField.setAttribute("value", value );
// 
// 							form.appendChild(hiddenField);
// 						}; 
// 
// 						for(var key in params) {
// 							if(params.hasOwnProperty(key)) {
// 								if( params[key] instanceof Array ){
// 									for(var i = 0; i < params[key].length; i++){
// // 										addField( key, params[key][i] )
// 										addField(key +'[]', params[key][i])
// 									}
// 								}
// 								else{
// // 									addField( key, params[key] );
// 									addField(key +'[]', params[key][i])
// 								}
// 							}
// 						}
// 
// 						document.body.appendChild(form);
// 						form.submit();
// 					}
				</script>
<?php 	echo $this->Session->flash();?>
    <div class="container-fluid">
      <div class="row">
      
        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Mr Source Control', true), array('action' => 'add')); ?>
			</li>
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Mr Source Account', true), array('controller'=>'mrSourceAccounts','action' => 'add')); ?>
			</li>
			<li>
				<input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter">
			</li>
		  </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Mr Source Controls');?></h1>
          
          <div class="table-responsive">

 <span class="filter-container">

			<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id');?></th>
						<th><?php echo $this->Paginator->sort('source_company');?></th>
						<th><?php echo $this->Paginator->sort('_key');?></th>
						<th><?php echo $this->Paginator->sort('_generate');?></th>
						<th><?php echo $this->Paginator->sort('_description');?></th>
						<th><?php echo $this->Paginator->sort('_status');?></th>
						<th class="actions" colspan="4"><?php __('Actions');?></th>
							
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($mrSourceControls as $mrSourceControl):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $mrSourceControl['MrSourceControl']['id']; ?>&nbsp;</td>
		<td><?php echo $mrSourceControl['MrSourceControl']['source_company']; ?>&nbsp;</td>
		<td><?php echo $mrSourceControl['MrSourceControl']['_key']; ?>&nbsp;</td>
		
<!-- 		<td><?php echo $mrSourceControl['MrSourceControl']['_generate']; ?>&nbsp;</td> -->
<!-- 		<td><input type="checkbox" name="data[MrSourceControls][_generate]" class="switch-input" value="1" id="MrSourceControlsGenerate" />&nbsp;</td> -->
				
		<td>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="data[MrSourceReports][<?php e($mrSourceControl['MrSourceControl']['id'])?>][_generate]">
					<i class="fa fa-square-o"></i>
				</label>
			</div>
		</td>

		<td><?php echo $mrSourceControl['MrSourceControl']['_description']; ?>&nbsp;</td>
		<td><?php echo $mrSourceControl['MrSourceControl']['_status']; ?>&nbsp;</td>
		
		
		
		<td class="element-item actions">
			<span class="form-inline">
			 
				<span><kbd> Ranges From </kbd>&nbsp;</span>
<!-- 				<input name="data[MrSourceControls][<?php e($mrSourceControl['MrSourceControl']['id'])?>][from]" type="text" id="<?php e('calendar_from_'.$mrSourceControl['MrSourceControl']['id'])?>"/> -->
				<?php 
					echo $this->Form->input('MrSourceControls.'.$mrSourceControl['MrSourceControl']['id'].'.from',
														array(
																'type'=>'text',
																'class'=>'form-control',
																'id'=>'calendar_from_'.$mrSourceControl['MrSourceControl']['id'],
																'div'=>FALSE,
																'label'=>FALSE
															  )
											)
				?>
				<span><kbd> To </kbd>&nbsp;</span>
				<!--<input name="data[MrSourceControls][<?php e($mrSourceControl['MrSourceControl']['id'])?>][to]" type="text" id="<?php e('calendar_to_'.$mrSourceControl['MrSourceControl']['id'])?>"/>-->
				<?php 
					echo $this->Form->input('MrSourceControls.'.$mrSourceControl['MrSourceControl']['id'].'.to',
														array(
																'type'=>'text',
																'class'=>'form-control',
																'id'=>'calendar_to_'.$mrSourceControl['MrSourceControl']['id'],
																'div'=>FALSE,
																'label'=>FALSE
															  )
											)
				?>
<!-- 				<button name="data[gen]" class="btn btn-success">Build</button> -->
<!-- 				<span class="label label-success">Build</span> -->
				<?php 
// 						e($this->Ajax->link(__('Build',TRUE),
// 													array(
// 														'controller'=>'MrSourceControls',
// 														'action'=>'updateSources',
// 														'id'=>$mrSourceControl['MrSourceControl']['id'],
// 														'val'=>$data
// 													),
// 													array(
// 														'escape' => false,
// 														"class" => 'btn btn-success',
// 														"update" => "divUpdateSource_".$mrSourceControl['MrSourceControl']['id'],
// // 														'complete'=> 'submitform("/kml/MrSourceControls/updateSources/", "data[Model][12/12/2015]","get");',
// // 														"loading" => "Element.hide('divUpdateSource');Element.show('loading');",
// // 														"complete" => "Element.hide('loading');Effect.Grow('divUpdateSource',{duration: 2.0});",
// 										// 			      'target'=>'_blank',
// // 														'alt'=>'Detalles Diarios',
// 														'title' => 'Detalles Diarios',
// 													)
// 												// set msj to confirm
// 									// 			"Are you sure of this??"
// 											)
// 						);
				?>
				

				
				<?php //echo $ajax->submit('Submit', array('url'=> array('controller'=>'MrSourceControls', 'action'=>'updateSources'),'div'=>FALSE, 'update' => 'divUpdateSource_'.$mrSourceControl['MrSourceControl']['id']));?>

				

			</span>
		</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mrSourceControl['MrSourceControl']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mrSourceControl['MrSourceControl']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mrSourceControl['MrSourceControl']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mrSourceControl['MrSourceControl']['id'])); ?>
		</td>
	</tr>
	
	<?php 
	echo  '<script>'."\n"
			 ."\t"."\t"."require(['jquery','jquery-ui','bootstrap'], function($) {"."\n"
			 ."\t"."\t"."\t"."$(document).ready(function () {"."\n"
			 ."\t"."\t"."\t"."\t"."$(function () {"."\n"
			 ."\t"."\t"."\t"."\t"."\t"."$('#calendar_from_".$mrSourceControl['MrSourceControl']['id']."').datepicker({"."\n"
			 ."\t"."\t"."\t"."\t"."\t"."\t"."showButtonPanel: true,"."\n"
			 ."\t"."\t"."\t"."\t"."\t"."\t".'onClose:function(selectedDate){$("#calendar_to_'.$mrSourceControl['MrSourceControl']['id'].'").datepicker("option","minDate",selectedDate );}'."\n"
			 ."\t"."\t"."\t"."\t"."\t"."});"."\n"
			 ."\t"."\t"."\t"."\t"."});"."\n"
			 ."\t"."\t"."\t"."});"."\n"
			 ."\t"."\t"."});"."\n"
			 ."\t".'</script>'."\n";
	?>

	<?php 
	echo  '<script>'."\n"
			 ."\t"."\t"."require(['jquery','jquery-ui','bootstrap'], function($) {"."\n"
			 ."\t"."\t"."\t"."$(document).ready(function () {"."\n"
			 ."\t"."\t"."\t"."\t"."$(function () {"."\n"
			 ."\t"."\t"."\t"."\t"."\t"."$('#calendar_to_".$mrSourceControl['MrSourceControl']['id']."').datepicker({"."\n"
			 ."\t"."\t"."\t"."\t"."\t"."\t"."showButtonPanel: true,"."\n"
			 ."\t"."\t"."\t"."\t"."\t"."\t".'onClose:function(selectedDate){$("#calendar_from_'.$mrSourceControl['MrSourceControl']['id'].'").datepicker("option","maxDate",selectedDate );}'."\n"
			 ."\t"."\t"."\t"."\t"."\t"."});"."\n"
			 ."\t"."\t"."\t"."\t"."});"."\n"
			 ."\t"."\t"."\t"."});"."\n"
			 ."\t"."\t"."});"."\n"
			 ."\t".'</script>'."\n";

	?>
	
<?php endforeach; ?>
				</table>
<span> <!--container-->
				<span><?php echo $this->Form->button('Build', array('class'=>'btn btn-success pull-right'));?></span>

				
<!--<style>
				.hidden {
					display:none;
/* 					width:100%; */
				}
</style>-->

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
			<span id="divUpdateSource"></span> <!--divUpdateSource-->
			<span id="loading" style="display:none;" ><i class="fa fa-spinner fa-pulse fa-4x"></i></span>

			<?php $_SESSION['Auth']['User']['root_modal'] = '<i class="fa fa-spinner fa-pulse fa-4x"></i>';?>
			<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">Ayuda</a>


        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->

	<script>
	/*-------------------------------------------
		Function for jQuery-UI page (ui_jquery-ui.html)
	---------------------------------------------*/
		require(['jquery','jquery-ui','bootstrap'], function($) {
			$(document).ready(function () {
			
			// Define the Spanish languaje
// 				$.datepicker.regional['es'] = {
// 				closeText: 'Cerrar',
// 				prevText: '<Ant',
// 				nextText: 'Sig>',
// 				currentText: 'Hoy',
// 				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
// 				monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
// 				dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
// 				dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
// 				dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
// 				weekHeader: 'Sm',
// 				dateFormat: 'mm/dd/yy',
// 				firstDay: 1,
// //				numberOfMonths: 2,
// 				isRTL: false,
// 				showMonthAfterYear: false,
// 				yearSuffix: ''
// 				};
// 				$.datepicker.setDefaults($.datepicker.regional['es']);
			// start the datepicker

// 												$(function () {
// 														$('#calendar_create_1').datepicker({showButtonPanel: true});
// 												});

// 												$('#calendar_create_1').datepicker({
// 																		showButtonPanel: true
// 												});
			});
		});
	</script>

	<script>
			require(['isotope','jquery'], function($) {
				$(document).ready(function () {
					

				});//end document.ready
			});//end require

			
	</script>
