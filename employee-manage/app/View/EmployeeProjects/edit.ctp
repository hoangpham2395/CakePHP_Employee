<?php echo $this->element('main-top');?>

<div class="main-content">
	<?php echo $this->element('sidebar');?>

	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-group" aria-hidden="true"></i> Member of project</a></li>
			<li class="breadcrumb-item active"><span style="color: red;">Edit information project member</span></li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">
					Edit information member of project 
				</span>
				<span style="color: red;">
					<?php echo $members[0]['Project']['name'];?>
				</span>
			</div>

			<div class="panel-body">
				<?php echo $this->Form->create('EmployeeProject', array('url' => array('controller' => 'employeeprojects', 'action' => 'edit', $members[0]['EmployeeProject']['project_id']), array('enctype' => 'multipart-dataform', 'id' => 'editProjectMember')))?>

				<input type="hidden" name="project_id" value="<?php  echo $members[0]['EmployeeProject']['project_id'];?>">

				<div class="col-lg-6 form-group">
					<label>Employee name:</label>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
						<select class="form-control" name="employee_id">
							<option value selected>--- Select employee ---</option>
							<?php
							foreach ($members as $member) {
								?>
								<!-- <input type="hidden" name="id" value="<?php echo $member['EmployeeProject']['id'];?>"> -->
								<option value="<?php echo $member['EmployeeProject']['employee_id'];?>">
									<?php echo $member['Employee']['fullname'];?>
								</option>
								<?php
							}
							?>
						</select>
					</div>
					<?php
					if (isset($err['employee'])) {
						?>
						<span style="color:#FF0000;"> 
							<i class="fa fa-minus-circle" aria-hidden="true"></i>
							<?php echo $err['employee'];?>
						</span> 
						<?php
					}
					?>
				</div>

				<div class="col-lg-6 form-group">
					<label>Join status:</label>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-bullseye" aria-hidden="true"></i>
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
					<button type="reset" class="btn btn-primary btn-lg" name="reset" style="margin-right:10px;">
						Reset
					</button>

					<button type="submit" class="btn btn-danger btn-lg" name="confirmEditMemberProject">
						Confirm
					</button>
				</div>

				<?php echo $this->Form->end;?>
			</div>
		</div>
	</div>
</div>