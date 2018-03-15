<div class="modal fade" id="myModal-$i" role="dialog">
	<div class="modal-dialog"> 
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="background-color:#337ab7; color:#fff;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Overtime</h4>
			</div>

			<div class="modal-body">
				<div class="col-lg-12 form-group">
					<label>
						Employee: 
						<span style="color:red;">
							[can not edit]
						</span>
					</label>
					<select class="form-control" name="employee_id" disable="disable">
						<option value selected>--- Select employee ---</option>
						<?php
						foreach ($employees as $employee) {
							$select = ($employee['Employee']['fullname'] == $value['employee_name']) ? 'selected = "selected"' : '';
							?>
							<option value="<?php echo $employee['Employee']['id'];?>">
								<?php echo $employee['Employee']['fullname'];?>
							</option>
							<?php
						}
						?>
					</select>
				</div>

				<div class="col-lg-12 form-group">
					<label>
						Project:
						<span style="color:red;">
							[<i class="fa fa-asterisk" aria-hidden="true"></i>]
						</span> 
					</label>
					<select class="form-control" name="project_id">
						<option value selected>--- Select project ---</option>
						<?php
						foreach ($projects as $project) {
							?>
							<option value="<?php echo $project['Project']['id'];?>">
								<?php echo $project['Project']['name'];?>
							</option>
							<?php
						}
						?>
					</select>
				</div>

				<div class="col-lg-6 form-group">
					<label>
						OT datetime:
						<span style="color:red;">
							[<i class="fa fa-asterisk" aria-hidden="true"></i>] &#60;= 1 day
						</span> 
					</label>
					<div class="input-group date" data-provide="datepicker">
						<input type="text" class="form-control" name="ot_datetime">
						<div class="input-group-btn">
						    <span class="btn btn-danger">
						       	<i class="fa fa-calendar" aria-hidden="true"></i>
						    </span>
						</div>
					</div>
				</div>

				<div class="col-lg-6 form-group">
					<label>
						OT hour:
						<span style="color:red;">
							[<i class="fa fa-asterisk" aria-hidden="true"></i>] &#60;= 1 day
						</span>
					</label>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-clock-o" aria-hidden="true"></i>
						</span>
						<input type="text" class="form-control" name="ot_hour">
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<?php //echo $this->Form->create('Employee', array('url' => array('controller' => 'employees', 'action' => 'delete', $employee['Employee']['id'])));?> 
					<button type="button" class="btn btn-danger" data-dismiss="modal">Canel</button>
					<button type="submit" class="btn btn-primary" name="addOT">OK</button>
				<?php //echo $this->Form->end();?>
			</div> 
		</div>
	</div>
</div>