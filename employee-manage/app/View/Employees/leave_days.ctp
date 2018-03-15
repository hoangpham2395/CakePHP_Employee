<?php echo $this->element('main-top'); ?>
<div class="main-content">
	<?php echo $this->element('sidebar'); ?>

	<div class="main-content-body">
		<ol class="breadcrumb" style="background:#fff;">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
		  	<li class="breadcrumb-item"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Leave days manage</a></li>
		  	<li class="breadcrumb-item active" style="color:#FF0000;">Manage</li>
		</ol>
		<!--Thông báo-->


		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Leave days manage</span>
			</div>
			<div class="panel-body">
				<form action method="post" enctype="multipart/form-data">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%;">
							<thead>
								<th class="text-center"><?php echo $this->Paginator->sort('No.');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Fullname');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Date start work');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Leave days have');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Leave days took');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Leave days rest');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Note');?></th>
							</thead>
							<tbody>
								<?php $i = 1; foreach ($leavedays as $leaveday):?>
								<tr>
									<td style="text-align:center;"><?php echo $i; $i++?></td>
									<td><?php echo $leaveday['Employee']['fullname'];?></td>
									<td style="text-align:center;"><?php echo $leaveday['Employee']['join_datetime'];?></td>

									<td>
										<center>
										<a class="active"data-toggle="modal" data-target="#modalHave-<?php echo $leaveday['Employee']['id'];?>">
											<?php echo $leaveday['Employee']['leave_days_have'];?>
										</a>
										</center>
									  	<!-- Modal leave days have-->
									 	<div class="modal fade" id="modalHave-<?php echo $leaveday['Employee']['id'];?>" role="dialog">
									    	<div class="modal-dialog">
									      		<!-- Modal content-->
										      	<div class="modal-content">
										      		<?php echo $this->Form->create('Employee', array('url' => array('controller' => 'employees', 'action' => 'leave_days')));?> 
											        	<div class="modal-header" style="background-color:#337ab7; color:#fff;">
											          		<button type="button" class="close" data-dismiss="modal">&times;</button>
											          		<h4 class="modal-title">Change leave days have</h4>
											        	</div>
											        	<div class="modal-body">	
											         		<p>Leave days have:</p>
											         		<div class="input-group">
												         		<div class="input-group">
																	<span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
																	<input type="text" class="form-control" name="leave_days_have">
																	<input type="hidden" name="id" value="<?php echo $leaveday['Employee']['id'];?>">
																</div>
											         		</div>
											        	</div>
											        	<div class="modal-footer">
											          		<button type="button" class="btn btn-danger" data-dismiss="modal">Canel</button>
											          		<input type="submit" class="btn btn-primary" name="change_have" value="Change">
											        	</div>
										        	<?php echo $this->Form->end();?>
										      	</div>
									    	</div>
									 	</div>									
									</td>

									<td>
										<center>
										<a class="active"data-toggle="modal" data-target="#modalTook-<?php echo $leaveday['Employee']['id'];?>">
											<?php echo $leaveday['Employee']['leave_days_took'];?>
										</a>
										</center>
									  	<!-- Modal -->
									 	<div class="modal fade" id="modalTook-<?php echo $leaveday['Employee']['id'];?>" role="dialog">
									    	<div class="modal-dialog">
									      		<!-- Modal content-->
										      	<div class="modal-content">
										      		<?php echo $this->Form->create('Employee', array('url' => array('controller' => 'employees', 'action' => 'leave_days')));?> 
											        	<div class="modal-header" style="background-color:#337ab7; color:#fff;">
											          		<button type="button" class="close" data-dismiss="modal">&times;</button>
											          		<h4 class="modal-title">Change leave days took</h4>
											        	</div>
											        	<div class="modal-body">
											         		<p>Leave days took:</p>
											         		<div class="input-group col-lg-12">
																<span class="input-group-addon" id="basic-addon1">
																	<i class="fa fa-clock-o" aria-hidden="true"></i>
																</span>
																<input type="text" class="form-control" name="leave_days_took">
																<input type="hidden" name="id" value="<?php echo $leaveday['Employee']['id'];?>">
															</div>
											        	</div>
											        	<div class="modal-footer">
											        		
											          			<button type="button" class="btn btn-danger" data-dismiss="modal">Canel</button>
											          			<input type="submit" class="btn btn-primary" name="change_took" value="Change">
											          		
											        	</div>
										        	<?php echo $this->Form->end();?>
										      	</div>
									    	</div>
									 	</div>
									</td>

									<td style="text-align:center;">
										<?php 
											$leave_days_rest = $leaveday['Employee']['leave_days_have'] - $leaveday['Employee']['leave_days_took'];
											if ($leave_days_rest< 0) {
												echo '<span class="btn btn-danger">'.$leave_days_rest.'</span>';
											} else {
												echo '<span class="btn btn-primary">'.$leave_days_rest.'</span>';
											}
										?>
									</td>

									<td>
										<center>
										<a class="active"data-toggle="modal" data-target="#modalNote-<?php echo $leaveday['Employee']['id'];?>">
											<?php 
												if (!empty($leaveday['Employee']['leave_days_note'])) {
													echo $leaveday['Employee']['leave_days_note'];
												} else {
													echo '<i class="fa fa-plus" aria-hidden="true"></i> add note';
												}
											?>
										</a>
										</center>
									  	<!-- Modal -->
									 	<div class="modal fade" id="modalNote-<?php echo $leaveday['Employee']['id'];?>" role="dialog">
									    	<div class="modal-dialog">
									      		<!-- Modal content-->
										      	<div class="modal-content">
										      		<?php echo $this->Form->create('Employee', array('url' => array('controller' => 'employees', 'action' => 'leave_days')));?> 
											        	<div class="modal-header" style="background-color:#337ab7; color:#fff;">
											          		<button type="button" class="close" data-dismiss="modal">&times;</button>
											          		<h4 class="modal-title">Add note</h4>
											        	</div>
											        	<div class="modal-body">
											         		<p>Content:</p>
											         		<div class="input-group col-lg-12">
											         			<span class="input-group-addon">
											         				<i class="fa fa-edit" aria-hidden="true"></i>
											         			</span>
																<input type="text" class="form-control" name="note">
																<input type="hidden" name="id" value="<?php echo $leaveday['Employee']['id'];?>">
															</div>
											        	</div>
											        	<div class="modal-footer">
											          			<button type="button" class="btn btn-danger" data-dismiss="modal">Canel</button>
											          			<input type="submit" class="btn btn-primary" name="change_note" value="Change">
											        	</div>
										        	<?php echo $this->Form->end();?>
										      	</div>
									    	</div>
									 	</div>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

