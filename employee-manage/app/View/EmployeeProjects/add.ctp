<?php echo $this->element('main-top');?>

<div class="main-content">
	<?php echo $this->element('sidebar');?>

	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-group" aria-hidden="true"></i> Member of project</a></li>
			<li class="breadcrumb-item active" style="color: red;">Add project member</li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">
					Add project member
				</span>
			</div>

			<div class="panel-body">
				<?php echo $this->Form->create('EmployeeProject', array('url' => array('controller' => 'employeeprojects', 'action' => 'add'), array('enctype' => 'multipart-dataform', 'id' => 'addProjectMember')));?>

					<div class="col-lg-6 form-group">
						<label>
							Project name:
							<span style="color:red;">[<i class="fa fa-asterisk" aria-hidden="true"></i>]</span>
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
									<option value="<?php echo $project['Project']['id'];?>"><?php echo $project['Project']['name'];?></option>
									<?php
								}
								?>
							</select>
						</div>
						<?php
						if (isset($err['project_id'])) {
							?>
							<span style="color:#FF0000;"> 
								<i class="fa fa-minus-circle" aria-hidden="true"></i>
								<?php echo $err['project_id'];?>
							</span> 
							<?php
						}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Employee name:
							<span style="color:red;">[<i class="fa fa-asterisk" aria-hidden="true"></i>]</span>
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
									<option value="<?php echo $employee['Employee']['id'];?>"><?php echo $employee['Employee']['fullname'];?></option>
									<?php
								}
								?>
							</select>
						</div>
						<?php
						if (isset($err['employee_id'])) {
							?>
							<span style="color:#FF0000;"> 
								<i class="fa fa-minus-circle" aria-hidden="true"></i>
								<?php echo $err['employee_id'];?>
							</span> 
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label>
							Join status:
							<span style="color:red;">[<i class="fa fa-asterisk" aria-hidden="true"></i>]</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
							<select class="form-control" name="join_status">
								<option value selected>--- Select status ---</option>
								<option value="Joining">Joining</option>
								<option value="Exited">Exited</option>
							</select>
						</div>
						<?php
						if (isset($err['join_status'])) {
							?>
							<span style="color:#FF0000;"> 
								<i class="fa fa-minus-circle" aria-hidden="true"></i>
								<?php echo $err['join_status'];?>
							</span> 
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 text-center">
						<button type="reset" class="btn btn-primary btn-lg" style="margin-right:10px;">
							<i class="fa fa-refresh" aria-hidden="true"></i>
							Reset
						</button>
						<button type="submit" class="btn btn-danger btn-lg">
							<i class="fa fa-plus-circle" aria-hidden="true"></i>
							Add
						</button>
					</div>

				<?php echo $this->Form->end;?>
			</div>
		</div>
	</div>
</div>