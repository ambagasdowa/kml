<?php //Login?>
<!-- <h2>Login</h2> -->

<div class="body">

  <div class="form_wrapper">
	<div class="container">
		<?php echo $this->Session->flash('auth');?>
		
		<div >
			<?php 
				echo $html->image("backgrounds/gst/gst.png",
							array("width"=>145,
								"height"=>60,
							)
					);
			?>
		</div>
		
		<h2 class="form-signin-heading"><?php e(languaje($languaje)['loginTitle']);?></h2>
      
		<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' =>'login'),
										'class'=>'form')
									);
		?>

		<?php
		    // use number_id too
			e($form->input('User.username',
					array(
						'type'=>'text',
						'label'=>false,
						'class'=>null,
						'placeholder'=>(languaje($languaje)['loginUser']),
						'required'=>'',
// 						'oninvalid'=>"this.setCustomValidity('Ingrese un Numero de Empleado')",
						'autofocus'=>''
					)
				)
			);
		?>
		<?php
			e($form->input('User.password',
					array(
						'type'=>'password',
						'label'=>false,
						'class'=>null,
						'placeholder'=>(languaje($languaje)['loginPassword']),
						'required'=>'',
// 						'oninvalid'=>"this.setCustomValidity('Ingrese una contraseña')",
						'autofocus'=>''
					)
				)
			);
		?>
		<p></p>
		<?php echo $this->Form->submit(languaje($languaje)['loginButton']); ?>
		<?php echo $form->end(); ?>
		<?php echo $this->Session->flash();?>
    </div>

  </div>

  </div>
  