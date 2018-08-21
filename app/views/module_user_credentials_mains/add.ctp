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

    <?php 	echo $this->Session->flash();?>
      <div class="col-md-offset-1 col-sm-11 col-md-11">

			<ul class="list-group list-inline">
				<li>
					<?php echo $this->Html->link(__('List Module User Credentials Mains', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>
        </li>
			</ul>

      </div>

		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			   <span>
					 <?php __('Add Module User Credentials Main'); ?>
         </span>
		  </h2>
        <?php echo $this->Form->create('ModuleUserCredentialsMain',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="moduleUserCredentialsMains form">
				<?php
        //  echo $this->Form->input(
        //                           'module_name',
        //                               array(
        //                                       // 'type'=>'text'
        //                                        'class'=>'input'
        //                                       ,'placeholder'=>'Nombre identificador'
        //                                    )
        //                         );

         echo $this->Form->input(
                                  'model_id',
                                     array(
                                            'type'=>'select'
                                           ,'options'=>$allModelNames
                                           ,'empty'=>'Seleccionar Modelo'
                                           ,'selected'=>'empty'
                                           ,'placeholder'=>'model_name'
                                           ,'class'=>'model_name input js-example-basic-single selectta'
                                         )
                                 );

          echo '<div class="updateModuleColumn"></div>';

      		echo $this->Form->input('model_option_var',array('placeholder'=>'model_option_var','class'=>'input'));
          echo $this->Form->input(
                                  'is_in',
                                      array(
                                             'type'=>'select'
                                            ,'options'=>array('0'=>'not in','1'=>'in')
                                            ,'empty'=>'Seleccionar clause'
                                            ,'selected'=>'empty'
                                            ,'placeholder'=>'is_in'
                                            ,'class'=>'input'
                                          )
                                  );
          echo $this->Form->input(
                                   'module_description',
                                       array(
                                               'type'=>'textbox'
                                               ,'class'=>'input'
                                               ,'placeholder'=>'Descripción'
                                            )
                                 );
	      ?>

  <?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'1'))?>

  <div class="block">
    &nbsp;
  </div>

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
            $(".model_name").observe_field((1/3), function( ) {
              console.log($(this).find("option:selected").text());
              var loadStructMenu = "<?php echo Dispatcher::baseUrl();?>" + '/ModuleUserCredentialsMains/' +'/get?data[model]=' + $(this).find("option:selected").text();
              $(".updateModuleColumn").load(loadStructMenu,function(){

              // NOTE callback to load select2 plugin in the new called object
                var selector = '.search_input';
                console.log($(selector).hasClass('search_input'));

                if ($(selector).hasClass('search_input') == true) {
                   $(".search_input").select2();
                }

              });
            });
          });

          // filter results
          $(".js-example-basic-single").select2();

      });
	// &#93;&#93;>
  </script>
