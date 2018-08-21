
<?php
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
// 	$evaluate = false;
// 	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
// 	debug($this->Paginator->counter(array('format'=>'%pages%')));
// 	debug($this->Paginator->counter(array('format'=>'%page%')));
// 	debug($secureTopics);
// e($this->Html->script($theme.'jquery/jquery.min'));
// debug($secureControl_id);
?>
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->

<!--         <div class="col-md-offset-1 col-sm-11 col-md-11"> -->
<!--           <ul class="list-group list-inline"> -->
<!--		<li class="list-group-item">
			<?php //echo $this->Html->link(__('New Secure Control User', true), array('action' => 'add')); ?>
		</li>
		<li class="list-group-item">
			<?php //echo $this->Html->link(__('List Secure Structures', true), array('controller' => 'secure_structures', 'action' => 'index')); ?>
		</li>
		<li class="list-group-item">
			<?php //echo $this->Html->link(__('New Secure Structures', true), array('controller' => 'secure_structures', 'action' => 'add')); ?>
		</li>
		<li class="list-group-item">
			<?php //echo $this->Html->link(__('List View Get Payrolls', true), array('controller' => 'view_get_payrolls', 'action' => 'index')); ?>
		</li>
		<li class="list-group-item">
			<?php //echo $this->Html->link(__('New View Get Payrolls', true), array('controller' => 'view_get_payrolls', 'action' => 'add')); ?>
		</li>-->
<!-- 		<li> -->
<!-- 			<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter"> -->
<!-- 		</li> -->
<!--           </ul> -->
<!--         </div> -->

<!--         <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main"> -->
<!--         <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1"> -->
<!--           <h1 class="page-header"><?php //__('Secure Control Users');?></h1> -->
<!--           <div class="table-responsive"> -->
<!-- 			<span class="filter-container"> -->
<span class="reload_control_users">
	<?php echo $this->Form->create('ViewGetPayroll',array('enctype' => 'multipart/form-data','class'=>'form','id'=>'postControlUser'));?>
	<table class="table table-bordered table-hover table-striped responstable" width="100%">
	<thead>
		<tr>
<!-- 													<th><?php echo $this->Paginator->sort('id');?></th> -->
<!-- 													<th><?php echo $this->Paginator->sort('secure_structures_id');?></th> -->
			<th><?php echo $this->Paginator->sort('Clave');?></th>
			<th><?php echo $this->Paginator->sort('view_get_payrolls_id');?></th>
			<th><?php echo $this->Paginator->sort('Puesto');?></th>
			<th><?php echo $this->Paginator->sort('Company');?></th>
<!-- 													<th><?php echo $this->Paginator->sort('secure_calendars_id');?></th> -->
			<th><?php //echo $this->Paginator->sort('course_is_taken');?>
														<span class="checkbox" >
															<label>
																<input type="checkbox" name="data[SecureControlUserCheck][editable]" id="controlUserCheck" class="controlUserCheck form-inline">
																<i class="fa fa-square-o"></i>
															</label>
														</span>
			</th>
			<th><?php echo $this->Paginator->sort('description');?></th>
<!-- 													<th><?php echo $this->Paginator->sort('create');?></th> -->
<!-- 													<th><?php echo $this->Paginator->sort('modified');?></th> -->
<!-- 													<th><?php echo $this->Paginator->sort('status');?></th> -->
													<th class="actions" colspan="3"><?php __('Actions');?></th>

		</tr>
	</thead>
	<?php
		foreach ($secureControlUsers as $secureControlUser):
	?>
	<tr>
<!-- 		<td><?php echo $secureControlUser['SecureControlUser']['id']; ?>&nbsp;</td> -->
<!-- 		<td> -->
			<?php //echo $this->Html->link($secureControlUser['SecureStructures']['id'], array('controller' => 'secure_structures', 'action' => 'view', $secureControlUser['SecureStructures']['id'])); ?>
