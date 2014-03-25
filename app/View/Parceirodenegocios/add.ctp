<?php
	$this->start('css');
		echo $this->Html->css('parceiro');
	$this->end();

	$this->start('script');
		echo $this->Html->script('http://cidades-estados-js.googlecode.com/files/cidades-estados-1.2-utf8.js');
		echo $this->Html->script('funcoes_parceiro.js');
	$this->end();
?>

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

<?php echo $this->Form->create('Parceirodenegocio'); ?>

<section> <!---section superior--->

	<header>Dados GeriasParceiro</header>

	<section class="coluna-esquerda">

		<?php
			echo $this->Form->input('tipo',array('class' => 'obrigatorio','label' => 'Classificação<span class="campo-obrigatorio">*</span>:','id' => 'ParceirodenegocioClassificacao','options'=>array(''=>'','CLIENTE'=>'Cliente','FORNECEDOR'=>'Fornecedor'),'type' => 'select','div' =>array( 'class' => 'input select')));
			echo '<span id="validaClassificacao" class="Msg-tooltipDireita" style="display:none">Selecione a Classificação</span>';
			
			echo $this->Form->input('Contato.0.telefone1',array('class' => 'tamanho-medio obrigatorio','label' => 'Telefone 1<span class="campo-obrigatorio">*</span>:', 'id' => 'ParceirodenegocioTelefone1', 'maxlength'=>'11'));
			echo '<span id="validaTelefone" class="Msg-tooltipDireita" style="display:none">Preencha o Telefone</span>';
			
			echo $this->Form->input('Contato.0.fax',array('class' => 'tamanho-medio','label' => 'Fax:', 'maxlength'=>'11'));
		?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('nome',array('class' => 'tamanho-medio obrigatorio','label' => 'Nome<span class="campo-obrigatorio">*</span>:','required'=>'false','maxlength'=>'50'));
			echo '<span id="validaNome" class="Msg-tooltipDireita" style="display:none">Preencha o Nome</span>';
			
			echo $this->Form->input('Contato.0.telefone2',array('class' => 'tamanho-medio','label' => 'Telefone 2:', 'id' => 'ParceirodenegocioTelefone2', 'maxlength'=>'11'));
			echo '<span id="validaTelefone22" class="Msg-tooltipDireita" style="display:none">Preencha o Corretamente</span>';
			
			echo $this->Form->input('Contato.0.email',array('class' => 'tamanho-medio','label' => 'Email:','maxlength'=>'50'));
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('cpf_cnpj',array('type'=>'text','class' => 'tamanho-medio obrigatorio','style'=>'background:#EBEAFC;','disabled'=>'disabled','label'=>'', 'div' => array('class' => 'input text divCpfCnpj')));
			echo "<div id='idcpf'><input id='inputcpf' type='radio'   name='CPFCNPJ' value='cpf'><label class='label-cpf'>CPF /</label></div>	 
				  <div id='idcnpj'><input id='inputcnpj' type='radio' name='CPFCNPJ' value='cnpj'><label class='label-cnpj'>CNPJ<span class='campo-obrigatorio'>*</span>:</label></div>";
			echo '<span id="validaCPF" class="Msg-tooltipAbaixo" style="display:none">Preencha o CPF/CNPJ</span>';
			echo '<span id="validaCPFTamanho" class="Msg-tooltipAbaixo" style="display:none">Preencha o CPF/CNPJ Corretamente</span>';
			
			echo $this->Form->input('Contato.0.telefone3',array('class' => 'tamanho-medio','label' => 'Celular:' , 'maxlength'=>'11'));
			echo '<span id="validaCelular" class="Msg-tooltipAbaixo" style="display:none">Preencha o Corretamente</span>';
		?>

	</section>
</section><!---Fim section superior--->

