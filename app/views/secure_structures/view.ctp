<?php
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>


<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
<!--         <div class="col-md-offset-1 col-sm-11 col-md-11"> -->
<!--             <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main"> -->
                
<!-- <div class="secureStructures"> -->


	<table class="table">
		<tr>
			<td>
				<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading"><h4>Description</h4></div>
				<div class="panel-body">
				<p>A list of terms with their associated descriptions.</p>
				</div>
						<dl class="dl-horizontal">
							<!--<dt><?php __('Id'); ?></dt>
							<dd>
								<?php echo $secureStructure['SecureStructure']['id']; ?>
								&nbsp;
							</dd>
							<dt><?php __('Group'); ?></dt>
							<dd>
								<?php echo $this->Html->link($secureStructure['Group']['name'], array('controller' => 'groups', 'action' => 'view', $secureStructure['Group']['id'])); ?>
								&nbsp;
							</dd>-->
							<dt><?php __('Presentador'); ?></dt>
							<dd>
								<?php echo $this->Html->link($secureStructure['User']['name'], array('controller' => 'users', 'action' => 'view', $secureStructure['User']['id'])); ?>
								&nbsp;
							</dd>
							<dt><?php __('Tema'); ?></dt>
							<dd>
								<?php echo $this->Html->link($secureStructure['SecureTopics']['name'], array('controller' => 'secure_topics', 'action' => 'view', $secureStructure['SecureTopics']['id'])); ?>
								&nbsp;
							</dd>
							<dt><?php __('Documento'); ?></dt>
							<dd>
								<?php echo $this->Html->link($secureStructure['SecureTopicsTypes']['name'], array('controller' => 'secure_topics_types', 'action' => 'view', $secureStructure['SecureTopicsTypes']['id'])); ?>
								&nbsp;
							</dd>
							<dt><?php __('Responsable'); ?></dt>
							<dd>
								<?php echo $this->Html->link($secureStructure['SecureGpoChiefs']['name'], array('controller' => 'secure_gpo_chiefs', 'action' => 'view', $secureStructure['SecureGpoChiefs']['id'])); ?>
								&nbsp;
							</dd>
							<dt><?php __('Dirigido a'); ?></dt>
							<dd>
								<?php echo $this->Html->link($secureStructure['SecureGoes']['name'], array('controller' => 'secure_gos', 'action' => 'view', $secureStructure['SecureGoes']['id'])); ?>
								&nbsp;
							</dd>
							<dt><?php __('Secure Calendars'); ?></dt>
							<dd>
								<?php echo $this->Html->link($secureStructure['SecureCalendars']['title'], array('controller' => 'secure_calendars', 'action' => 'view', $secureStructure['SecureCalendars']['id'])); ?>
								&nbsp;
							</dd>
							<dt><?php __('Description'); ?></dt>
							<dd>
								<?php echo $secureStructure['SecureStructure']['description']; ?>
								&nbsp;
							</dd>
							<dt><?php __('Inicia'); ?></dt>
							<dd>
								<?php echo $this->Html->link($secureStructure['SecureCalendars']['start'], array('controller' => 'secure_calendars', 'action' => 'view', $secureStructure['SecureCalendars']['id'])); ?>
							</dd>
							<dt><?php __('Termina'); ?></dt>
							<dd>
								<?php echo $this->Html->link($secureStructure['SecureCalendars']['end'], array('controller' => 'secure_calendars', 'action' => 'view', $secureStructure['SecureCalendars']['id'])); ?>
							</dd>
							<!--<dt><?php __('Create'); ?></dt>
							<dd>
								<?php echo $secureStructure['SecureStructure']['create']; ?>
								&nbsp;
							</dd>
							<dt><?php __('Modified'); ?></dt>
							<dd>
								<?php echo $secureStructure['SecureStructure']['modified']; ?>
								&nbsp;
							</dd>-->
							<!--<dt><?php __('Status'); ?></dt>
							<dd>
								<?php echo $secureStructure['SecureStructure']['status']; ?>
								&nbsp;
							</dd>-->
						</dl>

<!-- 					<div class="panel-footer"></div> -->
				</div>

			</td>

			<td>
				<div id="loadStructControlUser"></div>
			</td>
		</tr>
	</table>
<!-- </div> -->
<!--</div>-->
<!-- </div> -->






<script>
// 	alert(loadStructMenu);
// 	e.preventDefault();
	// reload table loadStructControlUser when use pagination buttons
// 	$("#your_button_id").click(function(){
// 		$("#your_div_id").load("url to your php file");
// 	});
	$(document).ready(function () {
		var loadStructControlUser = "<?php echo Dispatcher::baseUrl();?>" + '/SecureControlUsers/index/' + "<?php echo $secureStructure['SecureStructure']['id']; ?>";
// 		$("#loadStructControlUser").show(); //for the animation
		$("#loadStructControlUser").load(loadStructControlUser);
		
// 		$('.pagination a').on("click",function (e) {
// // 			var urlViewDataPagination = $(this).attr('href') + ' .updatePagination';
// 			var urlViewDataPagination = "<?php echo Dispatcher::baseUrl();?>/SecureControlUsers/index/" + $(this).text();
// 			
// 			console.log('urlViewDataPagination => ' + urlViewDataPagination);
// 			$(".updatePagination").load(urlViewDataPagination);
// 		});
	});
	
	
</script>


<!-- </div> -->