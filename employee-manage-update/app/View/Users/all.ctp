<?php echo $this->element('main-top');?>
<div class="main-content">
	<?php echo $this->element('sidebar');?>
	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-calendar"></i> Leave days manage</a></li>
			<li class="breadcrumb-item active"><span style="color: red;">All manage</span></li>
		</ol>
		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Leave days manage</span>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead class="thead-inverse" style="color: white; background-color: #337ab7;">
							<th class="text-center">No.</th>
							<th class="text-center">Fullname</th>
							<th class="text-center">Date start work</th>
							<th class="text-center">Leave days have</th>
							<th class="text-center">Leave days took</th>
							<th class="text-center">Leave days rest</th>
							<th class="text-center">Note</th>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($users as $user) {
								$i++;
								?>
								<tr class="text-center" style="color: #337ab7;">
									<td><?php echo $i;?></td>
									<td>
										<a href='<?php echo $this->Html->url(array("controller" => "users", "action" => "view", $user["User"]["id"]));?>'>
											<?php echo $user['User']['fullname'];?>
										</a>
									</td>
									<td><?php echo $user['User']['join_datetime'];?></td>
									<td>
										<a href='#' data-toggle="modal" data-target='#LDHave-<?php echo $user["User"]["id"];?>'>
											<?php echo $user['User']['leave_days_have'];?>
										</a>

										<div id='LDHave-<?php echo $user["User"]["id"];?>' class="modal fade" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content text-left">
													<?php echo $this->Form->create(array('url' => array('controller' => 'users', 'action' => 'leaveDaysHave', $user["User"]['id'])));?>
	      											<div class="modal-header" style="background-color:#337ab7; color: #fff; border-radius:5px 5px 0 0;">
	        											<button type="button" class="close" data-dismiss="modal">&times;</button>
	        											<h4 class="modal-title"><?php echo $user['User']['fullname'];?></h4>
	      											</div>
	      											<div class="modal-body row">
	        											<div class="col-md-12">
	        												<span>Leave days have:</span>
	        												<div class="input-group">
	        													<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
	        													<input type="text" class="form-control" name="leave_days_have" value='<?php echo $user['User']['leave_days_have'];?>'>
	        												</div>
	        											</div>
	      											</div>
	      											<div class="modal-footer">
	        											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        											<button type="submit" class="btn btn-primary" name="leaveDaysHave">Save</button>
	      											</div>
	      											<?php echo $this->Form->end();?>
	    										</div>
	    									</div>
										</div>
									</td>
									<td>
										<a href='#' data-toggle="modal" data-target='#LDTook-<?php echo $user["User"]["id"];?>'>
											<?php echo $user['User']['leave_days_took'];?>
										</a>

										<div id='LDTook-<?php echo $user["User"]["id"];?>' class="modal fade" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content text-left">
													<?php echo $this->Form->create(array('url' => array('controller' => 'users', 'action' => 'leaveDaysTook', $user["User"]['id'])));?>
	      											<div class="modal-header" style="background-color:#337ab7; color: #fff; border-radius:5px 5px 0 0;">
	        											<button type="button" class="close" data-dismiss="modal">&times;</button>
	        											<h4 class="modal-title"><?php echo $user['User']['fullname'];?></h4>
	      											</div>
	      											<div class="modal-body row">
	        											<div class="col-md-12">
	        												<span>Leave days took:</span>
	        												<div class="input-group">
	        													<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
	        													<input type="text" class="form-control" name="leave_days_took" value='<?php echo $user['User']['leave_days_took'];?>'>
	        												</div>
	        											</div>
	      											</div>
	      											<div class="modal-footer">
	        											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        											<button type="submit" class="btn btn-primary">Save</button>
	      											</div>
	      											<?php echo $this->Form->end();?>
	    										</div>
	    									</div>
										</div>
									</td>
									<td>
										<?php
										$rest = $user['User']['leave_days_have'] - $user['User']['leave_days_took'];
										if ($rest < 0) {
											?>
											<button type="button" class="btn btn-danger"><?php echo $rest;?></button>
											<?php
										} else {
											?>
											<button type="button" class="btn btn-primary"><?php echo $rest;?></button>
											<?php
										}
										?>
									</td>
									<td>
										<a href='#' data-toggle="modal" data-target='#addNote-<?php echo $user["User"]["id"];?>'>
											<?php
											if (!empty($user['User']['leave_days_note'])) {
												echo $user['User']['leave_days_note'];
											} else {
												?>
												<i class="fa fa-plus"></i> add note
												<?php
											}
											?>
										</a>

										<div id='addNote-<?php echo $user["User"]["id"];?>' class="modal fade" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content text-left">
													<?php echo $this->Form->create(array('url' => array('controller' => 'users', 'action' => 'addNote', $user["User"]['id'])));?>
	      											<div class="modal-header" style="background-color:#337ab7; color: #fff; border-radius:5px 5px 0 0;">
	        											<button type="button" class="close" data-dismiss="modal">&times;</button>
	        											<h4 class="modal-title"><?php echo $user['User']['fullname'];?></h4>
	      											</div>
	      											<div class="modal-body row">
	        											<div class="col-md-12">
	        												<span>Content:</span>
	        												<div class="input-group">
	        													<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
	        													<input type="text" class="form-control" name="leave_days_note" value='<?php echo $user['User']['leave_days_note'];?>'>
	        												</div>
	        											</div>
	      											</div>
	      											<div class="modal-footer">
	        											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        											<button type="submit" class="btn btn-primary">Save</button>
	      											</div>
	      											<?php echo $this->Form->end();?>
	    										</div>
	    									</div>
										</div>
									</td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>

				<div class="col-lg-6" style="color: #337ab7; padding-top:30px;">
					<?php
						echo $this->Paginator->counter(array(
							'format' => __('Page {:page} / {:pages}, showing {:current} records of {:count} total.')
						));
					?>
				</div>
				<div class="col-lg-6">
					<ul class="pagination" style="float:right;">
						<?php
							echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
							echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
							echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>