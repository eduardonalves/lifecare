<?php
	$this->start('css');
		echo $this->Html->css('centrocusto');
	$this->end();

	$this->start('script');
	echo $this->Html->script('funcoes_centrocusto.js');
	$this->end();
	
	$this->start('modais');

	$this->end();
?>

<header>
    <?php echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Editar', 'title' => 'Editar')); ?>

    <h1 class="menuOption31">Editar Centro de Custo</h1>
</header>

<section> <!---section superior--->

	<header>Dados do Centro de Custo</header>
	
<div class="centrocustos form">
	
<?php echo $this->Form->create('Centrocusto'); ?>

	<?php
		echo $this->Form->input('Centrocusto.id');
		echo $this->Form->input('nome', array('label' => 'Nome:','type' => 'text'));
		echo '<span id="validaNome" class="Msg-tooltipDireita" style="display:none">Preencha o Nome</span>';
		echo $this->Form->input('limite',array('label' => 'Limite:','type' => 'text'));
		echo '<span id="validaLimite" class="Msg-tooltipDireita" style="display:none">Preencha o Limite</span>';
		echo $this->Form->input('limite_usado',array('label' => 'Limite Usado:','type' => 'text'));
		echo '<span id="validaLimiteUsado" class="Msg-tooltipDireita" style="display:none">Preencha o Limite Usado</span>';
	?>

</div>

<footer>

    <?php
		echo $this->html->image('botao-salvar.png',array('alt'=>'Salvar','title'=>'Salvar','id'=>'bt-salvarCentroCustoEdit','class'=>'bt-salvar'));
		echo $this->Form->end();
    ?>

</footer>
