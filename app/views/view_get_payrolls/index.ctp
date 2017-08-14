<?php
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
// e($this->Html->script($theme.'fastLiveFilter/jquery.fastLiveFilter',false));
// debug($secure_structure_data_id);
?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
<!-- 			<li class="list-group-item"> -->
				<?php //echo $this->Html->link(__('New View Get Payroll', true), array('action' => 'add')); ?>
<!-- 			</li> -->
<!-- 			<li> -->
<!-- 				<input type="search" class="light-table-filter form-control" data-table="order-table" placeholder="Filter"> -->
<!-- 			</li> -->
			<li>
				<input type="search" id="filter" class="form-control filter" placeholder="Filter">
			</li>
			<li class="list-group-item">
				<a id="clear" href="javascript:void(0)">Clear</a>
			</li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('View Get Payrolls');?></h1>
          <div class="table-responsive">
<!-- 			<span class="filter-container"> -->
			
			<?php echo $this->Form->create('ViewGetPayroll',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			
				<table class="table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th>
														<?php //echo $this->Paginator->sort('check');?>
														<div class="checkbox">
															<label>
																<input type="checkbox" name="data[Calendar][editable]" id="myCheck" class="myCheck">
																<i class="fa fa-square-o"></i>
															</label>
														</div>
													</th>
													<th><?php echo $this->Paginator->sort('id');?></th>
<!-- 													<th><?php echo $this->Paginator->sort('Cvetno');?></th> -->
<!-- 													<th><?php echo $this->Paginator->sort('Cvepue');?></th> -->
<!-- 													<th><?php echo $this->Paginator->sort('Cvecia');?></th> -->
<!-- 													<th><?php echo $this->Paginator->sort('Cveare');?></th> -->
													<th><?php echo $this->Paginator->sort('Cvetra');?></th>
													<th><?php echo $this->Paginator->sort('Apepat');?></th>
													<th><?php echo $this->Paginator->sort('Apemat');?></th>
													<th><?php echo $this->Paginator->sort('Nombre');?></th>
													<th><?php echo $this->Paginator->sort('Nomina');?></th>
													<th><?php echo $this->Paginator->sort('Company');?></th>
													<th><?php echo $this->Paginator->sort('Area');?></th>
													<th><?php echo $this->Paginator->sort('Departamento');?></th>
													<th><?php echo $this->Paginator->sort('Puesto');?></th>
<!-- 													<th><?php echo $this->Paginator->sort('Baja');?></th> -->
<!-- 													<th><?php echo $this->Paginator->sort('Numrfc');?></th> -->
<!-- 													<th><?php echo $this->Paginator->sort('Curp');?></th> -->
<!-- 													<th><?php echo $this->Paginator->sort('Numims');?></th> -->
<!-- 													<th><?php echo $this->Paginator->sort('Cvecau');?></th> -->
<!-- 													<th class="actions" colspan="3"><?php __('Actions');?></th> -->
							
					</tr>
				</thead>
	
				<?php
				$i = 0;
				foreach ($viewGetPayrolls as $viewGetPayroll):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td>
		<div class="checkbox">
			<label>&nbsp;
				<input type="checkbox" name="data[ViewGetPayroll][<?php e($viewGetPayroll['ViewGetPayroll']['Cvetra']);?>]" id="chk_<?php e($viewGetPayroll['ViewGetPayroll']['id']);?>">
				<i class="fa fa-square-o"></i>
			</label>
		</div>
		</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['id']; ?>&nbsp;</td>
<!-- 		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Cvetno']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Cvepue']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Cvecia']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Cveare']; ?>&nbsp;</td> -->
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Cvetra']; ?>&nbsp;</td>
		<td><?php echo utf8_encode($viewGetPayroll['ViewGetPayroll']['Apepat']); ?>&nbsp;</td>
		<td><?php echo utf8_encode($viewGetPayroll['ViewGetPayroll']['Apemat']); ?>&nbsp;</td>
		<td><?php echo utf8_encode($viewGetPayroll['ViewGetPayroll']['Nombre']); ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Nomina']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Company']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Area']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Departamento']; ?>&nbsp;</td>
		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Puesto']; ?>&nbsp;</td>
<!-- 		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Baja']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Numrfc']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Curp']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Numims']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $viewGetPayroll['ViewGetPayroll']['Cvecau']; ?>&nbsp;</td> -->
<!-- 		<td class="actions"> -->
			<?php //echo $this->Html->link(__('View', true), array('action' => 'view', $viewGetPayroll['ViewGetPayroll']['id'])); ?>
<!-- 		</td> -->
<!-- 		<td class="actions"> -->
			<?php //echo $this->Html->link(__('Edit', true), array('action' => 'edit', $viewGetPayroll['ViewGetPayroll']['id'])); ?>
<!-- 		</td> -->
<!-- 		<td class="actions"> -->
			<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $viewGetPayroll['ViewGetPayroll']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $viewGetPayroll['ViewGetPayroll']['id'])); ?>
<!-- 		</td> -->
	</tr>
<?php endforeach; ?>
		
				</table>

		<?php if (isset($secure_structure_data_id)) { ?>
		<?php 	echo $this->Form->input('SecureStructure.id',array('type'=>'hidden','value'=>$secure_structure_data_id))?>
		<?php } ?>
		<?php echo $this->Form->button('Build', array('class'=>'btn btn-success pull-right'));?>
		<?php echo $this->Form->end();?>

			<!--</span>--> <!--class="filter-container"-->
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
          
		<script>
			$(document).ready(function () {
				$('#myCheck').click(function () {
					 var isChecked = $(".myCheck").prop('checked') ? true : false;
					 
// 					 alert(isChecked);
// 					 console.log($("INPUT[id^='chk_']").is(':visible'));
						if (isChecked == true) {
// 							console.log($("INPUT[id^='chk_']"));
							$("INPUT[id^='chk_']:visible").prop('checked', this.checked);
// 							input[type=checkbox][checked]
// 							$("input[type=checkbox]:visible").each(function() {
// 								if ( $(this).prop('checked') === false ) {
// 									if($(this).prop('checked', this.checked).change() ) {
// 										console.log(" check succssesfull");
// 									} else {
// 										console.log("check failure");
// 									}
// 								}
// 							});
						} else {
// 							console.log(isChecked);
							$("INPUT[id^='chk_']").prop('checked', this.checked).change();
						}
				});
				
				//NOTE filter with tableFilter pluging 
				$('table').filterTable({inputSelector:"#filter"}); // apply filterTable to all tables on this page
				
				$("#clear").click( function (){
					$(".filter").val(null);
					$(".filter").click();
					$(".filter").focus();
				});
				
				
// 				$(function() {
// 					$('#search_input').fastLiveFilter('#search_list',{
// 						timeout: 200,
// 						callback: function(total) { $('#num_results').html(total); },
// 						selector:'td'
// 						
// 					});
// 				});
// 				$.ajax({
// 					method: "POST",
// 					url: "some.php",
// 					data: { name: "John", location: "Boston" }
// 				})
// 				.done(function( msg ) {
// 					alert( "Data Saved: " + msg );
// 				});

			});
// 				$('input').each(function() {
	// 				// If input is visible and checked...
	// 				if ( $(this).is(':visible') && $(this).prop('checked') ) {
	// 					$(this).wrap('<div />');
	// 				}
// 				});
		</script>

        </div> <!--main-->
        
      </div> <!--row-->
    </div> <!--container fluid-->