<section class="ajusteAlignSection"> <!---section MEIO--->
	
	<header class="">Endereços</header>

	<div class="area-endereco"> 
		<div class="bloco-area">
			
			<section class="coluna-esquerda">

				<?php	
					echo $this->Form->input('Endereco.0.tipo',array('label' => 'Tipo:','type' => 'select','disabled' => 'true','options'=>array('Principal'),'div' =>array( 'class' => 'input select')));
					
					/*Ajusta Input*/echo $this->Form->input('Endereco.0.numero', array('label'=>'Número:','class' => 'tamanho-medio obrigatorio'));
					
					echo $this->Form->input('Endereco.0.bairro', array('label'=>'Bairro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio obrigatorio'));
					echo '<span id="valida0Bairro" class="Msg-tooltipDireita" style="display:none">Preencha o Bairro</span>';
				?>

			</section>
		
			<section class="coluna-central" >

				<?php
					/*Ajusta Input*/echo $this->Form->input('Endereco.0.cep', array('label'=>'CEP<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio maskCep','maxlength'=>'12'));
					echo '<span id="valida0Cep1" class="Msg-tooltipDireita" style="display:none">Preencha o CEP</span>';
					echo '<span id="valida0Cep2" class="Msg-tooltipDireita" style="display:none">Preencha corretamente o CEP</span>';
					
					echo $this->Form->input('Endereco.0.uf', array('label'=>'UF<span class="campo-obrigatorio">*</span>:','type' => 'select','class' => 'estado obrigatorio','div' => array('class' => 'inputCliente input text divUf')));
					echo '<span id="valida0Uf" class="Msg-tooltipDireita" style="display:none">Selecione o Estado</span>';
					
					echo $this->Form->input('Endereco.0.complemento', array('label'=>'Complemento:','class' => 'tamanho-medio'));
				
					
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Endereco.0.logradouro', array('label'=>'Logradouro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio obrigatorio'));
					echo '<span id="valida0Logradouro" class="Msg-tooltipAbaixo" style="display:none">Preencha o Logradouro</span>';
				
					echo $this->Form->input('Endereco.0.cidade', array('label'=>'Cidade<span class="campo-obrigatorio">*</span>:', 'type' => 'select','class' => 'cidade obrigatorio'));
					echo '<span id="valida0Cidade" class="Msg-tooltipAbaixo" style="display:none">Selecione o Cidade</span>';
				
					echo $this->Form->input('Endereco.0.ponto_referencia', array('label'=>'Ponto de Referência:','type' => 'textarea'));
				?>

			</section>
		</div>	
	</div>

	<div class="fake-footer">

		<?php
			echo $this->html->image('endereco-adional.png',array('alt'=>'Adicionar','title'=>'Adicionar Bloco de Endereços','id'=>'bt-addEndereco','class'=>'bt-direita'));
			echo $this->html->image('botao-remove.png',array('alt'=>'Adicionar','title'=>'Remover Bloco de Endereços','id'=>'remove-area-endereco','class'=>'bt-direita'));
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
					
					echo $this->Form->input('Dadosbancario.0.numero_agencia',array('label' => 'Número da Agência:','class' => 'tamanho-pequeno agencia'));
					
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
					
					echo $this->Form->input('Dadosbancario.0.telefone_banco',array('label' => 'Telefone:','class' => 'tamanho-medio tel'));
				?>

			</section>
		</div>
	</div>
	
	<div class="fake-footer">

		<?php
			echo $this->html->image('banco-adional.png',array('alt'=>'Adicionar','title'=>'Adicionar Bloco Dados Bancários','id'=>'add-area-dadosbanc','class'=>'bt-direita'));
			echo $this->html->image('botao-remove.png',array('alt'=>'Adicionar','title'=>'Remover Bloco Dados Bancários','id'=>'remove-area-dadosbanc','class'=>'bt-direita'));
		?>

	</div>
</section><!--fim Meio-->

<section class="areaCliente"> <!---section Baixo--->	

	<header class="">Dados do Crédito</header>

	<section class="coluna-esquerda">

		<?php
			echo $this->Form->input('Dadoscredito.0.limite',array('label' => 'Limite de Crédito<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-medio obrigatorio dinheiro_duasCasas'));
			echo '<span id="validaLimite" class="Msg-tooltipDireita" style="display:none">Preencha o Limite</span>';
		?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('Dadoscredito.0.validade_limite',array('label' => 'Validade do Limite<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-pequeno obrigatorio forma-data'));
			echo '<span id="validaValidade1" class="Msg-tooltipDireita" style="display:none">Preencha a Validade</span>';
			echo '<span id="validaValidade2" class="Msg-tooltipDireita" style="display:none">Nao é possivel selecionar data passada</span>';
			echo '<span id="validaValidade3" class="Msg-tooltipDireita" style="display:none">Preencha corretamente a data</span>';
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('bloqueado',array('label' => 'Bloqueado<span class="campo-obrigatorio">*</span>:','options'=>array('Não' => 'Não', 'Sim' => 'Sim'),'type' => 'select','class' => 'obrigatorio'));
			echo '<span id="validaBloqueado" class="Msg-tooltipDireita" style="display:none">Selecione se Bloqueado</span>';
		?>

	</section>
</section>	

<footer>

    <?php
		echo $this->Form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarParceiro'));
		echo $this->Form->end();
    ?>

</footer>
