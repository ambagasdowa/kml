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

      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li>
		<?php echo $this->Html->link(__('List Module User Credentials Controls', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
		<li><?php echo $this->Html->link(__('List Module User Credentials Mains', true), array('controller' => 'module_user_credentials_mains', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Module User Credentials Mains', true), array('controller' => 'module_user_credentials_mains', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>

			</ul>
        </div>



		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Module User Credentials Control'); ?>			</span>
		</h2>

          <?php echo $this->Form->create('ModuleUserCredentialsControl',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="moduleUserCredentialsControls form">

			<?php
          echo $this->Form->input('user_id',array('placeholder'=>'user_id','class'=>'module_user_id search_value input','empty'=>'Seleccione'));
          echo '<div class="updateModuleUser"><div class="scroll-block">&nbsp;</div></div>';

	   ?>

     <?php
          echo $this->Form->input('ModuleUserCredentialsControl._status',array('type'=>'hidden','class'=>'form-control','value'=>'1'))
     ?>

  <div class="form-group pull-right">
    <?php echo $this->Form->end(array('div'=>false,'class'=>'btn btn-success'));?>
<!-- 								<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> -->
  </div>
			</div>
		</div> <!--container-->




    <script type="text/javascript">
    // <!&#91;CDATA&#91;
        $(document).ready(function (){

            $(function() {
              // Executes a callback detecting changes with a frequency of 1 third of a second
              $(".module_user_id").observe_field((1/3), function( ) {
                console.log($(this).find("option:selected").text()); //when need the value
                console.log(this.value); // when string issues
                var loadStructMenu = "<?php echo Dispatcher::baseUrl();?>" + '/ModuleUserCredentialsControls' + '/getuser?data[ModuleUserId]=' + this.value;
                var user_id = this.value;
                // $(".updateModuleColumn").load();
                // $(".updateModuleColumn").hide().fadeIn('fast');
                // $(".updateModuleColumn").toggle().toggle();
                // rst_div = "<?php echo Dispatcher::baseUrl();?>" + '/ModuleUserCredentialsControls' + '/';
                // $(".updateModuleColumn").load(rst_div);
                  // NOTE add functionality for search plugin
                $(".updateModuleUser").load(loadStructMenu,function(){
                    // NOTE callback to load select2 plugin in the new called object
                  var selector = '.search_data';
                  console.log($(selector).hasClass('search_data'));
                  if ($(selector).hasClass('search_data') == true) {
                     $(".search_data").select2();
                  }

                   // NOTE add observe to load div options
                  $(function() {
                    // Executes a callback detecting changes with a frequency of 1 third of a second
                    $(".model_name").observe_field((1/3), function( ) {
                      console.log($(this).find("option:selected").text()); //when need the value
                      console.log(this.value); // when string issues

                      var loadStructMenu = "<?php echo Dispatcher::baseUrl();?>" + '/ModuleUserCredentialsControls' + '/get?data[ModuleMainId]=' + this.value + '&data[ModuleMainUserId]=' + user_id ;
                      $(".updateModuleColumn").load(loadStructMenu);
                    });
                  });

                });

              });
            });

            // console.log($(".model_name").find("option:selected").text());

            // filter results the firts optionbox
            $(".search_value").select2();

        });
  	// &#93;&#93;>
    </script>
