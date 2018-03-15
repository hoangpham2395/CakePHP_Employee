<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('utf8'); ?>
	<title>
		<?php echo 'Employee manage'; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('style');

		echo $this->Html->script('jquery.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="heading"></div>
		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
		<div class="footer"></div>
	</div>
	<?php 
	echo $this->Html->script('bootstrap.min');
	echo $this->Html->script('bootstrap-datepicker');
	echo $this->Html->script('main');
	?>
</body>
</html>
