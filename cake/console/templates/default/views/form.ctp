<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
<center>
      <?php echo "<?php \techo \$this->Session->flash();?>";?>
        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

				<?php if (strpos($action, 'add') === false): ?>
						<li>
							<?php 
								echo "<?php echo \$this->Html->link(__('Delete', true), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, sprintf(__('Are you sure you want to delete # %s?', true), \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>";
							?>
						</li>
				<?php endif;?>
						<li>
							<?php echo "<?php echo \$this->Html->link(__('List " . $pluralHumanName . "', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>";?>
						</li>
				<?php
						$done = array();
						foreach ($associations as $type => $data) {
							foreach ($data as $alias => $details) {
								if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
									echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "', true), array('controller' => '{$details['controller']}', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>\n";
									echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "', true), array('controller' => '{$details['controller']}', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>\n";
									$done[] = $details['controller'];
								}
							}
						}
				?>

			</ul>
        </div>
</center>

<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
				<?php printf("\t <?php __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?>
			</span>
		</h2>
		
          <?php echo "<?php echo \$this->Form->create('{$modelClass}',array('enctype' => 'multipart/form-data','class'=>'form'));?>\n";?>
			<div class="<?php echo $pluralVar;?> form">

<!-- 				<?php $column = count($fields);?> -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
						<?php
							echo "\t<?php\n";
							foreach ($fields as $field) {

								if (strpos($action, 'add') !== false && $field == $primaryKey) {
									continue;
								} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
									if ($field === 'create') {
										echo
											"
											if(checkBrowser(\$_SERVER['HTTP_USER_AGENT'],true) === TRUE) {
											\t\techo \$this->Form->input('create',
														array(	
																'type' => 'text',
																'label'=>false,
																'class'=>'form-control',
																'placeholder'=>'Seleccione una fecha',
																'id'=>'calendar_{$field}',
																'value'=>''
														)
												);
						?>
							<script>
							/*-------------------------------------------
								Function for jQuery-UI page (ui_jquery-ui.html)
							---------------------------------------------*/
								require(['jquery','jquery-ui','bootstrap'], function($) {
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
										dateFormat: 'dd/mm/yy',
										firstDay: 1,
										isRTL: false,
										showMonthAfterYear: false,
										yearSuffix: ''
										};
										$.datepicker.setDefaults($.datepicker.regional['es']);
										// start the datepicker

										$(function () {
												$('#calendar_{$field}').datepicker({showButtonPanel: true});
										});

// 										$('#calendar_{$field}').datepicker({
// 																showButtonPanel: true
// 										});


										$(document).on('change', '.btn-file :file', function() {
										var input = $(this),
											numFiles = input.get(0).files ? input.get(0).files.length : 1,
											label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
											input.trigger('fileselect', [numFiles, label]);
										});
										
										$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
											console.log(numFiles);
											console.log(label);
											document.getElementById('{$field}.{ucfirst($action)}').innerHTML = label;
										});
									});
								});
							</script>
						<?php
											} else {

											\t\techo \$this->Form->text('{$field}',
																	array('type' => 'date',
																	'label'=>false,
																	'class'=>'form-control',
																	'value'=>date('Y-m-d'),
																	'dateFormat' => 'DMY',
																	'min' => '2010-08-14',
// 																	'max' => '2036-12-31',
																	'separator'=>'/',
																	'placeholder'=>'Buscar registro => Ingresa Fecha en formato (yy-mm-dd) (alt+shift+b)'
																	)
														);
											}
											\n";
									} else {
										echo "\t\techo \$this->Form->input('{$field}',array('placeholder'=>'{$field}','class'=>'input'));\n";
									}
									
// 									$this->out('inside elseif => '.$field);
								}
							}
							if (!empty($associations['hasAndBelongsToMany'])) {
								foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
									echo "\t\techo \$this->Form->input('{$assocName}',array('class'=>'form-control'));\n";
// 									$this->out('inside hasAndBelongsToMany => '.$field);
								}
							}
							echo "\t?>\n";
						?>
						<?php
								echo "<?php \techo \$this->Form->input('name',array('type'=>'text','label'=>false,'placeholder'=>'Nombre de la politica'));
								\techo \$this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion de la politica','rows'=>'5','cols'=>'80'));
								e('<span id=\"fieldActionExample\" class=\"btn btn-default btn-file form_control\">Upload');
								\techo \$this->Form->file('upload', array('type'=>'file','label'=>false));
								e('</span>');
								?>";
						?>
<!-- 					</table> -->
<!-- 				</div>  -->
          <!--end table response-->
					<?php
					
						echo "<?php echo \$this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?>";
						echo "<?php echo \$this->Form->end(__('Submit', true));?>\n";
					?>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    





