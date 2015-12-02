<header class="navbar">
    <nav class="navbar navbar-inverse navbar-fixed-top">

	 <div class="container-fluid">

		<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a id="home" class="navbar-brand" href="<?php e($this->webroot)?>" alt="Landing Page" title="<?php e(languaje($languaje)['landingPage']);?>" data-toggle="tooltip" data-placement="bottom">
				<i class="fa fa-home"></i>
			</a>
			
			<a class="navbar-brand" href="<?php e($this->webroot);?>"><?php e(languaje($languaje)['appName']);?></a>

			<?php if (isset($_SESSION['Auth']['User'])) {?>
<!--							<form class="navbar-form navbar-left">
								<div class="form-group">
									<input type="text" class="btn btn-default search" placeholder="Buscar..." style="background-color:#363636;">
									<i class="fa fa-search"></i>
								</div>
							</form>-->
			<?php }?>

        </div>

<!--         <div id="navbar" class="navbar-collapse collapse"> -->
        <div class="collapse navbar-collapse" id="navbar-collapse-4">


<!-- dinamyc menu for gst -->
		<?php if (isset($_SESSION['Auth']['User'])) {?>
			<?php if (isset($setMenu)) {?>
			<ul class="nav navbar-nav navbar-left"><?php //debug($setMenu);?>
					<?php foreach($setMenu as $idRootMenu => $subMenu) {?>
				
			<!--<ul class="nav navbar-nav">-->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
							<i class="fa fa-angle-down pull-right"></i>
							<div class="user-mini pull-right">
								<span class="welcome"><i class="fa fa-file-text"></i>&nbsp;<?php e(key($subMenu))?></span>
							</div>
						</a>
						
						<ul class="dropdown-menu">
							<?php if ( $setMenu[$idRootMenu][key($subMenu)] !== null ) {?>
								<?php foreach ($subMenu as $id_submenu => $nameSubmenu) {?>
									<?php foreach ($nameSubmenu as $id_nameSubMenu => $namaeSubmenu) {?>
							<li>
								<a href="<?php e($this->webroot.'Policies/view/type:'.$idRootMenu.DS.'subtype:'.$id_nameSubMenu);?>" class="ajax-link">
									<i class="fa fa-download"></i>
									<span><?php e($namaeSubmenu);?></span>
									<?php //debug($subMenu)?>
								</a>
							</li>
									<?php }?>
								<?php }?>
							<?php }?>

							<li class="divider"></li>

						</ul>
					</li>
			<!--</ul>-->
					<?php }?>

			</ul>
			<?php }?>
		<?php }?>
		
		<ul class="nav navbar-nav navbar-right pull-right">
		<?php if (isset($_SESSION['Auth']['User'])) {?>
			<li>
				<a href="<?php e($this->webroot."Users/edit_password/{$_SESSION['Auth']['User']['id']}/");?>" class="ajax-link" alt="Configuracio&oacute;n de Usuario" title="Configuraci&oacute;n de Usuario">
<!-- 					<span class="badge"> -->
						<i class="fa fa-unlock"></i>
<!-- 					</span> -->
<!-- 												<span>Configuraci&oacute;n</span> -->
				</a>
			</li>
		
			<li>
				<a href="<?php e($this->webroot.'Users/logout');?>" alt="Salir" title="Salir">
<!-- 					<span class="badge"> -->
						<i class="fa fa-power-off"></i>
<!-- 					</span> -->
<!-- 												<span><?php e(languaje($languaje)['navMenuE']);?></span> -->
				</a>
			</li>
			
            <li>
              <a class="btn"  data-toggle="collapse" href="#nav-collapse4" aria-expanded="false" aria-controls="nav-collapse4" alt="M&aacute;s Opciones" title="M&aacute;s Opciones">
<!-- 				<span class="badge"> -->
					<i class="fa fa-plus"></i>
				</span>
              </a>
            </li>
            
		<?php }?>
			
			<?php if ( !isset($_SESSION['Auth']['User']) ) {?>
			<li>
				<a class="pull-right" href="<?php e($this->webroot.'Users/login');?>">
					<i class="fa fa-sign-in"></i>
					<span><?php e(languaje($languaje)['loginTitle']);?></span>
				</a>
			</li>
			<?php }?>
		</ul>
<!-- dinamyc menu for gst -->


