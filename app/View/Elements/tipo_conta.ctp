<?php 
	$this->start('css');
		echo $this->Html->css('modal_tipo_conta');
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

	<h1>Cadastrar Tipo da Conta</h1>
</header>

<section>
	<header>Dados Tipo da Conta</header>


	<section class="coluna-modal">
		<div>
			<div id="loaderAjax"><?php echo $this->Html->image('ajaxLoaderLifeCare.gif', array('id' => 'ajaxLoader', 'alt' => 'Carregando', 'title' => 'Carregando')); ?> <span style="position: absolute; margin-left: 7px;">Aguarde...</span></div>
			<?php
				echo $this->Form->create('Tipodeconta');
				echo $this->Form->input('Tipodeconta.tipo',array('label' => 'Tipo:','type'=>'text', 'class' => 'tamanho-medio'));
		
			?>	

		</div>	
	</section>
</section>

<footer>

	<?php echo $this->form->submit('botao-salvar.png' ,  array('id'=>'bt-salvar','class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar'));
		  echo $this->Form->end();
		
	?>

</footer>
