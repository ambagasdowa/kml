<?php ?>
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
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
			$evaluate = false;
			$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
		?>
		
      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

		<li>
        <?php echo $this->Html->link(__('List Projections Closed Period Controls', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>
        </li>
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Projections Closed Period Control'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('ProjectionsClosedPeriodControl',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="projectionsClosedPeriodControls form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
//                     echo $this->Form->input('user_id',array('placeholder'=>'user_id','class'=>'input'));
//                     echo $this->Form->input('projections_closed_periods',array('placeholder'=>'projections_closed_periods','class'=>'input'));
                    echo $this->Form->input('projections_view_bussiness_units_id',array('placeholder'=>'projections_view_bussiness_units_id','class'=>'input'));
//                     echo $this->Form->input('projections_status_period',array('placeholder'=>'projections_status_period','class'=>'input'));
//                     echo $this->Form->input('_status',array('placeholder'=>'_status','class'=>'input'));
	?>
					<?php 
					echo $this->Form->input('projections_closed_periods',
														array(
																'type'=>'text',
																'class'=>'form-control',
																'id'=>'periodClose',
																'div'=>FALSE,
																'label'=>FALSE
															  )
											)
				?>
						<?php
						
// 								e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
// 									echo $this->Form->file('upload', array('type'=>'file','label'=>false));
// 								e('</span>');
								?><!-- 					</table> -->
<!-- 				</div>  -->
          <!--end table response-->
                    <?php echo $this->Form->input('projections_status_period',array('type'=>'hidden','class'=>'form-control','value'=>'1'))?>
					<?php echo $this->Form->input('_status',array('type'=>'hidden','class'=>'form-control','value'=>'1'))?>
					
                    <div class="form-group pull-right">
                    <?php 
                        echo $this->Form->end( array('div'=>false,'class'=>'btn btn-success'));
                    ?>
                    </div>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    

	<script>
	/*-------------------------------------------
		Function for jQuery-UI page (ui_jquery-ui.html)
	---------------------------------------------*/
			$(document).ready(function () {
                // Define the Spanish languaje
                    $.datepicker.regional['es'] = {
                    closeText: 'Cerrar',
                    prevText: '<Ant',
                    nextText: 'Sig>',
                    currentText: 'Hoy',
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                    weekHeader: 'Sm',
//                     dateFormat: 'dd/mm/yy',
                    dateFormat: 'yy-mm-dd',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: '',
                    showOtherMonths: true,
                    selectOtherMonths: true
                    };
                    $.datepicker.setDefaults($.datepicker.regional['es']);
                    // start the datepicker
				$(function () {
						$('#periodClose').datepicker({
                            showButtonPanel: true
                        });
				});

			});
	</script>


