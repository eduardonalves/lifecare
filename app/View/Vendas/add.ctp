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
	<header id="titulo-header">Vendedor</header>
	<?php echo $this->Form->create('Vendas',array('action'=>'add')); ?>
		<div class="fieldset">
			<h2 class="legendEffect"><span class="tributoVale">Dados do Vendedor</span></h2>
			
			<section class="coluna-esquerda">
				<div class="input autocompleteVendedor">
					<label>Pesquisar Vendedor<span class="campo-obrigatorio">*</span>:</label>
					<select class="tamanho-medio" id="add-vendedor">
						<option id="optvazioForn"></option>
						<option value="add-Vendedor">Cadastrar</option>

						<?php
							foreach($allVendedores as $vendedor){
								echo "<option id='".$vendedor['Vendedor']['nome']."' value='".$vendedor['Vendedor']['id']."' >";
								echo $vendedor['vendedor']['nome'];
								echo "</option>";
							}
						?>

					</select>
				</div>
			</section>
			<section class="coluna-central">
				<?php echo $this->html->image('preencher2.png',array('alt'=>'Preencher','title'=>'Preencher','class'=>'bt_preencher bt-preencher_Vendedor')); ?>
			</section>
			<section class="coluna-direita"></section>
			
		</div>
	

	<!--Div primeiro Campo-->
	<div class="campo-superior-total tela-resultado">
		<div class="campo-superior-esquerdo">

			<?php echo $this->Form->input('forma_de_entrada', array('id'=>'vale','options'=>array('Nota', 'Vale'), 'label' => 'Forma de Saída','tabindex'=>'1')); ?>

		</div>

		<div class="campo-superior-direito">

			<?php echo $this->Form->input('devolucao', array('label'=>'Saída de uma Devolução','tabindex'=>'2')); ?>

		</div>

	</div>
<!--Fim Div primeiro Campo-->

