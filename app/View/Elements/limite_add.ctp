<?php 
	$this->start('css');

		echo $this->Html->css('modal_quicklink');
		echo $this->Html->css('table');
		//echo $this->Html->css('jquery-ui/jquery.ui.all.css');
		//echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	
	
?>
			

<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	 ?>
	 <h1>Cadastrar Novo Limite</h1>
</header>

<section>
	<header>Dados Pesquisa Rápida</header>

	
	<section class="coluna-modal">
		<div>
		
		<?php

			echo $this->Form->create('dadosCredito'));

			echo $this->Form->input('Dadoscredito.limite',array('label' => 'Limite de Crédito<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-medio'));
			echo $this->Form->input('Dadoscredito.validade_limite',array('label' => 'Validade do Limite<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'forma-data tamanho-pequeno'));

			
		?>
	
	
		</div>
		
	</section>
	
</section>

<footer>
	<?php
		echo $this->form->submit('botao-salvar.png' ,  array('id'=>'bt-salvar-quicklink','class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		
	?>			
</footer>

</div>

</div>
