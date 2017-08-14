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
		* @mail	         baizabal.jesus@gmail.com
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
			
		</style>
	
<?php /*
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
 
        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->
    */
?>
    
<?php /***********************************************************************************************************************************************************/ ?>
<h3 class="page-header"><?php __('Providers Imported Files Controls');?></h3>

<div class="container-fluid">

    <span><?php echo $this->element('casetas/help_manual');?></span>

	<?php 	echo $this->Session->flash();?>

	<div id="dashboard_links" class="col-xs-6 col-sm-2 pull-right">
			<ul id="tabbed" class="nav nav-pills nav-stacked">
				<li role="presentation" class="active">
					<a href="#stats_secure_app" id="stats_secure_app_tab" data-toggle="tab">
						<i class="fa fa-home"></i>&nbsp;&nbsp;Inicio
					</a>
				</li>

				<li role="presentation">
					<a href="#file" id="file-tab" data-toggle="tab">
						<i class="fa fa-plus"></i>&nbsp;&nbsp;Add File
					</a>
				</li>

				<li role="presentation">
					<a href="#perfil" id="perfil-tab" data-toggle="tab">
						<i class="fa fa-cubes"></i>&nbsp;&nbsp;Configuraci&oacute;n
					</a>
				</li>
				
				<li><span><?php //echo $this->element('casetas/search_conciliations');?></span></li>
			</ul>
	</div>
	
		<div class="col-xs-6 col-sm-10">
			<div id="tabbedContent" class='tab-content'>
			
			
				<div class="tab-pane fade in active resume_print" id="stats_secure_app">

					<div id="app">
                                    <ul class="list-group list-inline">
                                        <li>
                                            <input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
                                        </li>
                                    </ul>
						<table class="table " width="100%">
                            <tr>
                                <td>
                                <div>
                                    <div class="table-responsive">
                                        <span class="filter-container">
                                            <table class="order-table table table-bordered table-hover table-striped responstable">
                                            <thead>
                                                <tr>
                                                                                <th><?php echo $this->Paginator->sort('id');?></th>
                                                                                <th><?php echo $this->Paginator->sort('user_id');?></th>
                                                                                <th><?php echo $this->Paginator->sort('providers_file_name');?></th>
                                                                                <th><?php echo $this->Paginator->sort('providers_file_name_desc');?></th>
                                                                                <th><?php echo $this->Paginator->sort('providers_md5sum_check');?></th>
                                                                                <th><?php echo $this->Paginator->sort('created');?></th>
<!--                                                                                 <th><?php echo $this->Paginator->sort('modified');?></th> -->
<!--                                                                                 <th><?php echo $this->Paginator->sort('providers_standings_id');?></th> -->
<!--                                                                                 <th><?php echo $this->Paginator->sort('providers_parents_id');?></th> -->
<!--                                                                                 <th><?php echo $this->Paginator->sort('_status');?></th> -->
                                                                                <th class="actions" colspan="3"><?php __('Actions');?></th>
                                                        
                                                </tr>
                                            </thead>
                                            <?php
                                            $i = 0;
                                            foreach ($providersImportedFilesControls as $providersImportedFilesControl):
                                                $class = null;
                                                if ($i++ % 2 == 0) {
                                                    $class = ' class="altrow"';
                                                }
                                            ?>
                                </td></tr>
                                <tr<?php echo $class;?>>
                                    <td><?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['id']; ?>&nbsp;</td>
                                    <td>
                                        <?php echo $this->Html->link($providersImportedFilesControl['User']['name'], array('controller' => 'users', 'action' => 'view', $providersImportedFilesControl['User']['id'])); ?>
                                    </td>
                                    <td><?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['providers_file_name']; ?>&nbsp;</td>
                                    <td><?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['providers_file_name_desc']; ?>&nbsp;</td>
                                    <td><?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['providers_md5sum_check']; ?>&nbsp;</td>
                                    <td><?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['created']; ?>&nbsp;</td>
