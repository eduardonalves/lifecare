<?php
	$this->start('css');
		echo $this->Html->css('consulta_compras');
		echo $this->Html->css('table');
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
		<?php echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>
		
		<h1 class="menuOption41">Consultar</h1>
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
						echo $this->Search->input('data_inici', array('label' => 'Data de Início:','class'=>'', 'type' => 'text'));
					?>
					</div>

					<div class="inputSearchData">
					<?php
						echo $this->Search->input('data_fim', array('label' => 'Data de Fim:','class'=>'', 'type' => 'text'));
					?>
					</div>

					<div class="inputSearchValor">
						<?php
							echo $this->Search->input('valor', array('type'=>'text','label' => 'Valor:','class'=>'dinheiro_duasCasas'));
						?>
					</div>
					
					<div class="formaPagamento" >
					<?php
						echo $this->Search->input('forma_pagamento', array('label' => 'Forma de Pagamento:','class'=>'tamanho-medio input-alinhamento'));
					?>
					</div>
					
					<div class="" >
						<?php
							echo $this->Search->input('status_operacao', array('label' => 'Status:','class'=>''));
						?>
					</div>
					
					
					<?php
						echo $this->Html->image('expandir.png', array('id'=>'bt-expandirOperacao', 'alt'=>'', 'title'=>''));
					?>
					
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
							echo $this->Search->input('produtoNome', array('label' => 'Nome:','class'=>'tamanho-medio input-alinhamento'));
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
			<table cellpadding="0" cellspacing="0">
				
				<?php
				//TABELA OPERAÇÕES
				if(isset($_GET['parametro']) && $_GET['parametro']=='operacoes'){ ?>
				
				<tr>
					<th class="actions colunaConta">Ações</th>

					<th class="colunaConta"><?php echo $this->Paginator->sort('tipo','Tipo'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('data_inici','Data de Início'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('data_fim','Data de Fim'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('valor'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('prazo_entrega'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('forma_pagamento'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('status'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th class="colunaES"><?php echo $this->Paginator->sort('_Parceirodenegocio.nome','Fornecedor'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
				</tr>

				<?php foreach ($comoperacaos as $comoperacao): ?>

				<tr>
					<td class="actions">
						<?php 
							if($comoperacao['Comoperacao']['tipo'] == 'COTACAO'){
								echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Cotação','title'=>'Visualizar Cotação','url'=>array('controller' => 'Cotacaos','action' => 'view', $comoperacao['Comoperacao']['id']))); 
							}else{
								echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Pedido','title'=>'Visualizar Pedido','url'=>array('controller' => 'Pedidos','action' => 'view', $comoperacao['Comoperacao']['id']))); 
							}
							echo "<hr />";
							
							if($comoperacao['Comoperacao']['tipo'] == 'COTACAO'){
								echo $this->Html->image('botao-tabela-editar.png',array('alt'=>'Editar Operação','title'=>'Editar Operação','class'=>'img-lista','url'=>array('controller' => 'Cotacaos','action' => 'edit', $comoperacao['Comoperacao']['id'])));
							}else{
								echo $this->Html->image('botao-tabela-editar.png',array('alt'=>'Editar Operação','title'=>'Editar Operação','class'=>'img-lista','url'=>array('controller' => 'Pedidos','action' => 'edit', $comoperacao['Comoperacao']['id'])));
							}
							
							if($comoperacao['Comoperacao']['tipo'] == 'PEDIDO'){
								echo "<hr />";
								
								echo $this->html->image('parceiro.png',array('alt'=>'Visualizar Parceiro de Negócio','title'=>'Visualizar Parceiro de Negócio','url'=>array('controller'=>'Parceirodenegocios','action'=>'view',$comoperacao['Parceirodenegocio'][0]['id'],"layout"=>"compras","abas"=>"41")));
							}
						?>
					</td>
					<td><?php echo $comoperacao['Comoperacao']['tipo']; ?>&nbsp;</td>
					<td><?php echo formatDateToView($comoperacao['Comoperacao']['data_inici']); ?>&nbsp;</td>
					<td><?php echo formatDateToView($comoperacao['Comoperacao']['data_fim']); ?>&nbsp;</td>
					<td><?php echo $comoperacao['Comoperacao']['valor']; ?>&nbsp;</td>
					<td><?php echo $comoperacao['Comoperacao']['prazo_entrega']; ?>&nbsp;</td>
					<td><?php echo $comoperacao['Comoperacao']['forma_pagamento']; ?>&nbsp;</td>
					<td><?php echo $comoperacao['Comoperacao']['status']; ?>&nbsp;</td>
					<td><?php echo $comoperacao['Parceirodenegocio'][0]['nome']; ?>&nbsp;</td>
				</tr>

				<?php endforeach; 
				}
				//fim tabela operações
				//TABELA PRODUTOS
				else if(isset($_GET['parametro']) && $_GET['parametro']=='produtos'){
				?>
				
				<tr>
					<th class="actions colunaParcela">Ações</th>
					<th class="colunaParcela"><?php echo $this->Paginator->sort('codigo','Código'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th class="colunaParcela"><?php echo $this->Paginator->sort('nome'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th class="colunaParcela"><?php echo $this->Paginator->sort('descricao','Descrição'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th class="colunaParcela"><?php echo $this->Paginator->sort('_Categoria.nome', 'Categoria'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
				</tr>

				<?php foreach ($produtos as $produto): ?>

				<tr>
					<td class="actions">
						<?php echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Produto','title'=>'Visualizar Produto','url'=>array('controller' => 'Produtos','action' => 'view', $produto['Produto']['id'], "layout"=>"compras","abas"=>"43"))); 
							if(isset($produto['Parceirodenegocio'][0]['nome'])){
							echo "<hr />";
							echo $this->Html->image('parceiro.png',array('alt'=>'Visualizar Parceiro','title'=>'Visualizar Parceiro','url'=>array('controller' => 'Parceirodenegocios','action' => 'view', $produto['Parceirodenegocio'][0]['id'],"layout"=>"compras","abas"=>"42")));
							}
						?>
					</td>
					
					<td><?php echo $produto['Produto']['codigo'];?></td>
					<td><?php echo $produto['Produto']['nome'];?></td>
					<td><?php echo $produto['Produto']['descricao'];?></td>
					<td><?php if(isset($produto['Categoria'][0]['nome'])) echo $produto['Categoria'][0]['nome'];?></td>
				
				</tr>

				<?php
				endforeach; 
				}
				//fim tabela produtos
				//TABELA FORNECEDORES
				else if(isset($_GET['parametro']) && $_GET['parametro']=='fornecedores'){
				?>
				
				<tr>
					<th class="actions colunaES">Ações</th>
					<th class="colunaES"><?php echo $this->Paginator->sort('nome','Nome'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
					<th class="colunaES"><?php echo $this->Paginator->sort('status'); ?><div id='indica-ordem' class='posicao-seta'></div></th>
				</tr>

				<?php foreach ($parceirodenegocios as $parceirodenegocio): ?>

				<tr>
					<td class="actions">
						<?php echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Fornecedor','title'=>'Visualizar Fornecedor','url'=>array('controller' => 'Parceirodenegocios','action' => 'view', $parceirodenegocio['Parceirodenegocio']['id'],"layout"=>"compras","abas"=>"41"))); 
						?>
					</td>
					
					<td><?php echo $parceirodenegocio['Parceirodenegocio']['nome'];?></td>
					<td><?php echo $parceirodenegocio['Parceirodenegocio']['status'];?></td>
				
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
