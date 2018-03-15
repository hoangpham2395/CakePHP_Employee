<?php echo $this->element('main-top');?>
<div class="main-content">
	<?php echo $this->element('sidebar');?>
	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-user"></i> Employees manage</a></li>
			<li class="breadcrumb-item active"><span style="color: red;">Edit employee</span></li>
		</ol>
		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Edit employee</span>
				<span style="color:red;">
					<?php if (isset($user['User']['fullname'])) echo $user['User']['fullname']; ?>
				</span>
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
							<input type="text" class="form-control" name="username" value='<?php echo $user["User"]["username"];?>'>
						</div>
						<?php
							if (!empty($errorEdit['username'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['username'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<!-- <div class="col-lg-12 form-group">
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
						</div> -->
						<?php
							// if (!empty($errorEdit['password'])) {
								?>
								<!-- <div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['password'];?>
									</span>
								</div> -->
								<?php
							// }
						?>
					<!-- </div>

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
						</div> -->
						<?php
							// if (!empty($errorEdit['confirm_password'])) {
								?>
								<!-- <div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['confirm_password'];?>
									</span>
								</div> -->
								<?php
							// }
						?>
					<!-- </div> -->

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
							<input type="text" class="form-control" name="fullname" value='<?php echo $user["User"]["fullname"];?>'>
						</div>
						<?php
							if (!empty($errorEdit['fullname'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['fullname'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>Date of birth (month/day/year):</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="birthday" value='<?php if ($user["User"]["birthday"] != "0000-00-00" && $user["User"]["birthday"] != "1970-01-01") echo date('m/d/Y', strtotime($user["User"]["birthday"]));?>'>
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
							<?php
							$male = ($user['User']['gender'] == 2) ? 'checked="checked"' : '';
							$female = ($user['User']['gender'] == 1) ? 'checked="checked"' : '';
							$difference = ($user['User']['gender'] == 3) ? 'checked="checked"' : '';
							?>
							<input type="radio" name="gender" value="2" <?php echo $male;?>> Male &nbsp;
							<input type="radio" name="gender" value="1" <?php echo $female;?>> Female &nbsp;
							<input type="radio" name="gender" value="3" <?php echo $difference;?>> Difference
						</div>
						<?php
							if (!empty($errorEdit['gender'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['gender'];?>
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
							<input type="tel" class="form-control" name="tel" value='<?php echo $user['User']['tel'];?>'>
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
							<input type="mail" class="form-control" name="email_company" value='<?php echo $user['User']['email_company'];?>'>
						</div>
						<?php
							if (!empty($errorEdit['email_company'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['email_company'];?>
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
							<input type="mail" class="form-control" name="email_personal" value='<?php echo $user['User']['email_personal'];?>'>
						</div>
						<?php
							if (!empty($errorEdit['email_personal'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['email_personal'];?>
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
							<input type="text" class="form-control" name="skype" value='<?php echo $user['User']['skype'];?>'>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Account chatwork:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-xing-square"></i>
							</span>
							<input type="text" class="form-control" name="chatwork" value='<?php echo $user['User']['chatwork'];?>'>
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
							<input type="text" class="form-control" name="join_datetime" value='<?php echo date('m/d/Y', strtotime($user["User"]["join_datetime"]));?>'>
							<div class="input-group-btn">
								<span class="btn btn-danger">
									<i class="fa fa-calendar"></i>
								</span>
							</div>
						</div>
						<?php
							if (!empty($errorEdit['join_datetime'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['join_datetime'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>Day exited at the company:</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="exit_datetime" value='<?php if ($user["User"]["exit_datetime"] != "0000-00-00" && $user["User"]["exit_datetime"] != "1970-01-01") echo date('m/d/Y', strtotime($user["User"]["exit_datetime"]));?>'>
							<div class="input-group-btn">
								<span class="btn btn-danger">
									<i class="fa fa-calendar"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<?php
						$app = ($user['User']['department'] == 'App') ? 'selected="selected"' : '';
						$cons = ($user['User']['department'] == 'Construction') ? 'selected="selected"' : '';
						$it = ($user['User']['department'] == 'IT') ? 'selected="selected"' : '';
						?>
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
								<option value="App" <?php echo $app;?>>App</option>
								<option value="Construction" <?php echo $cons;?>>Construcion</option>
								<option value="IT" <?php echo $it;?>>IT</option>
							</select>
						</div>
						<?php
							if (!empty($errorEdit['department'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['department'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<?php
						$dir = ($user['User']['position'] == 'Director') ? 'selected="selected"' : '';
						$lea = ($user['User']['position'] == 'Leader') ? 'selected="selected"' : '';
						$bse = ($user['User']['position'] == 'BSE') ? 'selected="selected"' : '';
						$emp = ($user['User']['position'] == 'Employee') ? 'selected="selected"' : '';
						$tes = ($user['User']['position'] == 'Tester') ? 'selected="selected"' : '';
						?>
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
								<option value="Director" <?php echo $dir;?>>Director</option>
								<option value="Leader" <?php echo $lea;?>>Leader</option>
								<option value="BSE" <?php echo $bse;?>>BSE</option>
								<option value="Employee" <?php echo $emp;?>>Employee</option>
								<option value="Tester" <?php echo $tes;?>>Tester</option>
							</select>
						</div>
						<?php
							if (!empty($errorEdit['position'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['position'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<?php
						$offi = ($user['User']['user_type'] == 'Official employee') ? 'selected="selected"' : '';
						$cont = ($user['User']['user_type'] == 'Contract') ? 'selected="selected"' : '';
						$prob = ($user['User']['user_type'] == 'Probationary') ? 'selected="selected"' : '';
						$inte = ($user['User']['user_type'] == 'Intership') ? 'selected="selected"' : '';
						$diff = ($user['User']['user_type'] == 'Difference') ? 'selected="selected"' : '';
						?>
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
								<option value="Official employee" <?php echo $offi;?>>Official employee</option>
								<option value="Contract" <?php echo $cont;?>>Contract</option>
								<option value="Probationary" <?php echo $prob;?>>Probationary</option> <!--Thử việc-->
								<option value="Intership" <?php echo $inte;?>>Intership</option>
								<option value="Difference" <?php echo $diff;?>>Difference</option>
							</select>
						</div>
						<?php
							if (!empty($errorEdit['user_type'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['user_type'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<?php
						$join = ($user['User']['status'] == 'Joining') ? 'selected="selected"' : '';
						$exit = ($user['User']['status'] == 'Exited') ? 'selected="selected"' : '';
						$absent = ($user['User']['status'] == 'Absent') ? 'selected="selected"' : '';
						?>
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
								<option value="Joining" <?php echo $join;?>>Joining</option>
								<option value="Exited" <?php echo $exit;?>>Exited</option>
								<option value="Absent" <?php echo $absent;?>>Absent</option> <!--Vắng mặt-->
							</select>
						</div>
						<?php
							if (!empty($errorEdit['status'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['status'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<?php
						$m3 = ($user['User']['contract_type'] == '3 months') ? 'selected="selected"' : ''; 
						$m6 = ($user['User']['contract_type'] == '6 months') ? 'selected="selected"' : ''; 
						$y1 = ($user['User']['contract_type'] == '1 year') ? 'selected="selected"' : ''; 
						$y2 = ($user['User']['contract_type'] == '2 years') ? 'selected="selected"' : ''; 
						$y3 = ($user['User']['contract_type'] == '3 years') ? 'selected="selected"' : ''; 
						$y5 = ($user['User']['contract_type'] == '5 years') ? 'selected="selected"' : ''; 
						$dur = ($user['User']['contract_type'] == 'Duration') ? 'selected="selected"' : ''; 
						$for = ($user['User']['contract_type'] == 'Forever') ? 'selected="selected"' : ''; 
						?>
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
								<option value="3 months" <?php echo $m3;?>>3 months</option>
								<option value="6 months" <?php echo $m6;?>>6 months</option>
								<option value="1 year" <?php echo $y1;?>>1 year</option>
								<option value="2 years" <?php echo $y2;?>>2 years</option>
								<option value="3 years" <?php echo $y3;?>>3 years</option>
								<option value="5 years" <?php echo $y5;?>>5 years</option>
								<option value="Duration" <?php echo $dur;?>>Duration</option> <!--Bán thời gian-->
								<option value="Forever" <?php echo $for;?>>Forever</option>
							</select>
						</div>
						<?php
							if (!empty($errorEdit['contract_type'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['contract_type'];?>
									</span>
								</div>
								<?php
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<?php
						$wapp = ($user['User']['work_address'] == 'App room') ? 'selected="selected"' : '';
						$wit = ($user['User']['work_address'] == 'IT room') ? 'selected="selected"' : '';
						$wcons = ($user['User']['work_address'] == 'Construction room') ? 'selected="selected"' : '';
						$wmeet = ($user['User']['work_address'] == 'Meeting room') ? 'selected="selected"' : '';
						$wdin = ($user['User']['work_address'] == 'Dining room') ? 'selected="selected"' : '';
						?>
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
								<option value="App room" <?php echo $wapp;?>>App room</option>
								<option value="IT room" <?php echo $wit;?>>IT room</option>
								<option value="Construction room" <?php echo $wcons;?>>Construction room</option>
								<option value="Meeting room" <?php echo $wmeet;?>>Meeting room</option>
								<option value="Dining room" <?php echo $wdin;?>>Dining room</option>
							</select>
						</div>
						<?php
							if (!empty($errorEdit['work_address'])) {
								?>
								<div>
									<span style="color:red;">
										<i class="fa fa-minus-circle"></i>
										<?php echo $errorEdit['work_address'];?>
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
							<input type="text" class="form-control" name="skill" value='<?php echo $user['User']['skill'];?>'>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Literacy:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-inbox"></i>
							</span>
							<input type="text" class="form-control" name="literacy" value='<?php echo $user['User']['literacy'];?>'>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Address:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-map-marker"></i>
							</span>
							<input type="text" class="form-control" name="address" value='<?php echo $user['User']['address'];?>'>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Bank account:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-credit-card"></i>
							</span>
							<input type="text" class="form-control" name="bank_account" value='<?php echo $user['User']['bank_account'];?>'>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>ID number:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-id-card-o"></i>
							</span>
							<input type="text" class="form-control" name="id_number" value='<?php echo $user['User']['id_number'];?>'>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Desciption:</label>
						<div class="input-group" style="width:100%;">
							<textarea class="form-controll" rows="3" style="width:100%; border-radius:4px;" name="description">
								<?php echo $user['User']['description'];?>
							</textarea>
						</div>
					</div>

					<div class="col-lg-12 text-center">
						<button type="reset" class="btn btn-lg btn-primary" name="reset" style="margin-right:10px;">
							<i class="fa fa-refresh"></i>
							Reset
						</button>
						<button type="submit" class="btn btn-lg btn-danger" name="Edit">
							<i class="fa fa-check-square-o"></i>
							Confirm
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
