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

		</style>


    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
          <ul class="list-group list-inline">
			<li class="list-group-item">
				<?php echo $this->Html->link(__('New Reporter Views Main Subreports Account', true), array('action' => 'add')); ?>			</li>
							<li>
				<input type="search" class="light-table-filter form-control " data-table="order-table" placeholder="Filter">
			</li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header"><?php __('Reporter Views Main Subreports Accounts');?></h1>

					<div class="add_record">
							<div class="named">
									<h4>How you want named your view Report</h4>
							</div>
							<?php echo $this->Form->create('ReporterViewsMainReport',array('enctype' => 'multipart/form-data','class'=>'form-inline'));?>
							<?php
								echo $this->Form->input('page',array('type'=>'hidden','placeholder'=>'Key','class'=>'input inline','value'=>$page));
								echo $this->Form->input('_key',array('placeholder'=>'Key','class'=>'input inline'));
								echo $this->Form->input('_description',array('placeholder'=>'Descriptions','class'=>'input inline'));
								echo $this->Form->input('RowDetailID',array('type'=>'hidden','value'=>$rowDetailID));
							?>
							<span><?php echo $this->Form->button('Build', array('class'=>'btn btn-success pull-right'));?></span>
					</div>

          <div class="table-responsive">
			<span class="filter-container">
				<table class="order-table table table-bordered table-hover table-striped responstable">
				<thead>
					<tr>
													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('RowDetailID');?></th>
													<th><?php echo $this->Paginator->sort('RowLinkID');?></th>
													<th><?php echo $this->Paginator->sort('DisplayOrder');?></th>
													<th><?php echo $this->Paginator->sort('rangeaccounta');?></th>
													<th><?php echo $this->Paginator->sort('rangeaccountb');?></th>
													<th><?php echo $this->Paginator->sort('segmenta');?></th>
													<th><?php echo $this->Paginator->sort('segmentb');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>

					</tr>
				</thead>
				<?php
				$i = 0;
				foreach ($reporterViewsMainSubreportsAccounts as $reporterViewsMainSubreportsAccount):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
	<tr<?php echo $class;?>>
		<td><?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['id']; ?>&nbsp;</td>
		<td><?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['RowDetailID']; ?>&nbsp;</td>
		<td><?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['RowLinkID']; ?>&nbsp;</td>
		<td><?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['DisplayOrder']; ?>&nbsp;</td>
		<td><?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['rangeaccounta']; ?>&nbsp;</td>
		<td><?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['rangeaccountb']; ?>&nbsp;</td>
		<td><?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['segmenta']; ?>&nbsp;</td>
		<td><?php echo $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['segmentb']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reporterViewsMainSubreportsAccount['ReporterViewsMainSubreportsAccount']['id'])); ?>
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



          </div>
        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->

    <script>
	$(document).ready(function () {
		$(function () {
			$("table").stickyTableHeaders({fixedOffset: 22,marginTop: 22});
		});
		/*! Copyright (c) 2011 by Jonas Mosbech - https://github.com/jmosbech/StickyTableHeaders
			MIT license info: https://github.com/jmosbech/StickyTableHeaders/blob/master/license.txt */

	});
    </script>
