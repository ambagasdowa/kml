
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
<center>
      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li>
							<?php echo $this->Html->link(__('List Mr Source Reports', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>
</center>

<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Mr Source Report'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('MrSourceReport',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="mrSourceReports form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('Mes',array('placeholder'=>'Mes','class'=>'input'));
		echo $this->Form->input('NoCta',array('placeholder'=>'NoCta','class'=>'input'));
		echo $this->Form->input('NombreCta',array('placeholder'=>'NombreCta','class'=>'input'));
		echo $this->Form->input('PerEnt',array('placeholder'=>'PerEnt','class'=>'input'));
		echo $this->Form->input('Compañía',array('placeholder'=>'Compañía','class'=>'input'));
		echo $this->Form->input('Tipo',array('placeholder'=>'Tipo','class'=>'input'));
		echo $this->Form->input('Entidad',array('placeholder'=>'Entidad','class'=>'input'));
		echo $this->Form->input('distinto',array('placeholder'=>'distinto','class'=>'input'));
		echo $this->Form->input('tipoTransacción',array('placeholder'=>'tipoTransacción','class'=>'input'));
		echo $this->Form->input('Referencia',array('placeholder'=>'Referencia','class'=>'input'));
		echo $this->Form->input('FechaTransacción',array('placeholder'=>'FechaTransacción','class'=>'input'));
		echo $this->Form->input('Descripción',array('placeholder'=>'Descripción','class'=>'input'));
		echo $this->Form->input('Abono',array('placeholder'=>'Abono','class'=>'input'));
		echo $this->Form->input('Cargo',array('placeholder'=>'Cargo','class'=>'input'));
		echo $this->Form->input('UnidadNegocio',array('placeholder'=>'UnidadNegocio','class'=>'input'));
		echo $this->Form->input('CentroCosto',array('placeholder'=>'CentroCosto','class'=>'input'));
		echo $this->Form->input('NombreEntidad',array('placeholder'=>'NombreEntidad','class'=>'input'));
		echo $this->Form->input('_company',array('placeholder'=>'_company','class'=>'input'));
		echo $this->Form->input('_period',array('placeholder'=>'_period','class'=>'input'));
		echo $this->Form->input('_key',array('placeholder'=>'_key','class'=>'input'));
		echo $this->Form->input('Presupuesto',array('placeholder'=>'Presupuesto','class'=>'input'));
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

    





