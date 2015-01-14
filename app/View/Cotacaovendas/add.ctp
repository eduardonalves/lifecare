<?php 
	$this->start('css');
		echo $this->Html->css('table');
		echo $this->Html->css('cotacaovendas');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		echo $this->Html->script('cotacaos_vendas.js');
	$this->end();
	
	
	$this->start('modais');
	    echo $this->element('parceirodeNegoicos_add',array('modal'=>'add-parceiroFornecedor'));
	    echo $this->element('produtos_add',array('modal'=>'add-produtos'));
	    echo $this->element('categoria_add', array('modal'=>'add-categoria'));
	$this->end();
?>

<header>
    <?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); 
		//echo $modulo;
    ?>

    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <h1 class="menuOption52">Cadastrar Cotações</h1>
	
</header>

<section>
	<header>Cadastro de Cotações</header>
	<?php echo $this->Form->create('Cotacaovenda');?>
	<!-- INICIO COTAÇÕES -->
	
		<section class="coluna-esquerda">
			<?php
				echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userid));
				echo $this->Form->input('tipo',array('type'=>'hidden','value'=>'CTVENDA'));	
				echo $this->Form->input('status',array('type'=>'hidden','value'=>'ABERTO'));	
				
				$dataHoje = date('d/m/Y');
				echo $this->Form->input('data_inici',array('value'=>$dataHoje,'label'=>'Data de Início:','class'=>'borderZero dataInicio tamanho-pequeno inputData','type'=>'text','readonly'=>'readonly','onfocus'=>'this.blur();','style' => 'background: rgb(250, 250, 250);'));
				
				echo "<div id='inputNormais'>";
					echo $this->Form->input('forma_pagamento',array('id'=>'normalFrm', 'type'=>'select','label'=>'Forma de Pagamento:','class'=>'confirmaInput tamanho-pequeno desabilita','options' => array(''=>'','BOLETO' => 'Boleto','CHEQUE' => 'Cheque', 'CREDITO' => 'Crédito', 'DEBITO' => 'Débito', 'DEPOSITO A VISTA' => 'Depósito a Vista','DEPOSITO A PRAZO' => 'Depósito a Prazo', 'DINHEIRO' => 'Dinheiro', 'VALE' => 'Vale' )));
				echo "</div>";
				echo "<div id='inputConfirma' style='display:none;'>";
					echo $this->Form->input('forma_pagamento',array('style'=>'background: #fff !important','id'=>'frmPgto','type'=>'text','label'=>'Forma de Pagamento:','class'=>'borderZero tamanho-pequeno','readonly' => 'readonly','onfocus'=>'this.blur();'));
				echo "</div>";
			?>
		</section>
		
		<section class="coluna-central">
			<?php
				echo $this->Form->input('data_fim',array('label'=>'Data de Fim<span class="campo-obrigatorio">*</span>:','class'=>'confirmaInput dataFim tamanho-pequeno inputData','type'=>'text'));
				echo '<span id="msgDataVencimentoInvalida" class="Msg-tooltipDireita" style="display:none;">A data Final não pode ser menor que a inicial</span>';
				echo '<span id="msgDataFinalErrada" class="Msg-tooltipDireita" style="display:none;">Preencha a data Final corretamente</span>';
				echo '<span id="msgDataFinal" class="Msg-tooltipDireita" style="display:none;">Preencha a Data Final</span>';
			?>
		</section>
		
		<section class="coluna-direita">
			<?php
				echo $this->Form->input('prazo_pagamento',array('label'=>'Prazo de Pagamento:','class'=>'Nao-Letras confirmaInput tamanho-pequeno prazo-pagamento','type'=>'text','maxlength'=>'20','after' => '<span class="afterInput">&nbsp;dia(s)</span>'));
			?>
		</section>
	
	<header id="titulo-header">Dados do Vendedor</header>

	<?php echo $this->Form->create('Cotacaovenda',array('action'=>'add')); ?>

	
		<div class="fieldset">
			<h2 class="legendEffect"><span class="tributoVale">Dados do Vendedor</span></h2>
			<span id="msgVendedorVazio" class="Msg-tooltipDireita hideMsg" style="display:none;">Selecione o Vendedor</span>
			<section class="coluna-esquerda confirma">
				<span id="msgDataInicial" class="Msg-tooltipDireita hideMsg" style="display:none;">Preencha a Data Inicial</span>
				<div class="input autocompleteVendedor">
					<label>Pesquisar Vendedor<span class="campo-obrigatorio">*</span>:</label>
					<select class="tamanho-medio" id="add-vendedor">
						<?php

						if ( count($allVendedores) == 1 ){

							echo "<option id='".$allVendedores[0]['Vendedor']['nome']."' value='".$allVendedores[0]['Vendedor']['id']."' >";
							echo $allVendedores[0]['Vendedor']['nome'];
							echo "</option>";
							echo "</select>";
						?>
						<script>
						
							$(window).load( function(){
								
								$("#add-vendedor").trigger('change');
								$('#bt-preencherVendedor').trigger('click');	
								$('.autocompleteVendedor').css('display','none');
								$('#bt-preencherVendedor').css('display','none');
								$('.vendedorNome').css('margin-left','-70px');
								$('.vendedorNome').css('margin-top','10px');
								
							});
						
						</script>
						
						<?php
						}else{
						?>
						<option id="optvazioForn"></option>
						<?php
							foreach($allVendedores as $vendedor){
								echo "<option id='".$vendedor['Vendedor']['nome']."' value='".$vendedor['Vendedor']['id']."' >";
								echo $vendedor['Vendedor']['nome'];
								echo "</option>";
							}
							echo "</select>";
						}
						?>
				</div>
			</section>
			<section class="coluna-central">
				<?php echo $this->html->image('preencher2.png',array('alt'=>'Preencher','title'=>'Preencher','class'=>'bt_preencher confirma','id'=>'bt-preencherVendedor')); ?>
				<div class="inputFalsa vendedorNome">	
					<div class="labelFalsa"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo')); ?></div>
					<div class="textoFalsa"><p id="nome_vendedor"></p></div>
				</div>
				
				<?php echo $this->Form->input('vendedor_id', array('id'=>'vendedorId_hidden','type' => 'hidden')); ?>
				<?php //echo $this->Form->input('valor_total', array('id'=>'VendaValorTotal','type' => 'hidden', 'value'=>'102')); ?>
				
			</section>
			<section class="coluna-direita"></section>
			
		</div>


