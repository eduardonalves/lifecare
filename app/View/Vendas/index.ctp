<?php
	$this->start('css');
		echo $this->Html->css('consulta_compras');
		echo $this->Html->css('table');
		//echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('funcoes_consulta_compras.js');
		
	$this->end();


	$this->start('modais');
		echo $this->element('quicklink_compras', array('modal'=>'add-quicklink'));
		
	$this->end();
	
	function formatDateToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux['2'])){
			if(isset($dataAux['1'])){
				if(isset($dataAux['0'])){
					$data = $dataAux['2']."/".$dataAux['1']."/".$dataAux['0'];
				}
			}
		}
		return $data;
	}
?>
	
<div class="comoperacaos index">
	
	<header>
		<?php echo $this->Html->image('titulo-consultar.png', array('class' => 'saida-icon', 'alt' => 'Saida ', 'title' => 'Saida', 'border' => '0')); ?>

		<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
		<h1 class="menuOption51" >Consultar</h1>
		
	</header>

	<section> <!---section superior--->
		<header>Consulta por Operações, Respostas e/ou Produtos</header>

		<fieldset class="filtros">
			
			<?php
			$ql= $_GET['ql'];
		    if($ql ==''){
				$ql=0;
		    }
		    
			echo $this->Form->input('nome',array('required'=>'false','type'=>'select','label'=>'Pesquisa Rápida:','id'=>'quick-select', 'options' => $quicklinksList,'default'=>$ql));
			?>
			
			<a href="add-quicklink" class="bt-showmodal">

				<?php echo $this->Html->image('botao-adicionar2.png',array('id'=>'quick-salvar')); ?>

			</a>
			
			<?php
			echo $this->Form->end();

			if(isset($_GET['ql']) && $_GET['ql']!=''){
				echo $this->Form->postLink($this->Html->image('botao-excluir2.png',array('id'=>'quick-editar','alt' =>__('Delete'),'title' => __('Delete'))), array('controller' => 'quicklinks','action' => 'delete',  $_GET['ql']),array('escape' => false, 'confirm' => __('Deseja excluir?')));
			}
			?>
			

			<div class="content-filtros">

				<!------------------ Dados da Operação ------------------>
				<section id="filtro-operacao" class="coluna-esquerda">
					<div class="boxParceiro">
						<?php 
							echo $this->Form->input('', array('label' =>'Dados do Operação','type'=>'checkbox', 'id' => 'checkop' , 'value' => 'operacoes'));
						?>
					</div>

					<?php
						echo $this->Search->create();
						echo "<div class='tipoOperacao'>";
						echo $this->Form->input('', array(
							'type' => 'select',
							'class' => 'operacao',
							'multiple' => 'checkbox',
							'options' => array('COTACAO' => 'Cotação', 'PEDIDO' => 'Pedido'),
							'style' => 'float:left',
						));
						echo $this->Search->input('tipoOperacao', array('type' => 'hidden'));
						echo "</div>";
					?>
					
					<div class="inputSearchData">
					<?php
						echo $this->Search->input('data_inici', array('label' => 'Data da Venda:','class'=>'', 'type' => 'text'));
					?>
					</div>

					<div class="inputSearchData some">
					<?php
						echo $this->Search->input('data_entrega', array('label' => 'Previsão de Entrega:','class'=>'', 'type' => 'text'));
					?>
					</div>

					<div class="inputSearchValor">
						<?php
							echo $this->Search->input('valor', array('type'=>'text','label' => 'Valor:','class'=>'dinheiro_duasCasas'));
						?>
					</div>
					
					<div class="" >
					<?php
						echo $this->Search->input('ide', array('label' => 'Código:','class'=>'tamanho-medio input-alinhamento'));
					?>
					</div>
					
					<div class="formaPagamento" >
					<?php
						echo $this->Search->input('forma_pagamento', array('label' => 'Forma de Pagamento:','class'=>'tamanho-medio input-alinhamento'));
					?>
					</div>
					
					<div class="" >
						<?php
							echo $this->Search->input('status_operacao', array('label' => 'Status:','class'=>'tamanho-medio'));
						?>
					</div>
					
					
					<?php
						echo $this->Html->image('expandir.png', array('id'=>'bt-expandirOperacao', 'alt'=>'', 'title'=>''));
					?>
					
					<div id="msgFiltroOperacao" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
					
					</section>

				<!------------------ Filtro Do Produto ------------------>
				<section id="filtro-produto" class="coluna-central">
					<div class="boxParceiro">
						<?php 
							echo $this->Form->input('', array('label' => 'Dados do Produto','type'=>'checkbox', 'id' => 'checkproduto' , 'value' => 'produtos'));
						?>
					</div>
					<div class="informacoesProduto">
						<?php
							echo $this->Search->input('produtoNome', array('label' => 'Nome:','class'=>'input-alinhamento tamanho-medio combo-autocomplete'));
							echo $this->Search->input('codProd', array('label' => 'Código:','class'=>'tamanho-medio input-alinhamento'));
							echo $this->Search->input('produtoCategoria', array('type'=>'select','label' => 'Categoria:','class'=>'tamanho-medio input-alinhamento'));
							echo $this->Search->input('produtoNivel', array('type'=>'select','label' => 'Nível em Estoque:','class'=>'tamanho-medio input-alinhamento'));
						?>
					</div>
					
					<div id="msgFiltroProduto" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
				</section>

				<!------------------ Filtro Do Fornecedor ------------------>
				<section id="filtro-parceiro" class="coluna-direita">
					<div class="boxParceiro">
						<?php 
							echo $this->Form->input('', array('label' =>'Dados do Fornecedor','type'=>'checkbox', 'id' => 'checkfor' , 'value' => 'fornecedores'));
						?>
					</div>
					<div class="informacoesParceiro">
						<?php
							echo $this->Search->input('nomeParceiro', array('label' => 'Nome:','class'=>'input-alinhamento tamanho-medio combo-autocomplete'));
							echo $this->Search->input('statusParceiro', array('type'=>'select','label' => 'Status:','class'=>'tamanho-medio input-alinhamento'));
						?>
					</div>
					<div id="msgFiltroParceiro" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
				</section>

				<footer>
					<?php echo $this->Form->submit('botao-filtrar.png',array('id'=>'quick-filtrar-compras')); ?>
				</footer>
			
			</div>
				
			<?php echo $this->Form->end(); ?>

		</fieldset>

	</section>

	<!------------------ CONSULTA ------------------>
	<div class="areaTabela">
	
	<?php echo $this->element('paginador_superior'); ?>
	
		<div class="tabelas" id="contas">
			<table cellpadding="0" cellspacing="0" style="font-size: 12px !important;">
				
				<?php
				//TABELA OPERAÇÕES
				if(isset($_GET['parametro']) && $_GET['parametro']=='pedidos'){ ?>
				
					<tr>
						<th class="actions colunaConta">Ações</th>
	
						<th id="id" class="colunaConta id"><?php echo $this->Paginator->sort('id','Código'); ?> <div id='indica-ordem' class='posicao-seta'></div> </th>
						<th id="tipo" class="colunaConta tipo"><?php echo $this->Paginator->sort('Vendedor.nome','Vendedor'); ?> <div id='indica-ordem' class='posicao-seta'></div> </th>
						<th id="data_inici" class="colunaConta data_inici"><?php echo $this->Paginator->sort('Parceirodenegocio.nome','Cliente', array('style'=>'vertical-align:text-top;')); ?> <div id='indica-ordem' class='posicao-seta'></div> </th>
						<th id="data_fim" class="colunaConta data_fim"><?php echo $this->Paginator->sort('data','Data da Venda'); ?> <div id='indica-ordem' class='posicao-seta'></div></th>
						<th id="valor" class="colunaConta valor tbFixCompras"><?php echo $this->Paginator->sort('valor_total','Valor'); ?> <div id='indica-ordem' class='posicao-seta'></div> </th>
						<th id="prazo_entrega" class="colunaConta prazo_entrega"><?php echo $this->Paginator->sort('status_financeiro', 'Sit. Financeira'); ?> <div id='indica-ordem' class='posicao-seta'></div> </th>
						<th id="forma_pagamento" class="colunaConta forma_pagamento"><?php echo $this->Paginator->sort('status_estoque', 'Sit. Estoque'); ?> <div id='indica-ordem' class='posicao-seta'></div> </th>
						<th id="status" class="colunaConta status"><?php echo $this->Paginator->sort('status_faturamento', 'Sit Faturamento'); ?> <div id='indica-ordem' class='posicao-seta'></div> </th>
						<th id="Parceirodenegocio" class="colunaConta _Parceirodenegocio.nome"><?php echo $this->Paginator->sort('status_geral','Sit. Geral'); ?> <div id='indica-ordem' class='posicao-seta'></div> </th>
	
	
					</tr>
					
					
					<?php
					
					$j=0;
					
					foreach ($vendas as $venda): ?>
					<tr>
						<td class="actions">
							
							<?php echo $this->Html->image('botao-tabela-visualizar.png',array('title'=>'Visualizar','url'=>array('controller' => 'Vendas','action' => 'view', $venda['Venda']['id']))); ?>
							<?php /*
							<hr style="top:15px; position:relative;" />
							<?php echo $this->Html->image('botao-tabela-editar.png',array('title'=>'Editar', 'style'=>'top:3px;', 'url'=>array('controller' => 'Vendas','action' => 'edit', $venda['Venda']['id']))); ?>
							*/ ?>
						</td>
						<td>
							<?php echo $venda['Venda']['id'];?>
						</td>
						<td>
							<?php echo $venda['Venda']['nomevendedor'];?>
						</td>
						<td>
							<?php echo $venda['Venda']['nomecliente'];?>
						</td>
						<td>
							<?php echo formatDateToView($venda['Venda']['data']);?>
						</td>
						<td>
							<?php echo "R$ " . number_format($venda['Venda']['valor_total'], 2, ',', '.'); ?>
						</td>
						<td>
							<?php echo formatDateToView($venda['Venda']['status_financeiro']);?>
						</td>
						<td>
							<?php echo formatDateToView($venda['Venda']['status_estoque']);?>
						</td>
						<td>
							<?php echo formatDateToView($venda['Venda']['status_faturamento']);?>
						</td>
						<td>
							<?php echo formatDateToView($venda['Venda']['status_geral']);?>
						</td>
					</tr>
					
	
					<?php
					$j = $j + 1;
					endforeach; 
					//fim tabela operações
					//TABELA PRODUTOS
					
				
				}else if(isset($_GET['parametro']) && $_GET['parametro']=='produtos'){
				?>
				
				<tr>
					<th class="colunaParcela actions">Ações</th>
					<th id="codigo" class="colunaParcela"><?php echo $this->Paginator->sort('codigo','Código'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th id="nome" class="colunaParcela"><?php echo $this->Paginator->sort('nome'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th id="descricao" class="colunaParcela"><?php echo $this->Paginator->sort('descricao','Descrição'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th id="preco_custo" class="colunaParcela"><?php echo $this->Paginator->sort('preco_custo','Preço de Custo'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th id="preco_venda" class="colunaParcela"><?php echo $this->Paginator->sort('preco_venda','Preço de Venda'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th id="estoque" class="colunaParcela"><?php echo $this->Paginator->sort('estoque'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th id="nivel" class="colunaParcela"><?php echo $this->Paginator->sort('nivel', 'Nível'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th id="Categoria" class="colunaParcela"><?php echo $this->Paginator->sort('_Categoria.nome', 'Categoria'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
				</tr>
				<?php $j=0; ?>
				<?php foreach ($produtos as $produto): ?>

				<tr>
					<td class="actions" style="width:110px;">
						<?php echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Produto','title'=>'Visualizar Produto','url'=>array('controller' => 'Produtos','action' => 'view', $produto['Produto']['id'], "layout"=>"compras","abas"=>"41"))); 
							echo "<hr style='margin-top: 0px !important;'/>";
							if(isset($produto['Parceirodenegocio']) && !empty($produto['Parceirodenegocio'])) {
								echo "<a href='myModal_add-view_parceiro".$j."' class='bt-showmodal'>"; 
									echo $this->Html->image('lista-user.png',array('alt'=>'Visualizar Lista de Fornecedores','class' => 'bt-visualizarParcela img-lista','title'=>'Visualizar Lista de Fornecedores'));
								echo "</a>";
								
							}else{
								echo $this->Html->image('semaforo-cancelado-12x12.png',array('alt'=>'Esse Produto não possui Fornecedores','id'=>'tese','class' => 'tese bt-visualizarParcela img-lista','title'=>'Esse Produto não possui Fornecedores'));
							}
						
							echo "<hr style='margin-top: 0px !important;'/>";
							
								echo "<a href='myModal_add-parceiroFornecedor' class='bt-showmodal'>"; 
									echo $this->Html->image('parceiro_add.png',array('id'=>'addNovo'.$j,'alt'=>'Cadastrar Novo Fornecedor','class'=>'addNovoParceiro','title'=>'Cadastrar Novo Fornecedor'));
									echo $this->Form->input('Vazio.idProdAdd',array('id'=>'idProdAdd'.$j,'value'=>$produto['Produto']['id'],'type'=>'hidden'));
								echo "</a>";
								
							echo "<hr style='margin-top: 0px !important;'/>";
											
								echo "<a href='myModal_add-associaFornecedor".$j."' class='bt-showmodal'>"; 
									echo $this->Html->image('parceiro_associ.png',array('alt'=>'Associar Novo Fornecedor','class' => '','title'=>'Associar Novo Fornecedor'));
								echo "</a>";
							?>
					
					
						<div class="modal fade" id="myModal_add-associaFornecedor<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
							<div class="modal-body">
								<?php
									echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 
								?>
								<header id="cabecalho">
									<?php 
										echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
									?>	
									<h1>Associar Fornecedores</h1>
								</header>
				
								<section>
									<header>Fornecedores</header>
									<section>
									<section class="coluna-esquerda">
										<?php echo $this->Form->input('Vazio.idProd',array('id'=>'idProd'.$j,'value'=>$produto['Produto']['id'],'type'=>'hidden')); ?>
										<div>
											<span id="msgValidaParceiro" class="Msg tooltipMensagemErroTopo" style="display:none">Preencha o campo Fornecedor</span>
											<label id="SpanPesquisarFornecedor">Buscar Fornecedor<span class="campo-obrigatorio">*</span>:</label>											
											<select class="tamanho-grande" id="ass_fornecedor<?php echo $j; ?>">
											<option id="optvazioForn"></option>
											<?php
												foreach($parceiroSelect as $selectParceiro){
													
													echo "<option id='".$selectParceiro['Parceirodenegocio']['nome']."' class='".$selectParceiro['Parceirodenegocio']['cpf_cnpj']."' rel='".$selectParceiro['Parceirodenegocio']['status']."' value='".$selectParceiro['Parceirodenegocio']['id']."' >";
														echo $selectParceiro['Parceirodenegocio']['nome'];
													echo "</option>";
												}
											?>

											</select>								
										</div> 
										<section class="area_hidden_fornecedor<?php echo $j; ?>">
											<?php												
												echo $this->Form->create('ProdutosParceirodenegocio',array('id'=>'formAssocia'.$j,'controller'=>'ProdutosParceirodenegocios','action'=>'associaFornecedores'));
													
												echo $this->Form->end();												
											?>
										</section>
										
									</section>
									
									<section class="coluna-central" >
											<?php
												echo $this->html->image('preencher2.png',array('alt'=>'Preencher',
																			 'title'=>'Adicionar Fornecedor',
																				 'class'=>'bt associaFornecedor',
																				 'id'=>'bt-preencher'.$j
																				 ));
												echo $this->html->image('botao-salvar2.png',array('alt'=>'Preencher',
																			 'title'=>'Associar Fornecedores',
																				'class'=>'bt associSalvar',
																				 'style'=>'display:none;',
																				 'id'=>'bt-salvarAssociar'.$j
																				 ));
											?>
									</section>
									
									<section class="coluna-direita" >
									</section>
									
									</section>
									
									<div style="clear:both;"></div>
									
									<section class="coluna-modal" style="margin-top:10px;">
										<table id="tbl_associa<?php echo $j; ?>">
											<thead>
												<tr>
												<th>Nome</th>
												<th>CPF/CNPJ</th>
												<th style="width:50px;">Status</th>
												<th style="width:50px;">Ações</th>
												</tr>
											</thead>
											<tbody>
												<?php
												
													foreach($produto['Parceirodenegocio'] as $parceiro){
														echo "<tr>";
															echo "<td class='adicionados".$j."'>";
																echo $parceiro['nome'];
															echo "</td>";

															echo "<td>";
																echo $parceiro['cpf_cnpj'];
															echo "</td>";

															echo "<td>";
																if(isset($parceiro['status'])){
																		echo $this->Html->image('semaforo-' . strtolower($parceiro['status']) . '-12x12.png', array('alt' => '-'.$parceiro['status'], 'title' => '-'));
																	}
															echo "</td>";
															
															echo "<td> -- </td>";
							
														echo "</tr>";
													}
					
												?>
											</tbody>
										</table>
									</section>
								</section>
							</div>
						</div>
						
						<div class="modal fade" id="myModal_add-view_parceiro<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-body">
						<?php
							echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 
						?>
							<header id="cabecalho">
							<?php 
								echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
							?>	
								<h1>Visualização dos Fornecedores</h1>
							</header>
			
							<section>
							<header>Fornecedores</header>
			
							<section class="coluna-modal">
								<table>
								<thead>
								    <tr>
									<th>Nome</th>
									<th>Status</th>
								    </tr>
								</thead>
								
								<?php
								
									foreach($produto['Parceirodenegocio'] as $parceiro){
									echo "<tr><td>";
										echo $parceiro['nome'];
									echo "</td>";
									
									echo "<td>";
										if(isset($parceiro['status'])){ echo $this->Html->image('semaforo-' . strtolower($parceiro['status']) . '-12x12.png', array('alt' => '-'.$parceiro['status'], 'title' => '-'));}
									echo "</td>";

									echo "</tr>";
									}
								?>

								</table>
							</section>
							</section>
						</div>
						</div>
						
					</td>
					
					<td class="codigo"><?php echo $produto['Produto']['codigo'];?></td>
					<td class="nome"><?php echo $produto['Produto']['nome'];?></td>
					<td class="descricao"><?php echo $produto['Produto']['descricao'];?></td>
					<td class="preco_custo"><?php echo "R$ " . number_format($produto['Produto']['preco_custo']);?></td>
					<td class="preco_venda"><?php echo "R$ " . number_format($produto['Produto']['preco_venda']);?></td>
					<td class="estoque"><?php echo $produto['Produto']['estoque'];?></td>
					<td class="nivel"><?php echo $this->Html->image('semaforo-' . strtolower($produto['Produto']['nivel']) . '-12x12.png', array('alt' => '-'.$produto['Produto']['nivel'], 'title' => '-'));?></td>
					<td class="Categoria"><?php if(isset($produto['Categoria'][0]['nome'])) echo $produto['Categoria'][0]['nome'];?></td>
				
				</tr>

				<?php
				$j = $j + 1;
				endforeach; 
				}
				//fim tabela produtos
				//TABELA FORNECEDORES
				else if(isset($_GET['parametro']) && $_GET['parametro']=='fornecedores'){
				?>
				
				<tr>
					<th class="colunaES actions">Ações</th>
					<th id="nome" class="colunaES"><?php echo $this->Paginator->sort('nome','Nome'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th id="cpf_cnpj" class="colunaES"><?php echo $this->Paginator->sort('cpf_cnpj','CNPJ'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th id="status" class="colunaES"><?php echo $this->Paginator->sort('status'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
				</tr>

				<?php foreach ($parceirodenegocios as $parceirodenegocio): ?>

				<tr>
					<td class="actions">
						<?php echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Fornecedor','title'=>'Visualizar Fornecedor','url'=>array('controller' => 'Parceirodenegocios','action' => 'view', $parceirodenegocio['Parceirodenegocio']['id'],"layout"=>"compras","abas"=>"41"))); 
						?>
					</td>
					
					<td class="nome"><?php echo $parceirodenegocio['Parceirodenegocio']['nome'];?></td>
					<td class="cpf_cnpj"><?php echo $parceirodenegocio['Parceirodenegocio']['cpf_cnpj'];?></td>
					<td class="status"><?php 
						if(
						isset($parceirodenegocio['Parceirodenegocio']['status'])){
							if($parceirodenegocio['Parceirodenegocio']['status'] != ''){
								
								echo $this->Html->image('semaforo-' . strtolower($parceirodenegocio['Parceirodenegocio']['status']) . '-12x12.png', array('alt' => '-'.$parceirodenegocio['Parceirodenegocio']['status'], 'title' => '-'));
							}else{
								
								echo $this->Html->image('semaforo-verde-12x12.png', array('alt' => '-'."VERDE", 'title' => '-'));
							}
							
						}else{
							echo $this->Html->image('semaforo-verde-12x12.png', array('alt' => '-'."VERDE", 'title' => '-'));
						}
						?>
						
						</td>
				
				</tr>

				<?php endforeach;
				}
				//fim tabela fornecedores
				?>
			</table>
			
			<?php echo $this->element('paginador_inferior');?>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(document).ready(function(){
	    $(".bt-showmodal").click(function(){
		nome = $(this).attr('href');
		$('#'+nome).modal('show');
	    });
		
	});
</script>

<?php echo $this->element('ComParceiroFornecedor_add', array('modal'=>'add-parceiroFornecedor')); ?>
<?php //echo $this->element('ComParceiroFornecedor_associa', array('modal'=>'add-associaFornecedor')); ?>

	<div style="clear:both;"></div>
