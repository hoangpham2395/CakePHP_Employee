<div class="main-top container">
	<i class="fa fa-user-o" aria-hidden="true" style="padding-left: 10px;"></i> 
	EMPLOYEE MANAGE
	<div class="btn-group"  style="float:right;margin: 15px 20px 0px 0px;">
		<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<?php echo $this->Session->read('login.username');?>
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu dropdown-menu-right">
			<li style="height: 15px;">
				<a href='<?php echo $this->Html->url(array("controller" => "users", "action" => "view", $this->Session->read("login.id")));?>'>
					<i class="fa fa-user"></i>
					My profile
				</a>
			</li>
			<li style="height: 15px; margin-top: 10px;">
				<a href='<?php echo $this->Html->url(array("controller" => "users", "action" => "change_password", $this->Session->read("login.id")));?>'>
					<i class="fa fa-key"></i>
					Change password
				</a>
			</li>
			<li style="height: 15px; margin: 10px 0px 10px 0px;">
				<a href='<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout'));?>'>
					<i class="fa fa-sign-out"></i>
					Logout
				</a>
			</li>
		</ul>
	</div>
</div>

<!-- div này dùng để sửa lỗi cho div trên khi dùng positive:fixed;-->
<div style="width: 100%; height: 60px;"></div>