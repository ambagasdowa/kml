<header class="navbar">
    <nav class="navbar navbar-inverse navbar-fixed-top">

	 <div class="container-fluid hidden-print">

		<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a id="home" class="navbar-brand" href="<?php e($this->webroot.'../')?>" alt="Landing Page" title="<?php e(languaje($languaje)['landingPage']);?>" data-toggle="tooltip" data-placement="bottom">
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

      <?php if ($_SESSION['Auth']['User']['storage'] == 1) { ?>
  			<li>
  				<a id="browse_server" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].DS.Dispatcher::baseUrl().DS.'app/webroot/vendors/RichFilemanager?exclusiveFolder='.$_SESSION['Auth']['User']['username']; ?>" class="ajax-link" alt="Archivos" title="Archivos">
  						<i class="fa fa-hdd-o"></i>
  				</a>
  			</li>
      <?php } ?>

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
									<a href="<?php e($this->webroot.'admin/acl/aros');?>" class="modal_link">
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

                    <li>
                      <a id="storage" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].DS.Dispatcher::baseUrl().DS.'app/webroot/vendors/RichFilemanager'; ?>" class="ajax-link">
                        <i class="fa fa-database"></i>
                        <span>Storage</span>
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

										<li>
											<a href="<?php e($this->webroot.'Posts/');?>" class="ajax-link">
												<i class="fa fa-cog"></i>
												<span>Notes</span>
											</a>
										</li>

										<li>
											<a href="<?php e($this->webroot.'FieldDatas'.DS.'');?>" class="ajax-link">
												<i class="fa fa-list-alt"></i>
												<span><?php e('Control de Usuario');?></span>
											</a>
										</li>

										<li class="dropdown-submenu">
											<a tabindex="-1" href="#"><i class="fa fa-cog"></i>&nbsp;<span>Secure Section</span></a>
												<ul class="dropdown-menu">
													<li><a tabindex="-1" href="<?php e($this->webroot.'SecureTopics');?>"><i class="fa fa-cog"></i>&nbsp;<span>Topics</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'SecureTopicsTypes');?>"><i class="fa fa-cog"></i>&nbsp;<span>TopicsTypes</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'SecureGpoChiefs');?>"><i class="fa fa-cog"></i>&nbsp;<span>SecureGpoChiefs</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'SecureGos');?>"><i class="fa fa-cog"></i>&nbsp;<span>SecureGoes</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'SecureStructures');?>"><i class="fa fa-cog"></i>&nbsp;<span>SecureStructures</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'SecureCalendars');?>"><i class="fa fa-cog"></i>&nbsp;<span>SecureCalendars</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'SecurePresenters');?>"><i class="fa fa-cog"></i>&nbsp;<span>SecurePresenters</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'SecureControlUsers');?>"><i class="fa fa-cog"></i>&nbsp;<span>SecureControlUsers</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ViewGetPayrolls');?>"><i class="fa fa-cog"></i>&nbsp;<span>ViewGetPayrolls</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'SecureControlUsers');?>"><i class="fa fa-cog"></i>&nbsp;<span>SecureControlUsers</span></a>
													</li>
												</ul>
										</li>
										<li class="dropdown-submenu">
											<a tabindex="-1" href="#"><i class="fa fa-cog"></i>&nbsp;<span>Casetas</span></a>
												<ul class="dropdown-menu">
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasViews/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>MainView</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'Casetas/add');?>"><i class="fa fa-cog"></i>&nbsp;<span>Importar Archivo</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasControlsUsers/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>ControlUser</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'Casetas/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Dashboard</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasViewResumes/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Resume</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasViewResumeStands/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Resume by stand</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasHistoricalConciliations/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>history</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasParents');?>"><i class="fa fa-cog"></i>&nbsp;<span>Parents</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasStandings');?>"><i class="fa fa-cog"></i>&nbsp;<span>Standings</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasCorporations');?>"><i class="fa fa-cog"></i>&nbsp;<span>Corporations</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasUnits');?>"><i class="fa fa-cog"></i>&nbsp;<span>Units</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasControlsEvents');?>"><i class="fa fa-cog"></i>&nbsp;<span>ControlsEvents</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasControlsFiles');?>"><i class="fa fa-cog"></i>&nbsp;<span>ControlsFiles</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasEvents');?>"><i class="fa fa-cog"></i>&nbsp;<span>Events</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasPendings');?>"><i class="fa fa-cog"></i>&nbsp;<span>Pendings</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasConciliations');?>"><i class="fa fa-cog"></i>&nbsp;<span>Conciliations</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasNotConciliations');?>"><i class="fa fa-cog"></i>&nbsp;<span>NotConciliations</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasLogs');?>"><i class="fa fa-cog"></i>&nbsp;<span>Logs</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasIavePeriods/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>CasetasIavePeriods</span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'CasetasViewNotConciliations/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>CasetasViewNotConciliations</span></a>
													</li>
												</ul>
										</li>



										<li class="dropdown-submenu">
											<a tabindex="-1" href="#"><i class="fa fa-cog"></i>&nbsp;<span>Tralix Options</span></a>
												<ul class="dropdown-menu">
													<li><a tabindex="-1" href="<?php e($this->webroot.'Tralixes');?>"><i class="fa fa-cog"></i>&nbsp;<span>view</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'Tralixes/add');?>"><i class="fa fa-cog"></i>&nbsp;<span>edition</span></a></li>
												</ul>
										</li>

										<li class="dropdown-submenu">
											<a tabindex="-1" href="#"><i class="fa fa-cog"></i>&nbsp;<span>Balanza Udn</span></a>
												<ul class="dropdown-menu">
													<li><a tabindex="-1" href="<?php e($this->webroot.'BalanzaViewUdnsRpts');?>"><i class="fa fa-cog"></i>&nbsp;<span>Balanza</span></a></li>
													<!-- <li><a tabindex="-1" href="<?php e($this->webroot.'Tralixes/add');?>"><i class="fa fa-cog"></i>&nbsp;<span>edition</span></a></li> -->
												</ul>
										</li>

										<li class="dropdown-submenu">
											<a tabindex="-1" href="#"><i class="fa fa-cog"></i>&nbsp;<span>Providers Options</span></a>
												<ul class="dropdown-menu">
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProvidersImportedDatabases/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>ImportedDatabases</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProvidersControlsUsers');?>"><i class="fa fa-cog"></i>&nbsp;<span>ControlsUsers</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProvidersViewSearchEditions');?>"><i class="fa fa-cog"></i>&nbsp;<span>SearchEdition</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'/ProvidersImportedFilesControls/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Proveedores</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProvidersViewBussinessUnits');?>"><i class="fa fa-cog"></i>&nbsp;<span>BussinesUnits</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProvidersViewCompaniesUnits/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>CompaniesUnits</span></a></li>
												</ul>
										</li>

                    <li class="dropdown-submenu">
                      <a tabindex="-1" href="#"><i class="fa fa-cog"></i>&nbsp;<span>ModuleUsers Options</span></a>
                        <ul class="dropdown-menu">
                          <li  class="dropdown-submenu">
                              <a tabindex="-1" href="<?php e($this->webroot.'ModuleUserCredentialsMains/index/page:1/sort:id/direction:asc');?>">
                                <i class="fa fa-cog"></i>&nbsp;<span>CatalogOptions</span>
                              </a>
                          </li>

                          <li class="dropdown-submenu pull-left">
                            <a href="#">MUsrCredentialsMains</a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php e($this->webroot.'ModuleUserCredentialsMains/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Index</span></a></li>
                                <li><a href="<?php e($this->webroot.'ModuleUserCredentialsMains/add/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Add</span></a></li>
                                <li><a href="<?php e($this->webroot.'ModuleUserCredentialsMains/edit/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Edit</span></a></li>
                                <li><a href="<?php e($this->webroot.'ModuleUserCredentialsMains/view/');?>"><i class="fa fa-cog"></i>&nbsp;<span>View</span></a></li>
                              </ul>
                          </li>

                          <li class="dropdown-submenu pull-left">
                            <a href="#">MUsrCredentialsCtrls</a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php e($this->webroot.'ModuleUserCredentialsControls/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Index</span></a></li>
                                <li><a href="<?php e($this->webroot.'ModuleUserCredentialsControls/add/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Add</span></a></li>
                                <li><a href="<?php e($this->webroot.'ModuleUserCredentialsControls/edit/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Edit</span></a></li>
                                <li><a href="<?php e($this->webroot.'ModuleUserCredentialsControls/view/');?>"><i class="fa fa-cog"></i>&nbsp;<span>View</span></a></li>
                              </ul>
                          </li>

                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                      <a tabindex="-1" href="#"><i class="fa fa-cog"></i>&nbsp;<span>ModulePerformance</span></a>
                        <ul class="dropdown-menu">

                          <li class="dropdown-submenu pull-left">
                            <a href="#">PerforCustomers</a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php e($this->webroot.'PerformanceCustomers/index/page:1/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Index</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceCustomers/add/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Add</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceCustomers/edit/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Edit</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceCustomers/view/');?>"><i class="fa fa-cog"></i>&nbsp;<span>View</span></a></li>
                              </ul>
                          </li>

                          <li class="dropdown-submenu pull-left">
                            <a href="#">PerforReferences</a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php e($this->webroot.'PerformanceReferences/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Index</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceReferences/add/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Add</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceReferences/edit/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Edit</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceReferences/view/');?>"><i class="fa fa-cog"></i>&nbsp;<span>View</span></a></li>
                              </ul>
                          </li>

                          <li class="dropdown-submenu pull-left">
                            <a href="#">PerforFacturas</a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php e($this->webroot.'PerformanceFacturas/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Index</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceFacturas/add/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Add</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceFacturas/edit/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Edit</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceFacturas/view/');?>"><i class="fa fa-cog"></i>&nbsp;<span>View</span></a></li>
                              </ul>
                          </li>

                          <li class="dropdown-submenu pull-left">
                            <a href="#">PerforTrips</a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php e($this->webroot.'PerformanceTrips/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Index</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceTrips/add/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Add</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceTrips/edit/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Edit</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceTrips/view/');?>"><i class="fa fa-cog"></i>&nbsp;<span>View</span></a></li>
                              </ul>
                          </li>

                          <li class="dropdown-submenu pull-left">
                            <a href="#">PerforViajes</a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php e($this->webroot.'PerformanceViajes/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Index</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceViajes/add/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Add</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceViajes/edit/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Edit</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceViajes/view/');?>"><i class="fa fa-cog"></i>&nbsp;<span>View</span></a></li>
                              </ul>
                          </li>

                          <li class="dropdown-submenu pull-left">
                            <a href="#">PerforViewViajes</a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php e($this->webroot.'PerformanceViewViajes/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Index</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceViewViajes/add/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Add</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceViewViajes/edit/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Edit</span></a></li>
                                <li><a href="<?php e($this->webroot.'PerformanceViewViajes/view/');?>"><i class="fa fa-cog"></i>&nbsp;<span>View</span></a></li>
                              </ul>
                          </li>

                          <li class="dropdown-submenu pull-left">
                            <a href="#">SharedStorage</a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php e($this->webroot.'ControlDeskUserControls/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Index</span></a></li>
                                <li><a href="<?php e($this->webroot.'ControlDeskUserControls/add/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Add</span></a></li>
                                <li><a href="<?php e($this->webroot.'ControlDeskUserControls/edit/');?>"><i class="fa fa-cog"></i>&nbsp;<span>Edit</span></a></li>
                                <li><a href="<?php e($this->webroot.'ControlDeskUserControls/view/');?>"><i class="fa fa-cog"></i>&nbsp;<span>View</span></a></li>
                              </ul>
                          </li>

                        </ul>
                    </li>

										<li class="dropdown-submenu">
											<a tabindex="-1" href="#"><i class="fa fa-cog"></i>&nbsp;<span>Projections</span></a>
												<ul class="dropdown-menu">
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsGlobalCorps/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>GlobalCorporations</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsCorporations/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Corporations</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsViewBussinessUnits/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>ProjectionsViewBussinessUnits</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsAccessModules/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>ProjectionsAccessModules</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsControlsUsers/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>ProjectionsControlsUsers</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsAccesses/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>ProjectionsAccesses</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsClosedPeriodControls/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>ProjectionsClosedPeriodControls</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsClosedPeriodDatas/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>ProjectionsClosedPeriodDatas</span></a></li>
<!--													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsPeriods/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>ProjectionsCerrarPeriodos</span></a></li>-->
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsViewIndicatorsPeriods/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>ProjectionsViewIndicatorsPeriods</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsViewClosedPeriodUnits/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>ProjectionsViewClosedPeriodUnit(for closing period dev)</span></a></li>
<!-- 													projections_view_indicators_periods_fleets -->
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsViewIndicatorsPeriodsFullFleets/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>projections_view_indicators_periods_full_fleets</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsBsuPresupuestos/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>projections_bsu_presupuestos</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'ProjectionsViewIndicatorsDispatchPeriodsFullOps/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Dispacth</span></a></li>
												</ul>
										</li>

										<li class="dropdown-submenu">
											<a tabindex="-1" href="#"><i class="fa fa-cog"></i>&nbsp;<span>Financial Reporting</span></a>
												<ul class="dropdown-menu">

													<li><a tabindex="-1" href="<?php e($this->webroot.'MrSourceMains/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Reporter Main</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'MrSourceControls');?>"><i class="fa fa-cog"></i>&nbsp;<span>Reporter Configuration</span></a></li>
													<li><a href="<?php e($this->webroot.'MrSourceKeys/index');?>"><i class="fa fa-cog"></i>&nbsp;<span>Reporter Keys</span></a></li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'MrSourceConfigs');?>"><i class="fa fa-cog"></i>&nbsp;<span>Reporter Periods</span></a></li>
													<li><a href="<?php e($this->webroot.'MrSourceAccounts/add');?>"><i class="fa fa-cog"></i>&nbsp;<span>Reporter Account</span></a></li>
													<li><a href="<?php e($this->webroot.'MrSourceReports/index');?>"><i class="fa fa-cog"></i>&nbsp;<span>Reporter Reports</span></a></li>

                          <li><a tabindex="-1" href="<?php e($this->webroot.'ReporterViewsMainReports/index/page:1/sort:index_id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Main</span></a></li>
                          <li><a tabindex="-1" href="<?php e($this->webroot.'ReporterViewsMainSubreports/index/page:1/sort:index_id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>SubMain</span></a></li>
                          <li><a tabindex="-1" href="<?php e($this->webroot.'ReporterViewsMainSubreportsAccounts/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>SubMainReportsAccounts</span></a></li>
                          <li><a tabindex="-1" href="<?php e($this->webroot.'ReporterTableKeys/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>ReporterTableKey</span></a></li>
                          <li><a tabindex="-1" href="<?php e($this->webroot.'ReporterViewSpXs4zAccounts/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Accounts</span></a></li>

													<li class="dropdown-submenu pull-left">
														<a href="#">More..</a>
															<ul class="dropdown-menu">
																<li><a href="#">3rd level</a></li>
																<li><a href="#">3rd level</a></li>
															</ul>
													</li>

												</ul>
										</li>

										<li class="divider"></li>

										<?php 	}?>
										<?php }?>
<!-- 										automagic hir -->

<!-- 										Providers -->
										<?php if (isset($_SESSION['Auth']['User'])) {?>
										<?php 	if (checkUser($_SESSION['Auth']['User']['group_id'],'Providers')) {?>

										<li class="dropdown-submenu">
											<a tabindex="-1" href="#"><i class="fa fa-cog"></i>&nbsp;<span>Proveedores</span></a>
												<ul class="dropdown-menu">
													<li><a tabindex="-1" href="<?php e($this->webroot.'/ProvidersImportedFilesControls/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-cog"></i>&nbsp;<span>Proveedores</span></a></li>
												</ul>
										</li>

										<li class="divider"></li>
										<?php 	}?>
										<?php }?>
<!-- 										automagic hir -->


<!-- 										Providers -->
										<?php if (isset($_SESSION['Auth']['User'])) {?>
										<?php 	if (checkUser($_SESSION['Auth']['User']['group_id'],'Finanzas') OR checkUser($_SESSION['Auth']['User']['group_id'],'Facturacion')) {?>


                      <li class="dropdown-submenu">
  											<a tabindex="-1" href="#"><i class="fa fa-barcode" aria-hidden="true"></i>&nbsp;<span>ModuloFacturas</span></a>
  												<ul class="dropdown-menu">
  													<li><a tabindex="-1" href="<?php e($this->webroot.'PerformanceReferences/');?>"><i class="fa fa-files-o" aria-hidden="true"></i>&nbsp;<span>Facturas</span></a></li>
  													<li><a tabindex="-1" href="<?php e($this->webroot.'PerformanceTrips/');?>"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;<span>Viajes</span></a></li>
  												</ul>
  										</li>
                      <li class="divider"></li>
										<?php 	}?>
										<?php }?>
<!-- 										automagic hir -->
                    <?php if (isset($_SESSION['Auth']['User'])) {?>
                    <?php 	if (checkUser($_SESSION['Auth']['User']['group_id'],'Finanzas') OR checkUser($_SESSION['Auth']['User']['group_id'],'Providers') ) {?>
                      <li class="dropdown-submenu">
                        <a tabindex="-1" href="#"><i class="fa fa-university" aria-hidden="true"></i>&nbsp;<span>Finanzas</span></a>
                          <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php e($this->webroot.'/ReporterViewSpXs4zAccounts/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-pie-chart" aria-hidden="true"></i>&nbsp;<span>Reportes Financieros</span></a></li>
                          </ul>
                      </li>

                      <li class="divider"></li>

                    <?php 	}?>
                    <?php }?>

										<?php if (isset($_SESSION['Auth']['User'])) {?>
										<?php 	if (checkUser($_SESSION['Auth']['User']['group_id'],'Ingresos') OR checkUser($_SESSION['Auth']['User']['group_id'],'CasetasIngresos') OR checkUser($_SESSION['Auth']['User']['group_id'],'PoliciesIngresos')) {?>

										<li class="dropdown-submenu">
											<a tabindex="-1" href="#"><i class="fa fa-line-chart"></i>&nbsp;<span>Proyecci&oacute;n</span></a>
												<ul class="dropdown-menu">
													<li>
                            <a tabindex="-1" href="<?php e($this->webroot.'ProjectionsViewIndicatorsPeriods/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-pencil-square-o"></i>&nbsp;<span> Aceptado </span></a>
													</li>
													<li>
                            <a tabindex="-1" href="<?php e($this->webroot.'ProjectionsViewIndicatorsDispatchPeriodsFullOps/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-exchange"></i>&nbsp;<span>Despachado</span></a>
													</li>
													<!-- <li>
                            <a tabindex="-1" href="<?php e($this->webroot.'ProjectionsViewIndicatorsPeriodsFullFleets/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-bar-chart"></i>&nbsp;<span>Proyecci&oacute;n</span></a>
													</li> -->
												</ul>
										</li>

                    <li class="divider"></li>

                    <li class="dropdown-submenu">
                      <a tabindex="-1" href="#"><i class="fa fa-line-chart"></i>&nbsp;<span>Rendimiento/Disponibilidad</span></a>
                        <ul class="dropdown-menu">
                          <li>
                            <a tabindex="-1" href="<?php e($this->webroot.'RendViewFullGstCoreIndicators/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-pencil-square-o"></i>&nbsp;<span> Rendimiento </span></a>
                          </li>
                          <li>
                            <a tabindex="-1" href="<?php e($this->webroot.'DisponibilidadViewRptUnidadesGstIndicators/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-exchange"></i>&nbsp;<span>Disponibilidad</span></a>
                          </li>
                          <li>
                            <a tabindex="-1" href="<?php e($this->webroot.'GeoreferenceViewPositionsHistGstIndicators/index/page:1/sort:id/direction:asc');?>"><i class="fa fa-exchange"></i>&nbsp;<span>SinDocumentos</span></a>
                          </li>
                        </ul>
                    </li>

										<li class="divider"></li>
										<?php 	}?>
										<?php }?>

										<?php if (isset($_SESSION['Auth']['User'])) {?>
										<?php 	if (checkUser($_SESSION['Auth']['User']['group_id'],'Casetas') OR checkUser($_SESSION['Auth']['User']['group_id'],'CasetasIngresos')) {?>

										<li class="dropdown-submenu">
											<a tabindex="-1" href="#"><i class="fa fa-truck"></i>&nbsp;<span>Casetas</span></a>
												<ul class="dropdown-menu">
													<li><a tabindex="-1" href="<?php e($this->webroot.'Casetas/index/page:1/sort:id/direction:desc');?>"><i class="fa fa-list-alt"></i>&nbsp;<span> Inicio </span></a>
													</li>
													<li><a tabindex="-1" href="<?php e($this->webroot.'Casetas/add');?>"><i class="fa fa-upload"></i>&nbsp;<span> Importar Archivo</span></a>
													</li>
												</ul>
										</li>

										<li class="divider"></li>
										<?php 	}?>
										<?php }?>
<!-- 										secure -->
										<?php if (isset($_SESSION['Auth']['User'])) {?>
										<?php 	if (checkUser($_SESSION['Auth']['User']['group_id'],'Secure')) {?>

										<li class="dropdown-submenu">
											<a tabindex="-1" href="#"><i class="fa fa-cog"></i>&nbsp;<span>SecureApps</span></a>
												<ul class="dropdown-menu">
													<li><a tabindex="-1" href="<?php e($this->webroot.'SecureCalendars');?>"><i class="fa fa-cog"></i>&nbsp;<span>SecureCourses</span></a>
													</li>
												</ul>
										</li>

										<li class="divider"></li>
										<?php 	}?>
										<?php }?>
<!-- 										automagic hir -->

										<?php if (isset($_SESSION['Auth']['User'])) {?>
										<?php 	if (checkUser($_SESSION['Auth']['User']['group_id'],'PoliciesAnexos') OR checkUser($_SESSION['Auth']['User']['group_id'],'PoliciesIngresos')) {?>


										<li class="dropdown-submenu">
											<a tabindex="-1" href="#"><i class="fa fa-cog"></i>&nbsp;<span>Policy Config</span></a>
												<ul class="dropdown-menu">
													<li>
														<a href="<?php e($this->webroot.'Policies');?>" class="ajax-link">
															<i class="fa fa-cog"></i>
															<span>Documento</span>
														</a>
													</li>

													<li>
														<a href="<?php e($this->webroot.'PoliciesAnexos');?>" class="ajax-link">
															<i class="fa fa-cog"></i>
															<span><?php e(languaje($languaje)['navMenuF']);?></span>
														</a>
													</li>

                          <li>
														<a href="<?php e($this->webroot.'PoliciesSubtypesDefinitions');?>" class="ajax-link">
															<i class="fa fa-cog"></i>
															<span>Submenu-Clasifications</span>
														</a>
													</li>

                          <li>
														<a href="<?php e($this->webroot.'PoliciesSubtypes');?>" class="ajax-link">
															<i class="fa fa-cog"></i>
															<span>Submenus-Hooks</span>
														</a>
													</li>
                          <?php if (checkAdmin($_SESSION['Auth']['User']['group_id'])){ ?>
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
															<span>PoliciesMenus</span>
														</a>
													</li>
                         <?php }?>
												</ul>
										</li>


										<li class="divider"></li>

										<?php 	}?>
										<?php }?>
<!-- 										automagic hir -->
                <!-- adding  -->

                    <?php if (isset($setMenu)) {?>
                        <?php foreach($setMenu as $idRootMenu => $subMenu) {?>
                        <li class="dropdown-submenu">
                          <a tabindex="-1" href="#"><i class="fa fa-file-text"></i>&nbsp;<span><?php e(key($subMenu))?></span></a>

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
                          </ul>
                        </li>
                        <?php }?>
                    <?php }?>
                    <!-- adding -->
<!-- 										automagic hir -->
                    <li class="divider"></li>

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


<!--         <ul class="nav navbar-nav navbar-right">  -->
<!--         <ul class="collapse nav navbar-nav nav-collapse" role="search" id="nav-collapse4"> -->

<!--             <li><a href="#">Dashboard</a></li> -->
<!--             <li><a href="#">Settings</a></li> -->
<!--             <li><a href="#">Profile</a></li> -->
<!-- 			<li> -->
<!-- 			<a href="#" class="helplink" data-toggle="modal" data-target="#myModal">Ayuda</a> -->
<!-- 			</li> -->
<!--         </ul>  -->

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
