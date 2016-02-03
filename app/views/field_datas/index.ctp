<?php //index?>
<?php //debug($fieldDatas Index view);?>

     <script type="text/javascript">
      // File Picker modification for FCK Editor v2.0 - www.fckeditor.net
     // by: Pete Forde <pete@unspace.ca> @ Unspace Interactive
     <?php //echo "$path"?>
     var urlobj;
// 	<?php echo "var url_path = '$path';\n"?>

// 	 <?php echo "'$path'\n"?>
     function BrowseServer(obj,url_path)
     {
          urlobj = obj;
          OpenServerBrowser(
          url_path,
          screen.width * 0.7,
          screen.height * 0.7 ) ;
     }

     function OpenServerBrowser( url, width, height )
     {
          var iLeft = (screen.width - width) / 2 ;
          var iTop = (screen.height - height) / 2 ;
          var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes,titlebar=no,menubar=no,scrollbars=yes" ;
          sOptions += ",width=" + width ;
          sOptions += ",height=" + height ;
          sOptions += ",left=" + iLeft ;
          sOptions += ",top=" + iTop ;
          var oWindow = window.open( url, "BrowseWindow", sOptions ) ;
     }

     function SetUrl( url, width, height, alt )
     {
          document.getElementById(urlobj).value = url ;
          oWindow = null;
     }
     </script>

    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
<!-- 			<li class="list-group-item"><?php echo $this->Html->link(__('Filemanager', true), array('action' => 'add')); ?>	</li> -->
			<li class="list-group-item"><span class="text-primary pointer" onclick="BrowseServer('id_of_the_target_input',<?php e("'$path'");?>);">Administrador de Archivos</span></li>
			<li class="list-group-item"><?php echo $this->Html->link(__('List Field Names', true), array('controller' => 'field_names', 'action' => 'index')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('New Field Names', true), array('controller' => 'field_names', 'action' => 'add')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('List Catalog Datas', true), array('controller' => 'catalog_datas', 'action' => 'index')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('New Catalog Datas', true), array('controller' => 'catalog_datas', 'action' => 'add')); ?> </li>
          </ul>
        </div>


		<div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
		<h1 class="page-header"><?php __('Información de Usuarios');?></h1>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped responstable">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id');?></th>
							<th><?php echo $this->Paginator->sort('name');?></th>
							<th><?php echo $this->Paginator->sort('last_name');?></th>
							<th><?php echo $this->Paginator->sort('last_ip');?></th>
							<th><?php echo $this->Paginator->sort('company_id');?></th>
							<th><?php echo $this->Paginator->sort('last_access');?></th>
	<!-- 													<th><?php echo $this->Paginator->sort('data');?></th> -->
							<th><?php echo $this->Paginator->sort('user_agent');?></th>
<!--							<th><?php echo $this->Paginator->sort('modified');?></th>
							<th><?php echo $this->Paginator->sort('status');?></th>
							<th class="actions" colspan="3"><?php __('Actions');?></th>-->
								
						</tr>
					</thead>
				</table>
			</div>
<!-- 		toggle test -->
<?php /** NOTE <toggle section for gui>*/?>
<!-- 		General style for this demos -->
			<style>
				.pointer {
					cursor:pointer;
				}
				.show_panel_content {
					display:none;
					width:100%;
				}
				.panel-body,.panel-footer {
					color:black;
				}
				#panel {
