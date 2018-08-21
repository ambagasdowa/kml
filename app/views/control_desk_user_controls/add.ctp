
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
  <?php 	echo $this->Session->flash();?>
  <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">
				<li>
	        <?php echo $this->Html->link(__('List Control Desk User Controls', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>
        </li>
			  <li>
          <?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?>
        </li>
		    <li>
          <?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?>
        </li>
			</ul>
  </div>

		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Control Desk User Control'); ?>
      </span>
		</h2>

          <?php echo $this->Form->create('ControlDeskUserControl',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="controlDeskUserControls form">
					<?php
        		echo $this->Form->input('user_id',array('placeholder'=>'user_id','class'=>'search_value'));
        		echo $this->Form->input('nomina',array('options'=>array('0'=>'No','1'=>'Si')),array('placeholder'=>'is_nom','class'=>'search_value'));
            echo $this->Form->input('storage',array('placeholder'=>'storage','class'=>'input'));
            echo $this->Form->input('clear_key',array('placeholder'=>'key','class'=>'input'));
        		echo $this->Form->input('description',array('placeholder'=>'description'));
        		echo $this->Form->input('status',array('placeholder'=>'status','class'=>'input'));
	        ?>

			    <?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?><?php echo $this->Form->end(__('Submit', true));?>
			</div>
		</div> <!--container-->


    <script type="text/javascript">

        // <!&#91;CDATA&#91;
            $(document).ready(function (){
      					$(".search_value").select2();
            });
      		// &#93;&#93;>
    </script>
