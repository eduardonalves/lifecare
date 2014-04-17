<?php 
	$this->start('css');
		echo $this->Html->css('modal_centro_custo');
		echo $this->Html->css('table');
	$this->end();
?>

<?php 
	if(isset($modal)){
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
?>

<header id="cabecalho">
	
	<?php echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

	<h1>Cadastrar Centro de Custo</h1>
</header>

<section>
	<header>Dados do Centro de Custo</header>

	<section class="coluna-modal">
		<div>
			<div id="loaderAjax"><?php echo $this->Html->image('ajaxLoaderLifeCare.gif', array('id' => 'ajaxLoader', 'alt' => 'Carregando', 'title' => 'Carregando')); ?> <span style="position: absolute; margin-left: 7px;">Aguarde...</span></div>
			<?php
				echo $this->Form->create('Centrocusto');
				echo $this->Form->input('Centrocusto.nome',array('label' => 'Nome Custo:','type'=>'text', 'class' => 'tamanho-medio'));
				echo $this->Form->input('Centrocusto.limite',array('label' => 'Limite:','type'=>'text', 'class' => 'tamanho-pequeno dinheiro_duasCasas'));
				echo $this->Form->input('Centrocusto.limiteatual',array('label' => 'Limite Atual:','type'=>'text', 'class' => 'tamanho-pequeno dinheiro_duasCasas'));			
			?>	
		</div>	
	</section>
</section>

<footer>

	<?php echo $this->form->submit('botao-salvar.png',array('id'=>'bt-salvar','class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar'));
		  echo $this->Form->end();
		
	?>

</footer>
