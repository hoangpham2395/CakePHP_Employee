<?php echo $this->element('main-top');?>

<div class="main-content">
	<?php echo $this->element('sidebar');?>

	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-group" aria-hidden="true"></i> Member of project</a></li>
			<li class="breadcrumb-item active"><span style="color: red;">Add project member</span></li>
		</ol>

		<div class="panel-default"> 
			<div class="panel-heading">
				<span style="color: #337ab7;">
					Confirm project member
				</span>
			</div>

			<div class="panel-body">
				<?php echo $this->Form->create('EmployeeProject', array('url' => array('controller' => 'employeeprojects', 'action' => 'confirm'), array('enctype' => 'multipart-dataform', 'id' => 'confirmAddProjectMember')));?>

					<?php
					if (isset($member['EmployeeProject']['id'])) {
						?>
						<input type="hidden" name="id" value="<?php echo $member['EmployeeProject']['id']; ?>">
						<?php
					}
					?>

					<div class="col-lg-12" style="margin-bottom: 15px;">
						<label class="col-lg-3">Project name [&#10004;]:</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('addProMem.project_id')) {
								echo $projects['Project']['name'];
								?>
								<input type="hidden" name="project_id" value="<?php echo $this->Session->read('addProMem.project_id');?>">
								<?php
							} else if ($this->Session->check('editProMem.project_id')) {
								echo $member['Project']['name'];
								?>
								<input type="hidden" name="project_id" value="<?php echo $this->Session->read('editProMem.project_id');?>">
								<?php
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom: 15px;">
						<label class="col-lg-3">Employee name [&#10004;]:</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('addProMem.employee_id')) {
								echo $employees['Employee']['fullname'];
								?>
								<input type="hidden" name="employee_id" value="<?php echo $this->Session->read('addProMem.employee_id');?>">
								<?php
							} else if ($this->Session->check('editProMem.employee_id')) {
								echo $member['Employee']['fullname'];
								?>
								<input type="hidden" name="employee_id" value="<?php echo $this->Session->read('editProMem.employee_id');?>">
								<?php
							}
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom: 15px;">
						<label class="col-lg-3">Join status [&#10004;]:</label>
						<div class="col-lg-9">
							<?php
							if ($this->Session->check('addProMem.join_status')) {
								echo $this->Session->read('addProMem.join_status');
								?>
								<input type="hidden" name="join_status" value="<?php echo $this->Session->read('addProMem.join_status');?>">
								<?php
							} else if ($this->Session->check('editProMem.join_status')) {
								echo $this->Session->read('editProMem.join_status');
								?>
								<input type="hidden" name="join_status" value="<?php echo $this->Session->read('editProMem.join_status');?>">
								<?php
							}
							?>
						</div>
					</div>

					<div class="col-lg-12 text-center">
						<?php
						if ($this->Session->check('addProMem')) {
							?>
							<a href="<?php echo $this->Html->url(array('controller' => 'employeeprojects', 'action' => 'add'));?>" class="btn btn-primary btn-lg" style="margin-right:10px;">
								<i class="fa fa-caret-square-o-left" aria-hidden="true"></i> 
								Back
							</a>
							<button type="submit" class="btn btn-danger btn-lg" style="margin-left: 10px;" name="addProMem">
								<i class="fa fa-check-square-o"></i>
								Confirm
							</button>
							<?php
						} else if ($this->Session->check('editProMem')) {
							?>
							<a href="<?php echo $this->Html->url(array('controller' => 'employeeprojects', 'action' => 'edit', $this->Session->read('editProMem.project_id')));?>" class="btn btn-primary btn-lg" style="margin-right:10px;">
								<i class="fa fa-caret-square-o-left" aria-hidden="true"></i> 
								Back
							</a>
							<button type="submit" class="btn btn-danger btn-lg" style="margin-left: 10px;" name="editProMem">
								<i class="fa fa-check-square-o"></i>
								Confirm
							</button>
							<?php
						}
						?>
					</div>

				<?php echo $this->Form->end;?>
			</div>
		</div>
	</div>
</div>