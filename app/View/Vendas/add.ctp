<?php
	$this->start('css');
		echo $this->Html->css('vendas');
		echo $this->Html->css('table');
		//echo $this->Html->css('jquery-ui/jquery.ui.css');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
		echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();
?>

<?php
	$this->start('script');	
		//	echo $this->Html->script('jquery-ui/jquery.ui.widget.js');
			echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		//	echo $this->Html->script('jquery-ui/jquery.ui.position.js');
		//	echo $this->Html->script('jquery-ui/jquery.ui.menu.js');
		//	echo $this->Html->script('jquery-ui/jquery.ui.autocomplete.js');
		//	echo $this->Html->script('jquery-ui/jquery.ui.tooltip.js');
		echo $this->Html->script('funcoes_vendas.js');
	$this->end();
?>

<?php
	$this->start('modais');
		echo $this->element('produtos_add', array('modal'=>'add-produtos'));
		echo $this->element('lote_add_saida', array('modal'=>'add-lote_saida'));
		echo $this->element('fabricante_add', array('modal'=>'add-fabricante'));
		echo $this->element('cliente_add', array('modal'=>'add-cliente'));
		echo $this->element('categoria_add', array('modal'=>'add-categoria'));
	$this->end();
?>


<header>
	<?php echo $this->Html->image('titulo-saida.png', array('class' => 'saida-icon', 'alt' => 'Saida ', 'title' => 'Saida', 'border' => '0')); ?>
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption52" >Cadastrar Venda</h1>

</header>


<script>
	$(document).ready(function() {
		$(function(){
			var companyList = $("#add-cliente").autocomplete({
				change: function() {}
			});

			companyList.autocomplete('option','change').call(companyList);
		});

		$('.loaderAjaxCarregarLoteDIV').css('display','none');

		$('.bt-add ').click(function(){
			if($('#spanNomeProduto').text() == ''){
				$('.loaderAjaxCarregarLoteDIV').css('display','none');
			}else{
				$('.loaderAjaxCarregarLoteDIV').css('display','block');
			}
		});

		$('#btn-addLote').click(function(){			
			if($('#spanNomeProduto').text() != ''){			
				$('.campo-superior-produto a').css('display','none');
				$(".campo-superior-produto input").attr("readonly", 'readonly');
			}
		});
	});
</script>

<section>
	<?php echo $this->Form->create('Venda',array('action'=>'add')); ?>
	<section id="creditos_header">
		<fieldset>
			<legend>Valores de Crédito</legend>
			
			<ul>
				<li>Crédito do Cliente: &nbsp;R$&nbsp;<span id="credito_cliente"></span></li>
				<li>Valor Total da Venda: &nbsp;R$&nbsp;<span id="valorTotalVenda"></span></li>
			</ul>
			
			
			
		</fieldset>
		
	</section>
	
	<header id="titulo-header">Dados do Vendedor</header>
	
		<div class="fieldset">
			<h2 class="legendEffect"><span class="tributoVale">Dados do Vendedor</span></h2>
			
			<section class="coluna-esquerda">
				<div class="input autocompleteVendedor">
					<label>Pesquisar Vendedor<span class="campo-obrigatorio">*</span>:</label>
					<select class="tamanho-medio" id="add-vendedor">
						<option id="optvazioForn"></option>
						<?php
							foreach($allVendedores as $vendedor){
								echo "<option id='".$vendedor['Vendedor']['nome']."' value='".$vendedor['Vendedor']['id']."' >";
								echo $vendedor['Vendedor']['nome'];
								echo "</option>";
							}
						?>
					</select>
				</div>
			</section>
			<section class="coluna-central">
				<?php echo $this->html->image('preencher2.png',array('alt'=>'Preencher','title'=>'Preencher','class'=>'bt_preencher','id'=>'bt-preencherVendedor')); ?>
				<div class="conteudo-linha">	
					<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><p id="nome_vendedor" class="valor"></p></div>
				</div>
				
				<?php echo $this->Form->input('vendedor_id', array('id'=>'vendedorId_hidden','type' => 'hidden')); ?>
				
			</section>
			<section class="coluna-direita"></section>
			
		</div>

