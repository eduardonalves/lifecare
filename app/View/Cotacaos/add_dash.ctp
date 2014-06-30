<?php 
	$this->start('css');
		echo $this->Html->css('table');
	    echo $this->Html->css('compras_cotacaos');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		echo $this->Html->script('cotacao_addDash.js');
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
	<?php echo $this->Form->create('Cotacao',array('id'=>'CotacaoAddForm','url'=>array('controller'=>'Cotacaos','action'=>'add')));?>
	<!-- INICIO COTAÇÕES -->
	
		<section class="coluna-esquerda">
			<?php
				echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userid));
				echo $this->Form->input('tipo',array('type'=>'hidden','value'=>'COTACAO'));	
				echo $this->Form->input('status',array('type'=>'hidden','value'=>'ABERTO'));	


				echo $this->Form->input('data_inici',array('label'=>'Data de Início<span class="campo-obrigatorio">*</span>:','class'=>'confirmaInput dataInicio tamanho-pequeno inputData','type'=>'text'));
				echo '<span id="msgDataInicial" class="Msg-tooltipDireita" style="display:none;">Preencha a Data Inicial</span>';
				echo '<span id="msgDataInicialErrada" class="Msg-tooltipDireita" style="display:none;">Preencha a Data Inicial Corretamente</span>';
				
				echo "<div id='divSelPgto'>";
					echo $this->Form->input('forma_pagamento',array('id'=>'pagamento','type'=>'select','label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno desabilita','options' => array(''=>'','BOLETO' => 'Boleto','CHEQUE' => 'Cheque', 'CREDITO' => 'Crédito', 'DEPOSITO' => 'Depósito', 'DINHEIRO' => 'Dinheiro', 'VALE' => 'Vale' )));
				echo "</div>";
				echo "<div id='divFrmPgto' style='display:none;'>";
					echo $this->Form->input('Vazio.frmPgto',array('id'=>'frmPgto','type'=>'text','label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno borderZero','disabeld'=>'disabled'));
				echo "</div>";			?>
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
				echo $this->Form->input('prazo_pagamento',array('label'=>'Prazo de Pagamento:','class'=>'confirmaInput tamanho-pequeno','type'=>'text','maxlength'=>'20','after' => '<span class="afterInput">&nbsp;dia(s)</span>'));
			?>
		</section>
	
	<!-- INICIO FORNECEDOR -->	
	<section>
		<header>Fornecedores</header>
			<div class='confirma'>
			<section class="coluna-esquerda">				
				<div class="input autocompleteFornecedor conta">
					<span id="msgValidaFor" class="Msg tooltipMensagemErroTopo" style="display:none">Escolha os Fornecedores</span>
					<label id="SpanPesquisarFornecedor">Buscar Fornecedor<span class="campo-obrigatorio">*</span>:</label>
					<select class="tamanho-medio limpa fornecedorADD" id="add-fornecedor">
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
			</section>	
			
			<section class="coluna-central"> 
				<?php	
					echo $this->html->image('botao-adicionar2.png',array('alt'=>'Adicionar',
											 'title'=>'Adicionar',
											 'class'=>'bt-addForne',
											 'id'=>'bt-adicionarFornecedor'
											 ));
				?>
			</section>
			</div>
			<section class="coluna-direita">
				<?php
				
					
				?>
			</section>
	</section>
			<div style="clear:both;"></div>
			<section class="tabela_fornecedores">
				<table id="tbl_fornecedores" >
					<thead>
						<th>Nome do Fornecedor</th>
						<th>CPF/CNPJ</th>					
						<th class="confirma">Ações</th>					
					</thead>
							
				</table>
			</section>
	
	
	<!-- INICIO PRODUTOS -->
	<section>
		<header>Produtos</header>
		<div class='confirma'>
			<section class="coluna-esquerda">				
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
											 'class'=>'bt-addItens sumir',
											 'id'=>'bt-adicionarProduto'
											 ));
				 
					echo $this->Form->input('vazio.vazio',array('label'=>'Quantidade<span class="campo-obrigatorio">*</span>:','id'=>'produtoQtd','class'=>'Nao-Letras confirmaInput tamanho-pequeno','type'=>'text','maxlength'=>'15'));		
					echo '<span id="msgQtdVazia" class="Msg-tooltipDireita" style="display:none;">Preencha a Quantidade</span>';
					echo $this->Form->input('vazio.vazio',array('label'=>'','id'=>'produtoUnid','class'=>'tamanho-pequeno borderZero','type'=>'text','disabled'=>'disabled'));
				?>
			
			</section>
			
			<section class="coluna-central">
				<?php
							
					echo $this->Form->input('vazio.vazio',array('label'=>'Observação:','id'=>'produtoObs','class'=>'confirmaInput tamanho-medio ','type'=>'textarea','maxlength'=>'99'));		
					echo $this->Form->input('vazio.vazio',array('id'=>'moduloCompras','type'=>'hidden','value'=>1));		
					echo $this->Form->input('vazio.vazio',array('id'=>'validaCada','type'=>'hidden','value'=>0));		
					echo $this->Form->input('vazio.vazio',array('id'=>'validaProd','type'=>'hidden','value'=>0));				
				?>
			</section>	 
			</div>
			<section class="tabela_fornecedores">
				<table id="tbl_produtos" >
					<thead>
						<th>Nome do Produto</th>
						<th style="width: 80px !important;">Quantidade<span class="campo-obrigatorio">*</span></th>									
						<th style="width: 70px;">Unidade</th>
						<th style="width: 150px;">Observação</th>						
						<span id="msgValidaConfirmaProduto" class="Msg tooltipMensagemErroTopo" style="display:none">Confirme as Informações do Produto</span>
						<th class="confirma">Ações</th>					
					</thead>
					
					<?php
						$j = 0;
						foreach($produtoslista as $prods){
							
							echo "<tr class='produtoTr_".$j."'>";
								echo "<td class='whiteSpace'><span title='".$prods['Produto']['nome']."'>";
									echo $prods['Produto']['nome'];
									echo $this->Form->input('Comitensdaoperacao.'.$j.'.produto_id',array('type'=>'hidden','value'=>$prods['Produto']['id']));
									echo "</span>";									
								echo "</td>";
								
								echo "<td>";
									echo $this->Form->input('Comitensdaoperacao.'.$j.'.qtde',array('id'=>'itenQtd'.$j,'label'=>'','type'=>'text','class'=>'Nao-Letras tamanho-pequeno','style'=>'text-align:center;'));
									echo '<span id="msgValidaQtde'.$j.'" class="Msg-tooltipDireita" style="display:none;left: 54%;">Preencha a Quantidade do Produto</span>';
								echo "</td>";
								
								echo "<td>";
									echo $prods['Produto']['unidade'];
								echo "</td>";
								
								echo "<td>";
									echo $this->Form->input('Comitensdaoperacao.'.$j.'.obs',array('label'=>'','type'=>'text','class'=>'tamanho-grande','style'=>'text-align:center;'));
								echo "</td>";
								
								echo "<td class='confirma'>";
									echo "<span id='spanStatus".$j."' class='aberto' style='display:none;'></span>";
									echo "<img title='Editar' alt='Editar' src='/app/webroot/img/botao-tabela-editar.png' id='editi".$j."' class='btnEditi' style='display:none;'/>";
									echo "<img title='Confirmar' alt='Confirmar' src='/app/webroot/img/bt-confirm.png' id='confir".$j."' class='btnConfirm'/>";
									echo "<img title='Remover' alt='Remover' src='/app/webroot/img/lixeira.png' id='excluirP_".$j."' class='btnRemoveProdu' style='display:none;'/>";
								echo "</td>";
								
							echo "</tr>";
							$j++;
						}					
					?>				
					
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



