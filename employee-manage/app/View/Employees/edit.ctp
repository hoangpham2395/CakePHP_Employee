<?php echo $this->element('main-top'); ?>
<div class="main-content">
	<?php echo $this->element('sidebar'); ?>

	<div class="main-content-body">
		<ol class="breadcrumb" style="background:#fff;">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
		  	<li class="breadcrumb-item"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Employees manage</a></li>
		  	<li class="breadcrumb-item"><a href="#">Edit employee</a></li>
		  	<li class="breadcrumb-item active" style="color:#FF0000;"><?php echo $employee['Employee']['fullname'];?></li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Edit employee</span> 
				<span style="color:#FF0000;"><?php echo $employee['Employee']['fullname'];?></span>
			</div>
			<div class="panel-body">
				<form action method="post" enctype="multipart/form-data">
					<div class="col-lg-12 form-group"> <!--col-lg-12 giúp div text căn hết phần màn hình (nửa màn hình thì col-lg-6)-->
						<label>
							Username: 
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="username" value="<?php echo $employee['Employee']['username']; ?>">
						</div>
						<?php
							if (!empty($err['username'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['username'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label>
							Password:
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="password">
						</div>
						<?php
							if (!empty($err['password'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['password'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label>
							Confirm password:
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="confirm_password">
						</div>
						<?php
							if (!empty($err['confirm_password'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['confirm_password'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Fullname:
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="fullname" value="<?php echo $employee['Employee']['fullname']; ?>">
						</div>
						<?php
							if (!empty($err['fullname'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['fullname'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>Telephone number:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="tel" value="<?php echo $employee['Employee']['tel']; ?>">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Gender:
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group">
							<?php
								$male = ($employee['Employee']['gender'] == 'male') ? 'checked = "checked"' : '';
								$female = ($employee['Employee']['gender'] == 'female') ? 'checked = "checked"' : '';
							?>
							<input type="radio" name="gender" value="male" <?php echo $male;?>> Male &nbsp;
							<input type="radio" name="gender" value="female" <?php echo $female;?>> Female &nbsp;
						</div>
						<?php
							if (!empty($err['gender'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['gender'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>Date of Birth:</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="birthday" value="<?php echo $employee['Employee']['birthday'];?>">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						</div> 
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Email company:
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="email_company" value="<?php echo $employee['Employee']['email_company'];?>">
						</div>
						<?php
							if (!empty($err['email_company'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['email_company'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Email personal:
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="email_personal" value="<?php echo $employee['Employee']['email_personal'];?>">
						</div>
						<?php
							if (!empty($err['email_personal'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['email_personal'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label>Account Skype:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-skype" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="skype" value="<?php echo $employee['Employee']['skype'];?>">
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Account Chatwork:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-xing-square" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="chatwork" value="<?php echo $employee['Employee']['chatwork'];?>">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Date started at the company:</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="join_datetime" value="<?php echo $employee['Employee']['join_datetime'];?>">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						</div>
						<?php
							if (!empty($err['join_datetime'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['join_datetime'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Date exited at the company:
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="exit_datetime" value="<?php echo $employee['Employee']['exit_datetime'];?>">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Department:
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group">
							<?php
								$construction = ($employee['Employee']['department'] == "Construction") ? 'selected = "selected"' : '';
								$it = ($employee['Employee']['department'] == "IT") ? 'selected = "selected"' : '';
							?>
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
							<select class="form-control" name="department">
								<option value selected>--- Select department ---</option>
								<option value="Construction" <?php echo $construction; ?>>Construction</option>
								<option value="IT" <?php echo $it; ?>>IT</option>
							</select>
						</div>
						<?php
							if (!empty($err['department'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['department'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Position:
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group">
							<?php
								$bse = ($employee['Employee']['position'] == "BSE") ? 'selected = "selected"' : '';
								$director = ($employee['Employee']['position'] == "Director") ? 'selected = "selected"' : '';
								$employee_pos = ($employee['Employee']['position'] == "Employee") ? 'selected = "selected"' : '';
								$leader = ($employee['Employee']['position'] == "Leader") ? 'selected = "selected"' : '';
								$tester = ($employee['Employee']['position'] == "Tester") ? 'selected = "selected"' : '';
							?>
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-star-o" aria-hidden="true"></i></span>
							<select class="form-control" name="position">
								<option value selected>--- Select position ---</option>
								<option value="BSE" <?php echo $bse; ?>>BSE</option>
								<option value="Director" <?php echo $director; ?>>Director</option>
								<option value="Employee" <?php echo $employee_pos; ?>>Employee</option>
								<option value="Leader" <?php echo $leader; ?>>Leader</option>
								<option value="Tester"<?php echo $tester; ?>>Tester</option>
							</select>
						</div>
						<?php
							if (!empty($err['position'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['position'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Employee types:
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group">
							<?php 
								$official = ($employee['Employee']['employee_type'] == "Official employee") ? 'selected = "selected"' : '';
								$intership = ($employee['Employee']['employee_type'] == "Intership") ? 'selected = "selected"' : '';
								$contract = ($employee['Employee']['employee_type'] == "Contract") ? 'selected = "selected"' : '';
								$probationary = ($employee['Employee']['employee_type'] == "Probationary") ? 'selected = "selected"' : '';
								$difference = ($employee['Employee']['employee_type'] == "Difference") ? 'selected = "selected"' : '';
							?>
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-group" aria-hidden="true"></i></span>
							<select class="form-control" name="employee_type">
								<option value selected>--- Select employee type ---</option>
								<option value="Official employee" <?php echo $official; ?>>Official employee</option>
								<option value="Intership" <?php echo $intership; ?>>Intership</option> <!-- Thực tập -->
								<option value="Contract" <?php echo $contract;?>>Contract</option>
								<option value="Probationary" <?php echo $probationary; ?>>Probationary</option> <!--Tập sự-->
								<option value="Difference" <?php echo $difference; ?>>Difference</option>
							</select>
						</div>
						<?php
							if (!empty($err['employee_type'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['employee_type'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Employee status:
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group">
							<?php
								$joining = ($employee['Employee']['status'] == 'Joining') ? 'selected = "selected"' : '';
								$exited = ($employee['Employee']['status'] == 'Exited') ? 'selected = "selected"' : '';
								$absent = ($employee['Employee']['status'] == 'Absent') ? 'selected = "selected"' : '';
							?>
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-bullseye" aria-hidden="true"></i></span>
							<select class="form-control" name="status">
								<option value selected>--- Select status ---</option>
								<option value="Joining" <?php echo $joining; ?>>Joining</option>
								<option value="Exited" <?php echo $exited; ?>>Exited</option>
								<option value="Absent" <?php echo $absent; ?>>Absent</option>
							</select>
						</div>
						<?php
							if (!empty($err['status'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['status'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Contract Types: <!--Loại hợp đồng-->
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label> 
						<div class="input-group">
							<?php 
								$m3 = ($employee['Employee']['contract_type'] == "3 months") ? 'selected = "selected"' : '';
								$m6 = ($employee['Employee']['contract_type'] == "6 months") ? 'selected = "selected"' : '';
								$y1 = ($employee['Employee']['contract_type'] == "1 years") ? 'selected = "selected"' : '';
								$y2 = ($employee['Employee']['contract_type'] == "2 years") ? 'selected = "selected"' : '';
								$y3 = ($employee['Employee']['contract_type'] == "3 years") ? 'selected = "selected"' : '';
								$y5 = ($employee['Employee']['contract_type'] == "5 years") ? 'selected = "selected"' : '';
								$duration = ($employee['Employee']['contract_type'] == "Duration") ? 'selected = "selected"' : '';
								$forever = ($employee['Employee']['contract_type'] == "Forever") ? 'selected = "selected"' : '';
							?>
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-ticket" aria-hidden="true"></i></span>
							<select class="form-control" name="contract_type">
								<option value selected>--- Select contract types ---</option>
								<option value="3 months" <?php echo $m3;?> >3 months</option>
								<option value="6 months" <?php echo $m6;?> >6 months</option>
								<option value="1 years" <?php echo $y1;?> >1 years</option>
								<option value="2 years" <?php echo $y2;?> >2 years</option>
								<option value="3 years" <?php echo $y3;?> >3 years</option>
								<option value="5 years" <?php echo $y5;?> >5 years</option>
								<option value="Duration" <?php echo $duration;?>>Duration</option> <!--Thời gian-->
								<option value="Forever" <?php echo $forever;?>>Forever</option>
							</select>
						</div>
						<?php
							if (!empty($err['contract_type'])) {
								echo '<span style="color:#FF0000;"><i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['contract_type'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>Work Address:</label>
						<div class="input-group">
							<?php
								$itr = ($employee['Employee']['work_address'] == "IT room") ? 'selected = "selected"' : '';
								$appr = ($employee['Employee']['work_address'] == "App room") ? 'selected = "selected"' : '';
								$testerr = ($employee['Employee']['work_address'] == "Tester room") ? 'selected = "selected"' : '';
								$constructionr = ($employee['Employee']['work_address'] == "Construction room") ? 'selected = "selected"' : '';
								$meetingr = ($employee['Employee']['work_address'] == "Meeting room") ? 'selected = "selected"' : '';
								$diningr = ($employee['Employee']['work_address'] == "Dining room") ? 'selected = "selected"' : '';						
							?>
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-cogs" aria-hidden="true"></i></span>
							<select class="form-control" name="work_address">
								<option value selected>--- Select room ---</option>
								<option value="IT room" <?php echo $itr;?>>IT room</option>
								<option value="App room" <?php echo $appr;?>>App room</option>
								<option value="Tester room" <?php echo $testerr;?>>Tester room</option>
								<option value="Construction room" <?php echo $constructionr;?>>Construction room</option>
								<option value="Meeting room" <?php echo $meetingr;?>>Meeting room</option>
								<option value="Dining room" <?php echo $diningr;?>>Dining room</option>
							</select>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Skill:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-trophy" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="skill" value="<?php echo $employee['Employee']['skill'];?>">
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Literacy:</label> <!--Học vấn-->
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-inbox" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="literacy" value="<?php echo $employee['Employee']['literacy'];?>">
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Address:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="address" value="<?php echo $employee['Employee']['address'];?>">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Bank account:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="bank_account" value="<?php echo $employee['Employee']['bank_account'];?>">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>ID number:</label> <!--Sô chứng minh thư-->
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="id_number" value="<?php echo $employee['Employee']['id_number'];?>">
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Desciption:</label>
						<div class="input-group" style="width:100%;">
							<textarea class="form-control" style="border-radius:4px;"name="description"><?php echo $employee['Employee']['description'];?></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group text-center">
							<?php 
								//echo $this->Html->link('<i class="fa fa-caret-square-o-left" aria-hidden="true"></i>'.' Back', array('controller' => 'employees', 'action' => 'view', $employee['Employee']['id']), array('class' => 'btn btn-primary btn-lg', 'style' => 'margin-left:200px;'), array('escape' => false));
							?>

							<a href="<?php echo $this->Html->url(array('controller' => 'employees', 'action' => 'view', $employee['Employee']['id']));?>" class="btn btn-primary btn-lg" style="margin-right:10px;">
								<i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
								Back
							</a>
							<!-- <button type="reset" class="btn btn-lg" style="margin-right:10px; color:#fff" name="confirm_add">
								<i class="fa fa-refresh" aria-hidden="true"></i>
								Reset
							</button> -->
							<button type="submit" class="btn btn-danger btn-lg" name="confirm_add">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
								Confirm
							</button>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