/* 					border-radius:.2em; */
				}
			</style>
			<!-- 		General style for this demos -->
			<!-- 	Jquery Demo -->
	<div class="Jquery Demo">

			<script>

				<?php foreach($fieldDataUser as $index_field => $fieldDataContent) { ?>
				<?php 

					echo "require(['jquery', 'bootstrap'], function($) {"."\n";
					echo "\t"."var divTag = document.getElementById('button_show_".$index_field."');"."\n";
					echo "\t"."var panel_show = document.getElementById('show_panel_".$index_field."');"."\n";
					echo "\t"."$(document).ready(function(){"."\n";
					echo "\t\t"."$(divTag).click(function(){"."\n";
					echo "\t\t\t"."$(panel_show).toggle(['slow']);"."\n";
					echo "\t\t"."});"."\n";
					echo "\t"."});"."\n";
					echo "});"."\n";

				?>

				<?php } ?>

			</script>
	<?php $index_field = $fieldDataContent = null; ?>

	<?php foreach($fieldDataUser as $index_field => $fieldDataContent) { ?>
		
		<?php 
				$setIdFieldData = $dataUserFieldData[$fieldDataContent['id']];
		?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<?php e($fieldDataUser[$index_field]['name'].' '.$fieldDataUser[$index_field]['last_name']);?> &nbsp;
						<span class="pull-right">
						
							<span class="label label-company">
								<?php echo $company[$fieldDataContent['company_id']]; ?>&nbsp;
							</span> &nbsp;
							<span class="label label-primary">
								<?php e($fieldDataContent['last_ip']);?>
							</span> &nbsp;
							
							<span class="label label-warning">
								<?php e($fieldDataContent['last_access']);?>
							</span> &nbsp;
							
							<span class="label label-default">
								<?php
								$htmlRender = checkBrowser($fieldDataContent['last_user_agent'],true,true);
								if ($htmlRender !== false) {

									$motor = array_search($htmlRender,$htmlMotor);
									if ($motor) {

										echo "&nbsp;<kbd><i class=\"$motor\"></i></kbd>&nbsp;{$htmlRender}";
									} else {
										echo "&nbsp;<i class=\"fa fa-cloud\"></i>&nbsp;{$htmlRender}";
									}
								}
								?>
							</span> &nbsp;
							<span id="button_show_<?php e($index_field);?>" class="label label-success pointer"><?php ($_SESSION['Auth']['User']['id']!=$fieldDataContent['id'])?e('more ...&nbsp;<i class="fa fa-caret-down"></i>'):e('less ...&nbsp;<i class="fa fa-caret-up"></i>') ?> </span> &nbsp;
						</span>
					</h3>
				</div>
				<span id="show_panel_<?php e($index_field);?>" class="<?php ($_SESSION['Auth']['User']['id']!=$fieldDataContent['id'])?e("show_panel_content"):e("")?>" >
					<div class="panel-body"> 

						<table class="table table-bordered table-hover table-striped responstable">
						
							<?php //debug(count($setIdFieldData));?>

							<!-- table body -->
							<?php foreach ($setIdFieldData as $indexIdFieldData => $idFieldData) { ?>
								
								<?php //debug($resultFieldData[$idFieldData]);?>
								<th width="25%">
								
									<?php if (isset($resultFieldData[$idFieldData]['CatalogDatas']['id'])) {?>

									<?php 
										echo $this->Html->link(__(ucwords($resultFieldData[$idFieldData]['FieldNames']['field_names']), true),
																					array(
																							'controller'=>'CatalogDatas',
																							'action' => 'edit',
																							$resultFieldData[$idFieldData]['CatalogDatas']['id']
																						)
														   );
									?>
									<?php } else { ?>

										<?php e(ucwords($resultFieldData[$idFieldData]['FieldNames']['field_names']));?>

									<?php } ?>
									
								</th>

								<?php if (empty($resultFieldData[$idFieldData]['CatalogDatas']['catalog_data'])) { ?>
									<td><?php echo $this->Html->link(__('Add', true), array('action' => 'edit',$resultFieldData[$idFieldData]['FieldData']['id'])); ?></td>
								<?php } else {?>
									<td><?php echo $this->Html->link(__($resultFieldData[$idFieldData]['CatalogDatas']['catalog_data'], true), array('action' => 'edit',$resultFieldData[$idFieldData]['FieldData']['id'])); ?></td>
								<?php } ?><tr />

							<?php } ?>
							<!-- table body -->
							
						</table>
					</div> <!--end panel body-->

					<div class="panel-footer">

					</div> <!--end panel footer-->
					
				</span>
			</div>
	<?php } ?>
	
	</div><!-- Jquery Demo -->


<?php /** NOTE <toggle section for gui>*/?>
<!-- 		toggle test -->
		<div class="paginator">
			<p>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
					));
				?>
			</p>

			<ul class="pagination">
				<?php 
					echo $this->Paginator->prev( '«' ,array('tag'=>'li'),null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
					echo $this->Paginator->numbers(array('separator' => null,'tag'=>'li'));
					echo $this->Paginator->next( '»' , array('tag'=>'li'), null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
				?>
			</ul>
		</div>

        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->






