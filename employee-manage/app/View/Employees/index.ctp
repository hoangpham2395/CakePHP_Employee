<?php echo $this->element('main-top'); ?>
<div class="main-content">
	<?php echo $this->element('sidebar'); ?>

	<div class="main-content-body">
		<ol class="breadcrumb" style="background:#fff;">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
		  	<li class="breadcrumb-item"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Employees manage</a></li>
		  	<li class="breadcrumb-item active" style="color:#FF0000;">List of Employee</li>
		</ol>
		<!--Thông báo-->


		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Search Employee</span>
			</div>
			<div class="panel-body">
				<form action method="post" enctype="multipart/form-data">
					<div class="col-lg-6 form-group">
						<label>Fullname:</label>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="fullname" aria-describedby="sizing-addon3">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Email company:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="email_company">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Account Chatwork:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-xing-square" aria-hidden="true"></i>
							</span>
							<input type="text" class="form-control" name="chatwork">
						</div>
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
						<label>Gender:</label>
						<div class="input-group">
							<input type="radio" name="gender" value="male"> Male &nbsp;
							<input type="radio" name="gender" value="female"> Female
						</div>
					</div>
									
					<div class="col-lg-6 form-group">
						<label>Department:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-briefcase" aria-hidden="true"></i>
							</span>
							<select class="form-control" name="department">
								<option value selected>--- Select department ---</option>
								<option value="Construction">Construction</option>
								<option value="IT">IT</option>
							</select>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Position:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-star-o" aria-hidden="true"></i></span>
							<select class="form-control" name="position">
								<option value selected>--- Select position ---</option>
								<option value="BSE">BSE</option> <!--Kỹ sư cầu nối-->
								<option value="Director">Director</option> <!--giám đốc-->
								<option value="Employee">Employee</option>
								<option value="Leader">Leader</option>
								<option value="Tester">Tester</option>
							</select>
						</div>
					</div>
									
					<div class="col-lg-6 form-group">
						<label>Employee Types:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-group" aria-hidden="true"></i></span>
							<select class="form-control" name="employee_type">
								<option value selected>--- Select employee types ---</option>
								<option value="Official">Official employee</option> <!--Nhân viên chính thức-->
								<option value="Intership">Intership</option> <!--Thực tập-->
								<option value="Contract">Contract</option> <!--Hợp đồng-->
								<option value="Probationary">Probationary</option> <!--Tập sự-->
								<option value="Difference">Difference</option>
							</select>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Employee Status:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-bullseye" aria-hidden="true"></i></span> <!--Trạng thái làm việc của nhân viên-->
							<select class="form-control" name="status">
								<option value selected>--- Select employee status ---</option>
								<option value="Joining">Joining</option>
								<option value="Exited">Exited</option>
								<option value="Absent">Absent</option> <!--Vắng mặt-->
							</select>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Day started at the company:</label>
						<div class="input-group date" data-provide="datepicker">
						    <input type="text" class="form-control"  name="join_datetime">
						    <div class="input-group-btn">
						        <span class="btn btn-danger">
						        	<i class="fa fa-calendar" aria-hidden="true"></i>
						        </span>
						    </div>
						</div>
					
					</div>

					<div class="col-lg-12 form-group text-center">
						<button type="reset" class="btn btn-primary" name="reset" style="margin-right:10px;">
							<i class="fa fa-refresh" aria-hidden="true"></i>
							Reset
						</button>
						<button type="submit" class="btn btn-danger" name="search">
							<i class="fa fa-search" aria-hidden="true"></i>
							Search
						</button>
					</div>
				</form>
			</div>
		</div>

		<!-- Thông báo -->
		<?php
			if (!empty($notice)) {
				echo '<div class="alert alert-success" role="alert" style="margin: 0px 0px 10px 0px;">'; 
					if (isset($notice['delete'])) echo '<li>'.$notice['delete'].'</li>';
					if (isset($notice['add'])) echo '<li>'.$notice['add'].'</li>';
					if (isset($notice['edit'])) echo '<li>'.$notice['edit'].'</li>';
				echo '</div>';
			}
		?>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">List of Employee</span>
			</div>
			<div class="panel-body">
				<a href='<?php echo $this->Html->url(array('controller' => 'employees', 'action' => 'index'))?>' class="btn btn-default" style="margin-bottom: 10px;">
					<i class="fa fa-refresh" aria-hidden="true"></i>
					Reload
				</a>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%; font-size:11px;">
						<thead>
							<th class="text-center"><?php echo $this->Paginator->sort('No.'); ?></th>
							<th><?php echo $this->Paginator->sort('Fullname'); ?></th>
							<th><?php echo $this->Paginator->sort('Email Company'); ?></th>
							<th><?php echo $this->Paginator->sort('ChatWork'); ?></th>
							<th><?php echo $this->Paginator->sort('Gender'); ?></th>
							<th><?php echo $this->Paginator->sort('Date of Birth'); ?></th>
							<th><?php echo $this->Paginator->sort('Department'); ?></th>
							<th><?php echo $this->Paginator->sort('Position'); ?></th>
							<th><?php echo $this->Paginator->sort('Type'); ?></th>
							<th><?php echo $this->Paginator->sort('Status'); ?></th>
							<th><?php echo $this->Paginator->sort('Join datetime'); ?></th>
							<th class="text-center"><?php echo $this->Paginator->sort('Detail'); ?></th>
							<th class="text-center"><?php echo $this->Paginator->sort('Delete'); ?></th>
						</thead>
						
						<tbody>
							<?php $no = 1; foreach ($employees as $employee): ?>
							<tr>
								<td class="text-center"><?php echo $no; $no++; ?></td>
								<td><?php echo $employee['Employee']['fullname']; ?></td>
								<td><?php echo $employee['Employee']['email_company']; ?></td>
								<td><?php echo $employee['Employee']['chatwork']; ?></td>
								<td class="text-center"><?php echo $employee['Employee']['gender']; ?></td>
								<td class="text-center"><?php echo $employee['Employee']['birthday']; ?></td>
								<td><?php echo $employee['Employee']['department']; ?></td>
								<td><?php echo $employee['Employee']['position']; ?></td>
								<td><?php echo $employee['Employee']['employee_type']; ?></td>
								<td><?php echo $employee['Employee']['status']; ?></td>
								<td class="text-center"><?php echo $employee['Employee']['join_datetime']; ?></td>
								<td class="text-center">
									<a href="<?php echo $this->Html->url(array('controller' => 'employees', 'action' => 'view', $employee['Employee']['id']));?>" class="btn btn-primary"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
								</td>
								<td class="text-center">
									<button class="btn btn-danger active" type="button" data-toggle="modal" data-target="#myModal-<?php echo $employee['Employee']['id'];?>">
										<i class="fa fa-trash-o" aria-hidden="true"></i>
									</button>
									<!-- Modal -->
									<div class="modal fade" id="myModal-<?php echo $employee['Employee']['id'];?>" role="dialog">
									   	<div class="modal-dialog">
									    <!-- Modal content-->
										    <div class="modal-content">
										        <div class="modal-header" style="background-color:#337ab7; color:#fff;">
										          	<button type="button" class="close" data-dismiss="modal">&times;</button>
										          	<h4 class="modal-title">Confirm delete account employee</h4>
										        </div>
										        <div class="modal-body">
										         	<p style="font-size: 14px;">Are you sure delete this account employee?</p>
										        </div>
										        <div class="modal-footer">
										        	<?php echo $this->Form->create('Employee', array('url' => array('controller' => 'employees', 'action' => 'delete', $employee['Employee']['id'])));?> 
										          		<button type="button" class="btn btn-danger" data-dismiss="modal">Canel</button>
										          		<button type="submit" class="btn btn-primary" name="delete">OK</button>
										          	<?php echo $this->Form->end();?>
										        </div>
										      </div>
									    </div>
									</div>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="pagination"> 
					<span style="color: #337ab7;">
						<?php 
						echo $this->Paginator->counter(array(
							'format'=> __('Page {:page} of {:pages}, showing {:current} records out of {:count} total'))
						); 
						?>
					</span> <br><br>
					<?php echo $this->Paginator->prev(__('&laquo; Previous'), array('escape' => false), null, array('class' => 'prev disabled', 'escape' => false)); ?>
					<?php echo $this->Paginator->numbers(array('sperator'=>'')); ?>
					<?php echo $this->Paginator->next(__('Next &raquo;'), array('escape' => false), null, array('class' => 'next disabled','escape' => false)); ?> 
					<!-- <ul class="pagination pagination-right">
						<?php
						echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
						echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
						echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
						?>
					</ul> -->
				</div>
			</div>
		</div>
	</div>
</div>

