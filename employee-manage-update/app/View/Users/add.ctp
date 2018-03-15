<?php echo $this->element('main-top');?>
<div class="main-content">
	<?php echo $this->element('sidebar');?>
	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-user"></i> Employees manage</a></li>
			<li class="breadcrumb-item active"><span style="color: red;">Add new employee</span></li>
		</ol>
		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Add new employee</span>
			</div>
			<div class="panel-body">
				<form action method="post" enctype="multipart/form-data">
					<div class="col-lg-12 form-group">
						<label>
							Username: 
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<input type="text" class="form-control" name="username">
						</div>
						<?php
							if (!empty($errorAdd['username'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['username'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label>
							Password:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-lock"></i>
							</span>
							<input type="password" class="form-control" name="password">
						</div>
						<?php
							if (!empty($errorAdd['password'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['password'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label>
							Confirm password:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-lock"></i>
							</span>
							<input type="password" class="form-control" name="confirm_password">
						</div>
						<?php
							if (!empty($errorAdd['confirm_password'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['confirm_password'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Fullname:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<input type="text" class="form-control" name="fullname">
						</div>
						<?php
							if (!empty($errorAdd['fullname'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['fullname'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>Date of birth:</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="birthday">
							<div class="input-group-btn">
								<span class="btn btn-danger">
									<i class="fa fa-calendar"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Gender:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<input type="radio" name="gender" value="2"> Male &nbsp;
							<input type="radio" name="gender" value="1"> Female &nbsp;
							<input type="radio" name="gender" value="3"> Difference
						</div>
						<?php
							if (!empty($errorAdd['gender'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['gender'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>Telephone number:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-phone"></i>
							</span>
							<input type="tel" class="form-control" name="tel">
						</div>
					</div>

					<div class="col-lg-6 form group">
						<label>
							Email company:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-envelope-o"></i>
							</span>
							<input type="mail" class="form-control" name="email_company">
						</div>
						<?php
							if (!empty($errorAdd['email_company'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['email_company'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Email personal:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-envelope-o"></i>
							</span>
							<input type="mail" class="form-control" name="email_personal">
						</div>
						<?php
							if (!empty($errorAdd['email_personal'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['email_personal'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label>Account skype:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-skype"></i>
							</span>
							<input type="text" class="form-control" name="skype">
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Account chatwork:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-xing-square"></i>
							</span>
							<input type="text" class="form-control" name="chatwork">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Day started at the company:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="join_datetime">
							<div class="input-group-btn">
								<span class="btn btn-danger">
									<i class="fa fa-calendar"></i>
								</span>
							</div>
						</div>
						<?php
							if (!empty($errorAdd['join_datetime'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['join_datetime'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>Day exited at the company:</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="exit_datetime">
							<div class="input-group-btn">
								<span class="btn btn-danger">
									<i class="fa fa-calendar"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Department:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-briefcase"></i>
							</span>
							<select class="form-control" name="department">
								<option value selected> --- Select department --- </option>
								<option value="App">App</option>
								<option value="Construction">Construcion</option>
								<option value="IT">IT</option>
							</select>
						</div>
						<?php
							if (!empty($errorAdd['department'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['department'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Position:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-star-o"></i>
							</span>
							<select class="form-control" name="position">
								<option value selected> --- Select position --- </option>
								<option value="Director">Director</option>
								<option value="Leader">Leader</option>
								<option value="BSE">BSE</option>
								<option value="Employee">Employee</option>
								<option value="Tester">Tester</option>
							</select>
						</div>
						<?php
							if (!empty($errorAdd['position'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['position'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Employee types:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-group"></i>
							</span>
							<select class="form-control" name="user_type">
								<option value selected> --- Select employee type --- </option>
								<option value="Official employee">Official employee</option>
								<option value="Contract">Contract</option>
								<option value="Probationary">Probationary</option> <!--Thử việc-->
								<option value="Intership">Intership</option>
								<option value="Difference">Difference</option>
							</select>
						</div>
						<?php
							if (!empty($errorAdd['user_type'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['user_type'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Employee status:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-bullseye"></i>
							</span>
							<select class="form-control" name="status">
								<option value selected> --- Select employee status--- </option>
								<option value="Joining">Joining</option>
								<option value="Exited">Exited</option>
								<option value="Absent">Absent</option> <!--Vắng mặt-->
							</select>
						</div>
						<?php
							if (!empty($errorAdd['status'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['status'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Contract type:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-handshake-o"></i>
							</span>
							<select class="form-control" name="contract_type">
								<option value selected> --- Select contract type --- </option>
								<option value="3 months">3 months</option>
								<option value="6 months">6 months</option>
								<option value="1 year">1 year</option>
								<option value="2 years">2 years</option>
								<option value="3 years">3 years</option>
								<option value="5 years">5 years</option>
								<option value="Duration">Duration</option> <!--Bán thời gian-->
								<option value="Forever">Forever</option>
							</select>
						</div>
						<?php
							if (!empty($errorAdd['contract_type'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['contract_type'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Work address:
							<span style="color:red;">
								[<i class="fa fa-asterisk"></i>]
							</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-cogs"></i>
							</span>
							<select class="form-control" name="work_address">
								<option value selected> --- Select work address--- </option>
								<option value="App room">App room</option>
								<option value="IT room">IT room</option>
								<option value="Construction room">Construction room</option>
								<option value="Meeting room">Meeting room</option>
								<option value="Dining room">Dining room</option>
							</select>
						</div>
						<?php
							if (!empty($errorAdd['work_address'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorAdd['work_address'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label>Skill:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-trophy"></i>
							</span>
							<input type="text" class="form-control" name="skill">
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Literacy:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-inbox"></i>
							</span>
							<input type="text" class="form-control" name="literacy">
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Address:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-map-marker"></i>
							</span>
							<input type="text" class="form-control" name="address">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Bank account:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-credit-card"></i>
							</span>
							<input type="text" class="form-control" name="bank_account">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>ID number:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o"></i>
							</span>
							<input type="text" class="form-control" name="id_number">
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Desciption:</label>
						<div class="input-group" style="width:100%;">
							<textarea class="form-controll" rows="3" style="width:100%; border-radius:4px;" name="description"></textarea>
						</div>
					</div>

					<div class="col-lg-12 text-center">
						<button type="reset" class="btn btn-lg btn-primary" name="reset" style="margin-right:10px;">
							<i class="fa fa-refresh"></i>
							Reset
						</button>
						<button type="submit" class="btn btn-lg btn-danger" name="add">
							<i class="fa fa-check-square-o"></i>
							Confirm
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>