<?php
// SecureCalendar index
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
// 	$evaluate = false;
// 	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );

?>
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->

<!--         <div class="col-md-offset-1 col-sm-11 col-md-11"> -->
<!--           <ul class="list-group list-inline"> -->
<!--  			<li class="list-group-item"> -->
				<?php //echo $this->Html->link(__('New Secure Structure', true), array('action' => 'add'), array('id'=>'newSecureStructure')); ?>
<!-- 			</li>  -->
			<!--<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>-->
<!--           </ul> -->
<!--         </div> -->
        
<!--         <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main"> -->


          <h1 class="page-header"><?php __('Secure Structures (Avaliable Courses)');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table id="user_info" class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('ID','id');?></th>
<!-- 						<th><?php echo $this->Paginator->sort('group_id');?></th> -->
						<th><?php echo $this->Paginator->sort('Presentador','user_id');?></th>
						<th><?php echo $this->Paginator->sort('Tema','secure_topics_id');?></th>
						<th><?php echo $this->Paginator->sort('Documento','secure_topics_types_id');?></th>
						<th><?php echo $this->Paginator->sort('Responsable','secure_gpo_chiefs_id');?></th>
						<th><?php echo $this->Paginator->sort('Dirigido a:','secure_goes_id');?></th>
<!-- 						<th><?php echo $this->Paginator->sort('Fechas','secure_calendars_id');?></th> -->
						<th><?php echo $this->Paginator->sort('Inicio','secure_calendars_id');?></th>
						<th><?php echo $this->Paginator->sort('Fin','secure_calendars_id');?></th>
<!-- 						<th><?php echo $this->Paginator->sort('Duracion','secure_calendars_id');?></th> -->
<!-- 						<th><?php echo $this->Paginator->sort('Descripcion','description');?></th> -->
<!-- 						<th><?php echo $this->Paginator->sort('create');?></th> -->
<!-- 						<th><?php echo $this->Paginator->sort('modified');?></th> -->
<!-- 						<th><?php echo $this->Paginator->sort('status');?></th> -->
						<th class="actions" colspan="4"><?php __('Actions');?></th>
							
					</tr>
				</thead>
<?php
// 	$i = 0;
	foreach ($secureStructures as $secureStructure):
// 		$class = null;
// 		if ($i++ % 2 == 0) {
// 			$class = ' class="altrow"';
// 		}
?>
	<tr>
		<td><?php echo $secureStructure['SecureStructure']['id']; ?>&nbsp;</td>
<!-- 		<td> -->
			<?php //echo $this->Html->link($secureStructure['Group']['name'], array('controller' => 'groups', 'action' => 'view', $secureStructure['Group']['id'])); ?>
