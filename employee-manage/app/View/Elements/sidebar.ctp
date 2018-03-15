<div class="main-content-sidebar"> 
	<ul>
		<li>
			<i class="fa fa-dashboard" aria-hidden="true"></i> &nbsp;
			<?php echo $this->Html->link('Dashboard', array('controller'=>'employees', 'action'=>'dashboard')); ?></li>
		<li>
			<div class="menu-1">
				<i class="fa fa-user" aria-hidden="true"></i> &nbsp;
				Employees manage
			</div>
			<div class="submenu-1" style="display:none;">
				<ul>
					<li><?php echo $this->Html->link('List of Employees', array('controller'=>'employees', 'action'=>'index')); ?></li>
					<li><?php echo $this->Html->link('Add new employee', array('controller'=>'employees', 'action'=>'add')); ?></li>
				</ul>
			</div>
		</li>
		<li>
			<i class="fa fa-money" aria-hidden="true"></i> &nbsp;
			<?php echo $this->Html->link('OT manage', array('controller' => 'ots', 'action' => 'index')); ?>
		</li>
		<li>
			<div class="menu-2">
				<i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;
				Leave days manage
			</div>
			<div class="submenu-2" style="display:none;">
				<ul>
					<li><?php echo $this->Html->link('Month manage', array('controller'=>'employees', 'action'=>'monthly_manage')); ?></li>
					<li><?php echo $this->Html->link('All manage', array('controller'=>'employees', 'action'=>'leave_days')); ?></li>
				</ul>
			</div>
		</li>
		<li>
			<div class="menu-3">
				<i class="fa fa-suitcase" aria-hidden="true"></i> &nbsp;
				Project manage
			</div>
			<div class="submenu-3" style="display:none;">
				<ul>
					<li><?php echo $this->Html->link('List of projects', array('controller' => 'projects', 'action' => 'index'));?></li>
					<li><?php echo $this->Html->link('Add new project', array('controller' => 'projects', 'action' => 'add'));?></li>
				</ul>
			</div>
		</li>
		<li>
			<div class="menu-4">
				<i class="fa fa-group" aria-hidden="true"></i> &nbsp;
				Member of project
			</div>
			<div class="submenu-4" style="display:none;">
				<ul>
					<li><?php echo $this->Html->link('List of project member', array('controller' => 'employeeprojects', 'action' => 'index'));?></li>
					<li><?php echo $this->Html->link('Add project member', array('controller' => 'employeeprojects', 'action' => 'add'));?></li>
				</ul>
			</div>
		</li>
	</ul>
</div>

<div style="width: 17%; height: 100%; float: left"></div>
<!--div trên nhằm tránh ảnh hưởng của position: fixed để tạo hiệu ứng đứng yên cho div sidebar hoặc margin-left: bằng kích thước sidebar cho div main-content-body-->