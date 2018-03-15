
<div class="nav-side-menu">
	<div class="menu-list">
		<ul id="menu-content" class="menu-content collapse out">
			<!--Cần giải quyết: khi trang được load thì mới active li dẫn đến trang đó???-->
			<li>
				<i class="fa fa-dashboard"></i>
				<?php echo $this->Html->link('Doashboard', array('controller' => 'users', 'action' => 'doashboard'));?>
			</li>

			<li data-toggle="collapse" data-target="#employees" class="collapsed">
				<i class="fa fa-user"></i>
				Employees manage
				<span class="arrow"></span>
			</li>
			<ul class="sub-menu collapse" id="employees">
				<li>
					<?php echo $this->Html->link('List of employees', array('controller' => 'users', 'action' => 'index'));?>
				</li>
				<li>
					<?php echo $this->Html->link('Add new employee', array('controller' => 'users', 'action' => 'add'));?>
				</li>
			</ul>

			<li>
				<i class="fa fa-money"></i>
				<?php echo $this->Html->link('OT manage', array('controller' => 'ots', 'action' => 'index'));?>
			</li>

			<li data-toggle="collapse" data-target="#leavedays" class="collapsed">
				<i class="fa fa-calendar"></i>
				Leave days manage
				<span class="arrow"></span>
			</li>
			<ul class="sub-menu collapse" id="leavedays">
				<li>
					<?php echo $this->Html->link('Monthly manage', array('controller' => 'leavedays', 'action' => 'month'));?>
				</li>
				<li>
					<?php echo $this->Html->link('All manage', array('controller' => 'users', 'action' => 'all'));?>
				</li>
			</ul>

			<li data-toggle="collapse" data-target="#projects" class="collapsed">
				<i class="fa fa-suitcase"></i>
				Projects manage
				<span class="arrow"></span>
			</li>
			<ul class="sub-menu collapse" id="projects">
				<li>
					<?php echo $this->Html->link('List of projects', array('controller' => 'projects', 'action' => 'index'));?>
				</li>
				<li>
					<?php echo $this->Html->link('Add new project', array('controller' => 'projects', 'action' => 'add'));?>
				</li>
			</ul>

			<li data-toggle="collapse" data-target="#members" class="collapsed">
				<i class="fa fa-group"></i>
				Member of project
				<span class="arrow"></span>
			</li>
			<ul class="sub-menu collapse" id="members">
				<li>
					<?php echo $this->Html->link('List of project members', array('controller' => 'user_projects', 'action' => 'index'));?>
				</li>
				<li>
					<?php echo $this->Html->link('Add new member', array('controller' => 'user_projects', 'action' => 'add'));?>
				</li>
			</ul>
		</ul>
	</div>
</div>
