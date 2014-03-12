<?php
	$this->start('css');
		echo $this->Html->css('parceiro');
	$this->end();
	
	$this->start('script');
		echo $this->Html->script('funcoes_parceiro.js');
	$this->end();
?>

<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-1.2-utf8.js"></script>
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
			
			echo $this->Form->input('tipo',array('label' => 'Classificação:','type' => 'select','div' =>array( 'class' => 'input select')));
			/*Corrigir Campo*/ echo $this->Form->input('telefone',array('class' => 'tamanho-medio','label' => 'Telefone 1:'));
			/*Corrigir Campo*/ echo $this->Form->input('fax',array('class' => 'tamanho-medio','label' => 'Fax:'));

			/*
				echo "<span id='spanEndereco0Logradouro' class='Msg tooltipMensagemErroDireta' style='display:none'>Preencha o campo Logradouro</span>";
			*/
		?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('nome',array('class' => 'tamanho-medio','label' => 'Nome:'));
			/*Corrigir Campo*/ echo $this->Form->input('telefone',array('class' => 'tamanho-medio','label' => 'Telefone 2:'));
			/*Corrigir Campo*/ echo $this->Form->input('email',array('class' => 'tamanho-medio','label' => 'Email:'));
		?>


	    <?php
			/*
				echo $this->Form->input('cpf_cnpj',array('class' => 'tamanho-medio','label' => 'CPF/CNPJ:'));
				echo $this->Form->input('Endereco.0.complemento', array('label'=>'Complemento:','class' => 'tamanho-pequeno'));
				echo $this->Form->input('Endereco.0.cidade', array('label'=>'Cidade<span class="campo-obrigatorio">*</span>:', 'type' => 'select'));
				echo "<span id='spanEndereco0Cidade' class='Msg tooltipMensagemErroDireta' style='display:none'>Selecione a cidade</span>";			
			*/
	    ?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('cpf_cnpj',array('class' => 'tamanho-medio','label' => 'CPF/CNPJ:'));
			/*Corrigir Campo*/ echo $this->Form->input('celular',array('class' => 'tamanho-medio','label' => 'Celular:'));
			
			/*
				echo $this->Form->input('Contato.0.telefone1', array('label'=>'Telefone<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-pequeno','length'=>'11'));
				echo "<span id='spanContato0Telefone1' class='Msg tooltipMensagemErroDireta' style='display:none'>Preencha o campo Telefone</span>";
				echo "<span id='spanContato0Telefone2' class='Msg tooltipMensagemErroDireta' style='display:none'>Preencha corretamente o campo Telefone</span>";	
				echo $this->Form->input('Endereco.0.tipo', array('type' => 'hidden', 'value' => 'PRINCIPAL'));
			*/
		?>

	</section>
</section><!---Fim section superior--->

<section> <!---section MEIO--->

	<header class="">Endereços</header>

	<div class="area-endereço">
		<div class="bloco-area-endereço">
			<section class="coluna-esquerda">

				<?php
					/*Corrigir Campo*/ echo $this->Form->input('tipo',array('label' => 'Tipo:','type' => 'select','div' =>array( 'class' => 'input select')));
					echo $this->Form->input('Endereco.0.uf', array('label'=>'UF<span class="campo-obrigatorio">*</span>:','type' => 'select','div' => array('class' => 'inputCliente input text divUf')));
					echo "<span id='spanEndereco0Uf' class='Msg tooltipMensagemErroDireta' style='display:none'>Selecione o Estado</span>";
					echo $this->Form->input('Endereco.0. ponto_referencia', array('label'=>'Ponto de Referência:','type' => 'textarea'));
				?>

			</section>

			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Endereco.0.logradouro', array('label'=>'Logradouro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio'));
					echo $this->Form->input('Endereco.0.cidade', array('label'=>'Cidade<span class="campo-obrigatorio">*</span>:', 'type' => 'select'));
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

<section> <!---section MEIO--->

	<header class="">Dados Bancários</header>

	<section class="coluna-esquerda">

		<?php 
			echo $this->Form->input('Dadosbancario.nome_banco',array('label' => 'Nome do Banco:','class' => 'tamanho-medio'));
			echo $this->Form->input('Dadosbancario.numero_agencia',array('label' => 'Númeor da Agência:','class' => 'tamanho-pequeno'));
			echo $this->Form->input('Dadosbancario.gerente',array('label' => 'Gerente:','class' => 'tamanho-pequeno'));
		?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('Dadosbancario.numero_banco',array('label' => 'Número do Banco:','class' => 'tamanho-medio'));
			echo $this->Form->input('Dadosbancario.conta',array('label' => 'Conta:','class' => 'tamanho-pequeno'));
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('Dadosbancario.nome_agencia',array('label' => 'Nome da Agência:','class' => 'tamanho-pequeno'));
			echo $this->Form->input('Dadosbancario.telefone_banco',array('label' => 'Telefone:','class' => 'tamanho-pequeno'));
		?>

	</section>

	<div class="fake-footer">

		<?php
			echo $this->html->image('botao-add2.png',array('alt'=>'Adicionar','title'=>'Adicionar Conta','id'=>'bt-adicionarConta-receber','class'=>'bt-direita'));
		?>

	</div>
</section><!--fim Meio-->

<section> <!---section Baixo--->	

	<header class="">Dados do Crédito</header>

	<section class="coluna-esquerda">


		<?php
			echo $this->Form->input('Dadoscredito.limite',array('label' => 'Limite de Crédito:','class' => 'tamanho-medio'));
			echo $this->Form->input('Dadoscredito.bloqueado',array('label' => 'Bloqueado:','type' => 'select'));
		?>


	    <?php
		echo $this->Form->input('Dadoscredito.limite',array('label' => 'Limite de Crédito:','class' => 'tamanho-medio dinheiro_duasCasas'));
		echo $this->Form->input('Dadoscredito.bloqueado',array('label' => 'Bloqueado:','type' => 'select'));
	    ?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('Dadoscredito.validade_limite',array('label' => 'Validade do Limitte:','type' => 'text','class' => 'tamanho-pequeno'));
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('Dadoscredito.status',array('label' => 'Status:','type' => 'select'));
		?>

	</section>
</section>	

<footer>

    <?php
		echo $this->form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarParceiro','controller' =>'Parceirodenegocio','action' => 'add','view' => 'add'));
		echo $this->Form->end();
    ?>

</footer>
