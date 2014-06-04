<?php 
	$this->start('css');
		echo $this->Html->css('table');
	    echo $this->Html->css('compras');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		echo $this->Html->script('compras.js');
	$this->end();
	
	
	$this->start('modais');
	    echo $this->element('parceirodeNegoicos_add',array('modal'=>'add-parceiroFornecedor'));
	    echo $this->element('produtos_add',array('modal'=>'add-produtos'));
	    echo $this->element('categoria_add', array('modal'=>'add-categoria'));
	$this->end();
?>

<header>
    <?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <h1 class="menuOption44">Cadastrar Cotações</h1>
	
</header>

<section>
	<header>Cadastro de Cotações</header>
	<?php echo $this->Form->create('Cotacao');?>
	<!-- INICIO COTAÇÕES -->
	<fieldset>
		<legend>Dados da Cotação</legend>
		<section class="coluna-esquerda">
			<?php
				echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userid));
				echo $this->Form->input('tipo',array('type'=>'hidden','value'=>'COTACAO'));	
				echo $this->Form->input('status',array('type'=>'hidden','value'=>'ABERTO'));	


				echo $this->Form->input('data_inici',array('label'=>'Data de Início<span class="campo-obrigatorio">*</span>:','class'=>'dataInicio tamanho-pequeno inputData','type'=>'text'));
				echo '<span id="msgDataInicial" class="Msg-tooltipDireita" style="display:none;">Preencha a Data Inicial</span>';
				echo '<span id="msgDataInicialErrada" class="Msg-tooltipDireita" style="display:none;">Preencha a Data Inicial Corretamente</span>';
				echo $this->Form->input('prazo_pagamento',array('label'=>'Prazo de Pagamento:','class'=>'tamanho-pequeno','type'=>'text','maxlength'=>'20'));
				

			?>
		</section>
		
		<section class="coluna-central">
			<?php
				echo $this->Form->input('data_fim',array('label'=>'Data de Fim<span class="campo-obrigatorio">*</span>:','class'=>'dataFim tamanho-pequeno inputData','type'=>'text'));
				echo '<span id="msgDataVencimentoInvalida" class="Msg-tooltipDireita" style="display:none;">A data Final não pode ser menor que a inicial</span>';
				echo '<span id="msgDataFinalErrada" class="Msg-tooltipDireita" style="display:none;">Preencha a data Final corretamente</span>';
				echo '<span id="msgDataFinal" class="Msg-tooltipDireita" style="display:none;">Preencha a Data Final</span>';

				echo $this->Form->input('forma_pagamento',array('type'=>'select','label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno desabilita','options' => array(''=>'','BOLETO' => 'Boleto','CHEQUE' => 'Cheque', 'CREDITO' => 'Crédito', 'DEPOSITO' => 'Depósito', 'DINHEIRO' => 'Dinheiro', 'VALE' => 'Vale' )));
			?>
		</section>
		
		<section class="coluna-direita">
			<?php
			
				
			?>
		</section>
	</fieldset>
	
	<!-- INICIO PRODUTOS -->
	<section class="coluna-Produto coluna-esquerda">
		<fieldset>		
			<legend>Produtos</legend>
				<div class="input autocompleteProduto conta">
					<span id="msgValidaProduto" class="Msg tooltipMensagemErroTopo" style="display:none">Escolha os Produtos</span>
					<label id="SpanPesquisarFornecedor">Buscar Produto<span class="campo-obrigatorio">*</span>:</label>
					<select class="tamanho-medio limpa" id="add-produtos">
						<option></option>
						<option value="add-produto">Cadastrar</option>

						<?php
							foreach($produtos as $produto)
							{
								echo "<option id='".$produto['Produto']['id']."' data-nome='".$produto['Produto']['nome']."' data-unidade='".$produto['Produto']['unidade']."'>";
								echo $produto['Produto']['nome'];
								echo "</option>";
							}
						?>

					</select>
				</div>		
			
			
			<?php	
				echo $this->html->image('botao-adicionar2.png',array('alt'=>'Adicionar',
									     'title'=>'Adicionar',
										 'class'=>'bt-addItens',
										 'id'=>'bt-adicionarProduto'
										 ));
										 
				echo $this->Form->input('vazio.vazio',array('label'=>'Quantidade<span class="campo-obrigatorio">*</span>:','id'=>'produtoQtd','class'=>'tamanho-pequeno','type'=>'text','maxlength'=>'15'));		
				echo '<span id="msgQtdVazia" class="Msg-tooltipDireita" style="display:none;">Preencha a Quantidade</span>';
				echo $this->Form->input('vazio.vazio',array('label'=>'','id'=>'produtoUnid','class'=>'tamanho-pequeno borderZero','type'=>'text','disabled'=>'disabled'));		
				echo $this->Form->input('vazio.vazio',array('label'=>'Observação:','id'=>'produtoObs','class'=>'tamanho-medio','type'=>'textarea','maxlength'=>'99'));		
				
			?>
		
			<section class="tabela_fornecedores">
				<table id="tbl_produtos" >
					<thead>
						<th>Produto nome</th>
						<th>Quantidade</th>									
						<th>Unidade</th>
						<th>Observação</th>						
						<th>Ações</th>					
					</thead>
							
				</table>
			</section>
		</fieldset>
	</section>
	
	<!-- INICIO FORNECEDOR -->	
	<section class="coluna-Fornecedor coluna-esquerda">
		<fieldset>		
			<legend>Fornecedores</legend>
				<div class="input autocompleteFornecedor conta">
					<span id="msgValidaFor" class="Msg tooltipMensagemErroTopo" style="display:none">Escolha os Fornecedores</span>
					<label id="SpanPesquisarFornecedor">Buscar Fornecedor<span class="campo-obrigatorio">*</span>:</label>
					<select class="tamanho-medio limpa" id="add-fornecedor">
						<option></option>
						<option value="add-parceiroFornecedor">Cadastrar</option>

						<?php
							foreach($parceirodenegocios as $parceirodenegocio)
							{
								echo "<option id='".$parceirodenegocio['Parceirodenegocio']['id']."' data-nome='".$parceirodenegocio['Parceirodenegocio']['nome']."' data-cpf='".$parceirodenegocio['Parceirodenegocio']['cpf_cnpj']."'>";
								echo $parceirodenegocio['Parceirodenegocio']['nome'];
								echo "</option>";
							}
						?>

					</select>
				</div>		
			
			
			<?php	
				echo $this->html->image('botao-adicionar2.png',array('alt'=>'Adicionar',
									     'title'=>'Adicionar',
										 'class'=>'bt-addItens',
										 'id'=>'bt-adicionarFornecedor'
										 ));
			?>
		
			<section class="tabela_fornecedores">
				<table id="tbl_fornecedores" >
					<thead>
						<th>Parceiro nome</th>
						<th>CPF/CNPJ</th>					
						<th>Ações</th>					
					</thead>
							
				</table>
			</section>
		</fieldset>
	</section>
				
	
	<section id="area_inputHidden"></section>
	
	<section id="area_inputHidden_Produto"></section>
	
</section>

<footer>
	<?php
		 echo $this->form->submit('botao-salvar.png',array(
							    'class'=>'bt-salvar',
							    'alt'=>'Salvar',
							    'title'=>'Salvar',
							    
	    ));
		    echo $this->Form->end();
	?>	
</footer>


