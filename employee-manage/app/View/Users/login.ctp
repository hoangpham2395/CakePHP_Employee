<div id="login">
	<div id="login-heading">
		LOGIN OVERTIME ADMIN
	</div>
	<?php //echo AuthComponent::password('admin123'); die;?>

	<div id="login-wrapper">
		<form action method="post" enctype="multipart-dataform">
			<!-- Thông báo -->
			<?php
			if (!empty($errLogin)) {
				echo '<div class="alert alert-danger" role="alert">'; 
					if (isset($errLogin['login'])) echo '<li>'.$errLogin['login'].'</li>';
					if (isset($errLogin['username'])) echo '<li>'.$errLogin['username'].'</li>';
					if (isset($errLogin['password'])) echo '<li>'.$errLogin['password'].'</li>';
				echo '</div>';
			}

			if (!empty($err)) {
				echo '<div class="alert alert-danger" role="alert">'; 
				foreach ($err as $key => $errors) {
					foreach ($errors as $key1 => $error) {
						echo '<li>'.$error.'</li>';
					}
				}
				echo '</div>';
			}
			?>
			<input type="text" class="form-control" name="username" placeHolder="Username" style="margin-top: 25px;">
			<input type="password" class="form-control" name="password" placeHolder="Password" style="margin-top: 15px;">
			<button type="submit" class="btn btn-lg btn-danger btn-login btn-block" style="margin-top: 15px;">LOGIN</button>
		</form>
	</div>
</div>