<!--                                     <td><?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['modified']; ?>&nbsp;</td> -->
<!--                                     <td><?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['providers_standings_id']; ?>&nbsp;</td> -->
<!--                                     <td><?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['providers_parents_id']; ?>&nbsp;</td> -->
<!--                                     <td><?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['_status']; ?>&nbsp;</td> -->
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View', true), array('action' => 'view', $providersImportedFilesControl['ProvidersImportedFilesControl']['id'].'/page:1/sort:id/direction:asc')); ?>
                                    </td>
                                    <!--<td class="actions">
                                        <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $providersImportedFilesControl['ProvidersImportedFilesControl']['id'])); ?>
                                    </td>-->
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $providersImportedFilesControl['ProvidersImportedFilesControl']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $providersImportedFilesControl['ProvidersImportedFilesControl']['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                            </table>
                                        </span> <!--class="filter-container"-->
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
                                                ?>
                                                <?php 
                                                    echo $this->Paginator->numbers(array('separator' => null,'tag'=>'li'));
                                                ?>
                                                <?php 
                                                    echo $this->Paginator->next( '»' , array('tag'=>'li'), null, array('aria-hidden'=>'true','class' => 'disabled','tag'=>'li'));
                                                ?>
                                            </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
					</div>
				
				</div>

				<div  class="tab-pane fade in" id="perfil">
<!-- 				TABS -->
				<div id="start_tabs_nav">

				<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-justified" role="tablist">
						<li role="presentation" class="active modded-link">
							<a href="#loadSecureTopics" aria-controls="loadSecureTopics" role="tab" data-toggle="tab" class="modded-link">Summary</a>
						</li>

						<li role="presentation">
							<a href="#loadSecureTopicsTypes" aria-controls="loadSecureTopicsTypes" role="tab" data-toggle="tab" class="modded-link">Monitor</a>
						</li>

					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="loadSecureTopics">
							
							<br/>
							
							<div class="panel panel-default">
							<!-- Default panel contents -->
								<div class="panel-heading">General Summary</div>
								
<!-- 								<div class="panel-body"> -->
<!-- 									<p>Stats</p> -->
<!-- 								</div> -->

							<!-- Table -->
								<table class="table " width="100%">
									<tr>
										<td width="50%">
											<div id="container_charts" >
												
											</div>
										</td>
										<td width="50%">
											<div id="container_charting" ><p>...</p></div>
										</td>
									</tr>
									<tr>
										<td width="50%">
											<div id="container_courses_stats" ><p>...</p></div>
										</td>
										<td width="50%">
											<div id="container_courses_acomplished" ><p>...</p></div>
										</td>
									</tr>
								</table>
								
							</div>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="loadSecureTopicsTypes">
							<br/>
							
							<div class="panel panel-default">
							<!-- Default panel contents -->
								<div class="panel-heading">Status Monitor </div>
								
<!-- 								<div class="panel-body"> -->
<!-- 									<p>Stats</p> -->
<!-- 								</div> -->

							<!-- Table -->
								<table class="table " width="100%">
									<tr>
										<td width="50%">
											<div id="mon_consultas" >
												
											</div>
										</td>
										<td width="50%">
											<div id="container_charting" ></div>
										</td>
									</tr>
									<tr>
										<td width="50%">
											<div id="container_courses_stats" ></div>
										</td>
										<td width="50%">
											<div id="container_courses_acomplished" ></div>
										</td>
									</tr>
								</table>
								
							</div>
						</div>
					</div> <!--ends tab content-->

				</div> <!--ends_tabs_nav-->
	<!-- 			TABS -->
				</div> <!--end perfil-->


                <div class="tab-pane fade in resume_print" id="file">

                    <div id="viewForm">
                            <span>
                                <h2><?php __('Add Providers Imported Files Control'); ?></h2>
                            </span>

                            <?php echo $this->Form->create('ProvidersImportedFilesControl',array('enctype' => 'multipart/form-data','class'=>'form'));?>

                            <div class="providersImportedFilesControls form">
                            <?php
//                                         echo $this->Form->input('user_id',array('placeholder'=>'user_id','class'=>'input'));
//                                         echo $this->Form->input('providers_file_name',array('placeholder'=>'providers_file_name','class'=>'input'));
//                                         echo $this->Form->input('providers_file_name_desc',array('placeholder'=>'providers_file_name_desc','class'=>'input'));
//                                         echo $this->Form->input('providers_md5sum_check',array('placeholder'=>'providers_md5sum_check','class'=>'input'));
//                                         echo $this->Form->input('_status',array('placeholder'=>'_status','class'=>'input'));
                            ?>
                            <?php 	
                                        e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
                                            echo $this->Form->file('ProvidersImportedFilesControl.upload', array('type'=>'file','label'=>false));
                                        e('</span>');
                            ?>


                            <?php 
//                                 echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'1'));
                            ?>
                                <div class="form-group pull-right">
                                    <?php 
                                     echo $this->Form->end( array('div'=>false,'class'=>'btn btn-success'));
                                    ?>
                                </div>
                            </div>

                    </div> <!--end viewForm-->
                </div> <!--end tab file-->

			</div>
		</div>
		
	<!-- Optional: clear the XS cols if their content doesn't match in height -->
	<div class="clearfix visible-xs-block">div</div>
	
	<!--   <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div> -->
	</div> <!--container-fluid-->
<!--End Container-->
   
    
    
    
    
    
    
    
    
    
    
    
    
    <script>
	$(document).ready(function () {
		$(function () {
			$("table").stickyTableHeaders({fixedOffset: 22,marginTop: 22});
		});
		/*! Copyright (c) 2011 by Jonas Mosbech - https://github.com/jmosbech/StickyTableHeaders
			MIT license info: https://github.com/jmosbech/StickyTableHeaders/blob/master/license.txt */
	});
    </script>
