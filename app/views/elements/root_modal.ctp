				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel"><?php e(languaje($languaje)['rootModalTitle']);?></h4>
						</div>
						<div class="modal-body">

							<div style="background:gray;">
								<?php e($test)?>
							</div>

							<?php e(languaje($languaje)['rootModalMessage']);?>
							<?php isset($rfc) ? e($rfc) : null ; ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal"><?php e(languaje($languaje)['rootModalButton']);?></button>
					<!--         <button type="button" class="btn btn-primary">Save changes</button> -->
						</div>
					</div>
				</div>
