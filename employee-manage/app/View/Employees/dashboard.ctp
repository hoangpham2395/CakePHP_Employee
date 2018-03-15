<?php echo $this->element('main-top'); ?>
<div class="main-content">
	<?php echo $this->element('sidebar'); ?>

	<div class="main-content-body">
		<ol class="breadcrumb" style="background:#fff;">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
		  	<li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a></li>
		  	<li class="breadcrumb-item active" style="color:#FF0000;">Index</li>
		</ol>

		<div class="panel-default" style="width: 320px; height: 140px; border-radius:4px;">
			<div class="symbol">
				<i class="fa fa-user isymbol" aria-hidden="true" style="//font-size:40px; //color:#fff;"></i>
			</div>
			<div class="value">
				<span style="font-size:40px; "><?php echo isset($count) ? $count: '0'; ?></span>
				<br> Employees
			</div>
		</div>
	</div>
</div>