<!-- 		</td> -->
<!--		<td>
			<?php //echo $this->Html->link($secureTopics[$secureControlUser['SecureStructures']['secure_topics_id']], array('controller' => 'secure_topics', 'action' => 'view', $secureControlUser['SecureStructures']['secure_topics_id'])); ?>
		</td>-->
		<td>
			<?php echo $this->Html->link($secureControlUser['SecureControlUser']['view_get_payrolls_id'], array('controller' => 'view_get_payrolls', 'action' => 'view', $secureControlUser['ViewGetPayrolls']['Cvetra'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureControlUser['ViewGetPayrolls']['Nombre'].' '.$secureControlUser['ViewGetPayrolls']['Apepat'].' '.$secureControlUser['ViewGetPayrolls']['Apemat'], array('controller' => 'view_get_payrolls', 'action' => 'view', $secureControlUser['ViewGetPayrolls']['Cvetra'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureControlUser['ViewGetPayrolls']['Puesto'], array('controller' => 'view_get_payrolls', 'action' => 'view', $secureControlUser['ViewGetPayrolls']['Cvetra'])); ?>
		</td>

		<td>
			<?php echo $this->Html->link($secureControlUser['ViewGetPayrolls']['Company'], array('controller' => 'view_get_payrolls', 'action' => 'view', $secureControlUser['ViewGetPayrolls']['Cvetra'])); ?>
		</td>


<!--		<td>
			<?php echo $this->Html->link($secureCalendars[$secureControlUser['SecureStructures']['secure_calendars_id']], array('controller' => 'secure_topics', 'action' => 'view', $secureControlUser['SecureStructures']['secure_calendars_id'])); ?>
		</td>-->

<!-- 		<td><?php //echo $secureControlUser['SecureControlUser']['course_is_taken']; ?>&nbsp;</td> -->
		<td>
			<div class="checkbox">
				<label>&nbsp;
					<input type="checkbox" name="data[SecureControlUser][<?php e($secureControlUser['SecureControlUser']['view_get_payrolls_id']);?>]" id="chk_<?php e($secureControlUser['SecureControlUser']['view_get_payrolls_id']);?>" <?php $secureControlUser['SecureControlUser']['course_is_taken'] ? e('checked') : '';?>>
					<i class="fa fa-square-o"></i>
				</label>
			</div>
		</td>

		<td><?php echo $secureControlUser['SecureControlUser']['description']; ?>&nbsp;</td>
<!-- 		<td><?php echo $secureControlUser['SecureControlUser']['create']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $secureControlUser['SecureControlUser']['modified']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $secureControlUser['SecureControlUser']['status']; ?>&nbsp;</td> -->
 		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $secureControlUser['SecureControlUser']['id'])); ?>
		</td>
 		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('controller'=>'SecureControlUsers','action' => 'edit', $secureControlUser['SecureControlUser']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('controller'=>'SecureControlUsers','action' => 'delete', $secureControlUser['SecureControlUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $secureControlUser['SecureControlUser']['id'])); ?>
 		</td>
	</tr>
<?php endforeach; ?>
	</table>



			<!--</span>--> <!--class="filter-container"-->
	<p>
		<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
			));
			?>
	</p>
</span> <!--end reload_control_users-->

<span class="updatePagination">
	<ul class="pagination">
		<?php
			echo $this->Paginator->prev( '«' ,array('tag'=>'li'),null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
		?>
		<?php
			echo $this->Paginator->numbers(array('separator' => null,'tag'=>'li','class'=>'numbers'));
		?>
		<?php
			echo $this->Paginator->next( '»' , array('tag'=>'li'), null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
		?>
	</ul>
</span>
		<?php echo $this->Form->button('Update', array('class'=>'btn btn-success pull-right' ,'id'=>"updateControlUser"));?>
		<?php echo $this->Form->input('SecureControl_id.secureControl_id',array('type'=>'hidden','value'=>$secureControl_id))?>
		<?php echo $this->Form->end();?>
<div id="updateMessage" style="display: none"><div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Success:</span>&nbsp;Los datos se han guardado correctamente</div></div>
<!--           </div> -->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div> --><!--container fluid-->


	<script>
	$(document).ready(function () {
		//NOTE reload the table when pagiantor is set
		$('li a').on("click",function (e) {
			e.preventDefault(); // avoids calling success.php from the link
			console.log($(this).attr('href'));
// 			urlViewData = "<?php echo Dispatcher::baseUrl();?>/SecureControlUsers/index/" + $(this).text();
			urlViewData = $(this).attr('href') + ' .reload_control_users';
// 			urlViewDataPagination = $(this).attr('href') + ' .updatePagination';
			console.log($(this).text());
// 			$(".reload_control_users").show();
			$(".reload_control_users").load(urlViewData);
// 			$(".updatePagination").load(urlViewDataPagination);
// 			console.log(urlViewData);
// 			$.ajax({
// 				type: "POST",
// 				cache: false,
// 				url: urlViewData, // success.php
// 				data: "data[SecureStructure][id]="+$(this).attr("data-id"), // only one id and cakephp this->data compabilitie
// 				success: function (data) {
// 				// on success, post returned data in fancybox
// 				console.log(data);
//
// // 				$.fancybox(data, {
// // 					// fancybox API options
// // // 						openEffecct:'none',
// // // 						closeEffect:'none',
// // // 						autoDimensions: false,
// // // 						onComplete:$.fancybox.resize()
// // // 						autoCenter : false,
// // 					maxWidth	: 1900,
// // 					maxHeight	: 800,
// // 					fitToView	: false,
// // 					width		: '100%',
// // 					height	: '80%',
// // 					autoSize	: false,
// // 					closeClick	: false,
// // 					openEffect	: 'none',
// // 					closeEffect	: 'none',
// // 					enableEscapeButton:true
// // // 						helpers : {
// // // 							overlay : {closeClick: false}
// // // 						}
// // 				}); // fancybox
// 				} // success
// 			}); // ajax
// 		return false;
		}); // on reload_control_users

		// NOTE check all mechanism
		$('#controlUserCheck').on('click',function () {
			var isChecked = $(".controlUserCheck").prop('checked') ? true : false;
// 			alert(isChecked);
			console.log($("INPUT[id^='chk_']").is(':visible'));
			if (isChecked == true) {
				$("INPUT[id^='chk_']:visible").prop('checked', this.checked);
			} else {
				$("INPUT[id^='chk_']").prop('checked', this.checked).change();
			}
		}); // on controlUserCheck

		// NOTE Update the status of selected users something like on click.post.load
		$('#updateControlUser').on('click',function(e) {
			e.preventDefault(); // avoids calling form from the button
// 			var isUpdate = $(this).attr('href');
// 			console.log(event);
// 			console.log($(this).attr("data-id"));
// 			console.log($('form#postControlUser').serialize());
			var isUpdate = "<?php echo Dispatcher::baseUrl();?>/SecureControlUsers/edit/";
// 			console.log(isUpdate);
			$.ajax({
				url: isUpdate,
				type: 'post',
				dataType: 'json',
				data: $('form#postControlUser').serialize(),
				success: function(data) {
						console.log(
							'<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>Enter a valid email address</div>'
						);
					}
			}).always(function() {
					$("#updateMessage").hide().fadeIn(1000);
					$("#updateMessage").show().fadeIn(1000);
			});
//
		});
	});
	</script>

<?php
// 	$evaluate = false;
// 	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>
