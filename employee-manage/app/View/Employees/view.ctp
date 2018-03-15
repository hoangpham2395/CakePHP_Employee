<?php echo $this->element('main-top');?>

<div class="main-content">
	<?php echo $this->element('sidebar')?>

	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Employees manage</a></li>
			<li class="breadcrumb-item"><a href="#">Detail Employee</a></li>
			<li class"breadcrumb-item" style="color:#FF0000;"><?php echo $employee['Employee']['fullname'];?></li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Detail Employee</span>
				<span style="color:#FF0000;"><?php echo $employee['Employee']['fullname'];?></span>
			</div>
			<div class="panel-body">
				<form action method="post" enctype="multipart/form-data">
					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Username [&#10004;]:</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['username']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Password [&#10004;]:</label>
						<div class="col-lg-9">
							<?php 
								for ($i=0; $i < strlen($employee['Employee']['password']); $i++) { 
									echo '*';
								}
							?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Fullname [&#10004;]:</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['fullname']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Gender [&#10004;]:</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['gender']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">
							Telephone number
							<?php 
								if (!empty($employee['Employee']['tel'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?>
						</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['tel']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Email company [&#10004;]:</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['email_company']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Email personal [&#10004;]:</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['email_personal']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">
							Account skype
							<?php 
								if (!empty($employee['Employee']['skype'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?>
						</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['skype']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">
							Account chatwork
							<?php 
								if (!empty($employee['Employee']['chatwork'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?>
						</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['chatwork']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Date started at the company [&#10004;]:</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['join_datetime']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<?php 
						if (($employee['Employee']['exit_datetime']) != '0000-00-00') {
							?>
							<label class="col-lg-3">Date exited at the company: [&#10004;]</label>
							<div class="col-lg-9">
								<?php 
								echo $employee['Employee']['exit_datetime']; 
								?>
							</div> 
							<?php
						} else {
							?>
							<label class="col-lg-3">Date exited at the company: [&#10008;]</label>
							<?php
							echo '';
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">
							Date of Birth
							<?php 
								if (!empty($employee['Employee']['birthday'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?>
						</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['birthday']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Department [&#10004;]:</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['department']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Position [&#10004;]:</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['position']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Employee Type [&#10004;]:</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['employee_type']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">
							Skill
							<?php 
								if (!empty($employee['Employee']['skill'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?>
						</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['skill']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">
							Literacy
							<?php 
								if (!empty($employee['Employee']['literacy'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?>
						</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['literacy']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Contract Type[&#10004;]:</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['contract_type']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">
							Work address
							<?php 
								if (!empty($employee['Employee']['work_address'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?>
						</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['work_address']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">Employee status [&#10004;]:</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['status']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">
							Address
							<?php 
								if (!empty($employee['Employee']['address'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?>
						</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['address']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">
							Bank account
							<?php 
								if (!empty($employee['Employee']['bank_account'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?>
						</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['bank_account']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">
							ID number 
							<?php 
								if (!empty($employee['Employee']['id_number'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?>
						</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['id_number']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label class="col-lg-3">
							Description
							<?php 
								if (!empty($employee['Employee']['description'])) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?>
						</label>
						<div class="col-lg-9">
							<?php echo $employee['Employee']['description']; ?>
						</div>
					</div>

					<div class="col-lg-12 form-group text-center">
						<a href="<?php echo $this->Html->url(array('controller' => 'employees', 'action' => 'index'));?>" class="btn btn-primary btn-lg" style="margin-right:10px;">
							<i class="fa fa-caret-square-o-left"></i>
							Back
						</a>
						<a href="<?php echo $this->Html->url(array('controller' => 'employees', 'action' => 'edit', $employee['Employee']['id']));?>" class="btn btn-danger btn-lg" style="margin-right:10px;">
							<i class="fa fa-pencil-square-o"></i>
							Edit
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
