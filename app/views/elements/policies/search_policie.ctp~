<div>	
<!-- 			<span class="input-group-btn"> -->
			<?php
				echo $this->Form->create('Policy', array(
					'url' => array_merge(array('action' => 'index'), $this->params['pass'])
					));
			?>
<!-- 			</span> --></div>
			
<!-- <div class="row"> -->
<!--   <div class="col-lg-6"> -->
    <div class="input-group">
<!--       <input type="text" class="form-control" placeholder="Search for..."> -->

				<?php
					echo $this->Form->input('name', array('div' => false, 'empty' => true,'label'=>false,'class'=>'form-control','placeholder'=>'Buscar Politica ...')); // empty creates blank option.
				?>
      <span class="input-group-btn">
				<button class="btn btn-success" type="submit"><span><i class="fa fa-search fa-1x"></i></span>&nbsp;</button>
      </span>

    </div><!-- /input-group -->
  <!--</div>--><!-- /.col-lg-6 -->
<!--</div>--><!-- /.row -->
			<?php
				echo $this->Form->end();
			?>