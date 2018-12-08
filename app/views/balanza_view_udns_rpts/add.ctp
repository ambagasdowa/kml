
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
    // $evaluate = false;
    // $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
    // blog
    $evaluate = true;
    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
    $requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );

?>
      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li>
							<?php echo $this->Html->link(__('List Balanza View Udns Rpts', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>

			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Balanza View Udns Rpt'); ?>			</span>
		</h2>

          <?php echo $this->Form->create('BalanzaViewUdnsRpt',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="balanzaViewUdnsRpts form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('Cuenta',array('placeholder'=>'Cuenta','class'=>'input'));
		echo $this->Form->input('Entidades',array('placeholder'=>'Entidades','class'=>'input'));
		echo $this->Form->input('Empresa',array('placeholder'=>'Empresa','class'=>'input'));
		echo $this->Form->input('UnidadNegocio',array('placeholder'=>'UnidadNegocio','class'=>'input'));
		echo $this->Form->input('Descripción',array('placeholder'=>'Descripción','class'=>'input'));
		echo $this->Form->input('TranDesc',array('placeholder'=>'TranDesc','class'=>'input'));
		echo $this->Form->input('Periodo',array('placeholder'=>'Periodo','class'=>'input'));
		echo $this->Form->input('ExtRefNbr',array('placeholder'=>'ExtRefNbr','class'=>'input'));
		echo $this->Form->input('User1',array('placeholder'=>'User1','class'=>'input'));
		echo $this->Form->input('Empleado',array('placeholder'=>'Empleado','class'=>'input'));
		echo $this->Form->input('Name',array('placeholder'=>'Name','class'=>'input'));
		echo $this->Form->input('Funcionario',array('placeholder'=>'Funcionario','class'=>'input'));
		echo $this->Form->input('Inicial',array('placeholder'=>'Inicial','class'=>'input'));
		echo $this->Form->input('Cargo',array('placeholder'=>'Cargo','class'=>'input'));
		echo $this->Form->input('Crédito',array('placeholder'=>'Crédito','class'=>'input'));
		echo $this->Form->input('Final',array('placeholder'=>'Final','class'=>'input'));
	?>
						<?php 	echo $this->Form->input('name',array('type'=>'text','label'=>false,'placeholder'=>'Nombre de la politica'));
									echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion de la politica','rows'=>'5','cols'=>'80'));
								e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
									echo $this->Form->file('upload', array('type'=>'file','label'=>false));
								e('</span>');
								?><!-- 					</table> -->
<!-- 				</div>  -->
          <!--end table response-->
					<?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?><?php echo $this->Form->end(__('Submit', true));?>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->
