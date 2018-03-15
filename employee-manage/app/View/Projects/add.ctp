<?php echo $this->element('main-top');?>
<div class="main-content">
	<?php echo $this->element('sidebar');?>
	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i> Projects manage</a></li>
			<li class="breadcrumb-item active" style="color: #FF0000;">Add new project</li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Add new project</span>
			</div>

			<div class="panel-body">
				<form action method="post" enctype="multipart/data-form">
					<div class="col-lg-12 form-group">
						<label>
							Project name:
							<span style="color:#FF0000;">[<i class="fa fa-asterisk" aria-hidden="true"></i>]</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-edit" aria-hidden="true"></i>
							</span>
							<input type="text" class="form-control" name="project_name">
						</div>
						<?php 
							if (!empty($err['project_name'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['project_name'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Project status:
							<span style="color:#FF0000;">[<i class="fa fa-asterisk" aria-hidden="true"></i>]</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-briefcase" aria-hidden="true"></i>
							</span>
							<select class="form-control" name="project_status">
								<option value selected>--- Select status ---</option>
								<option value="Running">Running</option>
								<option value="Maintenance">Maintenance</option> <!-- Bảo trì -->
								<option value="Received">Received</option>
								<option value="Close">Close</option>
							</select>
						</div>
						<?php 
							if (!empty($err['project_status'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['project_status'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Leader name:
							<span style="color:#FF0000;">[<i class="fa fa-asterisk" aria-hidden="true"></i>]</span>
						</label>
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
						<?php 
							if (!empty($err['leader_name'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['leader_name'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label>
							Project language:
							<span style="color:#FF0000;">[<i class="fa fa-asterisk" aria-hidden="true"></i>]</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-floppy-o" aria-hidden="true"></i>
							</span>
							<input type="text" class="form-control" name="project_lang">
						</div>
						<?php 
							if (!empty($err['project_lang'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['project_lang'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Start datetime:
							<span style="color:#FF0000;">[<i class="fa fa-asterisk" aria-hidden="true"></i>]</span>
						</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="start_datetime">
							<div class="input-group-btn">
								<span class="btn btn-danger">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</span>
							</div>
						</div>
						<?php 
							if (!empty($err['start_datetime'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['start_datetime'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>End datetime:</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="end_datetime">
							<div class="input-group-btn">
								<span class="btn btn-danger">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label>Project desciption:</label>
						<div class="input-group" style="width:100%;">
							<textarea class="form-control" style="border-radius:4px;"name="project_description"></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group text-center">
						<button type="reset" class="btn btn-primary btn-lg" name="reset" style="color:#fff; margin-right:10px;">
							<i class="fa fa-refresh" aria-hidden="true"></i>
							Reset
						</button>

						<button type="submit" class="btn btn-danger btn-lg" name="add_project">
							<i class="fa fa-plus-circle" aria-hidden="true"></i>
							Add
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>