<?php echo $this->element('main-top');?>
<div class="main-content">
	<?php echo $this->element('sidebar');?>
	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-calendar"></i> Leave days manage</a></li>
			<li class="breadcrumb-item active"><span style="color: red;">Monthly manage</span></li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Select month and year</span>
			</div>
			<div class="panel-body">
				<form action method="post" enctype="multipart/form-data">
					<div class="col-md-3">
						<label>Select year:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<select class="form-control" name="leaveday_year">
								<option value selected>--- Select year ---</option>
								<?php
								$y = array();
								for ($i = 2017; $i < 2023; $i++) {
									$y[$i] = ($i == $year) ? 'selected' : '';
									echo '<option value="'.$i.'" '.$y[$i].'>'.$i.'</option>';
								}
								?>
							</select>
						</div>
					</div>

					<div class="col-md-3">
						<label>Select month:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<select class="form-control" name="leaveday_month">
								<option value selected>--- Select month ---</option>
								<?php
								$months = array(
									1  => 'January',
									2  => 'February',
									3  => 'March',
									4  => 'April',
									5  => 'May',
									6  => 'June',
									7  => 'July',
									8  => 'August',
									9  => 'September',
									10 => 'October',
									11 => 'November',
									12 => 'December'
								);
								$m = array();
								foreach ($months as $mkey => $mvalue) {
									$m[$mkey] = ($mkey == $month) ? 'selected' : ''; 
									echo '<option value="'.$mkey.'" '.$m[$mkey].'>'.$mvalue.'</option>';
								}
								?>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<button type="submit" class="btn btn-danger" style="margin:25px 15px 0 0;" name="show_leaveday">
							Show
						</button>
						<button type="submit" class="btn btn-success" style="margin:25px 15px 0 0;" name="thismonth_leaveday">
							This month
						</button>
						<button type="submit" class="btn btn-primary" style="margin-top:25px;" name="reset_leaveday">
							Reset
						</button>
					</div>
				</form>
			</div>
		</div>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">List data</span>
			</div>
			<div class="panel-body">
				<button type="submit" class="btn btn-danger" name="add_leaveday" data-toggle="modal" data-target="#addLeaveday">Add leave day</button>

				<div class="modal fade" id="addLeaveday" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<?php echo $this->Form->create('Leaveday',array('url' => array('controller' => 'leavedays','action' => 'addLeaveDay')));?>
								<div class="modal-header" style="background-color: #337ab7; color: #fff; text-align: left;">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Add Leave Day</h4>
								</div>

								<div class="modal-body row">
									<div class="col-md-12"  style='margin-bottom:15px;'>
										<label>
											Employee: 
											<span style="color:red;">[<i class="fa fa-asterisk"></i>]</span>
										</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-user"></i>
											</span>
											<select class="form-control" name="user_id">
												<option value selected>--- Select employee ---</option>
												<?php 
												foreach ($users as $user) {
													?>
													<option value='<?php echo $user["User"]["id"];?>'><?php echo $user["User"]["fullname"];?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<label>
											Leave date:
											<span style="color:red;">[<i class="fa fa-asterisk"></i>]</span>
										</label>
										<div class="input-group date" data-provide="datepicker">
											<input type="text" class="form-control" name="leave_datetime">
											<div class="input-group-btn">
												<span class="btn btn-danger">
													<i class="fa fa-calendar"></i>
												</span>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<label>
											Day: 
											<span style="color:red;">
												[<i class="fa fa-asterisk"></i>] <= 1 day
											</span>
										</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</span>
											<input type="text" class="form-control" name="leave_hour">
										</div>
									</div>

									<div class="col-md-12">
										<label>Reason:</label>
										<textarea class="form-control" name="leave_reason"></textarea>
									</div>
									<input type="hidden" name="del_flag" value="0">
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Canel</button>
									<button type="submit" class="btn btn-danger" name="delete">OK</button>
								</div>
							<?php echo $this->Form->end();?>
						</div>
					</div>
				</div>

				<div class="table-responsive" style="margin-top:15px; font-size:12px;">
					<table class="table table-bordered table-striped">
						<thead class="thead-inverse" bgcolor="gray" style="color: white;">
							<th class="text-center">No.</th>
							<th class="text-center">Fullname</th>
							<?php
							// month, year lấy từ controller
							if ($month != 0 && $year != 0) {
								$day = date('d', mktime(0,0,0,$month + 1,0,$year)); // số ngày trong tháng
								for ($d = 1; $d <= $day; $d++) {
									$weekend = gregoriantojd($month, $d, $year); // lấy tên thứ trong tuần
									echo '<th class="text-center">'.JDDayOfWeek($weekend, 2).' ('.$d.'/'.$month.')</th>';
								}
							} else {
								$day = 0;
							}
							?>
						</thread>
						<tbody>
							<?php
							if (!empty($listUser)) {
								$n = 1;
								foreach ($listUser as $list) {
									?>
									<tr class="text-center">
										<td><?php echo $n; $n++;?></td>
										<td style="width:130px;"><?php echo $list['fullname'];?></td>
										<?php
										for ($d = 1; $d <= $day; $d++) {
											if (isset($list['date-'.$d])) {
												?>
												<td><a href='#' data-toggle="modal" data-target='#myModal-<?php echo $list['date-'.$d]['id'];?>'><?php echo $list['date-'.$d]['hour'];?></a></td>

												<div id="myModal-<?php echo $list['date-'.$d]['id'];?>" class="modal fade" tabindex="-1" role="dialog">
												  	<div class="modal-dialog" role="document">
												    	<div class="modal-content">
												    		<?php echo $this->Form->create('Leaveday',array('url' => array('controller' => 'leavedays', 'action' => 'editLeaveDay', $list['date-'.$d]['id'])));?>
													      		<div class="modal-header" style="background-color:#337ab7; color:#fff; border-radius:4px 4px 0 0;">
													        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													        		<h4 class="modal-title">Detail</h4>
													      		</div>
													      		<div class="modal-body row">
													        		<div class="col-md-12" style='margin-bottom:15px;'>
																		<label>
																			Employee: 
																			<span style="color:red;">[<i class="fa fa-asterisk"></i>]</span>
																		</label>
																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="fa fa-user"></i>
																			</span>
																			<select class="form-control" disabled="disabled" name="user_id">
																				<option value='<?php echo $list['userId'];?>' selected><?php echo $list['fullname'];?></option>
																			</select>
																		</div>
																	</div>

																	<div class="col-md-6">
																		<label>
																			Leave date:
																			<span style="color:red;">[<i class="fa fa-asterisk"></i>]</span>
																		</label>
																		<div class="input-group date" data-provide="datepicker">
																			<input type="text" class="form-control" disabled="disabled" name="leave_datetime" value='<?php echo $month.'/'.$d.'/'.$year;?>'>
																			<div class="input-group-btn">
																				<span class="btn btn-danger">
																					<i class="fa fa-calendar"></i>
																				</span>
																			</div>
																		</div>
																	</div>

																	<div class="col-md-6">
																		<label>
																			Day: 
																			<span style="color:red;">
																				[<i class="fa fa-asterisk"></i>] <= 1 day
																			</span>
																		</label>
																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="fa fa-clock-o"></i>
																			</span>
																			<input type="text" class="form-control" id="disabledTextInput" name="leave_hour" value='<?php echo $list['date-'.$d]['hour'];?>'>
																		</div>
																	</div>	

																	<div class="col-md-12">
																		<label>Reason:</label>
																		<textarea class="form-control" name="leave_reason"><?php echo $list['date-'.$d]['reason'];?></textarea>
																	</div>										        		
													      		</div>
													      		<div class="modal-footer">
													        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
													        		<button type="submit" class="btn btn-primary">Save</button>
													      		</div>
													      	<?php echo $this->Form->end();?>
												    	</div>
												  	</div>
												</div>
												<?php
											} else {
												echo '<td></td>';
											}
										}
										?>
									</tr>
									<?php
								}
							} else {
								?>
								<tr class="text-center">
									<td colspan='<?php echo $day + 2;?>'>
										Data not found!!!
									</td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
