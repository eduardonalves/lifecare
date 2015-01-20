<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('modal_filtro_movimentacao');
	$this->end();

?>

<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	<h1>Visualização das Parcelas</h1>
</header>

<section>
	<header>Parcelas</header>

	<section class="coluna-modal">
		<?php
		foreach($conta['Parcela'] as $parcela){
			echo $parcela['identificacao_documento'];
			echo "<br />";
			echo $parcela['data_vencimento'];
			echo "<br />";
			echo $parcela['data_pagamento'];
		}
		?>				
	</section>
	
</section>

<footer>
			
</footer>
