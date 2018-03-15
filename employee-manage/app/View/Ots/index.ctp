<?php echo $this->element('main-top');?>

<div class="main-content">
	<?php echo $this->element('sidebar');?>
	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-money" aria-hidden="true"></i> OT manage</a></li>
			<li class="breadcrumb-item active" style="color:#FF0000;">Index</li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">OT manage</span>
			</div>

			<div class="panel-body"> 
				<form action method="post" enctype="multipart/form-data">
					<div class="col-lg-3 form-group">
						<label>Year:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar" aria-hidden="true"></i>
							</span>
							<select class="form-control" name="ot_year">
								<option value>--- Select year ---</option>
								<?php
									$year = isset($otTime['year']) ? $otTime['year'] : date('Y');
									for ($m = 2016; $m <= 2021; $m ++) {
										$selectYear = ($year == $m) ? 'selected = "selected"' :'';
										echo '<option value="'.$m.'"'.$selectYear.'>'.$m.'</option>';
									}
								?>
							</select>
						</div>
					</div>

					<div class="col-lg-3 form-group">
						<label>Month:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar" aria-hidden="true"></i>
							</span>
							<select class="form-control" name="ot_month">
								<option value>--- Select month ---</option>
								<?php 
									$month = isset($otTime['month']) ? $otTime['month'] : date('m');
									foreach (Configure::read("config_month") as $mkey => $mvalue) {
										$selectMonth = ($month == $mkey) ? 'selected = "selected"' :'';
										echo '<option value="'.$mkey.'"'.$selectMonth.'>'.$mvalue.'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-lg-6 form-group">
						<label></label>
						<div class="input-group">
							<button type="submit" class="btn btn-danger" style="margin-right:10px;" name="showOT">Show OT</button>
							<button type="button" class="btn btn-success" style="margin-right:10px;" name="thisMonth">This month</button>
							<button type="button" class="btn btn-primary" name="reload">Reload</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Table OT Manage</span>
			</div>

			<div class="panel-body">
				<form action method="post" enctype="multipart/form-data">
					<button class="btn btn-danger active" type="button" style="margin-bottom:10px;" data-toggle="modal" data-target="#myModal">
						Add OT
					</button> 
					<!-- Modal -->
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog"> 
						<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header" style="background-color:#337ab7; color:#fff;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Add new Overtime</h4>
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
												foreach ($employees as $employee) {
													?>
													<option value="<?php echo $employee['Employee']['id'];?>">
														<?php echo $employee['Employee']['fullname'];?>
													</option>
													<?php
												}
												?>
											</select>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label>
											Project:
											<span style="color:red;">
												[<i class="fa fa-asterisk" aria-hidden="true"></i>]
											</span> 
										</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-suitcase" aria-hidden="true"></i>
											</span>
											<select class="form-control" name="project_id">
												<option value selected>--- Select project ---</option>
												<?php
												foreach ($projects as $project) {
													?>
													<option value="<?php echo $project['Project']['id'];?>">
														<?php echo $project['Project']['name'];?>
													</option>
													<?php
												}
												?>
											</select>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label>
											OT datetime:
											<span style="color:red;">
												[<i class="fa fa-asterisk" aria-hidden="true"></i>]
											</span> 
										</label>
										<div class="input-group date" data-provide="datepicker">
											<input type="text" class="form-control" name="ot_datetime">
											<div class="input-group-btn">
											    <span class="btn btn-danger">
											       	<i class="fa fa-calendar" aria-hidden="true"></i>
											    </span>
											</div>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label>
											OT hour:
											<span style="color:red;">
												[<i class="fa fa-asterisk" aria-hidden="true"></i>] &#60;= 24 hour
											</span>
										</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-clock-o" aria-hidden="true"></i>
											</span>
											<input type="text" class="form-control" name="ot_hour">
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<?php //echo $this->Form->create('Employee', array('url' => array('controller' => 'employees', 'action' => 'delete', $employee['Employee']['id'])));?> 
										<button type="button" class="btn btn-danger" data-dismiss="modal">Canel</button>
										<button type="submit" class="btn btn-primary" name="addOT">OK</button>
									<?php //echo $this->Form->end();?>
								</div> 
							</div>
						</div>
					</div>

					<?php
					$no = 1;

					// build list ot 
					foreach ($ots as $ot) {
						$projectId = isset($ot['Ot']['project_id']) ? $ot['Ot']['project_id'] : '0';
						$employeeId = isset($ot['Ot']['employee_id']) ? $ot['Ot']['employee_id'] : '0';
						$otId = $projectId.$employeeId;
						$otProjectName = isset($ot['Project']['name']) ? $ot['Project']['name'] : '';
						$otEmployeeName = isset($ot['Employee']['fullname']) ? $ot['Employee']['fullname'] : '';
						$otList[$otId] = array(
							'id' => $otId, 
							'project_name' => $otProjectName, 
							'employee_name' => $otEmployeeName
						);
					}

					// add ot_datetime and ot_hour
					foreach ($ots as $ot) {
						$projectId = isset($ot['Ot']['project_id']) ? $ot['Ot']['project_id'] : '0';
						$employeeId = isset($ot['Ot']['employee_id']) ? $ot['Ot']['employee_id'] : '0';
						$otId = $projectId.$employeeId;
						$otDatetime = isset($ot['Ot']['ot_datetime']) ? (int)date('d', strtotime($ot['Ot']['ot_datetime'])) :'';
						$otHour = isset($ot['Ot']['ot_hour']) ? $ot['Ot']['ot_hour'] : '';
						$otList[$otId]['otHour'][$otDatetime] = $otHour; // Tạo mảng otHour chứa thông tin ngày nghỉ và số giờ nghỉ của nhân viên trong dự án đó, với ngày của otDatetime làm key
					} 
					
					// show data
					if (isset($otList) != null) {
						?>
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%; font-size:11px;">
								<thead class="text-center">
									<th>No.</th>
									<th>Project name</th>
									<th>Member name</th>
									<?php
									$month = isset($otTime['month']) ? $otTime['month'] : date('m');
									$year = isset($otTime['year']) ? $otTime['year'] : date('Y');;
									$number = cal_days_in_month(CAL_GREGORIAN, $month, $year); // tính số ngày trong tháng này
									for($i = 1; $i <= $number; $i++) {
										?>
										<th class="text-center"><?php echo jddayofweek(gregoriantojd($month,$i,$year),2).' ('.$i.'/'.$month.')'; ?> </th>
										<?php
									}
									?>
								</thead>

								<tbody> 
								<?php
								foreach ($otList as $value) {
									?>
									<tr class="text-center">
										<td><?php echo $no; $no++;?></td>
										<td><?php echo isset($value['project_name']) ? $value['project_name'] : '';?></td>
										<td><?php echo isset($value['employee_name']) ? $value['employee_name'] :'';?></td>
										<?php
										for($i = 1; $i <= $number; $i++) {
											?>
											<td style="font-size:14px;">
												<b><?php echo isset($value['otHour'][$i]) ? '<a data-toggle="modal" data-target="#myModal-$i">'.$value['otHour'][$i].'</a>' : '';?></b>
												
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
						<?php 
					} else {
						?>
						<div class="col-lg-12 text-center">
							<b>Data not found</b>
						</div>
						<?php
					} ?>
				</form>
			</div>
		</div>

	</div>
</div>