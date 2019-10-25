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
		* @package       PerformanceReferences
		* @subpackage    Get
		* @since         CakePHP(tm) v 1.2.0.5234
		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
		*/
?>
		<?php
		    // NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
		    // $evaluate = false;
		    // $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
		    // blog
		    $evaluate = true;
		    // $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
				// $requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
				$requiere = $evaluate ? e($this->element('kml/rentabilidad/rentabilidad')) : e($this->element('requiere/norequiere') );
				// var_dump($rendViewFullGstCoreIndicators);exit();

		?>

				<!-- temporal style  -->

				<style media="screen">

				.ninja-scroll {
					scroll-behavior: smooth;
					overflow-x: auto;
					/*overflow-y: auto;*/
				}
				.avg {
					font-style: italic;
					text-decoration: overline;
				}

				select::-ms-expand {
					display: none;
				}

				.detail_header {
					display: none;
				}

				.head_datetime{
					display: none;
				}

				.container-mod{
					position: relative;
					width: 100%;
					max-width: 95%;
					margin: 0 auto;
					padding: 0 20px;
					box-sizing: border-box;
				}

				.colorbax {
					position: relative;
					width: 100%;
					min-width: 95%;
					margin: 0 auto;
					padding: 0 20px;
					box-sizing: border-box;
				}

				.current {
					display: inline-block;  /* For IE11/ MS Edge bug */
					pointer-events: none;
					cursor: default;
					color:gray !important;
					text-decoration: none;
				}

				.current > a {
				  color: gray !important;
				  display: inline-block;  /* For IE11/ MS Edge bug */
				  pointer-events: none;
				  text-decoration: none;
				}

				/**PAGINATOR STYLE*/
				.easyPaginateNav{
					position: fixed;
					bottom: 1%;
					left: 35%;
					cursor: pointer;
					z-index:150;
				}

				.icon{
				  transition:all 0.5s;
				  opacity:0;
				}

				.link_external:hover .icon{
				  opacity:1;
				}


				</style>


				<div class="container-mod">

							<div class="row">
									<div class="twelve columns ">
										<h6 class="docs-header">Users</h6>
								</div>
							</div>

				</div>


<?php //users?>

<div id="breakspace" class="">
	&nbsp;
</div>

				<div id="printThis" class="container-mod ninja-scroll">

<div id="first-datatable-output" class="table-responsive">

            <table id="mgmt_users" class="table table-striped table-bordered" >
              <thead>
                <tr>
										<th>id</th>
										<th>Username</th>
										<th>Password</th>
										<th>group_id</th>
										<th>created</th>
										<th>company_id</th>
					<!-- 					<th>modified</th> -->
					<!-- 					<th>status</th> -->
					<!-- 					<th>current_date_time</th> -->
										<?php if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>
											<th>last_access</th>
											<th>last_ip</th>
											<th>last_user_agent</th>
										<?php }?>

										<!-- <th class="actions" colspan="3">Actions</th> -->
										<th class="actions" >Ver</th>
										<th class="actions" >Editar</th>
										<th class="actions" >Eliminar</th>
                </tr>
              </thead>

              <tbody>
						<?php
							foreach ($users as $key => $user){
						?>
							<tr>
									<td><?php echo $user['User']['id']; ?></td>
									<td><?php echo $user['User']['username']; ?></td>
									<td><?php //echo $user['User']['password']; ?></td>
									<td>
										<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
									</td>
									<td>
										<?php echo $user['User']['created']; ?>
									</td>

									<td>
										<?php
													isset($company[$user['User']['company_id']])?print($company[$user['User']['company_id']]):print($user['User']['company_id']);
											?>
									</td>

									<?php if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {?>
									<td>
										<?php
											echo $user['User']['last_access'];
										?>
									</td>
									<td>
										<?php
											if (empty($user['User']['last_ip']) or !isset($user['User']['last_ip'])) {
												echo '';
											} else {
												echo $user['User']['last_ip'];
											}
										?>
									</td>
									<td>
										<?php
										$htmlRender = checkBrowser($user['User']['last_user_agent'],true,true);
										if ($htmlRender !== false) {
											$motor = array_search($htmlRender,$htmlMotor);
											if ($motor) {

												echo "<kbd><i class=\"$motor\"></i></kbd>{$htmlRender}";
											} else {
												echo "<i class=\"fa fa-cloud\"></i>{$htmlRender}";
											}
										}
										?>

									</td>

						<?php }?>

						<td class="actions">
							<?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
						</td>

					</tr>
				<?php } ?>
              </tbody>
    </table>

    </div> <!--container fluid-->
	</div>
		<div id="breakspace" class="">
			&nbsp;
		</div>

		<script type="text/javascript">

		$(document).ready( function() {


			console.log($('#mgmt_users'));

		    $('#mgmt_users').DataTable(
						Object.assign( {}, options_datatable, calculate_row([],[]) )
				);
		});

    </script>
