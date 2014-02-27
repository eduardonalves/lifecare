<?php
	$this->start('css');
	echo $this->Html->css('consulta');
	echo $this->Html->css('table');
	echo $this->Html->css('jquery-ui/jquery-ui.css');
	echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	$this->end();
	
	$this->start('script');
	echo $this->Html->script('funcoes_consulta.js');
	$this->end();
	
	$this->start('modais');
		echo $this->element('config_produto', array('modal'=>'add-config_produto'));
		echo $this->element('config_lote', array('modal'=>'add-config_lote'));
		echo $this->element('config_entrasaida', array('modal'=>'add-config_entrasaida'));
		echo $this->element('quicklink_add', array('modal'=>'add-quicklink'));
	$this->end();
?>

<?php 
	if(isset($pageReload)){
		if($pageReload=='Reload'){
?>


<script type="text/javascript">
	$(document ).ready(function(){
		setTimeout(function(){
			location.reload();
		}, 2000); 
	});
</script>

<?php	
		}
	}
?>

<header> <!---header--->

	<?php echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->	
	<h1 class="menuOption31">Consultas</h1>

</header> <!---Fim header--->

<section> <!---section superior--->
	
</section>

<!------------------ CONSULTA DE PRODUTOS ------------------>
<div class="areaTabela">
	
	

</div>
