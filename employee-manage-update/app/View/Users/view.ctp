<?php echo $this->element('main-top');?>
<div class="main-content">
	<?php echo $this->element('sidebar');?>
	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href=""><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href=""><i class="fa fa-user" aria-hidden="true"></i> Employees manage</a></li>
			<li class="breadcrumb-item active"><span style="color:red;">Detail employee</span></li>
		</ol>
		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">
					Detail employee 
					<span style="color:red;">
					<?php if (isset($user['User']['fullname'])) echo $user['User']['fullname']; ?>
					</span>
				</span>
			</div>
			<div class="panel-body">
				<form action method="post" enctype="multipart/form-data">
					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Username [&#10004;]:</label>
						<span class="col-lg-9">
							<?php if (isset($user['User']['username'])) echo $user['User']['username']; ?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Password [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if (isset($user['User']['password'])) {
								for ($i = 0; $i < strlen($user['User']['password']); $i ++) {
									echo '*';
								}
							}
							?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Fullname [&#10004;]:</label>
						<span class="col-lg-9">
							<?php if (isset($user['User']['fullname'])) echo $user['User']['fullname']; ?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Gender [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if (isset($user['User']['gender'])) {
								if ($user['User']['gender'] == 2) {
									echo "Male";
								} else if ($user['User']['gender'] == 1) {
									echo "Female";
								} else {
									echo 'Difference';
								}
							}
							?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if (isset($user['User']['birthday'])) {
							if ($user['User']['birthday'] != '0000-00-00' && $user['User']['birthday'] != '1970-01-01') {
								?>
								<label class="col-lg-3">
									Date of birth [&#10004;]: 
								</label>
								<span class="col-lg-9"><?php echo date('m-d-Y', strtotime($user['User']['birthday']));?></span>
								<?php
							} else {
								?>
								<label class="col-lg-3">
									Date of birth [&#10008;]: 
								</label>
								<?php
							}
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if (isset($user['User']['tel'])) {
							?>
							<label class="col-lg-3">
								Telephone number
								<?php
								if (!empty($user['User']['tel'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
								?>
							</label>
							<span class="col-lg-9"><?php echo $user['User']['tel'];?></span>
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Email company [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if (isset($user['User']['email_company'])) echo $user['User']['email_company'];
							?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Email personal [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if (isset($user['User']['email_personal'])) echo $user['User']['email_personal'];
							?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if (isset($user['User']['skype'])) {
							?>
							<label class="col-lg-3">
								Account skype
								<?php
								if (!empty($user['User']['skype'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
								?>
							</label>
							<span class="col-lg-9"><?php echo $user['User']['skype'];?></span>
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if (isset($user['User']['chatwork'])) {
							?>
							<label class="col-lg-3">
								Account chatwork
								<?php
								if (!empty($user['User']['chatwork'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
								?>
							</label>
							<span class="col-lg-9"><?php echo $user['User']['chatwork'];?></span>
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Date started at the company [&#10004;]:</label>
						<span class="col-lg-9">
							<?php 
							if (isset($user['User']['join_datetime'])) echo date('m-d-Y', strtotime($user['User']['join_datetime']));
							?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if (isset($user['User']['exit_datetime'])) {
							if ($user['User']['exit_datetime'] != '0000-00-00' && $user['User']['exit_datetime'] != '1970-01-01') {
								?>
								<label class="col-lg-3">
									Date exited at the company [&#10004;]: 
								</label>
								<span class="col-lg-9"><?php echo date('m-d-Y', strtotime($user['User']['exit_datetime']));?></span>
								<?php
							} else {
								?>
								<label class="col-lg-3">
									Date exited at the company [&#10008;]: 
								</label>
								<?php
							}
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Department [&#10004;]:</label>
						<span class="col-lg-9">
							<?php if (isset($user['User']['department'])) echo $user['User']['department']; ?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Position [&#10004;]:</label>
						<span class="col-lg-9">
							<?php if (isset($user['User']['position'])) echo $user['User']['position']; ?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Employee type [&#10004;]:</label>
						<span class="col-lg-9">
							<?php if (isset($user['User']['user_type'])) echo $user['User']['user_type']; ?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Employee status [&#10004;]:</label>
						<span class="col-lg-9">
							<?php if (isset($user['User']['status'])) echo $user['User']['status']; ?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Contract type [&#10004;]:</label>
						<span class="col-lg-9">
							<?php if (isset($user['User']['contract_type'])) echo $user['User']['contract_type']; ?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Work address [&#10004;]:</label>
						<span class="col-lg-9">
							<?php if (isset($user['User']['work_address'])) echo $user['User']['work_address']; ?>
						</span>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if (isset($user['User']['skill'])) {
							?>
							<label class="col-lg-3">
								Skill
								<?php
								if (!empty($user['User']['skill'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
								?>
							</label>
							<span class="col-lg-9"><?php echo $user['User']['skill'];?></span>
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if (isset($user['User']['literacy'])) {
							?>
							<label class="col-lg-3">
								Literacy
								<?php
								if (!empty($user['User']['literacy'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
								?>
							</label>
							<span class="col-lg-9"><?php echo $user['User']['literacy'];?></span>
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if (isset($user['User']['address'])) {
							?>
							<label class="col-lg-3">
								Address
								<?php
								if (!empty($user['User']['address'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
								?>
							</label>
							<span class="col-lg-9"><?php echo $user['User']['address'];?></span>
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if (isset($user['User']['bank_account'])) {
							?>
							<label class="col-lg-3">
								Bank account
								<?php
								if (!empty($user['User']['bank_account'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
								?>
							</label>
							<span class="col-lg-9"><?php echo $user['User']['bank_account'];?></span>
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if (isset($user['User']['id_number'])) {
							?>
							<label class="col-lg-3">
								ID number
								<?php
								if (!empty($user['User']['id_number'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
								?>
							</label>
							<span class="col-lg-9"><?php echo $user['User']['id_number'];?></span>
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<?php
						if (isset($user['User']['description'])) {
							?>
							<label class="col-lg-3">
								Description
								<?php
								if (!empty($user['User']['description'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
								?>
							</label>
							<span class="col-lg-9"><?php echo $user['User']['description'];?></span>
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 text-center">
						<a href='<?php echo $this->Html->url(array("controller" => "users", "action" => "index"));?>' class="btn btn-primary btn-lg" style="margin-right:10px;">
							<i class="fa fa-caret-square-o-left"></i>
							Back
						</a>
						
						<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-pencil-square-o"></i>
							Edit
						</button>

						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header" style="background-color: #337ab7; color: #fff; text-align: left;">
										<button type="button" class="close" data-dismiss="modal">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title">Edit account <?php echo $user['User']['fullname'];?></h4>
									</div>
									<div class="modal-body text-left" style="height:100px;">
										<div class="col-lg-12" style="margin-bottom:5px;">
											<span class="col-lg-6">Update information</span>
											<a href='<?php echo $this->Html->url(array("controller"=>"users", "action"=>"edit", $user["User"]["id"]));?>' class="btn btn-success btn-sm" style="float:right;"><i class="fa fa-user"></i></a>
										</div>
										<div class="col-lg-12">
											<span class="col-lg-6">Change password</span>
											<a href='<?php echo $this->Html->url(array("controller"=>"users", "action"=>"change_password", $user["User"]["id"]));?>' class="btn btn-success btn-sm" style="float:right;"><i class="fa fa-lock"></i></a>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Canel</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>