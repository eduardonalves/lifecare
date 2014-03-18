<?php
	$this->start('css');
		echo $this->Html->css('parceiro');
	$this->end();

	$this->start('script');
		echo $this->Html->script('http://cidades-estados-js.googlecode.com/files/cidades-estados-1.2-utf8.js');
		echo $this->Html->script('funcoes_parceiro.js');
	$this->end();
?>

<!-- <script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-1.2-utf8.js"></script> -->
<script>
	window.onload = function(){
		new dgCidadesEstados({
			estado: document.getElementById('Endereco0Uf'),
			cidade: document.getElementById('Endereco0Cidade')
		});
	}
</script>

<header>
    <?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <h1 class="menuOption32">Cadastrar Parceiro</h1>
</header>

<section> <!---section superior--->

	<header>Dados GeriasParceiro</header>

	<section class="coluna-esquerda">

		<?php
			echo $this->Form->create('Parceirodenegocio');

			echo $this->Form->input('tipo',array('label' => 'Classificação:','options'=>array('','Cliente','Fornecedor'),'type' => 'select','div' =>array( 'class' => 'input select')));
			/*Corrigir Campo*/ echo $this->Form->input('telefone',array('class' => 'tamanho-medio','label' => 'Telefone 1:'));
			/*Corrigir Campo*/ echo $this->Form->input('fax',array('class' => 'tamanho-medio','label' => 'Fax:'));
		?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('nome',array('class' => 'tamanho-medio','label' => 'Nome:','required'=>'false'));
			/*Corrigir Campo*/ echo $this->Form->input('telefone',array('class' => 'tamanho-medio','label' => 'Telefone 2:'));
			/*Corrigir Campo*/ echo $this->Form->input('email',array('class' => 'tamanho-medio','label' => 'Email:'));
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('cpf_cnpj',array('class' => 'tamanho-medio','label' => 'CPF/CNPJ:'));
			/*Corrigir Campo*/ echo $this->Form->input('celular',array('class' => 'tamanho-medio','label' => 'Celular:'));
		?>

	</section>
</section><!---Fim section superior--->

<section class="ajusteAlignSection"> <!---section MEIO--->
	
	<header class="">Endereços</header>
	
	
	<div class="area-endereço"> 
		<div class="bloco-area">
			
			<section class="coluna-esquerda">

				<?php	
					/*Corrigir Campo*/ echo $this->Form->input('tipo',array('label' => 'Tipo:','type' => 'select','div' =>array( 'class' => 'input select')));
					echo $this->Form->input('Endereco.0.uf', array('label'=>'UF<span class="campo-obrigatorio">*</span>:','type' => 'select','class' => 'estado','div' => array('class' => 'inputCliente input text divUf')));
					echo "<span id='spanEndereco0Uf' class='Msg tooltipMensagemErroDireta' style='display:none'>Selecione o Estado</span>";
					echo $this->Form->input('Endereco.0. ponto_referencia', array('label'=>'Ponto de Referência:','type' => 'textarea'));
				?>

			</section>
		
			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Endereco.0.logradouro', array('label'=>'Logradouro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio'));
					echo $this->Form->input('Endereco.0.cidade', array('label'=>'Cidade<span class="campo-obrigatorio">*</span>:', 'type' => 'select','class' => 'cidade'));
					echo "<span id='spanEndereco0Cidade' class='Msg tooltipMensagemErroDireta' style='display:none'>Selecione a cidade</span>";
				?>

			</section>

		
			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Endereco.0.complemento', array('label'=>'Complemento:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Endereco.0.bairro', array('label'=>'Bairro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-pequeno'));
					echo "<span id='spanEndereco0Bairro' class='Msg tooltipMensagemErroDireta' style='display:none'>Preencha o campo bairro</span>";
				?>

			</section>
		</div>	
	</div>
	
	<div class="fake-footer">

		<?php
			echo $this->html->image('botao-add2.png',array('alt'=>'Adicionar','title'=>'Adicionar Conta','id'=>'add-area-endereco','class'=>'bt-direita'));
		?>

	</div>
</section><!--fim Meio-->

<section class="ajusteAlignSection"> <!---section MEIO--->

	<header class="">Dados Bancários</header>
	
	<div class="area-dadosbanc">
		<div class="bloco-area">
			<section class="coluna-esquerda">

				<?php 
					echo $this->Form->input('Dadosbancario.0.nome_banco',array('label' => 'Nome do Banco:','class' => 'tamanho-medio'));
					echo $this->Form->input('Dadosbancario.0.numero_agencia',array('label' => 'Númeor da Agência:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Dadosbancario.0.gerente',array('label' => 'Gerente:','class' => 'tamanho-pequeno'));
				?>

			</section>

			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Dadosbancario.0.numero_banco',array('label' => 'Número do Banco:','class' => 'tamanho-medio'));
					echo $this->Form->input('Dadosbancario.0.conta',array('label' => 'Conta:','class' => 'tamanho-pequeno','id' => 'DadosbancarioConta0'));
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Dadosbancario.0.nome_agencia',array('label' => 'Nome da Agência:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Dadosbancario.0.telefone_banco',array('label' => 'Telefone:','class' => 'tamanho-pequeno'));
				?>

			</section>
		</div>
	</div>
	
	<div class="fake-footer">

		<?php
			echo $this->html->image('botao-add2.png',array('alt'=>'Adicionar','title'=>'Adicionar Conta','id'=>'add-area-dadosbanc','class'=>'bt-direita'));
		?>

	</div>
</section><!--fim Meio-->

<section class="areaCliente"> <!---section Baixo--->	

	<header class="">Dados do Crédito</header>

	<section class="coluna-esquerda">


		<?php
			echo $this->Form->input('Dadoscredito.0.limite',array('label' => 'Limite de Crédito:','class' => 'tamanho-medio'));
			echo $this->Form->input('Dadoscredito.0.bloqueado',array('label' => 'Bloqueado:','type' => 'select'));
		?>


	    <?php
			echo $this->Form->input('Dadoscredito.0.limite',array('label' => 'Limite de Crédito:','class' => 'tamanho-medio dinheiro_duasCasas'));
			echo $this->Form->input('Dadoscredito.0.bloqueado',array('label' => 'Bloqueado:','type' => 'select'));
	    ?>

	</section>

	<section class="coluna-central" >

		<?php

			echo $this->Form->input('Dadoscredito.0.validade_limite',array('label' => 'Validade do Limitte:','type' => 'text','class' => 'tamanho-pequeno'));

		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('Dadoscredito.0.status',array('label' => 'Status:','type' => 'select'));
		?>

	</section>
</section>	

<footer>

    <?php
		echo $this->Form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarParceiro','controller' =>'Parceirodenegocio','action' => 'add','view' => 'add'));
		echo $this->Form->end();
    ?>

</footer>
