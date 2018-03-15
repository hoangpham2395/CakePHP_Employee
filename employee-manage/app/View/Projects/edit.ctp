<?php echo $this->element('main-top');?>
<div class="main-content">
	<?php echo $this->element('sidebar');?>
	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i> Projects manage</a></li>
			<li class="breadcrumb-item"><a href="#">Edit project</a></li>
			<li class="breadcrumb-item active" style="color: #FF0000;"><?php echo $project['Project']['name'];?></li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Edit project</span>
				<span style="color:#FF0000;">
					<?php echo $project['Project']['name'];?>
				</span>
			</div>

			<div class="panel-body">				
				<?php echo $this->Form->create('Project', array('url' => array('controller' => 'projects', 'action' => 'edit', $project['Project']['id'])), array('enctype' => 'multipart-dataform', 'id' => 'editProject'));?> 
					<input type="hidden" name="id" value="<?php echo $project['Project']['id'];?>">
					
					<div class="col-lg-12 form-group">
						<label>
							Project name:
							<span style="color:#FF0000;">[<i class="fa fa-asterisk" aria-hidden="true"></i>]</span>
						</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-edit" aria-hidden="true"></i>
							</span>
							<input type="text" class="form-control" name="name" value="<?php echo $project['Project']['name'];?>">
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
							<?php
								$run = ($project['Project']['project_status'] == 'Running') ? 'selected = "selected"' : '';
								$mai = ($project['Project']['project_status'] == 'Maintenance') ? 'selected = "selected"' : '';
								$rec = ($project['Project']['project_status'] == 'Received') ? 'selected = "selected"' : '';
								$clo = ($project['Project']['project_status'] == 'Close') ? 'selected = "selected"' : '';
							?>
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-briefcase" aria-hidden="true"></i>
							</span>
							<select class="form-control" name="project_status">
								<option value selected>--- Select status ---</option>
								<option value="Running"    <?php echo $run;?> >Running</option>
								<option value="Maintenance"<?php echo $mai;?> >Maintenance</option> <!-- Bảo trì -->
								<option value="Received"   <?php echo $rec;?> >Received</option>
								<option value="Close"      <?php echo $clo;?> >Close</option>
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
									$selected = ($employee['Employee']['id'] == $project['Project']['leader_id']) ? 'selected = "selected"' : '';
									echo '<option value="'.$employee['Employee']['id'].'"'.$selected.'>'.$employee['Employee']['fullname'].'</option>';
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
							<input type="text" class="form-control" name="project_lang" value="<?php echo $project['Project']['project_lang'];?>">
						</div>
						<?php 
							if (!empty($err['project_lang'])) {
								echo '<span style="color:#FF0000;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> '.$err['project_lang'].'</span>';
							}
						?>
					</div>

					<div class="col-lg-6 form-group">
						<label>
							Start datetime (m/d/Y):
							<span style="color:#FF0000;">[<i class="fa fa-asterisk" aria-hidden="true"></i>]</span>
						</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control" name="start_datetime" readonly value="<?php echo date('m/d/Y', strtotime($project['Project']['start_datetime']));?>">
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
						<label>End datetime (m/d/Y):</label>
						<div class="input-group date" data-provide="datepicker">
							<?php $endDatetime = ($project['Project']['end_datetime'] != '0000-00-00') ? date('m/d/Y', strtotime($project['Project']['end_datetime'])) : ''; ?>
							<input type="text" class="form-control" name="end_datetime" value="<?php echo $endDatetime;?>">
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
							<textarea class="form-control" style="border-radius:4px;"name="project_description"><?php echo $project['Project']['project_description'];?></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group text-center">
						<button type="reset" class="btn btn-primary btn-lg" name="reset" style="color:#fff; margin-right:10px;">
							<i class="fa fa-refresh" aria-hidden="true"></i>
							Reset
						</button>

						<button class="btn btn-danger btn-lg active" type="submit" data-toggle="modal" data-target="#myModal-<?php echo $project['Project']['id'];?>">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
						</button>
					</div>
				 <?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
</div>
