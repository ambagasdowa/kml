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

		<style>
			/* unvisited link */
			.modded-link:link {
				display:block !important;
				background-color:#999;
				color: #444;
			}
			/* mouse over link */
			.modded-link:hover {
				font-weight: bold;
			}
			.panel-default {
				background-color: rgba(255, 255, 255, 0.3); /* Color white with alpha 0.9*/
			}

			.go_back:hover{
				background-color: rgba(82, 124, 143, 0.3); /* Color white with alpha 0.9*/
				border-radius:80%;
				color:#66BFFF;
			}

			.searchlink {
				position: fixed;
/* 				bottom: 15px; */
				top:13%;
				left: 5%;
				cursor: pointer;
				z-index:150;
			}
			.center{
				text-align:center !important;
			}
			.lis{
				background-color: rgba(185, 186, 164, 0.3);
			}
			.iave{
				background-color: rgba(160, 182, 186, 0.3);
			}
			.edit{
				background-color: rgba(161, 76, 27, 0.3);
			}
		</style>

<style>

</style>

    <div class="container-fluid">
    	<span><?php echo $this->element('casetas/help_manual');?></span>
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
<!-- 		<li> -->
<!-- 			 <button onclick="goBack()" class="btn btn-success" type="submit"><i class="fa fa-caret-left">&nbsp;</i>Regresar</button> -->
<!-- 			 <button onclick="goBack()" type="button" class="btn btn-primary-outline"><i class="fa fa-caret-left">&nbsp;</i>Regresar</button> -->
<!-- 		</li> -->
<!-- 		<li class="list-group-item"><?php //echo $this->Html->link(__('List Casetas Views', true), array('controller' => 'casetas_views', 'action' => 'index')); ?> -->
<!-- 		</li> -->
		<li>
			<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filtro ...">
		</li>
          </ul>
        </div>

		<span alt="Regresar" title="Regresar" onclick="goBack()"><i class="fa fa-chevron-circle-left fa-4x go_back searchlink" aria-hidden="true"></i></span>

        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header">
						<?php e($standings_name)?>
						<?php e('&nbsp;<small style="color:#fff;">'.$standings_blockquote.'</small>');?>
	    </h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead class="header_menu">
					<tr>
						<th><?php echo $this->Paginator->sort('ID &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','id',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Unidad &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','id_unidad',array('escape' => false));?></th>
<!--						<th><?php echo $this->Paginator->sort('IAVE &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','no_tarjeta_iave',array('escape' => false));?></th>-->
											<!--<th><?php echo $this->Paginator->sort('alpha_location_1');?></th>-->
											<!-- <th><?php echo $this->Paginator->sort('_filename');?></th> -->
						<th><?php echo $this->Paginator->sort('Inicio de Viaje &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','f_despachado',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Fin de Viaje &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','fecha_fin_viaje',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Hrs &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','diff_length_hours',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Id_Ruta &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','id_ruta',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Viaje &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','no_viaje',array('escape' => false));?></th>
											<!--<th><?php echo $this->Paginator->sort('cia');?></th> -->
											<!--<th><?php echo $this->Paginator->sort('Monto_archivo');?></th> -->
<!-- 											<th><?php echo $this->Paginator->sort('orden');?></th> -->
						<th><?php echo $this->Paginator->sort('Orden &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','orden',array('escape' => false));?></th>
											<!--<th><?php echo $this->Paginator->sort('fecha_inicio');?></th> -->
											<!--<th><?php echo $this->Paginator->sort('fecha_fin');?></th> -->
<!-- 											<th><?php echo $this->Paginator->sort('description_casetas');?></th> -->
						<th><?php echo $this->Paginator->sort('Caseta &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','description_casetas',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Monto &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','liq_monto_iave',array('escape' => false));?></th>
											<!--<th><?php echo $this->Paginator->sort('casetas_historical_conciliations_id');?></th> -->
											<!--<th><?php echo $this->Paginator->sort('casetas_controls_files_id');?></th> -->
											<!--<th><?php echo $this->Paginator->sort('created');?></th> -->
											<!--<th><?php echo $this->Paginator->sort('modified');?></th> -->
						<th><?php echo $this->Paginator->sort('Unidad &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','unit',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('IAVE &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','alpha_num_code',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Monto &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','float_data',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Nombre &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','alpha_location',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Fecha &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','fecha_cruce',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Hora &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','hora_cruce',array('escape' => false));?></th>

<!-- 						<th><?php echo $this->Paginator->sort('casetas_standings_id');?></th> -->
											<!--<th><?php echo $this->Paginator->sort('casetas_parents_id');?></th> -->
											<!--<th><?php echo $this->Paginator->sort('_status');?></th> -->
            <?php //if (isset($_SESSION['Auth']['User'])) {?>
			<?php 	//if (checkSuperUser($_SESSION['Auth']['User']['group_id'],$_SESSION['Auth']['User']['number_id'],$_SESSION['Auth']['User']['super_user'])) {?>
											<th class="actions" colspan="1"><?php __('Actions');?></th>
            <?php
//                 }
//             }
            ?>
					</tr>
					<tr>
						<td colspan="10" class="center lis"><strong>LIS</strong></td>
						<td colspan="6" class="center iave"><strong>IAVE</strong></td>

            <?php //if (isset($_SESSION['Auth']['User'])) {?>
			<?php 	//if (checkSuperUser($_SESSION['Auth']['User']['group_id'],$_SESSION['Auth']['User']['number_id'],$_SESSION['Auth']['User']['super_user'])) {?>
						<td colspan="1" class="center edit"><strong>EDITAR</strong></td>
            <?php
//                 }
//             }
            ?>
<!-- 						<td>&nbsp;</td> -->
					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($casetasViews as $casetasView):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $casetasView['CasetasView']['id']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['id_unidad']; ?>&nbsp;</td>

<!-- 		<td><?php echo $casetasView['CasetasView']['no_tarjeta_iave']; ?>&nbsp;</td> -->


		<!--<td><?php echo $casetasView['CasetasView']['alpha_location_1']; ?>&nbsp;</td>-->
<!-- 		<td><?php echo $casetasView['CasetasView']['_filename']; ?>&nbsp;</td> -->


		<td><?php echo $casetasView['CasetasView']['f_despachado']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['fecha_fin_viaje']; ?>&nbsp;</td>
        <td><?php echo $casetasView['CasetasView']['diff_length_hours']; ?>&nbsp;</td>
        <td><?php echo $casetasView['CasetasView']['id_ruta']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['no_viaje']; ?>&nbsp;</td>

<!-- 		<td><?php echo $casetasView['CasetasView']['cia']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $casetasView['CasetasView']['Monto_archivo']; ?>&nbsp;</td> -->
		<td><?php echo $casetasView['CasetasView']['orden']; ?>&nbsp;</td>
<!-- 		<td><?php echo $casetasView['CasetasView']['fecha_inicio']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $casetasView['CasetasView']['fecha_fin']; ?>&nbsp;</td> -->
		<td><?php echo $casetasView['CasetasView']['description_casetas']; ?>&nbsp;</td>
		<td><?php echo '$ '.number_format(sprintf("%01.2f",$casetasView['CasetasView']['liq_monto_iave']), 2, '.', ','); ?>&nbsp;</td>
<!--		<td>
			<?php echo $this->Html->link($casetasView['CasetasHistoricalConciliations']['casetas_controls_files_id'], array('controller' => 'casetas_historical_conciliations', 'action' => 'view', $casetasView['CasetasHistoricalConciliations']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($casetasView['CasetasControlsFiles']['_filename'], array('controller' => 'casetas_controls_files', 'action' => 'view', $casetasView['CasetasControlsFiles']['id'])); ?>
		</td>-->
<!-- 		<td><?php echo $casetasView['CasetasView']['created']; ?>&nbsp;</td> -->
<!-- 		<td><?php echo $casetasView['CasetasView']['modified']; ?>&nbsp;</td> -->

		<td><?php echo $casetasView['CasetasView']['unit']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['alpha_num_code']; ?>&nbsp;</td>
		<td><?php echo '$ '.number_format(sprintf("%01.2f",$casetasView['CasetasView']['float_data']), 2, '.', ','); ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['key_num_5']; ?>&nbsp;</td>
		<td><?php echo $casetasView['CasetasView']['fecha_cruce']; ?>&nbsp;</td>
		<td><?php echo substr($casetasView['CasetasView']['hora_cruce'],0,-8); ?>&nbsp;</td>

<!-- 		<td> -->
		<?php //echo $this->Html->link(__(html_entity_decode(htmlentities($casetasView['CasetasStandings']['casetas_standings_name'],ENT_XHTML,'ISO-8859-1')), true), array('controller' => 'casetas_standings', 'action' => 'view', $casetasView['CasetasStandings']['id'])); ?>
		<?php //e($casetasView['CasetasStandings']['id']);?>
<!-- 		</td> -->

<!--		<td>
			<?php echo $this->Html->link($casetasView['CasetasParents']['casetas_parents_name'], array('controller' => 'casetas_parents', 'action' => 'view', $casetasView['CasetasParents']['id'])); ?>
		</td>-->
<!-- 		<td><?php echo $casetasView['CasetasView']['_status']; ?>&nbsp;</td> -->
<!--		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $casetasView['CasetasView']['id'])); ?>
		</td>-->

        <?php //if (isset($_SESSION['Auth']['User'])) {?>
			<?php 	//if (checkSuperUser($_SESSION['Auth']['User']['group_id'],$_SESSION['Auth']['User']['number_id'],$_SESSION['Auth']['User']['super_user'])) {?>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar', true), array('controller' => 'CasetasViews','action' => 'edit', 'id'=>$casetasView['CasetasView']['id'],'iave_key'=> $casetasView['CasetasView']['alpha_num_code'],'monto'=>$casetasView['CasetasView']['float_data'],'nombre'=>$casetasView['CasetasView']['alpha_location'],'unidad'=>$casetasView['CasetasView']['unit'],'fecha_cruce'=>$casetasView['CasetasView']['fecha_cruce'],'hora_cruce'=>$casetasView['CasetasView']['hora_cruce'],'tarjeta_iave'=> $casetasView['CasetasView']['no_tarjeta_iave'])); ?>
		</td>
            <?php
//                 }
//             }
            ?>
<!--		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $casetasView['CasetasView']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasView['CasetasView']['id'])); ?>
		</td>-->
	</tr>
<?php endforeach; ?>
				</table>
			</span> <!--class="filter-container"-->
				<p>
					<?php
						echo $this->Paginator->counter(array(
						'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
						));
						?>				</p>

				<ul class="pagination">
							<?php

							echo $this->Paginator->prev( '«' ,array('tag'=>'li'),null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));

	?>							<?php

							echo $this->Paginator->numbers(array('separator' => null,'tag'=>'li'));

	?>						<?php

							echo $this->Paginator->next( '»' , array('tag'=>'li'), null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
	?>				</ul>
          </div>
        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->


	<script>

		function goBack() {
			window.history.back();
		}


        $(document).ready(function () {
            $(function () {
                $("table").stickyTableHeaders({fixedOffset: 22,marginTop: 22});
            });
            /*! Copyright (c) 2011 by Jonas Mosbech - https://github.com/jmosbech/StickyTableHeaders
                MIT license info: https://github.com/jmosbech/StickyTableHeaders/blob/master/license.txt */

    // 		var loadSecureTopicsTypes = "<?php echo Dispatcher::baseUrl();?>" + '/SecureTopicsTypes/' + ' .secureTopicsTypes';
    // 			$("#loadSecureTopicsTypes").load(loadSecureTopicsTypes,function(e){
    // 				$('#newSecureTopicsTypes').on('click', function (e){
    // 					e.preventDefault(); // prevent jajajaja !
    // 					var secureTopicsTypesAdd = "<?php echo Dispatcher::baseUrl();?>" + '/SecureTopicsTypes/add/' + ' .container';
    // // 					console.log($('.fancySecureTopics').text());
    // 					$.fancybox({
    // 						'type': 'ajax',
    // 						'href': secureTopicsTypesAdd,
    // 						'autoScale': true,
    // 						'autoDimensions': true
    // 					});
    // 					return false;
    // 				console.log(secureTopicsTopicsAdd);
    // 				});
    // 			});

    //add calendar ?? hir or in edit view


        });
	</script>
