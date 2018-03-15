<?php echo $this->element('main-top');?>
<div class="main-content">
	<?php echo $this->element('sidebar');?>
	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="beardcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Doashboard</a></li>
			<li class="breadcrumb-item active"><span style="color:red;">Index</span></li>
		</ol>
		
		<form action method="post" enctype="multipart/form-data">
			<div class="dashboard-left">
				<i class="fa fa-user"></i>
			</div>
			
			<?php
			$n = $this->Paginator->counter(array(
				'format' => __('{:count}')
			));
			?>
			<div class="dashboard-right" >
				<?php
				if ($n > 1) {
					echo '<span style="font-size:50px;">'.$n."</span> employees";
				} else {
					echo '<span style="font-size:50px;">'.$n."</span> employee";
				}
				?>
			</div>			
		</form>
	</div>
</div>