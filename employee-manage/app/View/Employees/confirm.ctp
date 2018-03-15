<?php echo $this->element('main-top');?>

<div class="main-content">
	<?php echo $this->element('sidebar')?>

	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href=""><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href=""><i class="fa fa-user" aria-hidden="true"></i> Employees manage</a></li>
			<li class="breadcrumb-item active" style="color: red;">Confirm employee</li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;"> Confirm employee</span>
			</div>
			<div class="panel-body">
				<form action method="post" enctype="multipart/form-data">
					<?php 
						if ($this->Session->check('Edit.id')) {
							echo '<input type="hidden" name="id" value="'.$this->Session->read('Edit.id').'">';
						}
					?>
					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">Username [&#10004;]:</label>
						<div class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.username')) {
								echo $this->Session->read('Add.username');
								echo '<input type="hidden" name="username" value="'.$this->Session->read('Add.username').'">';
							} else if ($this->Session->check('Edit.username')) {
								echo $this->Session->read('Edit.username');
								echo '<input type="hidden" name="username" value="'.$this->Session->read('Edit.username').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">Password [&#10004;]:</label>
						<div class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.password')) {
								$pass = $this->Session->read('Add.password');
								echo '<input type="hidden" name="password" value="'.$this->Session->read('Add.password').'">';
							} else if ($this->Session->check('Edit.password')) {
								$pass = $this->Session->read('Edit.password');
								echo '<input type="hidden" name="password" value="'.$this->Session->read('Edit.password').'">';
							}

							if (!empty($pass)) {
								for ($i=0; $i < strlen($pass); $i++) { 
									echo '*';
								}
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">Fullname [&#10004;]:</label>
						<div class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.fullname')) {
								echo $this->Session->read('Add.fullname');
								echo '<input type="hidden" name="fullname" value="'.$this->Session->read('Add.fullname').'">';
							} else if ($this->Session->check('Edit.fullname')) {
								echo $this->Session->read('Edit.fullname');
								echo '<input type="hidden" name="fullname" value="'.$this->Session->read('Edit.fullname').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Telephone number
							<?php 
								if ($this->Session->check('Add.tel') || $this->Session->check('Edit.tel')) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?> 
						</label>
						<div class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.tel')) {
								echo $this->Session->read('Add.tel');
								echo '<input type="hidden" name="tel" value="'.$this->Session->read('Add.tel').'">';
							} else if ($this->Session->check('Edit.tel')) {
								echo $this->Session->read('Edit.tel');
								echo '<input type="hidden" name="tel" value="'.$this->Session->read('Edit.tel').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">Gender [&#10004;]:</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.gender')) {
								echo $this->Session->read('Add.gender');
								echo '<input type="hidden" name="gender" value="'.$this->Session->read('Add.gender').'">';
							} else if ($this->Session->check('Edit.gender')) {
								echo $this->Session->read('Edit.gender');
								echo '<input type="hidden" name="gender" value="'.$this->Session->read('Edit.gender').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">Email company [&#10004;]:</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.email_company')) {
								echo $this->Session->read('Add.email_company');
								echo '<input type="hidden" name="email_company" value="'.$this->Session->read('Add.email_company').'">';
							} else if ($this->Session->check('Edit.email_company')) {
								echo $this->Session->read('Edit.email_company');
								echo '<input type="hidden" name="email_company" value="'.$this->Session->read('Edit.email_company').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">Email personal [&#10004;]:</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.email_personal')) {
								echo $this->Session->read('Add.email_personal');
								echo '<input type="hidden" name="email_personal" value="'.$this->Session->read('Add.email_personal').'">';
							} else if ($this->Session->check('Edit.email_personal')) {
								echo $this->Session->read('Edit.email_personal');
								echo '<input type="hidden" name="email_personal" value="'.$this->Session->read('Edit.email_personal').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Account skype 
							<?php 
								if ($this->Session->check('Add.skype') || $this->Session->check('Edit.skype')) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?> 
						</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.skype')) {
								echo $this->Session->read('Add.skype');
								echo '<input type="hidden" name="skype" value="'.$this->Session->read('Add.skype').'">';
							} else if ($this->Session->check('Edit.skype')) {
								echo $this->Session->read('Edit.skype');
								echo '<input type="hidden" name="skype" value="'.$this->Session->read('Edit.skype').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Account chatwork
							<?php 
								if ($this->Session->check('Add.chatwork') || $this->Session->check('Edit.chatwork')) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?> 
						</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.chatwork')) {
								echo $this->Session->read('Add.chatwork');
								echo '<input type="hidden" name="chatwork" value="'.$this->Session->read('Add.chatwork').'">';
							} else if ($this->Session->check('Edit.chatwork')) {
								echo $this->Session->read('Edit.chatwork');
								echo '<input type="hidden" name="chatwork" value="'.$this->Session->read('Edit.chatwork').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">Date started at the company [&#10004;]:</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.join_datetime')) {
								echo $this->Session->read('Add.join_datetime');
								echo '<input type="hidden" name="join_datetime" value="'.$this->Session->read('Add.join_datetime').'">';
							} else if ($this->Session->check('Edit.join_datetime')) {
								echo $this->Session->read('Edit.join_datetime');
								echo '<input type="hidden" name="join_datetime" value="'.$this->Session->read('Edit.join_datetime').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<?php
							if ($this->Session->check('Add.exit_datetime')) {
								if ($this->Session->read('Add.exit_datetime') != '1970-01-01') {
									?>
									<label class="col-lg-3">Date exited at the company [&#10004;]:</label>
									<div class="col-lg-9">
										<?php
										echo $this->Session->read('Add.exit_datetime');
										echo '<input type="hidden" name="exit_datetime" value="'.$this->Session->read('Add.exit_datetime').'">';
										?>
									</div>
									<?php
								} else {
									?>
									<label class="col-lg-3">Date exited at the company [&#10008;]:</label>
									<input type="hidden" name="exit_datetime" value="0000-00-00">
									<?php
								}
							} else if ($this->Session->check('Edit.exit_datetime')) {
								if ($this->Session->read('Edit.exit_datetime') != '1970-01-01') {
									?>
									<label class="col-lg-3">Date exited at the company [&#10004;]:</label> 
									<div class="col-lg-9">
										<?php
										echo $this->Session->read('Edit.exit_datetime');
										echo '<input type="hidden" name="exit_datetime" value="'.$this->Session->read('Edit.exit_datetime').'">';
										?>
									</div>
									<?php
								} else {
									?>
									<label class="col-lg-3">Date exited at the company [&#10008;]:</label> <br>
									<input type="hidden" name="exit_datetime" value="0000-00-00">
									<?php
								}
							}
						?>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Date of Birth
							<?php 
								if ($this->Session->check('Add.birthday') || $this->Session->check('Edit.birthday')) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?> 
						</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.birthday')) {
								echo $this->Session->read('Add.birthday');
								echo '<input type="hidden" name="birthday" value="'.$this->Session->read('Add.birthday').'">';
							} else if ($this->Session->check('Edit.birthday')) {
								echo $this->Session->read('Edit.birthday');
								echo '<input type="hidden" name="birthday" value="'.$this->Session->read('Edit.birthday').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">Department [&#10004;]:</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.department')) {
								echo $this->Session->read('Add.department');
								echo '<input type="hidden" name="department" value="'.$this->Session->read('Add.department').'">';
							} else if ($this->Session->check('Edit.department')) {
								echo $this->Session->read('Edit.department');
								echo '<input type="hidden" name="department" value="'.$this->Session->read('Edit.department').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">Position [&#10004;]:</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.position')) {
								echo $this->Session->read('Add.position');
								echo '<input type="hidden" name="position" value="'.$this->Session->read('Add.position').'">';
							} else if ($this->Session->check('Edit.position')) {
								echo $this->Session->read('Edit.position');
								echo '<input type="hidden" name="position" value="'.$this->Session->read('Edit.position').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">Employee Type [&#10004;]:</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.employee_type')) {
								echo $this->Session->read('Add.employee_type');
								echo '<input type="hidden" name="employee_type" value="'.$this->Session->read('Add.employee_type').'">';
							} else if ($this->Session->check('Edit.employee_type')) {
								echo $this->Session->read('Edit.employee_type');
								echo '<input type="hidden" name="employee_type" value="'.$this->Session->read('Edit.employee_type').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Skill
							<?php 
								if ($this->Session->check('Add.skill') || $this->Session->check('Edit.skill')) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?> 
						</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.skill')) {
								echo $this->Session->read('Add.skill');
								echo '<input type="hidden" name="skill" value="'.$this->Session->read('Add.skill').'">';
							} else if ($this->Session->check('Edit.skill')) {
								echo $this->Session->read('Edit.skill');
								echo '<input type="hidden" name="skill" value="'.$this->Session->read('Edit.skill').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Literacy 
							<?php 
								if ($this->Session->check('Add.literacy') || $this->Session->check('Edit.literacy')) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?> 
						</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.literacy')) {
								echo $this->Session->read('Add.literacy');
								echo '<input type="hidden" name="literacy" value="'.$this->Session->read('Add.literacy').'">';
							} else if ($this->Session->check('Edit.literacy')) {
								echo $this->Session->read('Edit.literacy');
								echo '<input type="hidden" name="literacy" value="'.$this->Session->read('Edit.literacy').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">Contract Type[&#10004;]:</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.contract_type')) {
								echo $this->Session->read('Add.contract_type');
								echo '<input type="hidden" name="contract_type" value="'.$this->Session->read('Add.contract_type').'">';
							} else if ($this->Session->check('Edit.contract_type')) {
								echo $this->Session->read('Edit.contract_type');
								echo '<input type="hidden" name="contract_type" value="'.$this->Session->read('Edit.contract_type').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Work address
							<?php 
								if ($this->Session->check('Add.work_address') || $this->Session->check('Edit.work_address')) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?> 
						</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.work_address')) {
								echo $this->Session->read('Add.work_address');
								echo '<input type="hidden" name="work_address" value="'.$this->Session->read('Add.work_address').'">';
							} else if ($this->Session->check('Edit.work_address')) {
								echo $this->Session->read('Edit.work_address');
								echo '<input type="hidden" name="work_address" value="'.$this->Session->read('Edit.work_address').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">Employee status [&#10004;]:</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.status')) {
								echo $this->Session->read('Add.status');
								echo '<input type="hidden" name="status" value="'.$this->Session->read('Add.status').'">';
							} else if ($this->Session->check('Edit.status')) {
								echo $this->Session->read('Edit.status');
								echo '<input type="hidden" name="status" value="'.$this->Session->read('Edit.status').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Address
							<?php 
								if ($this->Session->check('Add.address') || $this->Session->check('Edit.address')) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?> 
						</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.address')) {
								echo $this->Session->read('Add.address');
								echo '<input type="hidden" name="address" value="'.$this->Session->read('Add.address').'">';
							} else if ($this->Session->check('Edit.address')) {
								echo $this->Session->read('Edit.address');
								echo '<input type="hidden" name="address" value="'.$this->Session->read('Edit.address').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Bank account
							<?php 
								if ($this->Session->check('Add.bank_account') || $this->Session->check('Edit.bank_account')) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?> 
						</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.bank_account')) {
								echo $this->Session->read('Add.bank_account');
								echo '<input type="hidden" name="bank_account" value="'.$this->Session->read('Add.bank_account').'">';
							} else if ($this->Session->check('Edit.bank_account')) {
								echo $this->Session->read('Edit.bank_account');
								echo '<input type="hidden" name="bank_account" value="'.$this->Session->read('Edit.bank_account').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							ID number
							<?php 
								if ($this->Session->check('Add.id_number') || $this->Session->check('Edit.id_number')) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?> 
						</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.id_number')) {
								echo $this->Session->read('Add.id_number');
								echo '<input type="hidden" name="id_number" value="'.$this->Session->read('Add.id_number').'">';
							} else if ($this->Session->check('Edit.id_number')) {
								echo $this->Session->read('Edit.id_number');
								echo '<input type="hidden" name="id_number" value="'.$this->Session->read('Edit.id_number').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Description
							<?php 
								if ($this->Session->check('Add.description') || $this->Session->check('Edit.description')) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?> 
						</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('Add.description')) {
								echo $this->Session->read('Add.description');
								echo '<input type="hidden" name="description" value="'.$this->Session->read('Add.description').'">';
							} else if ($this->Session->check('Edit.description')) {
								echo $this->Session->read('Edit.description');
								echo '<input type="hidden" name="description" value="'.$this->Session->read('Edit.description').'">';
							}
							?>
						</div>
					</div>

					<div class="col-lg-12 text-center">
						<?php if ($this->Session->check('Add')):?>
							<a href="<?php echo $this->Html->url(array('controller' => 'employees', 'action' => 'add'));?>" class="btn btn-primary btn-lg", style="margin-right:10px;">
								<i class="fa fa-caret-square-o-left" aria-hidden="true"></i> 
								Back
							</a>

							<button type="submit" class="btn btn-danger btn-lg" name="confirm_add">
								<i class="fa fa-check-square-o"></i>
								Confirm
							</button>
						<?php endif;?>

						<?php if ($this->Session->check('Edit')):?>
							<a href="<?php echo $this->Html->url(array('controller' => 'employees', 'action' => 'edit', $this->Session->read('Edit.id')));?>" class="btn btn-primary btn-lg", style="margin-right:10px;">
								<i class="fa fa-caret-square-o-left" aria-hidden="true"></i> 
								Back
							</a>

							<button type="submit" class="btn btn-danger btn-lg" name="confirm_edit">
								<i class="fa fa-check-square-o"></i>
								Confirm
							</button>
						<?php endif;?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
