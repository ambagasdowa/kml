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
//warning
// pr($warning);


// exit();
	header ("Expires: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/vnd.ms-excel");
	header ("Content-Disposition: attachment; filename=".$standings_name.".xls" );
	header ("Content-Description: Exported as XLS" );

// pr($warning);exit();
?>

	<div class="bg-danger visible-print-block">
		<div class="text-justified">

                <?php
                // SecureCalendar index
                    // NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
        // 			$evaluate = false;
        // 			$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
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





        <!-- 		<span alt="Regresar" title="Regresar" onclick="goBack()"><i class="fa fa-chevron-circle-left fa-4x go_back searchlink" aria-hidden="true"></i></span> -->



                        <table class="order-table table table-bordered table-hover table-striped responstable">
                        <thead class="header_menu">
                            <tr>
                                <th><?php echo 'ID &nbsp;';?></th>
                                <th><?php echo 'Unidad &nbsp;';?></th>

                                <th><?php echo 'Inicio de Viaje &nbsp';?></th>
                                <th><?php echo 'Fin de Viaje &nbsp;';?></th>
                                <th><?php echo 'Hrs &nbsp;';?></th>
                                <th><?php echo 'Id_Ruta &nbsp;';?></th>
                                <th><?php echo 'Viaje &nbsp;';?></th>

                                <th><?php echo 'Orden &nbsp;';?></th>

                                <th><?php echo 'Caseta &nbsp;';?></th>
                                <th><?php echo 'Monto &nbsp;';?></th>

                                <th><?php echo 'Unidad &nbsp;';?></th>
                                <th><?php echo 'IAVE &nbsp;';?></th>
                                <th><?php echo 'Monto &nbsp;';?></th>
                                <th><?php echo 'Nombre &nbsp;';?></th>
                                <th><?php echo 'Fecha &nbsp;';?></th>
                                <th><?php echo 'Hora &nbsp;';?></th>


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
                <!-- <td><?php echo '$ '.number_format(sprintf("%01.2f",$casetasView['CasetasView']['liq_monto_iave']), 2, '.', ','); ?>&nbsp;</td> -->
								<td><?php echo round($casetasView['CasetasView']['liq_monto_iave'],2); ?>&nbsp;</td>
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
                <!-- <td><?php echo '$ '.number_format(sprintf("%01.2f",$casetasView['CasetasView']['float_data']), 2, '.', ','); ?>&nbsp;</td> -->
								<td><?php echo round($casetasView['CasetasView']['float_data'],2); ?>&nbsp;</td>
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
		</div>
	</div>
