<?php
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>


<?php //debug($_SESSION);?>
		<style>
/* 		Navigation buttons section */
		/* 		this link is fixed againts the lenght of the content */
			.cancellink {
				position: fixed;
				bottom: 15px;
				right: 25%;
				cursor: pointer;
				z-index:150;
			}
		/* 		this link is fixed againts the lenght of the content */
			.testlink {
				position: fixed;
				bottom: 15px;
				left: 5%;
				cursor: pointer;
				z-index:150;
			}
			
			.viewlink{
				position: fixed;
				bottom: 15px;
				left: 30%;
				cursor: pointer;
				z-index:150;
			}


		</style>

<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
<!-- <center> -->
      <?php 	echo $this->Session->flash();?>
      <?php 
// 		debug($unidades);
      ?>

      <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">
				<li>
					<?php echo $this->Html->link(__('Ver Conciliaciones', true), array('action' => 'index/page:1/sort:id/direction:asc'),array('class'=>'btn btn-success viewlink'));?>
				</li>
				<li>
					<a href="<?php e($this->webroot)?>" class="btn btn-danger cancellink">Cancelar</a>
				</li>
			</ul>
        </div>
<!-- </center> -->

<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
				<?php __('Subir Archivo'); ?>
			</span>
		</h2>
		
          <?php echo $this->Form->create('Caseta',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="casetas form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('key_num',array('type'=>'hidden','placeholder'=>'key_num','class'=>null));
		echo $this->Form->input('key_num_1',array('type'=>'hidden','placeholder'=>'key_num_1','class'=>null));
		echo $this->Form->input('key_num_2',array('type'=>'hidden','placeholder'=>'key_num_2','class'=>null));
		echo $this->Form->input('alpha_code',array('type'=>'hidden','placeholder'=>'alpha_code','class'=>null));
		echo $this->Form->input('key_num_3',array('type'=>'hidden','placeholder'=>'key_num_3','class'=>null));
		echo $this->Form->input('alpha_num_code',array('type'=>'hidden','placeholder'=>'alpha_num_code','class'=>null));
		echo $this->Form->input('unit',array('type'=>'hidden','placeholder'=>'unit','class'=>null));
		echo $this->Form->input('fecha_a',array('type'=>'hidden','placeholder'=>'fecha_a','class'=>null));
		echo $this->Form->input('time_a',array('type'=>'hidden','placeholder'=>'time_a','class'=>null));
		echo $this->Form->input('key_num_4',array('type'=>'hidden','placeholder'=>'key_num_4','class'=>null));
		echo $this->Form->input('key_num_5',array('type'=>'hidden','placeholder'=>'key_num_5','class'=>null));
		echo $this->Form->input('alpha_location',array('type'=>'hidden','placeholder'=>'alpha_location','class'=>null));
		echo $this->Form->input('alpha_location_1',array('type'=>'hidden','placeholder'=>'alpha_location_1','class'=>null));
		echo $this->Form->input('float_data',array('type'=>'hidden','placeholder'=>'float_data','class'=>null));
		echo $this->Form->input('float_data_1',array('type'=>'hidden','placeholder'=>'float_data_1','class'=>null));
		echo $this->Form->input('float_data_2',array('type'=>'hidden','placeholder'=>'float_data_2','class'=>null));
		echo $this->Form->input('float_data_3',array('type'=>'hidden','placeholder'=>'float_data_3','class'=>null));
		echo $this->Form->input('float_data_4',array('type'=>'hidden','placeholder'=>'float_data_4','class'=>null));
		echo $this->Form->input('float_data_5',array('type'=>'hidden','placeholder'=>'float_data_5','class'=>null));
		echo $this->Form->input('float_data_6',array('type'=>'hidden','placeholder'=>'float_data_6','class'=>null));
	?>
	<?php
// 					echo $this->Form->input('name',array('type'=>'text','label'=>false,'placeholder'=>'Nombre de la politica'));
// 					echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion de la politica','rows'=>'5','cols'=>'80'));
// 					e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
	
		
// 					if () {
						

// 					}

			
// 		pr($unidades);
			
		if ($_SESSION['Auth']['User']['group_id'] == 6) {

			e('<h2>'.ucwords(current($unidades)).'</h2>');

			echo $this->Form->input(
							'Caseta._area',
								array(	
										'class'=>'form-control',
										'type'=>'hidden',
										'value'=>key($unidades)
									)
			     );
		} else {
			echo $this->Form->input('Caseta._area',
												array(	
// 														'id'=>'select',
														'class'=>'form-control',
// 														'class'=>'selectpicker',
// 														'data-size'=>"2",
// 														'style'=>'width:350px;',
														'type'=>'select',
														'empty'=>'Seleccionar',
														'options'=>$unidades
													)
									);
		}
// 			e($ajax->observeField('CasetasArea',
// 							array('url'=>array('controller'=>'Casetas',
// 												'action'=>'getAreas',
// 										),
// // 											"loading"=>"Element.hide(hide);Element.show('waiting');",
// // 											"complete"=>"reloading()"
// 								"update"=>"divAreas"
// 							)
// 			)
// 			);

?>
<!--					<div id="divAreas">
						<?php
// 							 echo $this->element('casetas/get_areas');
						?>
					</div>--> <!--end seraf-->
		
	<?php
					echo $this->Form->file('upload', array('type'=>'file','label'=>false,'class'=>'input'));
// 					e('</span>');
	?>
	<!-- 					</table> -->
<!-- 				</div>  -->
          <!--end table response-->

          <p>&nbsp;</p>
					<?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?>
					<?php echo $this->Form->end(__('Enviar', true));?>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    
    <!--<span id="button_show_0" class="label label-success pointer">more ...&nbsp;<i class="fa fa-caret-down"></i> </span>
    <br />
    <span id="show_panel_0" class="show_panel_content" > <p>TODO </p> </span>-->
    
<script>

// 			var divTag = document.getElementById('button_show_0');
// 			var panel_show = document.getElementById('show_panel_0');
// 			$(document).ready(function(){
// 				$(divTag).click(function(){
// 					$(panel_show).toggle(['slow']);
// 				});
// 			});

</script>