<!-- 							<ul class="nav navbar-nav pull-right panel-menu"> -->
		<ul class="collapse nav navbar-nav nav-collapse" role="search" id="nav-collapse4">
			<?php if (isset($_SESSION['Auth']['User'])) {?>
			<?php 	if (checkSuperUser($_SESSION['Auth']['User']['group_id'],$_SESSION['Auth']['User']['number_id'],$_SESSION['Auth']['User']['super_user'])) {?>
								<li class="hidden-xs">
									<a href="<?php e($this->webroot.'admin/acl/aros');?>" class="modal-link">
										<i class="fa fa-user-secret"></i>
<!-- 										<span class="badge"><i class="fa fa-user-secret"></i></span> -->
									</a>
								</li>
								
<!--								<li class="hidden-xs">
									<a class="ajax-link" href="<?php e($this->webroot.'admin/acl/acos');?>">
										<i class="fa fa-calendar"></i>
										<span class="badge"><i class="fa fa-terminal"></i></span>
									</a>
								</li>-->
<!--								<li class="hidden-xs">
									<a href="ajax/page_messages.html" class="ajax-link">
										<i class="fa fa-envelope"></i>
										<span class="badge">7</span>
									</a>
								</li>-->
			<?php  }?>

			<?php }?>
<!--								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li class="dropdown-header">Nav header</li>
									<li><a href="#">Separated link</a></li>
									<li><a href="#">One more separated link</a></li>
								</ul>
								</li>-->

								<li class="dropdown">
									<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
<!--										<div class="avatar">
											<img src="img/avatar.jpg" class="img-circle" alt="avatar" />
										</div>-->
										<i class="fa fa-angle-down pull-right"></i>
										<div class="user-mini pull-right">
											<span class="welcome">
												<?php if (isset($_SESSION['Auth']['User']['languaje']) and $_SESSION['Auth']['User']['languaje'] == 'es') {?>
													<i class="fa fa-exclamation fa-rotate-180"></i>
												<?php } else {?>
													<?php if(isset($languaje) and $languaje === 'es'){?>
														<i class="fa fa-exclamation fa-rotate-180"></i>
													<?php }?>
												<?php }?>
												<?php e($msg = ( !empty($_SESSION['Auth']['User']) ? ucwords(strtolower(languaje($languaje)['welcomeMsg'][$_SESSION['Auth']['User']['gender']])) : languaje($languaje)['guestWelcomeMsg'] )); ?><i class="fa fa-exclamation"></i>
											</span>
											<span>&nbsp;</span>
											<span>
												<?php e($message = ( !empty($_SESSION['Auth']['User']) ? ucwords(strtolower(html_entity_decode($_SESSION['Auth']['User']['name'])."\x20".html_entity_decode($_SESSION['Auth']['User']['last_name']))) : languaje($languaje)['guestUser'] )); ?>
											</span>
										</div>
									</a>
									<ul class="dropdown-menu">
									
										<?php if (isset($_SESSION['Auth']['User'])) {?>
										<?php 	if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>
									
										<li>
											<a href="<?php e($this->webroot.'Users');?>">
												<i class="fa fa-user"></i>
												<span><?php e(languaje($languaje)['navMenuA']);?></span>
											</a>
										</li>
										
										<li>
											<a href="<?php e($this->webroot.'Groups');?>" class="ajax-link">
												<i class="fa fa-users"></i>
												<span><?php e(languaje($languaje)['navMenuB']);?></span>
											</a>
										</li>
										
										<li>
											<a href="<?php e($this->webroot.'Downloads');?>" class="ajax-link">
												<i class="fa fa-download"></i>
												<span><?php e(languaje($languaje)['navMenuD']);?></span>
											</a>
										</li>
										
										<li class="divider"></li>
										<?php 	}?>
										<?php }?>
										
										<?php if (isset($_SESSION['Auth']['User'])) {?>
										<?php 	if (checkSuperUser($_SESSION['Auth']['User']['group_id'],$_SESSION['Auth']['User']['number_id'],true)) {?>
											
										<li>
											<a href="<?php e($this->webroot.'Companies');?>" class="ajax-link">
												<i class="fa fa-cog"></i>
												<span>Company</span>
											</a>
										</li>
										
<!-- 										675 tiras de 100 -->
<!-- 										65 lancetas de 25 -->
<!-- 										335 tiras de 50 -->
<!-- 										290 medidor -->
<!-- 										590 1 med + 50 tiras + 25 lan //100-->
<!-- 										975 medidor + 100 tiras + 25 lancetas //120 -->

<!-- 										735 medidor + 100 tiras farmalisto-->

										<li>
											<a href="<?php e($this->webroot.'BusinessUnits');?>" class="ajax-link">
												<i class="fa fa-cog"></i>
												<span>BusinessUnits</span>
											</a>
										</li>
										
										<li class="divider"></li>
										<?php 	}?>
										<?php }?>
<!-- 										automagic hir -->
										
										<?php if (isset($_SESSION['Auth']['User'])) {?>
										<?php 	if (checkUser($_SESSION['Auth']['User']['group_id'],'Casetas')) {?>

										<li>
											<a href="<?php e($this->webroot.'Casetas/add');?>" class="ajax-link">
												<i class="fa fa-truck"></i>
												<span>Casetas</span>
											</a>
										</li>
									
										<li class="divider"></li>
										<?php 	}?>
										<?php }?>
