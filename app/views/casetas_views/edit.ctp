<?php ?>
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
    $evaluate = false;
    $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
//     debug($casetasNotConciliatinsDetail);

?>

<style>

	.dl-horizontal {
/* 		display:block !important; */
/* 		background-color:#999; */
		color: #444;
	}

	.lis_joins {
		position: fixed;
/* 		bottom: 30%; */
/* 		top:16%; */
        width:45%;
/* 		right: 2%; */
		cursor: pointer;
/* 		z-index:150; */
		color:#ccc;
	}

	.up_joins {
		position: fixed;
/* 		bottom: 30%; */
		top:8%;
/*         width:45%; */
		right: 5%;
		cursor: pointer;
 		z-index:250;
		color:#ccc;
	}

	.iave{
        width:50%;
	}

	/**PORLET*/
    .column {
        width: 170px;
        float: left;
        padding-bottom: 100px;
    }
    .portlet {
        margin: 0 1em 1em 0;
        padding: 0.3em;
    }
    .portlet-header {
        padding: 0.2em 0.3em;
        margin-bottom: 0.5em;
        position: relative;
    }
    .portlet-toggle {
        position: absolute;
        top: 50%;
        right: 0;
        margin-top: -8px;
    }
    .portlet-content {
        padding: 0.4em;
    }
    .portlet-placeholder {
        border: 1px dotted black;
        margin: 0 1em 1em 0;
        height: 50px;
    }

    .hideextra { white-space: nowrap; overflow: hidden; text-overflow:ellipsis; }



    	/**WEATHER STYLE*/

        .weather-widget-big-text {
            font-size: 30px !important;
        }
        style.css:2392
        .p-t-35 {
            padding-top: 35px;
        }
        style.css:2341
        .p-b-10 {
            padding-bottom: 10px;
        }
        style.css:2284
        .no-margin {
            margin: 0px !important;
        }
        style.css:1957
        .semi-bold {
            font-weight: 600;
        }

        bootstrap.min.css:5
        .text-primary {
            color: #428bca;
        }
        style.css:1814
        h2 {
            line-height: 30px;
        }

        /*MORE WEATHER*/

    .tiles.white {
        background-color: #f9f9f9;
        color: #8b91a0;
    }
    .text-center {
        text-align: center !important;
    }

    .tiles .blend {
        color: rgba(0, 0, 0, 0.42);
    }
    style.css:5420
    .tiles .tiles-title {
        font-size: 10.5px;
        font-family: 'Open Sans';
        letter-spacing: 0.5px;
        font-weight: 600;
    }
    style.css:2377
    .p-b-25 {
        padding-bottom: 25px;
    }


</style>


<?php //debug($casetasViewConciliation);?>
<?php //debug($casetasViewNotConciliations);?>

<div id="updateMessage" style="display:none;">
                        <?php	echo $this->Session->flash();?>

                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
							</button>
                                <strong>La Conciliacion se ejecuto correctamente</strong>
						</div>