<!--Fieldset total-->
	<fieldset class="field-total">
	<!--Fieldset Dados da nota-->
		<div class="fieldset" id="fieldVendedor">
			<h2 class="legendEffect"><span class="dadosVale">Dados da Nota</span></h2>

			<section id="ajusteCampoObs" class="coluna-esquerda">
				<div class="imposto">

					<?php echo $this->Form->input('chave_acesso', array('type'=>'text','class'=>'tamanho-medio desabilita','label'=>'Chave de Acesso:','maxlength' => '50','tabindex'=>'3')); ?>

				</div>
				
				<div>

					<?php 
						echo $this->Form->input('vazio.vazio',array('id'=>'moduloCompras','type'=>'hidden','value'=>0));
						echo $this->Form->input('obs', array('type'=>'textarea','label'=>'Observação:','class'=>'campo-observacao limpa','maxlength' => '1000','tabindex'=>'6'));
						echo $this->Form->input('obs',array('type'=>'hidden','id'=>'hideObsSaida'));
					?>

				</div>
				
				<div class="texto-obs"></div>
			</section>

			<section id="ajusteNumeroVale" class="coluna-central">

				<?php echo $this->Form->input('nota_fiscal', array('type'=>'text','class'=>'nfiscal nvale tamanho-medio desabilita validacao-saida','label'=>'Número NF<span class="campo-obrigatorio">*</span>:','required'=>'false','allowEmpty' => 'false','title'=>'Campo Obrigatório','tabindex'=>'4')); ?>

			</section>

			<section class="coluna-direita" id="campo-direita">

				<?php echo $this->Form->input('data', array('type'=>'text','required'=>'false','class'=>'tamanho-pequeno inputData desabilita limpa validacao-saida','title'=>'Campo Obrigatório','label'=>'Data Emissão<span class="campo-obrigatorio">*</span>:','tabindex'=>'5')); ?>

				<span id="spanDataFuturoSaida" style="display:none" class="MsgData">Data Emissão Não Pode ser um Dia Futuro</span>
				<span id="spanDataInvalidaSaida" class="Msg-tooltipDireita" style="display:none">Preencha a data corretamente</span>
			</section>
		</div>
	<!--Fim Fieldset Dados da nota-->

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

				<?php echo $this->Form->input('parceiro', array('type'=>'text','label'=>'Nome:','onFocus' => 'this.blur()','class'=>'tamanho-medio limpa borderZero','allowEmpty' => 'false','readonly'=>'readonly','title'=>'Campo Obrigatório')); ?>

				<div class="tela-resultado">

					<?php echo $this->html->image('preencher2.png',array('alt'=>'Preencher','title'=>'Preencher','class'=>'bt-preencher_Cliente',)); ?>

			</section>
			<span id="spanSaidaCpfCnpj" class="MsgCpfCnpj tooltipMensagemErroTopo" style="display:none">Preencha os Dados do Cliente</span>

			<script>
				$(document).ready(function(){
					$('body').on('click', '#ui-id-1 li',function(){
						valorCad= $(this).text();

						if(valorCad=="Cadastrar"){
							$(".campo-superior-produto input").val('');
							$("#myModal_add-produtos").modal('show');
						}
					});

					$('body').on('click', '#ui-id-3 a',function(){
						valorCad= $(this).text();

						if(valorCad=="Cadastrar"){
							$(".autocompleteCliente input").val('');
							$("#myModal_add-cliente").modal('show');
							$("#spanClienteCPFExistente").hide();
						}
					});

					$(".bt-preencher_Cliente").click(function(){
						valorForncedor=	$("#add-cliente option:selected" ).val();
						valorCpfCnpj= $("#add-cliente option:selected" ).attr('class');
						valorNome= $("#add-cliente option:selected" ).attr('id');

						if(!valorForncedor==""){
							if(valorForncedor=="add-Cliente"){
						
							}else{
								$(".autocompleteCliente input").val('');
								$(".autocompleteCliente input").removeAttr('required','required');
								
								$("#SaidaParceirodenegocioId").val(valorForncedor);
								$("#SaidaCpfCnpj").val(valorCpfCnpj);
								$("#SaidaParceiro").val(valorNome);
							}
						}
					});

					$(function(){
						$( "#add-cliente" ).combobox();
					});
				});
			</script>

			<section class="coluna-direita" id="campo-SaidaCnpj">

				<?php
					echo $this->Form->input('cpf_cnpj', array('type'=>'text','required'=>'false','class'=>'tamanho-medio desabilita validacao-saida','label'=>'CPF/CNPJ:','disabled'=>'disabled'));
					echo   $this->Form->input('parceirodenegocio_id', array('type' => 'hidden'));
				?>

			</section>
		</div>
	<!--Fim Fieldset Dados da nota-->

	<!--Fieldset Dados tributários-->
		<div class="fieldset">
			<h2 class="legendEffect"><span class="tributoVale">Dados tributários da Nota</span></h2>

			<section class="coluna-esquerda">

				<?php
					echo $this->Form->input('valor_total_produtos', array('type'=>'text','onfocus'=>'this.blur()','label'=>'Valor Total Produto:','class'=>' tamanho-pequeno limpa','readonly'=>'readonly'));
					echo $this->Form->input('valor_ipi', array('div'=>array('class'=>'imposto input text'),'type'=>'text','label'=>'Valor Total IPI:','class'=>'limpa tamanho-pequeno ','allowEmpty' => 'false','title'=>'Campo Obrigatório' ,'readonly'=>'readonly' ,'onfocus'=>'this.blur()'));
				?>

				<div class="imposto">

					<?php echo $this->Form->input('valor_outros', array('type'=>'text','maxlength'=>'20', 'label'=>'Outras Despesas:','class'=>'dinheiro limpa tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório','tabindex'=>'10')); ?>

				</div>
			</section>

			<span id="spanSaidaValorTotalProdutos" class="MsgValorTotalProdutos" style="display:none">Preencha o campo Valor Total Produtos</span>

			<section class="coluna-central">

				<?php echo $this->Form->input('valor_total', array('disable'=>'disable','onfocus'=>'this.blur()','type'=>'text','label'=>'Valor Total da Nota:','class'=>'tamanho-pequeno limpa','readonly'=>'readonly')); ?>

				<div class="imposto">

					<?php echo $this->Form->input('valor_seguro', array('type'=>'text','maxlength'=>'20','label'=>'Valor Seguro:','class'=>'dinheiro  limpa tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório','tabindex'=>'8')); ?>
				
				</div>
			</section>

			<span id="spanSaidaValorTotal" class="MsgSaidaValorTotal" style="display:none">Preencha o campo Valor Total</span>

			<section class="coluna-direita">
				
				<?php echo $this->Form->input('valor_icms', array('div'=>array('class'=>'imposto input text'),'type'=>'text','label'=>'Valor Total ICMS:','class'=>' limpa tamanho-pequeno','allowEmpty' => 'false','title'=>'Campo Obrigatório' ,'readonly'=>'readonly' ,'onfocus'=>'this.blur()')); ?>
				
				<div class="imposto">

					<?php echo $this->Form->input('valor_frete', array('type'=>'text','label'=>'Valor Frete:','class'=>'dinheiro limpa tamanho-pequeno desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório','tabindex'=>'9')); ?>

				</div>
			</section>
		</div>
	<!--Fim Fieldset Dados tributários-->

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
								
								
								echo "<option id='".$produto['Produto']['codigo']."' class='".$produto['Produto']['unidade']."' rel='".$produto['Produto']['descricao']."'  data-cfop='".$produto['Produto']['cfop']."' value='".$produto['Produto']['id']."' >";
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

						<?php echo $this->Form->input('vunitario', array('type'=>'text','maxlength'=>'20','id'=>'ProdutoitenValorUnitario','label'=>'Valor Unitário<span class="campo-obrigatorio">*</span>:','class'=>'limpa dinheiro tamanho-pequeno ativos desativados vu desabilita validacao-saida ','allowEmpty' => 'false','title'=>'Campo Obrigatório','tabindex'=>'12')); ?>

						<span id="spanProdutoitenValorUnitario" class="MsgProdutoitenValorUnitario tooltipMensagemErroDireta" style="display:none">Preencha o campo Valor Unitário</span>

						<?php echo $this->Form->input('vtotal', array('type'=>'text','onfocus'=>'this.blur()','id'=>'ProdutoitenValorTotal', 'label'=>'Valor Total:','class'=>'limpa tamanho-pequeno ativos desativados vt','allowEmpty' => 'false','readonly'=>'readonly')); ?>

						<div class="imposto">

							<?php
								echo $this->Form->input('cfo', array('type'=>'text','id'=>'ProdutoitenCfop','label'=>'CFOP:', 'onfocus'=>'this.blur()', 'class'=>'borderZero tamanho-pequeno ativos limpa','readonly'=>'readonly'));
								echo $this->Form->input('vicm', array('type'=>'text','id'=>'ProdutoitenValorIcms','label'=>'Valor ICMS:','class'=>'dinheiro tamanho-pequeno ativos desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório','tabindex'=>'13'));
								echo $this->Form->input('vip', array('type'=>'text','id'=>'ProdutoitenValorIpi', 'label'=>'Valor IPI:','class'=>'dinheiro tamanho-pequeno ativos desabilita','allowEmpty' => 'false','title'=>'Campo Obrigatório','tabindex'=>'14'));
							?>

						</div>
					</div>

					<div class="direita-infeior">
						<div class="imposto"> </div>
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
				<th class="imposto"><?php echo ('CFOP'); ?></th>
				<th class="imposto"><?php echo ('V. ICMS'); ?></th>
				<th class="imposto"><?php echo ('V. IPI'); ?></th>
				<th><?php echo ('Lote'); ?></th>
				<th class="actions"><?php echo __('Ações'); ?></th>
			
			</thead>
		</table>
	</div>

	<footer>

		<?php
			echo $this->html->image('voltar.png',array('alt'=>'Voltar','title'=>'Voltar','id'=>'voltar2','class'=>'bt-voltar voltar',));
			echo $this->html->image('botao-confirmar.png',array('alt'=>'Confirmar','title'=>'Confirmar','id'=>'avancar2','class'=>'bt-confirmar',));
			echo $this->form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvar-saida-manual'));
			echo $this->form->end();
		?>

	</footer>
</section>
