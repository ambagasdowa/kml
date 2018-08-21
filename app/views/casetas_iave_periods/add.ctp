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
							<?php echo $this->Html->link(__('List Casetas Iave Periods', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
						<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>

			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Casetas Iave Period'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('CasetasIavePeriod',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="casetasIavePeriods form">

			<?php
                echo $this->Form->input('user_id',array('type'=>'hidden','placeholder'=>'user_id','class'=>'input','value'=>$_SESSION['Auth']['User']['id']));
                echo $this->Form->input('period_iave_id',array('type'=>'text','disabled' => 'disabled','placeholder'=>'period_iave_id','class'=>'input','value'=>$period_iave_id));
                echo $this->Form->input('period_desc',array('placeholder'=>'period_desc','class'=>'input'));
				echo $this->Form->input('fecha_ini',
														array(
																'type'=>'text',
																'class'=>'form-control',
																'id'=>'period_iave_ini',
																'div'=>FALSE,
																'label'=>FALSE
															  )
											);

                echo $this->Form->input('fecha_fin',
														array(
																'type'=>'text',
																'class'=>'form-control',
																'id'=>'period_iave_end',
																'div'=>FALSE,
																'label'=>FALSE
															  )
											);

                echo $this->Form->input('offset_day_minus',array('type'=>'hidden','class'=>'form-control','value'=>'5'));
                echo $this->Form->input('offset_day_plus',array('type'=>'hidden','class'=>'form-control','value'=>'1'));
            ?>

          <!--end table response-->
            <?php 
                echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'1'));
            ?>
            <?php 
                echo $this->Form->end(__('Submit', true));
            ?>
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
						$("#period_iave_ini" ).datepicker({
                            showButtonPanel: true
                        });
				});
				
				$(function () {
						$("#period_iave_end" ).datepicker({
                            showButtonPanel: true
                        });
				});

			});
	</script>





