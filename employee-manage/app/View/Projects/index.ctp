<?php echo $this->element('main-top');?>

<div class="main-content">
	<?php echo $this->element('sidebar');?>
	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i> Project manage</a></li>
			<li class="breadcrumb-item active" style="color:#FF0000;">List of projects</li>
		</ol>

<!-- Form search -->
		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Search project</span>
			</div>

			<div class="panel-body">
				<form action method="post" enctype="multipart/data-form">
					<div class="col-lg-12 form-group">
						<label>Project name:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-edit" aria-hidden="true"></i>
							</span>
							<input type="text" class="form-control" name="project_name">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Project status:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-briefcase" aria-hidden="true"></i>
							</span>
							<select class="form-control" name="project_status">
								<option value selected>--- Select status ---</option>
								<option value="Running">Running</option>
								<option value="Maintenance">Maintenance</option> <!-- Bảo trì -->
								<option value="Received">Received</option> <!-- Đã nhận -->
								<option value="Close">Close</option>
							</select>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Leader name:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-user" aria-hidden="true"></i>
							</span>
							<select class="form-control" name="leader_id">
								<option value selected>--- Select name ---</option>
								<?php 
								foreach ($employees as $employee) {
									echo '<option value="'.$employee['Employee']['id'].'">'.$employee['Employee']['fullname'].'</option>';
								}
								?>
							</select>
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Project language:</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-floppy-o" aria-hidden="true"></i>
							</span>
							<input type="text" class="form-control" name="project_lang">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>From start datetime:</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="start_datetime">
							<div class="input-group-btn">
								<span class="btn btn-danger">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="col-lg-12 text-center">
						<button type="reset" class="btn btn-primary" name="reset" style="margin-right:10px;">
							<i class="fa fa-refresh" aria-hidden="true"></i>
							Reset
						</button>
						<button type="submit" class="btn btn-danger" name="project_search">
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

<!-- Form hiển thị -->
		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">List of projects</span>
			</div>

			<div class="panel-body">
				<a href='<?php echo $this->Html->url(array('controller' => 'projects', 'action' => 'index'))?>' class="btn btn-default" style="margin-bottom: 10px;">
					<i class="fa fa-refresh" aria-hidden="true"></i>
					Reload
				</a>
				<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%; font-size:11px;">
					<thead>
						<th class="text-center"><?php echo $this->Paginator->sort('No. '); ?></th>
						<th class="text-center"><?php echo $this->Paginator->sort('Project name'); ?></th>
						<th class="text-center"><?php echo $this->Paginator->sort('Project status'); ?></th>
						<th class="text-center"><?php echo $this->Paginator->sort('Leader'); ?></th>
						<th class="text-center"><?php echo $this->Paginator->sort('Project language');?></th>
						<th class="text-center"><?php echo $this->Paginator->sort('Start datetime'); ?></th>
						<th class="text-center"><?php echo $this->Paginator->sort('End datetime'); ?></th>
						<th class="text-center">Edit</th>
						<th class="text-center">Delete</th>
					</thead>

					<tbody>
						<?php $no = 1; foreach($projects as $project): ?>
							<tr class="text-center">
								<td><?php echo $no; $no ++;?></td>
								<td><?php echo $project['Project']['name'];?></td>
								<td><?php echo $project['Project']['project_status'];?></td>
								<td><?php echo $project['Employee']['fullname'];?></td>
								<td><?php echo $project['Project']['project_lang'];?></td>
								<td><?php echo $project['Project']['start_datetime'];?></td>
								<td>
									<?php 
										if ($project['Project']['end_datetime'] != '0000-00-00') {
											echo $project['Project']['end_datetime'];
										} else echo '';
									?>
								</td>
								<td>
									<a href="<?php echo $this->Html->url(array('controller' => 'projects', 'action' => 'edit', $project['Project']['id']));?>" class="btn btn-primary">
										<i class="fa fa-list-alt" aria-hidden="true"></i>
									</a>
								</td>
								<td>
									<button class="btn btn-danger active" type="button" data-toggle="modal" data-target="#myModal-<?php echo $project['Project']['id'];?>">
										<i class="fa fa-trash-o" aria-hidden="true"></i>
									</button>
								  	<!-- Modal -->
								 	<div class="modal fade" id="myModal-<?php echo $project['Project']['id'];?>" role="dialog">
								    	<div class="modal-dialog">
								      		<!-- Modal content-->
									      	<div class="modal-content">
									        	<div class="modal-header" style="background-color:#337ab7; color:#fff;">
									          		<button type="button" class="close" data-dismiss="modal">&times;</button>
									          		<h4 class="modal-title">Confirm delete project</h4>
									        	</div>
									        	<div class="modal-body">
									         		 <p style="font-size: 14px;">Are you sure delete this project?</p>
									        	</div>
									        	<div class="modal-footer">
									        		<?php echo $this->Form->create('Project', array('url' => array('controller' => 'projects', 'action' => 'delete', $project['Project']['id'])));?> 										          			
									          			<button type="button" class="btn btn-danger" data-dismiss="modal">Canel</button>
									          			<button type="submit" class="btn btn-primary" name="delete_project">OK</button>
									          		<?php echo $this->Form->end();?>
									        	</div>
									      	</div>
								    	</div>
								 	</div>
								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>				
			</div>
		</div>
	</div>
</div>