</div>




 <!--       <div>
		  <h4 class="form-signin-heading">
		  <i class="fa fa-file-o fa-2x"></i>
			<span>
                <?php __('Edit Casetas View'); ?>
            </span>
          </h4>
        </div>-->

                <div id="send" class="pull-right">
                    <div id="lata" class="btn btn-success up_joins">Actualizar</div>
                </div>


	<table class="table">
            <?php if (!isset($casetasNotConciliatinsDetail)) {?>
            <tr>
              <td>
                          <div class="alert alert-warning alert-dismissible fade in" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                              <strong>No se encontraron Viajes</strong>
  						</div>
              </td>
           </tr>
            <?php } else { ?>
<thead class="header_menu">

  <tr>
    <th class="tiles white text-center">
      <h2 class="semi-bold text-primary weather-widget-big-text no-margin p-b-25">LIS</h2>
      <div class="tiles-title blend p-b-25">Cruces Zam</div>
      <div class="clearfix"></div>
    </th>
    <th class="tiles white text-center">
      <h2 class="semi-bold text-primary weather-widget-big-text no-margin p-b-25">IAVE</h2>
      <div class="tiles-title blend p-b-25">Cruces I+D</div>
      <div class="clearfix"></div>
    </th>
  </tr>

</thead>

<tr>
			<td>

                <div id="column">

                    <?php foreach ($casetasNotConciliatinsDetail as $viaje => $detail) { ?>
                    <div id="__get_lis_<?php e($viaje)?>">
<!--                         <ol class="nested_with_switch limited_drop_targets vertical" style="background-color:#ddd;"> -->
                            <!--<li data-name="lis_<?php e($viaje)?>" class="lis_<?php e($viaje)?>">-->
                                    <div class="panel panel-default portlet">
                                        <!-- Default panel contents -->
                                        <div class="portlet-header panel-header">
<!--                                             <i class="fa fa-bars"></i> -->
                                            <table>
                                            <tr>
                                                <td width="50%">
                                                <div class="hideextra" style="width:100%">
                                                    <dl class="dl-horizontal">
                                                        <dt>No Viaje Lis</dt> <dd><?php e($viaje)?> </dd>
                                                        <dt>Inicio Viaje</dt> <dd><?php e($casetasNotConciliatinsDetailtr[$viaje]['fecha_real_viaje'])?> </dd>
                                                        <dt>Fin Viaje</dt> <dd><?php e($casetasNotConciliatinsDetailtr[$viaje]['fecha_real_fin_viaje'])?> </dd>
                                                        <dt>Hrs</dt> <dd><?php e($casetasNotConciliatinsDetailtr[$viaje]['diff_length_hours'])?> </dd>
                                                    </dl></div>
                                                </td>
                                                <td>
                                                <div class="hideextra" style="width:100%">
                                                    <dl class="dl-horizontal">
                                                        <dt>Tarjeta IAVE</dt> <dd><?php e($casetasNotConciliatinsDetailtr[$viaje]['iave_catalogo'])?> </dd>
                                                        <dt>Unidad</dt> <dd><?php e($casetasNotConciliatinsDetailtr[$viaje]['id_unidad'])?></dd>
                                                        <dt>Ruta</dt> <dd><?php e($casetasNotConciliatinsDetailtr[$viaje]['id_ruta'])?></dd>
                                                    </dl></div>
                                                </td>
                                            </tr>
                                            </table>
                                        </div>
                                        <div class="panel-body portlet-content" style="display:none;">
            <!--                             <p>A list of terms with their associated descriptions.</p> -->
<!--                                         </div> -->
                                            <table>
                                            <?php foreach ($detail as $id_detail => $containt) {?>

                                                <?php if ($filter == true ) { ?>
                                                    <?php if (!$containt['iave_cruce_id']) { ?>
                                                <tr>
                                                    <td>
                                                        <dl class="dl-horizontal">
                                                                <dt><?php __('id')?></dt>
                                                                <dd>
                                                                    <?php echo $containt['id']; ?>
                                                                    &nbsp;
                                                                </dd>
                                                                <dt><?php __('Caseta')?></dt>
                                                                <dd>
                                                                    <?php echo $containt['description_casetas']; ?>
                                                                    &nbsp;
                                                                </dd>
                                                                <dt><?php __('Monto')?></dt>
                                                                <dd>
                                                                    <?php echo '$ '.$containt['liq_monto_iave']; ?>
                                                                    &nbsp;
                                                                </dd>
                                                                <dt><?php __('Cruce con Iave')?></dt>
                                                                <dd>
                                                                    <?php $containt['iave_cruce_id'] ? e(' Si '):e(' No '); ?>
                                                                    &nbsp;
                                                                </dd>

                                                            </dl>
                                                        </td>

                                                        <td>
                                                            <div id="get_lis_<?php $containt['id'] ? e($containt['id']) : null; ?>">
                                                                <ol <?php $containt['iave_cruce_id'] ? e('class="vertical"') : e('class="nested_with_switch limited_drop_targets vertical"') ; ?> style="background-color:#ddd;">
                                                                    <li data-name="lis_<?php e($containt['id'])?>" class="lis_<?php e($containt['id'])?>">

                                                                    </li>
                                                                </ol>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                        <?php } ?>

                                                <?php } else {?>
                                                <tr>
                                                    <td>
                                                        <dl class="dl-horizontal">
                                                                <dt><?php __('id')?></dt>
                                                                <dd>
                                                                    <?php echo $containt['id']; ?>
                                                                    &nbsp;
                                                                </dd>
                                                                <dt><?php __('Caseta')?></dt>
                                                                <dd>
                                                                    <?php echo $containt['description_casetas']; ?>
                                                                    &nbsp;
                                                                </dd>
                                                                <dt><?php __('Monto')?></dt>
                                                                <dd>
                                                                    <?php echo '$ '.$containt['liq_monto_iave']; ?>
                                                                    &nbsp;
                                                                </dd>
                                                                <dt><?php __('Cruce con Iave')?></dt>
                                                                <dd>
                                                                    <?php $containt['iave_cruce_id'] ? e(' Si '):e(' No '); ?>
                                                                    &nbsp;
                                                                </dd>

                                                            </dl>
                                                        </td>

                                                        <td>
                                                            <div id="get_lis_<?php $containt['id'] ? e($containt['id']) : null; ?>">
                                                                <ol <?php $containt['iave_cruce_id'] ? e('class="vertical"') : e('class="nested_with_switch limited_drop_targets vertical"') ; ?> style="background-color:#ddd;">
                                                                    <li data-name="lis_<?php e($containt['id'])?>" class="lis_<?php e($containt['id'])?>">

                                                                    </li>
                                                                </ol>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                            <?php }?>
                                            </div>
                                            </table>
                                        </div> <!--end panel default-->
<!--                                 </li> -->
<!--                             </ol> -->
                        </div>
                    <?php }?>
                </div>
			</td>
			<?php }?>
			<!--==========================================================================================-->
			<td class="iave">
                <div class="lis_joins table_joins" style="overflow-y: scroll; height:70%;">
                    <div id="column">
                    <?php $counter = 0;?>
                    <?php foreach ($casetasViewConciliation as $CasetasViewsconciliations) { ?>

                            <div id="get_iave_<?php e($counter)?>" class="portlet">
                                <ol class="nested_with_switch limited_drop_targets vertical">
                                    <li class="highlight" data-id="iave_<?php e($CasetasViewsconciliations['CasetasView']['id'])?>">
                                        <div class="panel panel-default">
                                        <!-- Default panel contents -->
                                            <div class="panel-heading portlet-header">
                                            <table>
                                            <tr>
                                                <td width="50%">
                                                <div class="hideextra" style="width:100%">
                                                    <dl class="dl-horizontal">
                                                        <dt>Cruce Iave</dt> <dd><?php e($CasetasViewsconciliations['CasetasView']['id'])?></dd>
                                                        <dt>Unidad</dt> <dd><?php e($CasetasViewsconciliations['CasetasView']['unit']);?></dd>
                                                    </dl></div>
                                                </td>
                                                <td>
                                                <div class="hideextra" style="width:100%">
                                                    <dl class="dl-horizontal">
                                                        <dt>Caseta</dt> <dd><?php e($CasetasViewsconciliations['CasetasView']['key_num_5']);?></dd>
                                                        <dt>Monto</dt> <dd><?php e('$ '.$CasetasViewsconciliations['CasetasView']['float_data']);?></dd>
                                                    </dl></div>
                                                </td>
                                            </tr>
                                            </table>
                                            </div>
                                                <div class="panel-body portlet-content">
                                                        <dl class="dl-horizontal">
<!--                                                            <dt><?php __('Cruce de la Unidad'); ?></dt>
                                                            <dd>
                                                                <?php e($CasetasViewsconciliations['CasetasView']['unit']);?>
                                                                &nbsp;
                                                            </dd>-->
                                                            <dt><?php __('Tarjeta Iave'); ?></dt>
                                                            <dd>
                                                                <?php e($CasetasViewsconciliations['CasetasView']['alpha_num_code']);?>
                                                                &nbsp;
                                                            </dd>
                                                            <dt><?php __('Carril'); ?></dt>
                                                            <dd>
                                                                <?php e($CasetasViewsconciliations['CasetasView']['alpha_location']);?>
                                                                &nbsp;
                                                            </dd>
    <!--                                                        <dt><?php __('Lugar'); ?></dt>
                                                            <dd>
                                                                <?php e($CasetasViewsconciliations['CasetasView']['alpha_location']);?>
                                                                &nbsp;
                                                            </dd>-->
                                                            <dt><?php __('Fecha del Cruce'); ?></dt>
                                                            <dd>
                                                                <?php e($CasetasViewsconciliations['CasetasView']['fecha_cruce']);?>
                                                                &nbsp;
                                                            </dd>
                                                            <dt><?php __('Hora'); ?></dt>
                                                            <dd>
                                                                <?php e($CasetasViewsconciliations['CasetasView']['hora_cruce']);?>
                                                                &nbsp;
<!--                                                            <dt><?php __('Monto'); ?></dt>
                                                            <dd>
                                                                <?php e('$ '.$CasetasViewsconciliations['CasetasView']['float_data']);?>
                                                                &nbsp;
                                                            </dd>-->
                                                        </dl>
                                                </div>
                                        </div>

                                    </li>
                                </ol>
                            </div>
<!--                          </td> -->
<!--                      </tr> -->
                    <?php ++$counter;} ?>
                </div> <!--end column-->
                </div>

			</td>
		</tr>
	</table>



		</div> <!--container-->

<style>

.dragged {
  position: absolute;
  opacity: 0.5;
  z-index: 2000;
}

</style>

                <?php //echo $this->Form->end(__('Submit', true));?>

    <script>
        $(document).ready(function () {
          // table headers
          $(function () {
              $("table").stickyTableHeaders({fixedOffset: 22,marginTop: 22});
          });

                    var oldContainer;
                    var group = $("ol.limited_drop_targets").sortable({
                        group: 'limited_drop_targets',
                        isValidTarget: function  ($item, container) {
                            if ($item.is(".highlight")) {
                                return true;
                            }
                            else{
                                return $item.parent("ol")[0] == container.el[0];
                            }
                        },

                        onDrop: function ($item, container, _super) {
                            var $clonedItem = $('<li/>').css({height: 0});
                                $item.before($clonedItem);
                                $clonedItem.animate({'height': $item.height()});
                                $item.animate($clonedItem.position(), function  () {
                                $clonedItem.detach();
                                _super($item, container);
                            });
                        },
                        serialize: function (parent, children, isContainer) {
                            return isContainer ? children.join() : parent.text();
                        },
                        tolerance: 6,
                        distance: 10
                    });

                    var nodes_iave;
                    var data_arr;
                    $('#lata').on('click', function (e){
                        e.preventDefault(); //
                        nodes_iave = $("div[id^='get_lis_']");
                        console.log(nodes_iave);
                        $(nodes_iave).each(function() {
                            node = document.getElementById(this.id);
                                childnode = node.childNodes[1].childNodes;
                                console.log(childnode);
                                next=0
                                $(childnode).each(function() {
                                    if(node.childNodes[1].childNodes[next].nodeType !== 3) {
                                        if (typeof(node.childNodes[1].childNodes[next].getAttribute('data-id')) == "string") {
                                            data_arr += ' ' + JSON.stringify (node.childNodes[1].childNodes[next].getAttribute('data-id')) + ' ' ;
                                        }if(typeof(node.childNodes[1].childNodes[next].getAttribute('data-name')) == "string") {
                                            data_arr += ' ' + JSON.stringify (node.childNodes[1].childNodes[next].getAttribute('data-name')) + ' ' ;
                                        }
                                    }
                                    ++next;
                                });
                                data_arr +=  ' :';
                        });
                        console.log(data_arr);
                        var isUpdate = "<?php echo Dispatcher::baseUrl();?>/CasetasViews/save/casetas_controls_files_id:<?php e($casetas_controls_files_id)?>/casetas_historical_conciliations_id:<?php e($casetas_historical_conciliations_id)?>";
                        var redirection = "<?php echo Dispatcher::baseUrl();?>/Casetas/index/<?php e($casetas_controls_files_id)?>";
    //         // 			console.log(isUpdate);
                        $.ajax({
                            url: isUpdate,
                            type: 'post',
                            dataType: 'json',
                            data: data_arr,
                            beforeSend: function(){
                                        console.log( 'beforeSend' );
                                        $.fancybox.showLoading();
                                        $.fancybox.helpers.overlay.open({parent: $('body'), closeClick : false});
                                    },
                            complete: function(){
                                        console.log( 'complete');
                                        $.fancybox.hideLoading();
                                        $.fancybox.helpers.overlay.close();
                                        window.location.href = redirection;
                                    } //,
//                             success: function(data) {
//                                     console.log(
//                                                 '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>Enter a valid email address</div>'
//                                                 );
// //                                         $.fancybox.hideLoading();
// //                                         $.fancybox.helpers.overlay.close();
// //                                         window.location.href = redirection;
//                                     }
                            }).always(function() {
                                                $("#updateMessage").hide().fadeIn(1000);
                                                $("#updateMessage").show().fadeIn(1000);
                        });
                    });


                    /*NOTE Portlet Section*/
                    $( function() {
                        $( ".column" ).sortable({
                        connectWith: ".column",
                        handle: ".portlet-header",
                        cancel: ".portlet-toggle",
                        placeholder: "portlet-placeholder ui-corner-all"
                        });

                        $( ".portlet" )
                        .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
                        .find( ".portlet-header" )
                            .addClass( "ui-widget-header ui-corner-all" )
                    //         .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
                            .prepend( "<span class='ui-icon ui-icon-plusthick portlet-toggle'></span>");

                        $( ".portlet-toggle" ).on( "click", function() {
                        var icon = $( this );
                    //       icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
                        icon.toggleClass( "ui-icon-plusthick ui-icon-minusthick" );
                        icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
                        });
                    } );

    }); //End document

    </script>

    <script>

            function walkTheDOM(node, func) {
                func(node);
//                 console.log(node.firstChild);
                node = node.firstChild;
                while (node) {
                    walkTheDOM(node, func);
                    node = node.nextSibling;
                }
            }

            function textNodeValuesToArray(node) {
//                 console.log(typeof(node));
                if (typeof node === "string") {
                    node = document.getElementById(node);
                    console.log(node);
                }

                var arrayOfText = [];

                function pushText(currentNode) {

                console.log(currentNode.nodeValue);

                    if (currentNode.nodeType === 3) {
                        arrayOfText.push(currentNode.nodeValue);
                    }
                }
                walkTheDOM(node, pushText);
                return arrayOfText;
            }
    // console.log(textNodeValuesToArray("get_iave_01"));
            function iterate(obj) {
                for (var property in obj) {
                    if (obj.hasOwnProperty(property)) {
                        if (typeof obj[property] == "object")
                            iterate(obj[property]);
                        else
                            console.log(property + "   " + obj[property]);
                    }
                }
            }
    </script>
