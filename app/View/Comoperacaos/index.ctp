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
		<header>Consulta por Cotações, Pedidos e/ou Respostas</header>

		<fieldset class="filtros">

			<?php echo $this->Form->input('nome',array('required'=>'false','type'=>'select','label'=>'Pesquisa Rápida:','id'=>'quick-select', 'options' => '','default'=>'')); ?>

			<a href="add-quicklink" class="bt-showmodal">

				<?php echo $this->Html->image('botao-adicionar2.png',array('id'=>'quick-salvar')); ?>

			</a>

			<div class="content-filtros">

				<!------------------ Dados da Operação ------------------>
				<section id="filtro-operacao" class="coluna-esquerda">
					<div class="boxParceiro">
						<span id="titulo">Dados da Operação</span>
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
					//FAZER O JAVASCRIPT PARA RECEBER O TIPO DE MOVIMENTAÇÃO SEMELHANTE AO DE SELEÇÃO DE ENTRADA E SAIDA(CONSULTA ESTOQUE)
					echo $this->Search->input('tipoOperacao', array('type' => 'hidden'));
					echo "</div>";
					?>
				
					<div class="inputSearchData divMarginLeft">
					<?php
						echo $this->Search->input('data_inici', array('label' => 'Data de início:','class'=>'', 'type' => 'text'));
					?>
					</div>

					<div class="inputSearchData divMarginLeft">
					<?php
						echo $this->Search->input('data_fim', array('label' => 'Data de fim:','class'=>'', 'type' => 'text'));
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
					
					<div class="divMarginLeft" >
					<?php
						echo $this->Search->input('status_operacao', array('label' => 'Status:','class'=>''));
					?>
					</div>
					
					</section>

				<!------------------ Filtro das Respostas ------------------>
				<section id="filtro-respostas" class="coluna-central">
					<div class="boxParceiro">
						<span>Dados da Resposta</span>
					</div>

					<div class="inputSearchData divMarginLeft">
					<?php
						echo $this->Search->input('data_resposta', array('label' => 'Data da Resposta:','class'=>'', 'type' => 'text'));
					?>
					</div>

					<div class="inputSearchValor">
						<?php
							echo $this->Search->input('valor_resposta', array('type'=>'text','label' => 'Valor:','class'=>'dinheiro_duasCasas'));
						?>
					</div>

					<div class="formaPagamento" >
					<?php
						echo $this->Search->input('forma_pagamento_resposta', array('label' => 'Forma de Pagamento:','class'=>'tamanho-medio input-alinhamento'));
					?>
					</div>

					<div class="divMarginLeft" >
					<?php
						echo $this->Search->input('status_resposta', array('label' => 'Status:','class'=>''));
					?>
					</div>

					<div class="divMarginLeft" >
						<?php
							echo $this->Search->input('obs', array('label' => 'Obs:','class'=>'tamanho-medio input-alinhamento'));
						?>
					</div>

				</section>

				<!------------------ Filtro Do Parceiro ------------------>
			<section id="filtro-parceiro" class="coluna-direita">
				<div class="boxParceiro">
					<span>Dados do Parceiro de Negócio</span>
				</div>
			
				<div class="informacoesParceiro">
					
				<?php
					echo $this->Search->input('nome', array('label' => 'Nome:','class'=>'input-alinhamento combo-autocomplete'));
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
				<tr>
					<th class="actions colunaConta">Ações</th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('data_inici','Data de início'); ?></th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('data_fim','Data de fim'); ?></th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('user_id'); ?></th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('valor'); ?></th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('prazo_entrega'); ?></th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('forma_pagamento'); ?></th>
					<th class="colunaConta"><?php echo $this->Paginator->sort('status'); ?></th>
				</tr>

				<?php foreach ($comoperacaos as $comoperacao): ?>

				<tr>
					<td class="actions">
						<?php echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Operação','title'=>'Visualizar Operação','url'=>array('controller' => 'comoperacao','action' => 'view', $comoperacao['Comoperacao']['id']))); 
							echo "<hr />";
							echo $this->Html->image('botao-tabela-editar.png',array('alt'=>'Editar Operação','title'=>'Editar Operação','url'=>array('controller' => 'comoperacao','action' => 'edit', $comoperacao['Comoperacao']['id'])));
							echo "<hr />"; 
							echo $this->Form->postLink($this->Html->image('cancelar.png',array('id'=>'delete_operacao','alt' =>__('Delete'),'title' => 'Excluir Operação')), array('controller' => 'comoperacao','action' => 'delete', $comoperacao['Comoperacao']['id']),array('escape' => false, 'confirm' => __('Deseja realmente excluir a operação '.$comoperacao['Comoperacao']['id'].'?'))); 
						?>
					</td>
					
					<td><?php echo formatDateToView(h($comoperacao['Comoperacao']['data_inici'])); ?>&nbsp;</td>
					<td><?php echo formatDateToView(h($comoperacao['Comoperacao']['data_fim'])); ?>&nbsp;</td>
					<td>
						<?php echo h($comoperacao['User']['id']); ?>
					</td>
					<td><?php echo h($comoperacao['Comoperacao']['valor']); ?>&nbsp;</td>
					<td><?php echo h($comoperacao['Comoperacao']['prazo_entrega']); ?>&nbsp;</td>
					<td><?php echo h($comoperacao['Comoperacao']['forma_pagamento']); ?>&nbsp;</td>
					<td><?php echo h($comoperacao['Comoperacao']['status']); ?>&nbsp;</td>
				</tr>

				<?php endforeach; ?>

			</table>

			<?php echo $this->element('paginador_inferior');?>
		</div>
	</div>

</div>