<!-- ###################################################################################################################################################################3 -->
<header id="titulo-header">Dados do Cliente</header>

	<!--Fieldset Do CLIENTE-->
		<div id="fieldCliente" class="fieldset">
			<span id="msgClienteVazio" class="Msg-tooltipDireita hideMsg" style="display:none;">Selecione o Cliente</span>
			<h2 class="legendEffect"><span>Dados do Cliente</span></h2>

			<section class="coluna-esquerda confirma">
				<div class="input autocompleteCliente tela-resultado">
					<label>Pesquisar Cliente<span class="campo-obrigatorio">*</span>:</label>
					<select class="tamanho-medio" id="add-cliente" tabindex="7">
						<option id="optvazioForn"></option>
						<option value="add-Cliente">Cadastrar</option>
						<?php						
							foreach($allClientes as $allCliente){								
								
								$limiteDisponivel = 0;
								$ultimoCredito = count($allCliente['Dadoscredito']) - 1;								
								
								if($ultimoCredito >= 0){
									//TERA CRÈDITO, E SERA CALCULADO
									if(isset($allCliente['Dadoscredito'][$ultimoCredito]['limite']) && isset($allCliente['Dadoscredito'][$ultimoCredito]['limite_usado'])){
										//SE HOUVER ALGUM LIMITE UTILIZADO									
										$limiteDisponivel = $allCliente['Dadoscredito'][$ultimoCredito]['limite'] - $allCliente['Dadoscredito'][$ultimoCredito]['limite_usado'];
									}else{
										$limiteDisponivel = $allCliente['Dadoscredito'][$ultimoCredito]['limite'];
									}
								}								
								echo "<option id='".$allCliente['Cliente']['nome']."' class='".$allCliente['Cliente']['cpf_cnpj']."' data-ultimo='".$ultimoCredito."' data-limite=\"".$limiteDisponivel."\" rel='".$allCliente['Cliente']['tipo']."' value='".$allCliente['Cliente']['id']."' >";
								echo $allCliente['Cliente']['nome'];
								echo "</option>";
							}
						?>
					</select>
				</div>
			</section>

			<section id="campoSaidaNome" class="coluna-central">
				<?php echo $this->html->image('preencher2.png',array('alt'=>'Preencher','title'=>'Preencher','class'=>'bt_preencher confirma','id'=>'bt-preencher_Cliente')); ?>
				<div class="inputFalsa">	
					<div class="labelFalsa"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo')); ?></div>
					<div class="textoFalsa"><p id="nome_parceiro"></p></div>
				</div>
			</section>

			<span id="spanSaidaCpfCnpj" class="MsgCpfCnpj tooltipMensagemErroTopo" style="display:none">Preencha os Dados do Cliente</span>

			<section class="coluna-direita" id="campo-SaidaCnpj">
				
				<div class="inputFalsa">	
					<div class="labelFalsa2"><?php echo $this->Html->Tag('p','CPF/CNPJ:',array('class'=>'titulo')); ?></div>
					<div class="textoFalsa"><p id="cpfcnpj_parceiro" class="textoMenor"></p></div>
				</div>	
				<?php
					echo $this->Form->input('Parceirodenegocio.0.parceirodenegocio_id', array('id'=>'parceiro_id','type' => 'hidden'));
				?>
			</section>
		</div>
	
	
		<!-- INICIO PRODUTOS -->
		<section class="coluna-Produto_Pedido">
			
				<header>Produtos</header>
				<div class="confirma">
					<section class="coluna-esquerda">
						
							<div class="input autocompleteProduto conta" style="width: 355px;">
								<span id="msgValidaProduto" class="Msg tooltipMensagemErroTopo" style="display:none">Escolha os Produtos</span>
								<label id="SpanPesquisarFornecedor">Buscar Produto<span class="campo-obrigatorio">*</span>:</label>
								<select class="tamanho-medio limpa" id="add-produtos">
									<option></option>
									<!--<option value="add-produto">Cadastrar</option>-->

									<?php
										foreach($produtos as $produto)
										{
											if($produto['Produto']['bloqueado'] != 1){
												$quantidadeValida = (int) $produto['Produto']['estoque'] - (int) $produto['Produto']['reserva'];
												echo "<option id='".$produto['Produto']['id']."' data-bloq='liberado' data-reserva='".$produto['Produto']['reserva']."' data-estoque='".$produto['Produto']['estoque']."' data-nome='".$produto['Produto']['nome']."' data-preVenda='".$produto['Produto']['preco_venda']."' data-unidade='".$produto['Produto']['unidade']."' data-quantidade-valida='". $quantidadeValida ."'>";

												echo $produto['Produto']['nome'];
												echo "</option>";
												
											}else{
												
												$quantidadeValida = (int) $produto['Produto']['estoque'] - (int) $produto['Produto']['reserva'];
												echo "<option  id='".$produto['Produto']['id']."' data-bloq='bloqueado' data-reserva='".$produto['Produto']['reserva']."' data-estoque='".$produto['Produto']['estoque']."' data-nome='".$produto['Produto']['nome']."' data-preVenda='".$produto['Produto']['preco_venda']."' data-unidade='".$produto['Produto']['unidade']."' data-quantidade-valida='". $quantidadeValida ."'>";
													echo $produto['Produto']['nome'] . "  (BLOQUEADO)";
												echo "</option>";
												
											}
										}
									?>

								</select>
							</div>		
					
						<?php	
							echo $this->html->image('botao-adicionar2.png',array('alt'=>'Adicionar',
													 'title'=>'Adicionar',
													 'class'=>'bt-addItens_Pedido',
													 'id'=>'bt-adicionarProduto'
													 ));
						?>			
					
						<?php	
							echo $this->Form->input('vazio.vazio',array('label'=>'Valor Produto:','id'=>'valorNormal','class'=>'confirmaInput confirma tamanho-pequeno borderZero','type'=>'text','maxlength'=>'15','readonly'=>'readonly','onfocus'=>'this.blur();'));	
							echo $this->form->input('vazio.vazio',array('label'=>'Qtd. Disponível:','id'=>'qtd_dispo_prod','Class'=>'tamanho-medio borderZero','onfocus'=>'this.blur();','readonly'=>'readonly'));
							echo $this->Form->input('vazio.vazio',array('label'=>'Quantidade<span class="campo-obrigatorio">*</span>:','id'=>'produtoQtd','class'=>'Nao-Letras confirmaInput tamanho-pequeno','type'=>'text','maxlength'=>'15'));		
							echo '<span id="msgQtdVazia" class="Msg-tooltipDireita" style="display:none;">Preencha a Quantidade</span>';
							// echo '<span id="msgQtdVazia1" class="Msg-tooltipDireita" style="display:none;left:250px;width: 150px;">Quantidade Disponível Insuficiente</span>';
							echo '<span id="msgQtdIndisponivel" class="Msg-tooltipDireita" style="display:none;">Quantidade não disponível em estoque</span>';
							echo $this->Form->input('vazio.vazio',array('label'=>'','id'=>'produtoUnid','class'=>'produtoUnid_Pedido tamanho-pequeno borderZero','type'=>'text','disabled'=>'disabled'));
						?>
					</section>
					</div>
					
					<section class="coluna-central">
						<div class="confirma">
							<?php								
								echo $this->Form->input('vazio.vazio',array('label'=>'Valor Venda:','id'=>'produtoValor','class'=>'confirmaInput dinheiro_duasCasas confirma tamanho-pequeno','type'=>'text','maxlength'=>'15'));	
								echo '<span id="spanVendaMenor" class="Msg-tooltipDireita" style="display:none;margin: -5px 0px 0px 245px;width: 170px;z-index: 99999;">Valor da Venda não pode ser menor que o valor do Produto</span>';
								echo '<span id="spanVendaMenor2" class="Msg-tooltipDireita" style="display:none;margin: -5px 0px 0px 245px;width: 110px;z-index: 99999;">Preencha o Valor da Venda</span>';
								echo $this->Form->input('vazio.vazio',array('label'=>'Observação:','id'=>'produtoObs','class'=>'confirmaInput confirma tamanho-medio','type'=>'textarea','maxlength'=>'99'));		
							?>
						</div>
						<?php
							echo $this->Form->input('vazio.vazio',array('id'=>'moduloCompras','type'=>'hidden','value'=>1));
							echo $this->Form->input('vazio.vazio',array('id'=>'validaProd','type'=>'hidden','value'=>0));	
						?>
					</section>
					
					<section class="coluna-central">
						<?php
							echo $this->Form->input('vazio.vazio',array('label'=>'Valor Total:','id'=>'totalProduto','class'=>'tamanho-pequeno dinheiro_duasCasas borderZero','type'=>'text','readonly'=>'readonly','disabled','onfocus'=>'this.blur();'));		
							?>
						
						<span id="spanMensagemDescontoFocus" class="Msg-tooltipDireita hideMsg" style="display:none;margin: 20px 0px 0px 245px;">O valor do desconto é superior ao valor da venda.</span>	
						<?php
							
							if(isset($usuario['Role']['alias']) && $usuario['Role']['alias'] == 'admin'){
								echo $this->Form->input('vazio.vazio',array('label'=>'Desconto da Venda:','id'=>'valorDesconto','class'=>'tamanho-pequeno confirmaInput dinheiro_duasCasas','type'=>'text'));		
							}
							echo $this->Form->input('vazio.vazio',array('label'=>'Crédito do Cliente:','id'=>'creditoCliente','class'=>'tamanho-medio dinheiro_duasCasas borderZero','type'=>'text','readonly'=>'readonly','disabled','onfocus'=>'this.blur();'));		
						?>
					
						<input type="hidden" name="data[Cotacaovenda][valor]" id="totalProdutoHide"/>
						<input type="hidden" id="creditoClienteHide"/>
			</section>			
					
				<section class="tabela_fornecedores">
					<table id="tbl_produtos" >
						<thead>
							<th>Nome do Produto</th>
							<th style="width: 80px !important;">Quantidade<span class="campo-obrigatorio">*</span></th>									
							<th style="width: 70px;">Unidade</th>
							<th style="width: 150px;">Valor Unitário</th>
							<th>Valor Total</th>
							<th style="width: 150px;">Observação</th>
							<span id="msgValidaConfirmaProduto" class="Msg tooltipMensagemErroTopo" style="display:none">Confirme as Informações do Produto</span>
							<th class="confirma">Ações</th>					
						</thead>
								
					</table>
				</section>
		</section>
			
	
		<section id="area_inputHidden"></section>
	
		<section id="area_inputHidden_Produto"></section>
	
</section>

<footer>
	<?php
		echo $this->html->image('botao-voltar.png',array('id'=>'voltar','style'=>'float:left;cursor:pointer;display:none;'));
		echo $this->html->image('botao-confirmar.png',array('id'=>'confirmaDados','style'=>'float:right;cursor:pointer;'));
		
		 echo $this->form->submit('botao-salvar.png',array(
							    'class'=>'bt-salvar',
							    'alt'=>'Salvar',
							    'title'=>'Salvar',
							    'style' => 'display:none;'
							    
	    ));
		echo $this->Form->end();
	?>	
</footer>
