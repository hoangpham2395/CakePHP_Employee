<?php echo $this->element('main-top');?>
<div class="main-content">
	<?php echo $this->element('sidebar');?>
	<div class="main-content-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-user"></i> Employees manage</a></li>
			<li class="breadcrumb-item active">
				<span style="color:red;">Change password</span>
			</li>
		</ol>
		<div class="panel-default">
			<div class="panel-heading">
				<span style="color:#337ab7;">Change password account <span style="color:red;"><?php echo $user['User']['fullname'];?></span></span>
			</div>

			<div class="panel-body">
				<form action method="post" enctype="multipart/form-data">
					<div class="col-lg-12 form-group">
						<label>Old password: <span style="color:red;">[<i class="fa fa-asterisk"></i>]</span></label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
							<input type="password" class="form-control" name="password">
						</div>
						<?php if (!empty($errorChange['password'])) {
							?>
							<span style="color:red;">
								<i class="fa fa-minus-circle"></i>
								<?php echo $errorChange['password'];?>
							</span>
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label>New password: <span style="color:red;">[<i class="fa fa-asterisk"></i>]</span></label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-lock"></i>
							</span>
							<input type="password" class="form-control" name="new_password">
						</div>
						<?php if (!empty($errorChange['new_password'])) {
							?>
							<span style="color:red;">
								<i class="fa fa-minus-circle"></i>
								<?php echo $errorChange['new_password'];?>
							</span>
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 form-group">
						<label>Confirm new password: <span style="color:red;">[<i class="fa fa-asterisk"></i>]</span></label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-lock"></i>
							</span>
							<input type="password" class="form-control" name="confirm_new_password">
						</div>
						<?php if (!empty($errorChange['confirm_new_password'])) {
							?>
							<span style="color:red;">
								<i class="fa fa-minus-circle"></i>
								<?php echo $errorChange['confirm_new_password'];?>
							</span>
							<?php
						}
						?>
					</div>

					<div class="col-lg-12 text-center">
						<a href='<?php echo $this->Html->url(array("controller"=>"users", "action"=>"view", $user["User"]["id"]));?>' class="btn btn-primary btn-lg">
							<i class="fa fa-caret-square-o-left"></i>
							Back
						</a>
						<button type="submit" class="btn btn-danger btn-lg" style="margin-left:10px;" name="change_password">
							<i class="fa fa-pencil-square-o"></i>
							Change
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>