
<?php
	$this->start('css');

		echo $this->Html->css('saidas');
		echo $this->Html->css('table');
		//echo $this->Html->css('jquery-ui/jquery.ui.css');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
		echo $this->Html->css('jquery-ui/custom-combobox.css');


	$this->end();
?>

<?php
	$this->start('script');

	
	//	echo $this->Html->script('jquery-ui/jquery.ui.widget.js');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.position.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.menu.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.autocomplete.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.tooltip.js');
	echo $this->Html->script('funcoes_saida.js');

	$this->end();
?>

<div class="DivRecurso"></div>

<!------- Tela de Escolha------>

<div id="fase1" class="fase none">

<header>
	<?php echo $this->Html->image('titulo-saida.png', array('class' => 'saida-icon', 'alt' => 'Saida ', 'title' => 'Saida', 'border' => '0')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption24" >Saida</h1>

		<script>
$(document).ready(function(){
	    
	   
});
						
		</script>

</header>

<section id="passos-bar">
	<div id="passos-bar-total">
		<div class="linha-verde complete"></div>

		<div class="circle">
			<span>Modo de Saida</span>
		</div>

		<div class="linha-verde"></div>

		<div class="circle">
			<span></span>
		</div>

		<div class="linha-verde"></div>

		<div class="circle">
			<span></span>
		</div>
	</div>

</section>

<section>
	<?php
		echo $this->html->image('botao-entrada-importar-xml.png',array('alt'=>'Importar xml',
																 'title'=>'Importar xml',
																 'id'=>'importar1',
																 'class'=>'bt-saida-importar-xml',
																 'url'=>array('controller'=>'saidas','action'=>'uploadxml_saida')
																 ));

		echo $this->html->image('saida-manual.png',array('alt'=>'Saida manual',
																 'title'=>'Saida manual',
																 'id'=>'avancar1',
																 'class'=>'bt-saida-manual avancar',
																 ));
	?>

</section>

</div>

<!------- Fim Tela de Escolha ------>


<!------- Saida Manual ------>

<div id="fase2" class="fase none">

	<?php echo $this->element('form_saida_manual'); ?>

</div>

<!------- Fim Saida Manual ------>
