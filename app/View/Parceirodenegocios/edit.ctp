<?php 

	$this->start('css');
		echo $this->Html->css('edit_parceiros');
	$this->end();

	$this->start('script');
		echo $this->Html->script('picklist-autoselect.js');
	$this->end();
?>
		
<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-1.2-utf8.js"></script>
<script>
window.onload = function() {
  new dgCidadesEstados({
    estado: document.getElementById('Endereco0Uf'),
    cidade: document.getElementById('Endereco0Cidade')
  });
}
</script>
		

<header>
	<?php echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption21">Consultas</h1>

</header>

<section><!--SECTION SUPERIOR--> 
	<header>Editar Parceiro de Negócios</header>

	<section id="coluna-esquerda" class="coluna-esquerda">
		<fieldset class="fieldset-esquerda">
			<div class="coluna-content">

				<?php
					echo $this->Form->create('Parceirodenegocio');
					
					echo $this->Form->input('tipo',array('label' => 'Classificação:','type' => 'select','div' =>array( 'class' => 'input select divTipoParceiro')));
					echo $this->Form->input('nome',array('class' => 'tamanho-medio','label' => 'Nome:'));
					echo $this->Form->input('cpf_cnpj',array('class' => 'tamanho-medio','label' => 'CPF/CNPJ'));
					echo $this->Form->input('Contato.0.telefone1', array('label'=>'Telefone<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-pequeno','length'=>'11'));
					echo $this->Form->input('Endereco.0.logradouro', array('label'=>'Logradouro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio'));
					echo $this->Form->input('Endereco.0.complemento', array('label'=>'Complemento:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Endereco.0.uf', array('label'=>'UF<span class="campo-obrigatorio">*</span>:','type' => 'select','div' => array('class' => 'inputCliente input text divUf')));
					echo $this->Form->input('Endereco.0.cidade', array('label'=>'Cidade<span class="campo-obrigatorio">*</span>:', 'type' => 'select'));
					echo $this->Form->input('Endereco.0.bairro', array('label'=>'Bairro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Endereco.0. ponto_referencia', array('label'=>'Ponto de Referência:','type' => 'textarea'));

				
				?>	
			</div>	
		</fieldset>
	</section>

	<section class="coluna-central" >
		<fieldset>
			<legend>Dados Bancários</legend>

			<div class="coluna-content">

				<?php		
					echo $this->Form->input('Dadosbancario.nome_banco',array('label' => 'Nome do Banco:','class' => 'tamanho-medio'));
					echo $this->Form->input('Dadosbancario.numero_banco',array('label' => 'Número do Banco:','class' => 'tamanho-medio'));
					echo $this->Form->input('Dadosbancario.nome_agencia',array('label' => 'Nome da Agência:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Dadosbancario.numero_agencia',array('label' => 'Númeor da Agência:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Dadosbancario.conta',array('label' => 'Conta:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Dadosbancario.telefone_banco',array('label' => 'Telefone:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Dadosbancario.gerente',array('label' => 'Gerente:','class' => 'tamanho-pequeno'));
				?>

			</div>
		</fieldset>
	</section>

	<section id="coluna-direita" class="coluna-direita" >
		<fieldset>
			<legend>Dados do Crédito</legend>

			<div class="estoque coluna-content">
				<?php
					echo $this->Form->input('Dadoscredito.limite',array('label' => 'Limite de Crédito:','class' => 'tamanho-medio'));
					echo $this->Form->input('Dadoscredito.validade_limite',array('label' => 'Validade do Limitte:','type' => 'text','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Dadoscredito.status',array('label' => 'Status:','type' => 'select'));
					echo $this->Form->input('Dadoscredito.bloqueado',array('label' => 'Bloqueado:','type' => 'select'));

				?>

			</div>
		</fieldset>
	</section>
</section><!---Fim section-superior--->

<footer>
	
	 <?php 		
	echo $this->form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarParceiro','controller' =>'Parceirodenegocio','action' => 'add','view' => 'add'));    
	echo $this->Form->end();
    ?>

</footer>

<!-- Modal Add Categoria -->
	
	<?php echo $this->element('categoria_add', array('modal'=>'add-categoria'));?>

<!-- /.modal -->
