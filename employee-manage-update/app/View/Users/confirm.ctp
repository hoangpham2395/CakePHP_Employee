<?php echo $this->element('main-top');?>
<div class="main-content">
	<?php echo $this->element('sidebar');?>
	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Employees manage</a></li>
			<li class="breadcrumb-item active">
				<span style="color:red;">
					<?php 
					if ($this->Session->check('Add')) {
						echo 'Confirm add employee';
					} else if ($this->Session->check('Edit')) {
						echo 'Confirm edit employee';
					}
					?>
				</span>
			</li>
		</ol>
		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">
					<?php 
					if ($this->Session->check('Add')) {
						echo 'Confirm add employee <span style="color:red;">'.$this->Session->read('Add.fullname').'</span>';
					} else if ($this->Session->check('Edit')) {
						echo 'Confirm edit employee <span style="color:red;">'.$this->Session->read('Edit.fullname').'</span>';
					}
					?>
				</span>
			</div>
			<div class="panel-body">
				<form action method="post" enctype="multipart/form-data">

					<?php
					if ($this->Session->check('Edit')) {
						?>
						<input type="hidden" name="id" value='<?php echo $this->Session->read("Edit.id");?>'>
						<?php
					}
					?>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Username [&#10004;]:</label>
						<span class="col-lg-9">
							<?php
							if ($this->Session->check('Add.username')) {
								$username = $this->Session->read('Add.username');
							} else if ($this->Session->check('Edit.username')) {
								$username = $this->Session->read('Edit.username');
							}
							echo $username;
							?>
						</span>
						<input type="hidden" name="username" value='<?php echo $username;?>'>
					</div>

					<!-- <div class="col-lg-12 form-group">
						<label class="col-lg-3">Password [&#10004;]:</label>
						<span class="col-lg-9"> -->
							<?php
							// if ($this->Session->check('Add.password')) {
							// 	$password = $this->Session->read('Add.password');
							// } else if ($this->Session->check('Edit.password')) {
							// 	$password = $this->Session->read('Edit.password');
							// }
							// for ($i = 0; $i < strlen($password); $i ++) {
							// 		echo '*';
							// 	}
							?>
						<!-- </span>
						<input type="hidden" name="password" value='<?php echo $password;?>'>
					</div> -->
					<?php
					if ($this->Session->check('Add.password')) {
						?>
						<div class="col-lg-12 form-group">
							<label class="col-lg-3">Password [&#10004;]:</label>
							<span class="col-lg-9">
								<?php
								for ($i = 0; $i < strlen($this->Session->read('Add.password')); $i ++) {
									echo '*';
								}
								?>
							</span>
							<input type="hidden" name="password" value='<?php echo $password;?>'>
						</div>
						<?php
					}
					?>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Fullname [&#10004;]:</label>
						<span class="col-lg-9">
							<?php
							if ($this->Session->check('Add.fullname')) {
								$fullname = $this->Session->read('Add.fullname');
							} else if ($this->Session->check('Edit.fullname')) {
								$fullname = $this->Session->read('Edit.fullname');
							}
							echo $fullname;
							?>
						</span>
						<input type="hidden" name="fullname" value='<?php echo $fullname;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Gender [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if (isset($user['User']['gender'])) {
								
							}
							?>
							<?php
							if ($this->Session->check('Add.gender')) {
								$gender = $this->Session->read('Add.gender');
							} else if ($this->Session->check('Edit.gender')) {
								$gender = $this->Session->read('Edit.gender');
							}
							if ($gender == 2) {
									echo "Male";
								} else if ($gender == 1) {
									echo "Female";
								} else if ($gender == 3){
									echo 'Difference';
								}
							?>
						</span>
						<input type="hidden" name="gender" value='<?php echo $gender;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if ($this->Session->check('Add.birthday')) {
							$birthday = $this->Session->read('Add.birthday');
						} else if ($this->Session->check('Edit.birthday')) {
							$birthday = $this->Session->read('Edit.birthday');
						}
						if ($birthday != "0000-00-00") {
							?>
							<label class="col-lg-3">Date of birth [&#10004;]:</label>
							<span class="col-lg-9"><?php echo $birthday;?></span>
							<?php
						} else {
							?>
							<label class="col-lg-3">Date of birth [&#10008;]:</label>
							<span class="col-lg-9"></span>
							<?php
						}
						?>
						<input type="hidden" name="birthday" value='<?php echo $birthday;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if ($this->Session->check('Add.tel')) {
							$tel = $this->Session->read('Add.tel');
						} else if ($this->Session->check('Edit.tel')) {
							$tel = $this->Session->read('Edit.tel');
						}
						if (!empty($tel)) {
							?>
							<label class="col-lg-3">Telephone number [&#10004;]:</label>
							<span class="col-lg-9"><?php echo $tel;?></span>
							<?php
						} else {
							?>
							<label class="col-lg-3">Telephone number [&#10008;]:</label>
							<span class="col-lg-9"></span>
							<?php
						}
						?>
						<input type="hidden" name="tel" value='<?php echo $tel;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Email company [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.email_company')) {
								$email_company = $this->Session->read('Add.email_company');
							} else if ($this->Session->check('Edit.email_company')) {
								$email_company = $this->Session->read('Edit.email_company');
							}
							echo $email_company;
							?>
						</span>
						<input type="hidden" name="email_company" value='<?php echo $email_company;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Email personal [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.email_personal')) {
								$email_personal = $this->Session->read('Add.email_personal');
							} else if ($this->Session->check('Edit.email_personal')) {
								$email_personal = $this->Session->read('Edit.email_personal');
							}
							echo $email_personal;
							?>
						</span>
						<input type="hidden" name="email_personal" value='<?php echo $email_personal;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if ($this->Session->check('Add.skype')) {
							$skype = $this->Session->read('Add.skype');
						} else if ($this->Session->check('Edit.skype')) {
							$skype = $this->Session->read('Edit.skype');
						}
						if (!empty($skype)) {
							?>
							<label class="col-lg-3">Account skype [&#10004;]:</label>
							<span class="col-lg-9"><?php echo $skype;?></span>
							<?php
						} else {
							?>
							<label class="col-lg-3">Account skype [&#10008;]:</label>
							<span class="col-lg-9"></span>
							<?php
						}
						?>
						<input type="hidden" name="skype" value='<?php echo $skype;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if ($this->Session->check('Add.chatwork')) {
							$chatwork = $this->Session->read('Add.chatwork');
						} else if ($this->Session->check('Edit.chatwork')) {
							$chatwork = $this->Session->read('Edit.chatwork');
						}
						if (!empty($chatwork)) {
							?>
							<label class="col-lg-3">Account chatwork [&#10004;]:</label>
							<span class="col-lg-9"><?php echo $chatwork;?></span>
							<?php
						} else {
							?>
							<label class="col-lg-3">Account chatwork [&#10008;]:</label>
							<span class="col-lg-9"></span>
							<?php
						}
						?>
						<input type="hidden" name="chatwork" value='<?php echo $chatwork;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Date started at the company [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.join_datetime')) {
								$join_datetime = $this->Session->read('Add.join_datetime');
							} else if ($this->Session->check('Edit.join_datetime')) {
								$join_datetime = $this->Session->read('Edit.join_datetime');
							}
							echo $join_datetime;
							?>
						</span>
						<input type="hidden" name="join_datetime" value='<?php echo $join_datetime;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if ($this->Session->check('Add.exit_datetime')) {
							$exit_datetime = $this->Session->read('Add.exit_datetime');
						} else if ($this->Session->check('Edit.exit_datetime')) {
							$exit_datetime = $this->Session->read('Edit.exit_datetime');
						}
						if ($exit_datetime != "0000-00-00" && $exit_datetime != "1970-01-01") {
							?>
							<label class="col-lg-3">Date exited at the company [&#10004;]:</label>
							<span class="col-lg-9"><?php echo $exit_datetime;?></span>
							<?php
						} else {
							?>
							<label class="col-lg-3">Date exited at the company [&#10008;]:</label>
							<span class="col-lg-9"></span>
							<?php
						}
						?>
						<input type="hidden" name="exit_datetime" value='<?php echo $exit_datetime;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Department [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.department')) {
								$department = $this->Session->read('Add.department');
							} else if ($this->Session->check('Edit.department')) {
								$department = $this->Session->read('Edit.department');
							}
							echo $department;
							?>
						</span>
						<input type="hidden" name="department" value='<?php echo $department;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Position [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.position')) {
								$position = $this->Session->read('Add.position');
							} else if ($this->Session->check('Edit.position')) {
								$position = $this->Session->read('Edit.position');
							}
							echo $position;
							?>
						</span>
						<input type="hidden" name="position" value='<?php echo $position;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Employee type [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.user_type')) {
								$user_type = $this->Session->read('Add.user_type');
							} else if ($this->Session->check('Edit.user_type')) {
								$user_type = $this->Session->read('Edit.user_type');
							}
							echo $user_type;
							?>
						</span>
						<input type="hidden" name="user_type" value='<?php echo $user_type;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Employee status [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.status')) {
								$status = $this->Session->read('Add.status');
							} else if ($this->Session->check('Edit.status')) {
								$status = $this->Session->read('Edit.status');
							}
							echo $status;
							?>
						</span>
						<input type="hidden" name="status" value='<?php echo $status;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Contract type [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.contract_type')) {
								$contract_type = $this->Session->read('Add.contract_type');
							} else if ($this->Session->check('Edit.contract_type')) {
								$contract_type = $this->Session->read('Edit.contract_type');
							}
							echo $contract_type;
							?>
						</span>
						<input type="hidden" name="contract_type" value='<?php echo $contract_type;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Work address [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if ($this->Session->check('Add.work_address')) {
								$work_address = $this->Session->read('Add.work_address');
							} else if ($this->Session->check('Edit.work_address')) {
								$work_address = $this->Session->read('Edit.work_address');
							}
							echo $work_address;
							?>
						</span>
						<input type="hidden" name="work_address" value='<?php echo $work_address;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if ($this->Session->check('Add.skill')) {
							$skill = $this->Session->read('Add.skill');
						} else if ($this->Session->check('Edit.skill')) {
							$skill = $this->Session->read('Edit.skill');
						}
						if (!empty($skill)) {
							?>
							<label class="col-lg-3">Skill [&#10004;]:</label>
							<span class="col-lg-9"><?php echo $skill;?></span>
							<?php
						} else {
							?>
							<label class="col-lg-3">Skill [&#10008;]:</label>
							<span class="col-lg-9"></span>
							<?php
						}
						?>
						<input type="hidden" name="skill" value='<?php echo $skill;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if ($this->Session->check('Add.literacy')) {
							$literacy = $this->Session->read('Add.literacy');
						} else if ($this->Session->check('Edit.literacy')) {
							$literacy = $this->Session->read('Edit.literacy');
						}
						if (!empty($literacy)) {
							?>
							<label class="col-lg-3">Literacy [&#10004;]:</label>
							<span class="col-lg-9"><?php echo $literacy;?></span>
							<?php
						} else {
							?>
							<label class="col-lg-3">Literacy [&#10008;]:</label>
							<span class="col-lg-9"></span>
							<?php
						}
						?>
						<input type="hidden" name="literacy" value='<?php echo $literacy;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if ($this->Session->check('Add.address')) {
							$address = $this->Session->read('Add.address');
						} else if ($this->Session->check('Edit.address')) {
							$address = $this->Session->read('Edit.address');
						}
						if (!empty($address)) {
							?>
							<label class="col-lg-3">Address [&#10004;]:</label>
							<span class="col-lg-9"><?php echo $address;?></span>
							<?php
						} else {
							?>
							<label class="col-lg-3">Address [&#10008;]:</label>
							<span class="col-lg-9"></span>
							<?php
						}
						?>
						<input type="hidden" name="address" value='<?php echo $address;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if ($this->Session->check('Add.bank_account')) {
							$bank_account = $this->Session->read('Add.bank_account');
						} else if ($this->Session->check('Edit.bank_account')) {
							$bank_account = $this->Session->read('Edit.bank_account');
						}
						if (!empty($bank_account)) {
							?>
							<label class="col-lg-3">Bank account [&#10004;]:</label>
							<span class="col-lg-9"><?php echo $bank_account;?></span>
							<?php
						} else {
							?>
							<label class="col-lg-3">Bank account [&#10008;]:</label>
							<span class="col-lg-9"></span>
							<?php
						}
						?>
						<input type="hidden" name="bank_account" value='<?php echo $bank_account;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if ($this->Session->check('Add.id_number')) {
							$id_number = $this->Session->read('Add.id_number');
						} else if ($this->Session->check('Edit.id_number')) {
							$id_number = $this->Session->read('Edit.id_number');
						}
						if (!empty($id_number)) {
							?>
							<label class="col-lg-3">ID number [&#10004;]:</label>
							<span class="col-lg-9"><?php echo $id_number;?></span>
							<?php
						} else {
							?>
							<label class="col-lg-3">ID number [&#10008;]:</label>
							<span class="col-lg-9"></span>
							<?php
						}
						?>
						<input type="hidden" name="id_number" value='<?php echo $id_number;?>'>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if ($this->Session->check('Add.description')) {
							$description = $this->Session->read('Add.description');
						} else if ($this->Session->check('Edit.description')) {
							$description = $this->Session->read('Edit.description');
						}
						if (!empty($description)) {
							?>
							<label class="col-lg-3">Description [&#10004;]:</label>
							<span class="col-lg-9"><?php echo $description;?></span>
							<?php
						} else {
							?>
							<label class="col-lg-3">Description [&#10008;]:</label>
							<span class="col-lg-9"></span>
							<?php
						}
						?>
						<input type="hidden" name="description" value='<?php echo $description;?>'>
					</div>

					<?php 
					if( date_default_timezone_set('Asia/Ho_Chi_Minh')) $datetime = date('Y-m-d H:i:s'); 
					/*Để lấy giờ theo khu vực thì sử dụng hàm date_default_timezone_set('Tên timezone') */
					if ($this->Session->check('Add')) {
						?>
						<input type="hidden" name="created" value='<?php echo $datetime;?>'>
						<?php
					}
					?>
					<input type="hidden" name="modified" value='<?php echo $datetime;?>'>

					<div class="col-lg-12 text-center">
						<?php
						if ($this->Session->check('Add')) {
							?>
							<a href='<?php echo $this->Html->url(array("controller" => "users", "action" => "add"));?>' class="btn btn-primary btn-lg" style="margin-right:10px;">
								<i class="fa fa-caret-square-o-left"></i>
								Back
							</a>
							<button type="submit" class="btn btn-danger btn-lg" name="confirm_add">
								<i class="fa fa-plus-circle"></i>
								Add
							</button>
							<?php 
						} else if ($this->Session->check('Edit')) {
							?>
							<a href='<?php echo $this->Html->url(array("controller" => "users", "action" => "edit", $this->Session->read("Edit.id")));?>' class="btn btn-primary btn-lg" style="margin-right:10px;">
								<i class="fa fa-caret-square-o-left"></i>
								Back
							</a>
							<button type="submit" class="btn btn-danger btn-lg" name="confirm_edit">
								<i class="fa fa-pencil-square-o"></i>
								Edit
							</button>
							<?php 
						}
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>