<!-- ###################################################################################################################################################################3 -->
<header id="titulo-header">Dados do Cliente</header>

	<!--Fieldset Do CLIENTE-->
		<div id="fieldCliente" class="fieldset">
			<h2 class="legendEffect"><span>Dados do Cliente</span></h2>

			<section class="coluna-esquerda">
				<div class="input autocompleteCliente tela-resultado">
					<label>Pesquisar Cliente<span class="campo-obrigatorio">*</span>:</label>
					<select class="tamanho-medio" id="add-cliente" tabindex="7">
						<option id="optvazioForn"></option>
						<option value="add-Cliente">Cadastrar</option>

						<?php
							foreach($allClientes as $allCliente){
								echo "<option id='".$allCliente['Cliente']['nome']."' class='".$allCliente['Cliente']['cpf_cnpj']."' rel='".$allCliente['Cliente']['tipo']."' value='".$allCliente['Cliente']['id']."' >";
								echo $allCliente['Cliente']['nome'];
								echo "</option>";
							}
						?>

					</select>
				</div>
			</section>

			<section id="campoSaidaNome" class="coluna-central">
				<?php echo $this->html->image('preencher2.png',array('alt'=>'Preencher','title'=>'Preencher','class'=>'bt_preencher','id'=>'bt-preencher_Cliente')); ?>
				<div class="conteudo-linha">	
					<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><p id="nome_parceiro" class="valor"></p></div>
				</div>
			</section>

			<span id="spanSaidaCpfCnpj" class="MsgCpfCnpj tooltipMensagemErroTopo" style="display:none">Preencha os Dados do Cliente</span>

			<section class="coluna-direita" id="campo-SaidaCnpj">
				
				<div class="conteudo-linha-canto">	
					<div class="linha"><?php echo $this->Html->Tag('p','CPF/CNPJ:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><p id="cpfcnpj_parceiro" class="valor"></p></div>
				</div>	
				<?php
					echo $this->Form->input('parceirodenegocio_id', array('id'=>'parceiro_id','type' => 'hidden'));
				?>
			</section>
		</div>

<!-- ###################################################################################################################################################################3 -->
<header id="titulo-header">Produtos da Venda</header>

	<!--Fieldset Dados do produto-->
		<div class="fieldset dados-produto">
			<h2 class="legendEffect"><span>Dados do Produto</span></h2>

			<div class="campo-superior-produto">
				<div class="input">
					<label id="pesquisaProdutos">Pesquisar produtos<span class="campo-obrigatorio">*</span>:</label>

					<select class="tamanho-medio select selectProduto combo-autocomplete" tabindex="11">
						<option id="optvazioProd"></option>

						<?php
							$produtosFilter = array();

							foreach($allProdutos as $produto){
																
								echo "<option id='".$produto['Produto']['codigo']."' data-precoVenda='".$produto['Produto']['preco_venda']."' class='".$produto['Produto']['unidade']."' rel='".$produto['Produto']['descricao']."' value='".$produto['Produto']['id']."' >";
									echo $produto['Produto']['nome'];
								echo "</option>";
							}
						?>
					</select>
				</div>
				
				<?php echo $this->html->image('preencher2.png',array('alt'=>'Preencher','title'=>'Preencher','class'=>'bt-preencher','id'=>'bt-preencherProduto')); ?>
				
				<span id="spanValProduto" class="MsgValProduto tooltipMensagemErroDireta" style="display:none">Preencha o campos Produtos</span>
			</div>

			<div class="lado-esquerdo">
				<section class="coluna-esquerda">
					
					<?php
						echo $this->Form->input('Produto.codigo', array('type'=>'text','label'=>'Código:','class'=>'borderZero tamanho-pequeno limpa','disabled'=>'disabled'));
						echo $this->Form->input('Produto.nome', array('type'=>'text','label'=>'Nome:','class'=>'tamanho-pequeno inputNomeHidden','disabled'=>'disabled'));
					?>

					<div id="divNomeProduto"></div>

					<?php
						echo $this->Form->input('Produto.unidade', array('type'=>'text','label'=>'Unidade Comercial:','class'=>'borderZero tamanho-pequeno desativados limpa','disabled'=>'disabled'));
						echo $this->Form->input('Produto.descricao', array('type'=>'text','label'=>'Descrição:','class'=>'tamanho-pequeno desativados inputDescHidden','disabled'=>'disabled'));
					?>

					<div id="divDescProduto"></div>
				</section>

				<section class="coluna-central" id="alinhamento-direita">
					<div class="direita-superior">
						
						<?php echo $this->Form->input('qtde', array('type'=>'text', 'onfocus'=>'this.blur()', 'label'=>'Quantidade:','id'=>'qtdTotalProduto','class'=>'limpa tamanho-pequeno resultado-qtde','readonly'=>'readonly')); ?>

						<div id="divQtdProduto"></div>

						<?php echo $this->Form->input('vunitario', array('type'=>'text','maxlength'=>'20','onfocus'=>'this.blur()','readonly'=>'readonly','id'=>'ProdutoitenValorUnitario','label'=>'Valor Unitário:','class'=>'limpa borderZero dinheiro tamanho-pequeno ativos desativados vu desabilita validacao-saida ','allowEmpty' => 'false','title'=>'Campo Obrigatório','tabindex'=>'12')); ?>

						<span id="spanProdutoitenValorUnitario" class="MsgProdutoitenValorUnitario tooltipMensagemErroDireta" style="display:none">Preencha o campo Valor Unitário</span>

						<?php echo $this->Form->input('vtotal', array('type'=>'text','onfocus'=>'this.blur()','id'=>'ProdutoitenValorTotal', 'label'=>'Valor Total:','class'=>'limpa tamanho-pequeno ativos desativados vt','allowEmpty' => 'false','readonly'=>'readonly')); ?>

					</div>
				</section>
			</div>
			<section class="coluna-direita"> 
				<!--Fieldset Dados do lote-->
				<div class="fieldsetLote">
					<h2 class="legendEffect"><span>Dados do Lote</span></h2>

					<span class="spanlotes ">Adicionar Lotes<span class="campo-obrigatorio">*</span>:</span>

					<?php echo $this->html->image('botao-add2.png',array('alt'=>'Adicionar','title'=>'Adicionar lote','class'=>'bt-add select')); ?>

					<span id="spanAdicionarLote" class="MsgAdicionarLote tooltipMensagemErroDireta" style="display:none">Adicione lotes</span>
						<div class="loaderAjaxCarregarLoteDIV" style="display:none">

							<?php echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando','title'=>'Carregando','class'=>'loaderAjaxCarregarLote',)); ?>

							<span>Carregando lotes aguarde...</span>
						</div>	

							<table class="tabela-lote">
								<tr>
									<th>Lote</th>
									<th>Quantidade</th>
									<th>Validade</th>
									<th>Ações</th>
								</tr>
							</table>

							<table id="tabela-hiddenLote" style="display:none">
								<tbody></tbody>
							</table>
				</div>

						<?php echo $this->Form->input('tipo',array('value'=>'SAIDA','type'=>'hidden')); ?>

						<!--Fim Fieldset Dados do lote-->
						<?php 
							echo $this->html->image('bt-limpar.png',array('alt'=>'Limpar Dados do Produto','title'=>'Limpar Dados do Produto','class'=>'bt-limpar','id'=>'bt-limparSaida'));
							echo $this->html->image('botao-adcionar2.png',array('alt'=>'Adicionar','title'=>'Adicionar Produto','class'=>'bt-adicionar calcularProdutos',));
						?>
			</section>

		</div>
		<!--Fim Fieldset Dados do Produto-->
	
	</fieldset>
<!--Fim Fieldset total-->

	<div class="saidas add">
		<table id="tabela-principal" cellpadding="0" cellspacing="0">
			<thead>
				
				<th><?php echo ('Código'); ?></th>
				<th><?php echo ('Nome'); ?></th>
				<th><?php echo ('Und. Comercial'); ?></th>
				<th><?php echo ('Descrição'); ?></th>
				<th><?php echo ('Qtde'); ?></th>
				<th><?php echo ('V. Unitário'); ?></th>
				<th><?php echo ('V. Total'); ?></th>
				<th><?php echo ('Lote'); ?></th>
				<th class="actions"><?php echo __('Ações'); ?></th>
			
			</thead>
		</table>
	</div>

	<footer>
		<div class="lista_hidden_produtos"></div>

		<?php
			echo $this->html->image('voltar.png',array('alt'=>'Voltar','title'=>'Voltar','id'=>'voltar2','class'=>'bt-voltar voltar',));
			echo $this->html->image('botao-confirmar.png',array('alt'=>'Confirmar','title'=>'Confirmar','id'=>'avancar2','class'=>'bt-confirmar',));
			echo $this->form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvar-saida-manual'));
			echo $this->form->end();
		?>

	</footer>
</section>

