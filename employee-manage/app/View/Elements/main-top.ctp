<div class="main-top">
	<b style="padding-left: 10px; font-size:18px;"><i class="fa fa-user-o" aria-hidden="true"></i> EMPLOYEE MANAGE</b>
	<div class="btn-group" style="float:right; padding: 15px 40px 0px 0px;">
		<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Admin 
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu dropdown-menu-right">
		    <li><a href="#">
		    	<i class="fa fa-user" aria-hidden="true"></i>
		    	My profile
		    </a></li>
		    <li><a href="#">
		    	<i class="fa fa-key" aria-hidden="true"></i>
		    	Change password
		    </a></li>
		    <li><a href='<?php echo $this->Html->url(array("controller" => "users", "action" => "logout"));?>'>
		    	<i class="fa fa-sign-out" aria-hidden="true"></i>
		    	Logout
		    </a></li>
		</ul> 
	</div>
</div>
<div style="width:100%; height:60px;"></div>
<!--div trên nhằm tránh ảnh hưởng của position: fixed để tạo hiệu ứng đứng yên cho div main-top-->