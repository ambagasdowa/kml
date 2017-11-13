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
		// SecureCalendar index
			// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
			$evaluate = false;
			$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
		?>
<?php //debug($policy);?>
<?php echo $this->Session->flash();?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">
				<li class="list-group-item">
					<?php echo $this->Html->link(__('List Policies Anexos', true), array('action' => 'index'));?>
				</li>
			</ul>
        </div>


        <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main">
          <?php echo $this->Form->create('PoliciesAnexo',array('enctype' => 'multipart/form-data'));?>
			<div class="policiesAnexos form">

				<legend>
						 <?php __('Add Policies Anexo'); ?>
				</legend>
<!-- 				 -->
				<div class="table-responsive">
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
								echo $this->Form->input('policies_id',array('class'=>'form-control'));
// 								echo $this->Form->input('anexo_path',array('class'=>'form-control'));
								echo $this->Form->input('PoliciesAnexo.download',
																	array(	'class'=>'',
																			'type'=>'select',
																			'class'=>'form-control',
																			'options'=>array('1'=>'Si','0'=>'No')
																		 )
														);
							?>

				  <?php
					  e($ajax->observeField('PoliciesAnexoDownload',
									  array('url'=>array('controller'=>'PoliciesAnexos',
														  'action'=>'addToPolicy',
												   ),
// 											"loading"=>"Element.hide(hide);Element.show('waiting');",
// 											"complete"=>"reloading()"
											"update"=>"divSeraf"
									  )
						)
					  );
				  ?>

					<div id="divSeraf">
						<?php
							 echo $this->element('policies/policies_anexos_download');
						?>
					</div> <!--end seraf-->

				</div>
          <!--end table response-->
			<?php echo $this->Form->end(__('Enviar', true));?>
			</div>

        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->