<!-- 										automagic hir -->
										
										<?php if (isset($_SESSION['Auth']['User'])) {?>
										<?php 	if (checkUser($_SESSION['Auth']['User']['group_id'],'PoliciesAnexos')) {?>
											
										<li>
											<a href="<?php e($this->webroot.'Policies');?>" class="ajax-link">
												<i class="fa fa-cog"></i>
												<span>Policies</span>
											</a>
										</li>
											
										<li>
											<a href="<?php e($this->webroot.'PoliciesAnexos');?>" class="ajax-link">
												<i class="fa fa-cog"></i>
												<span><?php e(languaje($languaje)['navMenuF']);?></span>
											</a>
										</li>
										
										<li>
											<a href="<?php e($this->webroot.'PoliciesFilters');?>" class="ajax-link">
												<i class="fa fa-cog"></i>
												<span>Policies Filters</span>
											</a>
										</li>
										
										<li>
											<a href="<?php e($this->webroot.'PoliciesFormats');?>" class="ajax-link">
												<i class="fa fa-cog"></i>
												<span>PoliciesFormats</span>
											</a>
										</li>
										
										<li>
											<a href="<?php e($this->webroot.'PoliciesTypes');?>" class="ajax-link">
												<i class="fa fa-cog"></i>
												<span>PoliciesTypes</span>
											</a>
										</li>
										
										<li>
											<a href="<?php e($this->webroot.'PoliciesSubtypes');?>" class="ajax-link">
												<i class="fa fa-cog"></i>
												<span>PoliciesSubTypes</span>
											</a>
										</li>
										
										<li>
											<a href="<?php e($this->webroot.'PoliciesSubtypesDefinitions');?>" class="ajax-link">
												<i class="fa fa-cog"></i>
												<span>PoliciesSubTypesDefinitions</span>
											</a>
										</li>
										
										<li class="divider"></li>
										
										<?php 	}?>
										<?php }?>

<!-- 										automagic hir -->
										
										<?php if(!empty($documents) or isset($documents)){?>
										<?php	foreach ($documents as $id_document => $document) {?>
											
										<li>
											<a href="<?php e($this->webroot."Policies/view/type:{$id_document}/");?>" class="ajax-link">
												<i class="fa fa-file-text"></i>
												<span><?php e($document);?></span>
											</a>
										</li>
									
										<?php 	}?>
										<li class="divider"></li>
										<?php }?>
<!-- 										automagic hir -->


<!-- 										login option -->
										<?php if ( !isset($_SESSION['Auth']['User'])  and isset($portalUrl) and $portalUrl !== 'gst'  ) {?>
										
										<li>
											<a href="<?php e($this->webroot.'Users/login');?>">
												<i class="fa fa-power-off"></i>
												<span><?php e(languaje($languaje)['loginTitle']);?></span>
											</a>
										</li>
										
										<?php }?>
<!-- 										login option -->
										<?php if (isset($_SESSION['Auth']['User'])) {?>

										<li>
											<a href="<?php e($this->webroot."Users/edit_password/{$_SESSION['Auth']['User']['id']}/");?>" class="ajax-link">
												<i class="fa fa-cog"></i>
												<span>Configuraci&oacute;n</span>
											</a>
										</li>
										
										<li>
											<a href="<?php e($this->webroot.'Users/logout');?>">
												<i class="fa fa-power-off"></i>
												<span><?php e(languaje($languaje)['navMenuE']);?></span>
											</a>
										</li>
										
										<?php }?>
											
									</ul>
								</li>
							</ul>


        </div>
      </div>
    </nav>
    

    <!--         <ul class="nav navbar-nav navbar-right"> -->
<!--         <ul class="collapse nav navbar-nav nav-collapse" role="search" id="nav-collapse4"> -->

<!--             <li><a href="#">Dashboard</a></li> -->
<!--             <li><a href="#">Settings</a></li> -->
<!--             <li><a href="#">Profile</a></li> -->
<!-- 			<li> -->
<!-- 			<a href="#" class="helplink" data-toggle="modal" data-target="#myModal">Ayuda</a> -->
<!-- 			</li> -->
<!--         </ul> -->

</header>


<script>

// 		require(['jquery','owl'], function($) {
// 			$(document).ready(function () {
// // 				Carousel Menu
// 					$('.owl-carousel').owlCarousel({
// 						loop:true,
// 						margin:5,
// 						nav:true,
// 						navClass:["owl-preview left carousel-control","owl-nextslide right carousel-control"],
// 						navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
// 						responsive:{
// 							0:{
// 								items:1
// 							},
// 							600:{
// 								items:2
// 							},
// 							1000:{
// 								items:3
// 							}
// 						}
// 					})
// // 				Carousel Menu
// 			});
// 		});
</script>

