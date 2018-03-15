<?php echo $this->element('main-top');?>
<div class="main-content">
	<?php echo $this->element('sidebar');?>

	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href=""><i class="fa fa-home" aria-hidden="true" style="color: "></i> Home</a>
			</li>
			<li class="breadcrumb-item">
				<a href=""><i class="fa fa-user" aria-hidden="true"></i> Employees manage</a>
			</li>
			<li class="breadcrumb-item active">
				<span style="color:red;">List of employees</span>
			</li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Search Employee</span>
			</div>
			<div class="panel-body">
				<form action method="post" enctype="multipart/form-data">
					<div class="col-lg-6 form-group">
						<label>Fullname:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-pencil-square-o"></i>
							</span>
							<input type="text" class="form-control" name="fullname">
						</div>
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
						<label>Gender:</label>
						<div class="input-group">
							<input type="radio" name="gender" value="2"> Male &nbsp;
							<input type="radio" name="gender" value="1"> Female &nbsp;
							<input type="radio" name="gender" value="3"> Difference
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Email company:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-envelope-o"></i>
							</span>
							<input type="mail" class="form-control" name="email_company">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Account chatwork:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-xing-square"></i>
							</span>
							<input type="text" class="form-control" name="chatwork">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Department:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-briefcase"></i>
							</span>
							<select class="form-control" name="department">
								<option value selected="selected"> --- Select department --- </option>
								<option value="Construction">Construction</option>
								<option value="IT">IT</option>
								<option value="App">App</option>
							</select>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Position:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-star-o"></i>
							</span>
							<select class="form-control" name="position">
								<option value selected="selected"> --- Select position ---</option>
								<option value="Director">Director</option>
								<option value="BSE">BSE</option>
								<option vlaue="Leader">Leader</option>
								<option value="Employee">Employee</option>
								<option value="Tester">Tester</option>
							</select>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Employee types:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-group"></i>
							</span>
							<select class="form-control" name="user_type">
								<option value selected="selected"> --- Select employee types--- </option>
								<option value="Offical employees">Offical employee</option>
								<option value="Intership">Intership</option>
								<option value="Contract">Contract</option>
								<option value="Probationary">Probationary</option> <!--Thử việc-->
								<option value="Difference">Difference</option>
							</select>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Employee status:</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-bullseye"></i>
							</span>
							<select class="form-control" name="status">
								<option value selected="selected"> --- Select employee status --- </option>
								<option value="Joining">Joining</option>
								<option value="Exited">Exited</option>
								<option value="Absent">Absent</option> <!--Vắng mặt-->
							</select>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Day started at the company:</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="join_datetime">
							<div class="input-group-btn">
								<span class="btn btn-danger">
									<i class="fa fa-calendar"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="col-lg-12 form-group text-center">
						<button type="reset" class="btn btn-primary" name="reset"><i class="fa fa-refresh"></i> Reset</button>
						<button type="submit" class="btn btn-danger" name="search"><i class="fa fa-search"></i> Search</button>
					</div>
				</form>
			</div>
		</div>

	<!--Notice form-->
		<?php
		if (!empty($notice)) {
			?>
			<div class="alert alert-success" role="alert">
				<?php
				if (isset($notice['delete'])) echo '<li>'.$notice['delete'].'</li>';
				if (isset($notice['add'])) echo '<li>'.$notice['add'].'</li>';
				if (isset($notice['edit'])) echo '<li>'.$notice['edit'].'</li>';
				if (isset($notice['password'])) echo '<li>'.$notice['password'].'</li>';
				?>
			</div>
			<?php
		}
		?>	

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">List of employees</span>
			</div>
			<div class="panel-body">
				<a href='<?php echo $this->Html->url(array("controller" => "users", "action" => "index"));?>' type="button" class="btn btn-default">
					Reload
					<i class="fa fa-refresh"></i>
				</a>
				<a href='<?php echo $this->Html->url(array("controller" => "users", "action" => "export_data", "?export_excel=1"));?>'>
					<button type="submit" class="btn btn-success" style="float: right;" name="export">Export CSV</button>
				</a>
				<div class="table-responsive" style="margin-top: 10px;">
					<table class="table table-bordered table-striped" style="font-size: 12px;">
						<thead class="thead-inverse" bgcolor="gray" style="color: white;">
							<th class="text-center">No.</th>
							<th class="text-center">Full name</th>
							<th class="text-center">Email company</th>
							<th class="text-center">Chatwork</th>
							<th class="text-center">Gender</th>
							<th class="text-center">Date of birth</th>
							<th class="text-center">Department</th>
							<th class="text-center">Position</th>
							<th class="text-center">Type</th>
							<th class="text-center">Status</th>
							<th class="text-center">Join datetime</th>
							<th class="text-center">Detail</th>
							<th class="text-center">Delete</th>
						</thead>
						<tbody>
							<?php $i = 1; foreach ($users as $user) {?>
								<tr class="text-center">
									<th class="text-center"><?php echo $i;?></th>
									<td style="width:130px;"><?php echo $user['User']['fullname'];?></td>
									<td><?php echo $user['User']['email_company'];?></td>
									<td><?php echo $user['User']['chatwork'];?></td>
									<td><?php if ($user['User']['gender'] == 2) { echo 'Nam';}
											  else if ($user['User']['gender'] == 1) { echo 'Nữ';}
											  else {echo 'Còn lại';}?></td>
									<td style="width:80px;"><?php echo $user['User']['birthday'];?></td>
									<td><?php echo $user['User']['department'];?></td>
									<td><?php echo $user['User']['position'];?></td>
									<td><?php echo $user['User']['user_type'];?></td>
									<td><?php echo $user['User']['status'];?></td>
									<td><?php echo $user['User']['join_datetime'];?></td>
									<td>
										<a href='<?php echo $this->Html->url(array("controller" => "users", "action" => "view", $user["User"]["id"]));?>' tyle="button" class="btn btn-sm btn-primary">
											<i class="fa fa-list-alt"></i>
										</a>
									</td>
									<td>
										<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target='#myModal-<?php echo $user["User"]["id"];?>'>
											<i class="fa fa-trash-o"></i>
										</button>
										<!-- Modal -->
										<div class="modal fade" id="myModal-<?php echo $user['User']['id'];?>" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header" style="background-color: #337ab7; color: #fff; text-align: left;">
														<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title">Confirm delete account employee</h4>
													</div>
													<div class="modal-body">
														Are you sure delete account <span style="color: red;"><?php echo $user['User']['fullname'];?></span>?
													</div>
													<div class="modal-footer">
														<?php echo $this->Form->create('User',array('url' => array('controller' => 'users','action' => 'delete', $user['User']['id'])));?>
															<button type="button" class="btn btn-default" data-dismiss="modal">Canel</button>
															<button type="submit" class="btn btn-danger" name="delete">OK</button>
														<?php echo $this->Form->end();?>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
							<?php $i++; }?>
						</tbody>
					</table>
				</div>

				<div class="col-lg-6" style="color: #337ab7; padding-top:30px;">
					<?php
						echo $this->Paginator->counter(array(
							'format' => __('Page {:page} / {:pages}, showing {:current} records of {:count} total.')
						));
					?>
				</div>
				<div class="col-lg-6">
					<ul class="pagination" style="float:right;">
						<?php
							echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
							echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
							echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>