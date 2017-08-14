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
		* @restrictive-license http://baizabal.xyz/licensing
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
			
			.search_box{
				padding:15px;
				display:inline;
				width:25%;
			}
		</style>
	

    <div class="container-fluid">
	<span><?php echo $this->element('casetas/help_manual');?></span>
      <div class="row">
        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
<!-- 			<li class="list-group-item"> -->
				<?php //echo $this->Html->link(__('New Casetas View Resume', true), array('action' => 'add')); ?>			
<!-- 			</li> -->

			<li >
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filtro ...">
			</li>
          </ul>
        </div>
		
		<span alt="Regresar" title="Regresar" onclick="goBack()">
			<i class="fa fa-chevron-circle-left fa-4x go_back searchlink" aria-hidden="true"></i>
		</span>

        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
        <span class="search_box pull-right"><?php echo $this->element('casetas/search_conciliations');?></span>
          <h1 class="page-header"><?php __('Concilicaci&oacute;n de Casetas');?></h1>
          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('ID &nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','id',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Monto Conciliado&nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','monto_conciliado',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Cruces Conciliados&nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','cruces_conciliados',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Monto Archivo&nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','_montos',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Cruces Archivo&nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','cruces',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Porcentaje Monto&nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','percent_montos',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Porcentaje Cruces&nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','percent_cruces',array('escape' => false));?></th>
<!-- 						<th><?php echo $this->Paginator->sort('counter');?></th> -->
						<th><?php echo $this->Paginator->sort('Archivo&nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','_filename',array('escape' => false));?></th>
						<th><?php echo $this->Paginator->sort('Area&nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','_area',array('escape' => false));?></th>
<!-- 						<th><?php echo $this->Paginator->sort('casetas_units_id');?></th> -->
<!-- 						<th><?php echo $this->Paginator->sort('casetas_event_name');?></th> -->
<!-- 						<th><?php echo $this->Paginator->sort('casetas_parents_name');?></th> -->
<!-- 						<th><?php echo $this->Paginator->sort('casetas_standings_name');?></th> -->
						<th><?php echo $this->Paginator->sort('Historicos&nbsp;<i class="fa fa-sort" aria-hidden="true"></i>','historical_id',array('escape' => false));?></th>
<!-- 						<th><?php echo $this->Paginator->sort('_ctime');?></th> -->
<!-- 						<th><?php echo $this->Paginator->sort('fileStatId');?></th> -->
						<th class="actions" <?php (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') ? e(' colspan="2" '): e('') ; ?>><?php __('Actions');?></th>
<!-- 						<th class="actions" colspan="3"><?php __('Ir a la Conciliacion');?></th> -->

					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($casetasViewResumes as $casetasViewResume):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $casetasViewResume['CasetasViewResume']['id']; ?>&nbsp;</td>
					<td><?php echo '$ '.number_format(sprintf("%01.2f",$casetasViewResume['CasetasViewResume']['monto_conciliado']), 2, '.', ','); ?>&nbsp;</td>
					<td><?php echo $casetasViewResume['CasetasViewResume']['cruces_conciliados']; ?>&nbsp;</td>
					<td><?php echo '$ '.number_format(sprintf("%01.2f",$casetasViewResume['CasetasViewResume']['_montos']), 2, '.', ',') ; ?>&nbsp;</td>
					<td><?php echo number_format($casetasViewResume['CasetasViewResume']['cruces'], 0, '.', ','); ?>&nbsp;</td>
					<td><?php echo round($casetasViewResume['CasetasViewResume']['percent_montos'],2).' %'; ?>&nbsp;</td>
					<td><?php echo round($casetasViewResume['CasetasViewResume']['percent_cruces'],2).' %'; ?>&nbsp;</td>
<!-- 					<td><?php echo $casetasViewResume['CasetasViewResume']['counter']; ?>&nbsp;</td> -->
					<td><?php echo $casetasViewResume['CasetasViewResume']['_filename']; ?>&nbsp;</td>
					<td><?php echo $casetasViewResume['CasetasViewResume']['_area']; ?>&nbsp;</td>
<!-- 					<td><?php echo $casetasViewResume['CasetasViewResume']['casetas_units_id']; ?>&nbsp;</td> -->
<!-- 					<td><?php echo $casetasViewResume['CasetasViewResume']['casetas_event_name']; ?>&nbsp;</td> -->
<!-- 					<td><?php echo $casetasViewResume['CasetasViewResume']['casetas_parents_name']; ?>&nbsp;</td> -->
<!-- 					<td><?php echo $casetasViewResume['CasetasViewResume']['casetas_standings_name']; ?>&nbsp;</td> -->
					<td><?php echo number_format($casetasViewResume['CasetasViewResume']['historical_id'],0,'.',','); ?>&nbsp;</td>
<!-- 					<td><?php echo $casetasViewResume['CasetasViewResume']['_ctime']; ?>&nbsp;</td> -->
<!-- 					<td><?php echo $casetasViewResume['CasetasViewResume']['fileStatId']; ?>&nbsp;</td> -->
					<td class="actions">
						<?php echo $this->Html->link(__('Ver Conciliación', true), array('controller'=>'Casetas','action' => 'index', $casetasViewResume['CasetasViewResume']['id'])); ?>
					</td>
					<?php if (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') { ?>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $casetasViewResume['CasetasViewResume']['id'])); ?>
					</td>
					<?php } else {  null; } ?>
<!-- 					<td class="actions"> -->
						<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $casetasViewResume['CasetasViewResume']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasViewResume['CasetasViewResume']['id'])); ?>
<!-- 					</td> -->
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
	</script>


