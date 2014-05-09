<?php 
	$this->start('css');
	echo $this->Html->css('entradas.css');
	$this->end();
?>

<header>
	<?php echo $this->Html->image('titulo-saida.png', array('class' => 'entrada-icon', 'alt' => 'Saída de Produto', 'title' => 'Saída de Produto', 'border' => '0')); ?>
	<h1>Saída</h1>
	
</header>

	<section id="passos-bar">
	
		<div id="passos-bar-total">
			<div class="linha-verde complete"></div>
			
			<div class="circle complete">
				<span>Modo de Saída</span>
			</div>
			
			<div class="linha-verde complete"></div>

			<div class="circle complete">
				<span>Importar Arquivo</span>
			</div>

			<div class="linha-verde"></div>

			<div class="circle">
				<span></span>
			</div>
		</div>
	
</section>

<section>
	<header>Importar Arquivo</header>
	
<!--Div primeiro Campo--> 	
	<div class="campo-importar-xml">
		<?php
			echo $this->Form->input('',array('class'=>'campo-buscar','label'=>'Buscar Arquivo(.xml) :'));
			echo $this->html->image('botao-buscar.png',array('alt'=>'Buscar',
												     'title'=>'Buscar',
													 'class'=>'bt-buscar',
													 ));
			echo $this->Form->input('', array('label'=>'Saída para uma devolução','type'=>'checkbox'));
		?>

	</div>
<!--Fim Div primeiro Campo-->	
	
<footer>
	
	<?php
	
	
	echo $this->html->image('voltar.png',array('alt'=>'Voltar',
												     'title'=>'Voltar',
												     'id'=>'voltar2',
													 'class'=>'bt-voltar voltar',
													 ));
													 
	
	
	echo $this->html->image('botao-editar.png',array('alt'=>'Confirmar',
												     'title'=>'Confirmar',
												     'id'=>'avnancar2',
												     'class'=>'bt-confirmar avancar',
													 ));
													 
													
	
	?>
	
</footer>
	
</section>
