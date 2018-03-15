<?php echo $this->element('main-top');?>
<div class="main-content">
	<?php echo $this->element('sidebar');?>

	<div class= "main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i> Project manage</a></li>
			<li class="breadcrumb-item"><a href="#">Confirm project</a></li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">Confirm project</span>
			</div>

			<div class="panel-body">
				<form action method="post" enctype="multipart/data-form">
					<?php 
					if ($this->Session->check('proEdit.id')) {
						?>
						<input type="hidden" name="id" value="<?php echo $this->Session->read('proEdit.id');?>">
						<?php
					}
					?>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Project name [&#10004;]:
						</label>
						<div class="col-lg-9">
							<?php
								if ($this->Session->check('proAdd.project_name')) {
									echo $this->Session->read('proAdd.project_name');
									echo '<input type="hidden" name="name" value="'.$this->Session->read('proAdd.project_name').'">';
								} else if ($this->Session->check('proEdit.project_name')) {
									echo $this->Session->read('proEdit.project_name');
									echo '<input type="hidden" name="name" value="'.$this->Session->read('proEdit.project_name').'">';
								} 
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Project status [&#10004;]:
						</label>
						<div class="col-lg-9">
							<?php
								if ($this->Session->check('proAdd.project_status')) {
									echo $this->Session->read('proAdd.project_status');
									echo '<input type="hidden" name="project_status" value="'.$this->Session->read('proAdd.project_status').'">';
								} else if ($this->Session->check('proEdit.project_status')) {
									echo $this->Session->read('proEdit.project_status');
									echo '<input type="hidden" name="project_status" value="'.$this->Session->read('proEdit.project_status').'">';
								} 
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Leader name [&#10004]:
						</label>
						<div class="col-lg-9">
							<?php
								if ($this->Session->check('proAdd.leader_id')) {
									echo $employees['Employee']['fullname'];
									echo '<input type="hidden" name="leader_id" value="'.$this->Session->read('proAdd.leader_id').'">';
								} else if ($this->Session->check('proEdit.leader_id')) {
									echo $employees['Employee']['fullname'];
									echo '<input type="hidden" name="leader_id" value="'.$this->Session->read('proEdit.leader_id').'">';
								} 
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Project language [&#10004;]:
						</label>
						<div class="col-lg-9">
							<?php
								if ($this->Session->check('proAdd.project_lang')) {
									echo $this->Session->read('proAdd.project_lang');
									echo '<input type="hidden" name="project_lang" value="'.$this->Session->read('proAdd.project_lang').'">';
								} else if ($this->Session->check('proEdit.project_lang')) {
									echo $this->Session->read('proEdit.project_lang');
									echo '<input type="hidden" name="project_lang" value="'.$this->Session->read('proEdit.project_lang').'">';
								} 
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Start datetime [&#10004;]:
						</label>
						<div class="col-lg-9">
							<?php
								if ($this->Session->check('proAdd.start_datetime')) {
									echo $this->Session->read('proAdd.start_datetime');
									echo '<input type="hidden" name="start_datetime" value="'.$this->Session->read('proAdd.start_datetime').'">';
								} else if ($this->Session->check('proEdit.start_datetime')) {
									echo $this->Session->read('proEdit.start_datetime');
									echo '<input type="hidden" name="start_datetime" value="'.$this->Session->read('proEdit.start_datetime').'">';
								} 
							?>
						</div>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<?php
						if ($this->Session->check('proAdd.end_datetime')) {
							if ($this->Session->read('proAdd.end_datetime') == '0000-00-00') {
								?>
								<label class="col-lg-3">End datetime [&#10008;]:</label>
								<?php
							} else {
								?>
								<label class="col-lg-3">End datetime [&#10004;]:</label>
								<div class="col-lg-9">
									<?php
									echo $this->Session->read('proAdd.end_datetime');
									echo '<input type="hidden" name="end_datetime" value="'.$this->Session->read('proAdd.end_datetime').'">';
									?>
								</div>
								<?php
							}
						} else if ($this->Session->check('proEdit.end_datetime')) {
							if ($this->Session->read('proEdit.end_datetime') == '0000-00-00') {
								?>
								<label class="col-lg-3">End datetime [&#10008;]:</label>
								<?php
							} else {
								?>
								<label class="col-lg-3">End datetime [&#10004;]:</label>
								<div class="col-lg-9">
									<?php
									echo $this->Session->read('proEdit.end_datetime');
									echo '<input type="hidden" name="end_datetime" value="'.$this->Session->read('proEdit.end_datetime').'">';
									?>
								</div>
								<?php
							}
						} 
						?>
					</div>

					<div class="col-lg-12" style="margin-bottom:15px;">
						<label class="col-lg-3">
							Project description
							<?php
								if ($this->Session->check('proAdd.project_description') || $this->Session->check('proEdit.project_description')) {
									echo '[&#10004;]:';
								} else {
									echo '[&#10008;]:';
								}
							?>
						</label>
						<div class="col-lg-9">
							<?php
								if ($this->Session->check('proAdd.project_description')) {
									echo $this->Session->read('proAdd.project_description');
									echo '<input type="hidden" name="project_description" value="'.$this->Session->read('proAdd.project_description').'">';
								} else if ($this->Session->check('proEdit.project_description')) {
									echo $this->Session->read('proEdit.project_description');
									echo '<input type="hidden" name="project_description" value="'.$this->Session->read('proEdit.project_description').'">';
								}
							?>
						</div>
					</div>

					<div class="col-lg-12 form-group text-center">
						<?php if ($this->Session->check('proAdd')):?>
							<a href="<?php $this->Html->url(array('controller' => 'projects', 'action' => 'add'));?>" class="btn btn-primary btn-lg" name="back"  style="margin-right:10px;">
								<i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
								Back
							</a>

							<button type="submit" class="btn btn-danger btn-lg" name="confirm_add_project">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
								Confirm
							</button>
						<?php endif;?>

						<?php if ($this->Session->check('proEdit')):?>
							<a href="<?php $this->Html->url(array('controller' => 'projects', 'action' => 'edit', $this->Session->read('proEdit.id')));?>" class="btn btn-primary btn-lg" name="back"  style="margin-right:10px;">
								<i class="fa fa-caret-square-o-left" aria-hidden="true"></i>
								Back
							</a>

							<button type="submit" class="btn btn-danger btn-lg" name="confirm_edit_project">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
								Confirm
							</button>
						<?php endif;?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>