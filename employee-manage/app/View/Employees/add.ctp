<?php echo $this->element('main-top');?>

<div class="main-content">
	<?php echo $this->element('sidebar')?>

	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Employees manage</a></li>
			<li class="breadcrumb-item active" style="color:#FF0000;">Add new employee</li>
		</ol>
		

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Add new employee</span>
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
							<input type="text" class="form-control" name="username">
						</div>
						<?php 
							if (!empty($err['username'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['username'].'</span>';
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
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['password'].'</span>';
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
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['confirm_password'].'</span>';
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
							<input type="text" class="form-control" name="fullname">
						</div>
						<?php 
							if (!empty($err['fullname'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['fullname'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>Telephone number:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="tel">
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
							<input type="radio" name="gender" value="male"> Male &nbsp;
							<input type="radio" name="gender" value="female"> Female &nbsp;
						</div>
						<?php 
							if (!empty($err['gender'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['gender'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>Date of Birth:</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="birthday">
							<div class="input-group-btn">
								<span class="btn btn-danger">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</span>
							</div>
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
							<input type="text" class="form-control" name="email_company">
						</div>
						<?php 
							if (!empty($err['email_company'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['email_company'].'</span>';
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
							<input type="text" class="form-control" name="email_personal">
						</div>
						<?php 
							if (!empty($err['email_personal'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['email_personal'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label>Account Skype:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-skype" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="skype">
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Account Chatwork:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-xing-square" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="chatwork">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Date started at the company:
							<span style="color:red;">
								[<i class="fa fa-asterisk" aria-hidden="true"></i>]
							</span>
						</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="join_datetime">
							<div class="input-group-btn">
								<span class="btn btn-danger">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</span>
							</div>
						</div>
						<?php 
							if (!empty($err['join_datetime'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['join_datetime'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>Date exited at the company:</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="exit_datetime">
							<div class="input-group-btn">
								<span class="btn btn-danger">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</span>
							</div>
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
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
							<select class="form-control" name="department">
								<option value selected>--- Select department ---</option>
								<option value="Construction">Construction</option>
								<option value="IT">IT</option>
							</select>
						</div>
						<?php 
							if (!empty($err['department'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['department'].'</span>';
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
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-star-o" aria-hidden="true"></i></span>
							<select class="form-control" name="position">
								<option value selected>--- Select position ---</option>
								<option value="BSE">BSE</option>
								<option value="Director">Director</option>
								<option value="Employee">Employee</option>
								<option value="Leader">Leader</option>
								<option value="Tester">Tester</option>
							</select>
						</div>
						<?php 
							if (!empty($err['position'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['position'].'</span>';
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
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-group" aria-hidden="true"></i></span>
							<select class="form-control" name="employee_type">
								<option value selected>--- Select employee type ---</option>
								<option value="Official employee">Official employee</option>
								<option value="Intership">Intership</option> <!-- Thực tập -->
								<option value="Contract">Contract</option>
								<option value="Probationary">Probationary</option> <!--Tập sự-->
								<option value="Difference">Difference</option>
							</select>
						</div>
						<?php 
							if (!empty($err['employee_type'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['employee_type'].'</span>';
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
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-bullseye" aria-hidden="true"></i></span>
							<select class="form-control" name="status">
								<option value selected>--- Select status ---</option>
								<option value="Joining">Joining</option>
								<option value="Exited">Exited</option>
								<option value="Absent">Absent</option>
							</select>
						</div>
						<?php 
							if (!empty($err['status'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['status'].'</span>';
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
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-ticket" aria-hidden="true"></i></span>
							<select class="form-control" name="contract_type">
								<option value selected>--- Select contract types ---</option>
								<option value="3 months">3 months</option>
								<option value="6 months">6 months</option>
								<option value="1 years">1 years</option>
								<option value="2 years">2 years</option>
								<option value="3 years">3 years</option>
								<option value="5 years">5 years</option>
								<option value="Duration">Duration</option> <!--Thời gian-->
								<option value="Forever">Forever</option>
							</select>
						</div>
						<?php 
							if (!empty($err['contract_type'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['contract_type'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>Work Address:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-cogs" aria-hidden="true"></i></span>
							<select class="form-control" name="work_address">
								<option value selected>--- Select room ---</option>
								<option value="IT room">IT room</option>
								<option value="App room">App room</option>
								<option value="Tester room">Tester room</option>
								<option value="Construction room">Construction room</option>
								<option value="Meeting room">Meeting room</option>
								<option value="Dining room">Dining room</option>
							</select>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Skill:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-trophy" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="skill">
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Literacy:</label> <!--Học vấn-->
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-inbox" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="literacy">
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Address:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="address">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Bank account:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="bank_account">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>ID number:</label> <!--Số chứng minh thư-->
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="id_number">
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Desciption:</label>
						<div class="input-group" style="width:100%;">
							<textarea class="form-control" style="border-radius:4px;"name="description"></textarea>
						</div>
					</div>

					<div class="col-lg-12 text-center">
							<button type="reset" class="btn btn-primary btn-lg" style="margin-right:10px;"> 
								<i class="fa fa-refresh" aria-hidden="true"> Reset</i>
							</button>
							<button type="submit" class="btn btn-danger btn-lg"> 
								<i class="fa fa-plus-circle" aria-hidden="true"> Add</i>
							</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>