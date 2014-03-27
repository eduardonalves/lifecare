<?php
	
	$cakeDescription = __d('lifecare', 'LifeCare');
?>

<!DOCTYPE html>
<html>
<head>
	
<script>
	var urlInicio = '<?php echo Router::url("/", true)?>';
</script>	

	
	
	<?php echo $this->Html->charset(); ?>
	
	<title>
		
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	
	</title>
	
	<?php
		echo $this->Html->script('jquery_novo.js');

		echo $this->Html->script('Chart.min.js');
		echo $this->Html->script('ChartNew.js');
		echo $this->Html->script('loadgrafico.js');
		echo $this->Html->script('graficoPeriodo.js');
	?>

</head>

<body>
		<?php 
				echo $this->Session->flash();
				echo $this->fetch('content');
			?>
</body>

</html>
