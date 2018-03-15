<?php echo $this->element('main-top'); ?>
<div class="main-content">
	<?php echo $this->element('sidebar'); ?>

	<div class="main-content-body">
		<ol class="breadcrumb" style="background:#fff;">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
		  	<li class="breadcrumb-item"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Leave days manage</a></li>
		  	<li class="breadcrumb-item active" style="color:#FF0000;">Monthly manage</li>
		</ol>

		<form action method="post" enctype="multipart/form-data">
			<div class="panel-default">
				<div class="panel-heading">
					<span style="color: #337ab7;">Select month and year</span>
				</div>
				<div class="panel-body">
					<div class="col-lg-3 form-group">
						<label>Year:</label>
						<div class="input-group">
							<?php
								
							?>
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
							<select class="form-control" name="leave_year">
								<option value <?php echo (empty($leave['year'])) ? 'selected = "selected"' : '';?>>
									--- Select year ---
								</option>
								<?php 
								if (isset($leave) !=null ) {
									$lea_year = $leave['year'];
								} else {
									$lea_year = date('Y');
								}
								for ($y = 2016; $y <= 2021; $y++) {
									$year = ($lea_year == $y) ? 'selected = "selected"' : '';
									echo '<option value="'.$y.'" '.$year.'>'.$y.'</option>';
								}
								?>
							</select>
						</div>
					</div>

					<div class="col-lg-3 form-group">
						<label>Month:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
							<select class="form-control" name="leave_month">
								<option value <?php echo (empty($leave['month'])) ? 'selected = "selected"' : '';?>>
									--- Select month ---
								</option>
								<?php 
									if (isset($leave) !=null ) {
										$lea_month = $leave['month'];
									} else {
										$lea_month = date('m');
									}
									foreach (Configure::read('config_month') as $mkey => $mvalue) {
										$month = ($lea_month == $mkey) ? 'selected = "selected"' : '';
										echo '<option value="'.$mkey.'" '.$month.'>'.$mvalue.'</option>';
										/*tương đương: <option value="1">January</option> và 11 tháng còn lại*/ 
									}
								?>
							</select>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label></label>
						<div class="input-group">
							<input type="submit" class="btn btn-danger" style="margin-right:10px;" name="show_leave_days" value="Show leave days">
							<button type="submit" class="btn btn-success" style="margin-right:10px;"name="this_month">This month</button>
							<button type="submit" class="btn btn-primary" style="margin-right:10px;"name="reload">Reload</button>
						</div>
					</div>
				</div>
			</div>

			<div class="panel-default">
				<div class="panel-heading">
					<span style="color: #337ab7;">Monthly manage list data</span>
				</div>
				<div class="panel-body">
					<button class="btn btn-danger active" type="button" style="margin-bottom:10px;" data-toggle="modal" data-target="#myModal">
						Add leave days
					</button> 
					<!-- Modal add leave day-->
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog"> 
						<!-- Modal content-->
							<div class="modal-content"> 
								<div class="modal-header" style="background-color:#337ab7; color:#fff;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Add new leave days</h4>
								</div>

								<div class="modal-body" style="height: 290px;">
									<div class="col-lg-12 form-group">
										<label>
											Employee: 
											<span style="color:red;">
												[<i class="fa fa-asterisk" aria-hidden="true"></i>]
											</span>
										</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-user" aria-hidden="true"></i>
											</span>
											<select class="form-control" name="employee_id">
												<option value selected>--- Select employee ---</option>
												<?php
													foreach ($leavedays as $leaveday) {
														echo '<option value="'.$leaveday['Employee']['id'].'">'.$leaveday['Employee']['fullname'].'</option>';
													}
												?>
											</select>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label>
											Leave date:
											<span style="color:red;">
												[<i class="fa fa-asterisk" aria-hidden="true"></i>]
											</span> 
										</label>
										<div class="input-group date" data-provide="datepicker">
											<input type="text" class="form-control"  name="leave_datetime">
											<div class="input-group-btn">
											    <span class="btn btn-danger">
											       	<i class="fa fa-calendar" aria-hidden="true"></i>
											    </span>
											</div>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label>
											Day:
											<span style="color:red;">
												[<i class="fa fa-asterisk" aria-hidden="true"></i>] &#60;= 1 day
											</span> 
										</label>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="leave_hour">
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label>Reason:</label>
										<div class="input-group" style="width:100%; height: 100%">
											<textarea class="form-controll" style="border-radius:4px;" name="leave_reason"></textarea>
										</div>
									</div>
									<input type="hidden" name="del_flag" value="0">
								</div>

								<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Canel</button>
										<button type="submit" class="btn btn-primary" name="add_leave_day">OK</button>
								</div> 
							</div>
						</div>
					</div> 

					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%; font-size:11px;">
							<thead>
								<th>No.</th>
								<th>Fullname</th>
								<?php
									if (isset($leave) != null) {
										$month = $leave['month'];
										$year = $leave['year'];
									} else {
										$month = date('m');
										$year = date('Y');
									}
									$number = cal_days_in_month(CAL_GREGORIAN, $month, $year); // tính số ngày trong tháng này
									for($i = 1; $i <= $number; $i++) {
										echo '<th class="text-center">'.jddayofweek(gregoriantojd($month,$i,$year),2).' ('.$i.'/'.$month.')</th>';
									}
									/*Hàm jddayofweek(gregoriantojd($month,$day,$year),2) lấy tên thứ của ngày đó theo kiểu thứ 2 (tên viết tắt, kiểu 1 là tên đầy đủ)*/
								?>
							</thead>

							<tbody>
					<?php 

					// build users
					$userList = array();
					foreach ($leavetimes as $key => $value) {
						$userId = isset($value['Employee']['id']) ? $value['Employee']['id'] : '0';
						$userName =  isset($value['Employee']['fullname']) ? $value['Employee']['fullname'] : '';
						$userList[$userId] = array('id' => $userId,'name' => $userName);
								
					}
					// get user leave time 
					foreach ($leavetimes as $key => $value) {

						$leaveHour =  isset($value['Leaveday']['leave_hour']) ? $value['Leaveday']['leave_hour'] : '';
						$leaveDateTime =  isset($value['Leaveday']['leave_datetime']) ? (int)date('d', strtotime($value['Leaveday']['leave_datetime'])) : '';
						// chỉ lấy ngày của leave day để làm key cho leave hour
						$userId =  isset($value['Leaveday']['employee_id']) ? $value['Leaveday']['employee_id'] : '';
						$userList[$userId]['leaveHour'][$leaveDateTime] = $leaveHour;
								
					} 
					// show data
					$no = 1;
					foreach ($users as $value) {
						$userId = $value['Employee']['id'];
						$name = $value['Employee']['fullname'];
						$user = isset($userList[$userId]) ? $userList[$userId] : array();
						?>
						<tr>
						<td><?php echo $no; $no++; ?></td>
						<td><?php echo $name; ?></td>
						<?php
						for($i = 1; $i <= $number; $i++) {

							?>
							<td class="text-center" style="font-size: 14px;">
								<b><?php echo isset($user['leaveHour'][$i]) ? '<a href="#">'.$user['leaveHour'][$i].'</a>' : ''; ?></b>
							</td>
							<?php
						}
						?>
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
	</form>
</div>