<!-- 		</td> -->
		<td>
			<?php echo $this->Html->link($secureStructure['User']['name'], array('controller' => 'users', 'action' => 'view', $secureStructure['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureStructure['SecureTopics']['name'], array('controller' => 'secure_topics', 'action' => 'view', $secureStructure['SecureTopics']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureStructure['SecureTopicsTypes']['name'], array('controller' => 'secure_topics_types', 'action' => 'view', $secureStructure['SecureTopicsTypes']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureStructure['SecureGpoChiefs']['name'], array('controller' => 'secure_gpo_chiefs', 'action' => 'view', $secureStructure['SecureGpoChiefs']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureStructure['SecureGoes']['name'], array('controller' => 'secure_goes', 'action' => 'view', $secureStructure['SecureGoes']['id'])); ?>
		</td>
<!-- 		<td> -->
			<?php //echo $this->Html->link($secureStructure['SecureCalendars']['title'], array('controller' => 'secure_calendars', 'action' => 'view', $secureStructure['SecureCalendars']['id'])); ?>
<!-- 		</td> -->
		<td>
			<?php echo $this->Html->link($secureStructure['SecureCalendars']['start'], array('controller' => 'secure_calendars', 'action' => 'view', $secureStructure['SecureCalendars']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($secureStructure['SecureCalendars']['end'], array('controller' => 'secure_calendars', 'action' => 'view', $secureStructure['SecureCalendars']['id'])); ?>
		</td>
<!-- 		<td> -->
			<?php //echo $this->Html->link($secureStructure['SecureCalendars']['end']-$secureStructure['SecureCalendars']['start'], array('controller' => 'secure_calendars', 'action' => 'view', $secureStructure['SecureCalendars']['id'])); ?>
<!-- 		</td> -->
<!-- 		<td><?php echo $secureStructure['SecureStructure']['description']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $secureStructure['SecureStructure']['create']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $secureStructure['SecureStructure']['modified']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $secureStructure['SecureStructure']['status']; ?>&nbsp;</td> -->
		<td class="actions">
			<a href="#" id="structureCheck" data-id="<?php echo $secureStructure['SecureStructure']['id'];?>">
				Agregar Usuarios
			</a>
		</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $secureStructure['SecureStructure']['id']),array('id'=>'structureView','data-id'=>$secureStructure['SecureStructure']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $secureStructure['SecureStructure']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $secureStructure['SecureStructure']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $secureStructure['SecureStructure']['id'])); ?>
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
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

	<script>
		$(document).ready(function () {
			
			
			$('#user_info #structureCheck').on("click", function (e) {
				e.preventDefault(); // avoids calling success.php from the link
				console.log($(this).attr("data-id"));
				urlData = "<?php echo Dispatcher::baseUrl();?>/ViewGetPayrolls/";
				$.ajax({
					type: "POST",
					cache: false,
// 					url: this.href, // success.php
					url: urlData, // success.php
// 					data: $("#contact").serializeArray(), // all form fields
					data: "data[ViewGetPayroll][id]="+$(this).attr("data-id"), // only one id and cakephp this->data compabilitie
					success: function (data) {
					// on success, post returned data in fancybox
					console.log(data);
					
					$.fancybox(data, {
						// fancybox API options
	// 					fitToView: false,
// 						showLoading:true,
// 						transitionIn: 'none',
// 						transitionOut: 'none',
						openEffecct:'none',
						closeEffect:'none'
// 						autoDimensions: false,
					}); // fancybox
					} // success
				}); // ajax
			}); // on
			
			$('#user_info #structureView').on("click", function (e) {
				e.preventDefault(); // avoids calling success.php from the link
				console.log($(this).attr("data-id"));
				urlViewData = "<?php echo Dispatcher::baseUrl();?>/SecureStructures/view/" + $(this).attr("data-id");
				console.log(urlViewData);
				$.ajax({
					type: "POST",
					cache: false,
					url: urlViewData, // success.php
					data: "data[SecureStructure][id]=" + $(this).attr("data-id"), // only one id and cakephp this->data compabilitie
					success: function (data) {
					// on success, post returned data in fancybox
					console.log(data);
					
					$.fancybox(data, {
						// fancybox API options
// 						openEffecct:'none',
// 						closeEffect:'none',
// 						autoDimensions: false,
// 						onComplete:$.fancybox.resize()
// 						autoCenter : false,
						maxWidth	: 1900,
						maxHeight	: 800,
						fitToView	: false,
						width		: '100%',
						height	: '80%',
						autoSize	: false,
						closeClick	: false,
						openEffect	: 'none',
						closeEffect	: 'none',
						enableEscapeButton:true
// 						helpers : { 
// 							overlay : {closeClick: false}
// 						}
					}); // fancybox
					} // success
				}); // ajax
			}); // on
			
			
// 				$('#user_info kbd').click(function () {
// // 					e.preventDefault(); // avoids calling success.php from the link
// 					urlData = "<?php echo Dispatcher::baseUrl();?>/ViewGetPayrolls/";
// // 					alert(urlData);
// 					console.log($(this).attr("data-id"));
// 					if (urlData) {
// 						$.fancybox({
// 							'type': 'ajax',
// 							'href': urlData,
// 							'autoScale': true,
// 							'autoDimensions': false
// 						})
// 					}
// // 					
// 				});
		});//ready
	</script>



