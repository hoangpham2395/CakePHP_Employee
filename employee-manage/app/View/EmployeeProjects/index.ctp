<?php echo $this->element('main-top');?>

<div class="main-content">
	<?php echo $this->element('sidebar');?>

	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-group" aria-hidden="true"></i> Member of project</a></li>
			<li class="breadcrumb-item active" style="color:red;">List of project member</li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span style="color: #337ab7;">
					Search project member
				</span>
			</div>

			<div class="panel-body">
				<?php echo $this->Form->create('EmployeeProject', array('url' => array('controller' => 'employeeprojects', 'action' => 'index')), array('enctype' => 'multipart-dataform', 'id' => 'SearchProjectMember'));?>
					<div class="col-lg-6 form-group">
						<label>Project name:</label>
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
					</div>

					<div class="col-lg-12">
						<button type="reset" class="btn btn-primary" style="margin-right:5px;">
							<i class="fa fa-refresh" aria-hidden="true"></i>
							Reset
						</button>

						<button type="submit" class="btn btn-danger">
							<i class="fa fa-search" aria-hidden="true"></i>
							Search
						</button>
					</div>
				<?php echo $this->Form->end;?>
			</div>
		</div>

		<!-- Thông báo -->
		<?php
			if (!empty($notice)) {
				echo '<div class="alert alert-success" role="alert" style="margin: 0px 0px 10px 0px;">'; 
					if (isset($notice['add'])) echo '<li>'.$notice['add'].'</li>';
					if (isset($notice['edit'])) echo '<li>'.$notice['edit'].'</li>';
				echo '</div>';
			}
		?>

		<div class="panel-default">
			<?php echo $this->Form->create('EmployeeProject', array('url' => array('controller' => 'employeeprojects', 'action' => 'index')), array('enctype' => 'multipart-dataform', 'id' => 'projectMember'));?>
				<div class="panel-heading">
					<span style="color: #337ab7;">
						List of project member
					</span>
				</div>

				<div class="panel-body">
					<a href='<?php echo $this->Html->url(array('controller' => 'employeeprojects', 'action' => 'index'))?>' class="btn btn-default" style="margin-bottom: 10px;">
						<i class="fa fa-refresh" aria-hidden="true"></i>
						Reload
					</a>

					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%; font-size:11px;">
							<thead>
								<th class="text-center"><?php echo $this->Paginator->sort('No.');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Project name');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Leader');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Member');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Project status');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Project language');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Start date');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('End date');?></th>
								<th class="text-center"><?php echo $this->Paginator->sort('Edit');?></th>
							</thead>

							<tbody class="text-center">
								<?php
								//build members
								$listMember = array();
								foreach ($projects as $project) {
									$id = $project['Project']['id'];
									$projectName = $project['Project']['name'];
									$leader = $project['Employee']['fullname'];
									$projectStatus = $project['Project']['project_status'];
									$projectLang = $project['Project']['project_lang'];
									$startDate = $project['Project']['start_datetime'];
									$endDate = $project['Project']['end_datetime'];

									$listMember[$id] = array(
										'id' => $id,
										'projectName' => $projectName,
										'leader' => $leader,
										'projectStatus' => $projectStatus,
										'projectLang'=> $projectLang,
										'startDate' => $startDate,
										'endDate' => $endDate,
									); 
								}

								$maxMember = 1;
								foreach ($members as $member) {
									$id = $member['EmployeeProject']['project_id'];
									$memberName = $member['Employee']['fullname'];
									$memberStatus = $member['EmployeeProject']['join_status'];
									$memberId = $member['EmployeeProject']['employee_id'];
									if ($member['EmployeeProject']['employee_type'] == 0) {
										if ($maxMember < $memberId) $maxMember = $memberId;
										$listMember[$id]['member'][$memberId] = $memberName.' - '.$memberStatus;
									} 
								}

								//pr($listMember); die;
								//show data
								$no = 1;
								foreach ($listMember as $value) {
									?>
									<tr>
										<td><?php echo $no; $no ++;?></td>
										<td><?php echo $value['projectName'];?></td>
										<td><?php echo $value['leader'];?></td>
										<td class="text-left">
											<?php
											for ($i = 1; $i <= $maxMember; $i ++) {
												echo (isset($value['member'][$i])) ? '<i class="fa fa-star" aria-hidden="true"></i> '.$value['member'][$i].'<br>' : ''; 
											}
											?>
										</td>
										<td><?php echo $value['projectStatus'];?></td>
										<td><?php echo $value['projectLang'];?></td>
										<td><?php echo $value['startDate'];?></td>
										<td><?php echo ($value['endDate'] != '0000-00-00') ? $value['endDate'] : '';?></td>
										<td>
											<a href="<?php echo $this->Html->url(array('controller' => 'employeeprojects', 'action' => 'edit', $value['id']));?>" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>
										</td>
									</tr>
									<?php
								}

								?>
							</tbody>
						</table>
					</div>
				</div>
			<?php echo $this->Form->end;?>
		</div>
	</div>
</div>