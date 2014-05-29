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
	    echo $this->element('produtos_add',array('modal'=>'add-produtos_add'));
	$this->end();
?>

<header>
    <?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <h1 class="menuOption44">Cadastrar Cotações</h1>
	
</header>

<section>
	<header>Cadastro de Cotações</header>
	<?php echo $this->Form->create('Comoperacao');?>
	<!-- INICIO COTAÇÕES -->
	<fieldset>
		<legend>Dados da Cotação</legend>
		<section class="coluna-esquerda">
			<?php
				echo $this->Form->input('Comoperacao.user_id',array('type'=>'hidden','value'=>$userid));
				echo $this->Form->input('Comoperacao.tipo',array('type'=>'hidden','value'=>'COTACAO'));	

				echo $this->Form->input('Comoperacao.data_inici',array('label'=>'Data de Início:','class'=>'tamanho-pequeno inputData','type'=>'text'));
				echo $this->Form->input('Comoperacao.prazo_entrega',array('label'=>'Prazo:','class'=>'tamanho-pequeno','type'=>'text'));
				

			?>
		</section>
		
		<section class="coluna-central">
			<?php
				echo $this->Form->input('Comoperacao.data_fim',array('label'=>'Data de Fim:','class'=>'tamanho-pequeno inputData','type'=>'text'));
				echo '<span id="msgDataVencimentoInvalida" class="Msg-tooltipDireita" style="display:none;">A data Final não pode ser menor que a inicial</span>';
				echo $this->Form->input('Comoperacao.forma_pagamento',array('type'=>'select','label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno desabilita','options' => array(''=>'','BOLETO' => 'Boleto','CHEQUE' => 'Cheque', 'CREDITO' => 'Crédito', 'DEBITO' => 'Débito', 'DINHEIRO' => 'Dinheiro', 'VALE' => 'Vale' )));
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
					<span id="msgValidaParceiro" class="Msg tooltipMensagemErroTopo" style="display:none">Preencha o campo Produto</span>
					<label id="SpanPesquisarFornecedor">Buscar Produto<span class="campo-obrigatorio">*</span>:</label>
					<select class="tamanho-medio limpa" id="add-produtos">
						<option></option>
						<option value="add-produto">Cadastrar</option>

						<?php
							foreach($produtos as $produto)
							{
								echo "<option id='".$produto['Produto']['id']."' data-nome='".$produto['Produto']['nome']."'>";
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
										 
				echo $this->Form->input('vazio.qtd',array('label'=>'Quantidade<span class="campo-obrigatorio">*</span>:','id'=>'produtoQtd','class'=>'tamanho-pequeno','type'=>'text'));		
				echo $this->Form->input('vazio.obs',array('label'=>'Observação:','id'=>'produtoObs','class'=>'tamanho-medio','type'=>'textarea'));		
				
			?>
		
			<section class="tabela_fornecedores">
				<table id="tbl_produtos" >
					<thead>
						<th>Produto nome</th>
						<th>Quantidade</th>									
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
					<label id="SpanPesquisarFornecedor">Buscar Fornecedor:</label>
					<select class="tamanho-medio limpa" id="add-fornecedor">
						<option></option>
						<option value="add-parceiroFornecedor">Cadastrar</option>

						<?php
							foreach($parceirodenegocios as $parceirodenegocio)
							{
								echo "<option id='".$parceirodenegocio['Parceirodenegocio']['id']."' data-nome='".$parceirodenegocio['Parceirodenegocio']['nome']."' data-cpf='".$parceirodenegocio['Parceirodenegocio']['cpf_cnpj']."' data-status='".$parceirodenegocio['Parceirodenegocio']['status']."' >";
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
						<th>Status</th>					
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


