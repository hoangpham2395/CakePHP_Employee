<div id="login">
	<div id="login-heading">
		LOGIN OVERTIME ADMIN
	</div>

	<div id="login-content">
		<form method="post" action>
			<!--Thông báo lỗi -->
			<?php 
			if (!empty($err)) {
				?>
				<div class="alert alert-danger" role="alert" style="">
					<?php
					foreach($err as $key => $errors){
						foreach ($errors as $key1 => $errors1) {
						    echo "<li>".$errors1."</li>"; 
						}
					}
					?>
				</div>
				<?php
			}
			if (!empty($errLogin)) {
				?>
				<div class="alert alert-danger" role="alert" style="">
					<?php
					if (isset($errLogin['username'])) { echo '<li>'.$errLogin['username'].'</li>';}
					if (isset($errLogin['password'])) { echo '<li>'.$errLogin['password'].'</li>';}
					if (isset($errLogin['login'])) { echo '<li>'.$errLogin['login'].'</li>';}
					?>
				</div>
				<?php
			}

			if ($this->Session->check('login.error')) {
				?>
				<div class="alert alert-danger" role="alert">
					<li><?php echo $this->Session->read('login.error');?></li>
				</div>
				<?php
			}
			?>

			<input type="text" class="form-control" placeHolder="Username" name="username">
			<input type="password" class="form-control" placeHolder="Password" style="margin-top:20px;" name="password">
			<button class="btn btn-login btn-lg btn-danger btn-block" style="margin-top:30px;">LOGIN</button>
		</form>
	</div>
</div>