<?php 
// 	debug($users);
?>
			<div id="dialog" style="color:black;width:620px;">

					<div class="modal-body">
						<?php echo $this->Form->create('SecureCalendar');?>
							<fieldset>
								<legend><?php __('Add Calendar'); ?></legend>
							<?php
								echo $this->Form->input('SecureCalendar.title',array('class'=>'form-control','label'=>'Nombre del Evento'));
							?>
<!--							<div class="checkbox">
								<label>Allday
									<input type="checkbox" name="data[Calendar][allday]" value="" >
									<i class="fa fa-square-o"></i>
								</label>
							</div>-->
<!--							<div class="checkbox">
								<label>Editable
									<input type="checkbox" name="data[Calendar][editable]">
									<i class="fa fa-square-o"></i>
								</label>
							</div>-->
							<?php
								/** NOTE @SecureStructures <section>*/
								echo $this->Form->input('SecureStructure.group_id',array('placeholder'=>'group_id','class'=>'input','label'=>'Grupo'));
								echo $this->Form->input('SecureStructure.user_id',array('placeholder'=>'user_id','class'=>'input','label'=>'Usuario'));
								echo $this->Form->input('SecureStructure.secure_topics_id',array('placeholder'=>'secure_topics_id','class'=>'input','label'=>'Tema'));
								echo $this->Form->input('SecureStructure.secure_topics_types_id',array('placeholder'=>'secure_topics_types_id','class'=>'input','label'=>'Documento'));
								echo $this->Form->input('SecureStructure.secure_gpo_chiefs_id',array('placeholder'=>'secure_gpo_chiefs_id','class'=>'input','label'=>'Responsable'));
								echo $this->Form->input('SecureStructure.secure_goes_id',array('placeholder'=>'secure_goes_id','class'=>'input','label'=>'Dirigido a :'));
							?>
							<?php
// 								echo $this->Form->input('url',array('class'=>'form-control'));
// 								echo $this->Form->input('constraint',array('class'=>'form-control'));
								echo $this->Form->text('SecureCalendar.color',array('type'=>'color','value'=>"#ff0000",'onchange'=>"clickColor(0, -1, -1, 5)",'class'=>'form-control','label'=>'Seleccione un Color'));
// 								echo $this->Form->input('rendering',array('class'=>'form-control'));
// 								echo $this->Form->input('overlap',array('class'=>'form-control'));
								echo $this->Form->input('SecureCalendar.description',array('class'=>'form-control','label'=>'Descripcion'));
// 								echo $this->Form->input('create');
// 								echo $this->Form->input('status');
							?>
							<?php e($this->Form->input('SecureCalendar.start',array('type'=>'hidden','value'=>$event['SecureCalendar']['start'])));?>
							<?php e($this->Form->input('SecureCalendar.end',array('type'=>'hidden','value'=>$event['SecureCalendar']['end'])));?>
							</fieldset>
							<div>&nbsp;</div>
							<div class="form-group pull-right">
								<?php echo $this->Form->end(array('div'=>false,'class'=>'btn btn-success'));?>
<!-- 								<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> -->
							</div>
					</div>
			</div>

			
			
<!--<form action="<?php //echo Dispatcher::baseUrl();?>/SecureStructures/add" id="searchForm">
  <input type="text" name="data" placeholder="Search..." class="input">
  <input type="submit" value="Search" class="btn btn-success">
</form>

<div id="list" class="panel"><kbd>click</kbd></div>
the result of the search will be rendered inside this div
 -->
<!-- <div id="result"><kbd>DATA</kbd></div> -->

<script>
// 	$(document).ready(function () {
// 		
// 		$('.panel').click(function() {
// 			var id = $(this).attr('id');
// 			$.post("<?php echo Dispatcher::baseUrl();?>/SecureStructures/add",{id:id,data:"test",temporal:"tmp"}, function(data){
// 			console.log(data);
// 			}, 'json');
// 		});
// 		
// 		// Attach a submit handler to the form
// 		$( "#searchForm" ).submit(function( event ) {
// 		
// 			// Stop form from submitting normally
// 			event.preventDefault();
// 			
// 			// Get some values from elements on the page:
// 			var $form = $( this ),
// // 			console.log($form);
// // 			term = $form.find( "input[name='data']" ).val(),
// 			term0 = $form.find( "input[name='data']" ).val(),
// // 			url = $form.attr( "action" );
// 			url = "<?php echo Dispatcher::baseUrl();?>/SecureCalendars/add/" + term0;
// // 			console.log(url);
// // 			console.log(term);
// 			console.log(url);
// 
// // 			base64_encode(JSON.stringify([{id:event.id,days:delta._days,months:delta._months,milisecs:delta._milliseconds,view_type:view.type}]));
// // 			$.post("<?php echo Dispatcher::baseUrl();?>/SecureCalendars/dropsize/id:" + event.id + "/" + data_ + "/");
// // 			console.log(form);
// 			// Send the data using post
// 			
// 			var posting = $.post( url, { data: term0 } );
// 			
// 			console.log(posting);
// // 			console.log(data);
// 			// Put the results in a div
// 			posting.done(function( data ) {
// 				var content = $( data ).find( "#content" );
// // 				console.log(data);
// // 				console.log(content);
// 				
// 				$( "#result" ).empty().append( content );
// // 				$( "#result" ).append( content );
// // 				$( "#result" ).show();
// // 				$( "#result" ).load( content );
// 			});
// 		});
		
		//working
// 		$.post( "<?php echo Dispatcher::baseUrl();?>/SecureStructures/", function( data ) {
// 			alert( "Data Loaded: " + data );
// 		});
// 	});
</script>