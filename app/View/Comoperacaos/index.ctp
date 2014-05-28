<?php
	$this->start('css');
		echo $this->Html->css('consulta_financeiro');
		echo $this->Html->css('table');
	$this->end();

	$this->start('script');
		echo $this->Html->script('funcoes_consulta_financeiro.js');
	$this->end();

	$this->start('modais');
		echo $this->element('quicklink_addfinanceiro', array('modal'=>'add-quicklink'));
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
		<h1 class="menuOption41">Consultar Operações</h1>
	</header>
	
	<section> <!---section superior--->
		<header>Consulta por Cotações, Pedidos e/ou Respostas</header>
		
		<fieldset class="filtros">
		
		<?php
			if(isset($ql)){
				$ql= $_GET['ql'];
				if($ql ==''){
					$ql=0;
				}
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
			<?php /*
			<!------------------ Dados da Operação ------------------>
			<section id="filtro-operacao" class="coluna-esquerda">
				<span id="titulo">Dados da Operação</span>
				<?php
					echo $this->Search->create();
					echo "<div class='tipoMovimentacao'>";
					echo $this->Form->input('', array(
					    'type' => 'select',
					    'class' => 'operacao',
					    'multiple' => 'checkbox',
					    'options' => array('RECEBER' => 'Recebimento', 'PAGAR' => 'Pagamento'),   
					));
					//FAZER O JAVASCRIPT PARA RECEBER O TIPO DE MOVIMENTAÇÃO SEMELHANTE AO DE SELEÇÃO DE ENTRADA E SAIDA(CONSULTA ESTOQUE)
					echo $this->Search->input('tipoMovimentacao', array('type' => 'hidden'));
					echo "</div>";
					
					echo $this->Search->input('identificacao', array('label' => 'Ident. Documento:','class'=>'tamanho-medio input-alinhamento'));
				?>
				
				<div class="inputSearchData divMarginLeft">
					<?php
						echo $this->Search->input('data_emissao', array('label' => 'Emissão:','class'=>'', 'type' => 'text'));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
					?>
				</div>

				<div class="inputSearchData divMarginLeft" >
					<?php
						echo $this->Search->input('data_quitacao', array('label' => 'Quitação:','class'=>'', 'type' => 'text'));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
						
					?>
				</div>
				
				<div class="divMarginLeft" >
					<?php
						echo $this->Search->input('status_conta', array('label' => 'Status:','class'=>''));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
					?>
				</div>
				
				<div class="divMarginLeft" >
					<?php
						echo $this->Search->input('nomeCentroCusto', array('label' => 'Centro de Custo:','class'=>'tamanho-medio input-alinhamento'));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
					?>
				</div>
				
				<div class="divMarginLeft" >
					<?php
						echo $this->Search->input('nomeTipodeconta', array('label' => 'Receita/Despesa:','class'=>'tamanho-medio input-alinhamento'));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
					?>
				</div>
				
				<div class="divMarginLeft" >
					<?php
						echo $this->Search->input('descricao', array('label' => 'Obs:','class'=>'tamanho-medio input-alinhamento'));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
					?>
				</div>
				
				<?php
					echo $this->Html->image('expandir.png', array('id'=>'bt-expandir', 'alt'=>'', 'title'=>''));
				 ?>
			</section>
			
			<!------------------ Filtro das Respostas ------------------>
			<section id="filtro-respostas" class="coluna-central">
				
				<?php
					echo $this->Form->input('', array('label' => 'Dados das Respostas','type'=>'checkbox', 'id' => 'checkresposta' , 'value' => 'respostas'));
					?>
				
				<div class="formaPagamento">
					<?php
						echo $this->Search->input('forma_pagamento', array('label' => 'Forma de Pagamento:','class'=>'tamanho-medio input-alinhamento'));
					?>
				</div>	
				<div class="inputSearchValor">
					<?php
						echo $this->Search->input('valor', array('type'=>'text','label' => 'Valor:','class'=>'tamanho-medio dinheiro_duasCasas'));
					?>
				</div>
				
				<div class="inputSearchData">
					<?php	
						echo $this->Search->input('data_vencimento', array('type'=>'text','label' => 'Vencimento:','class'=>''));									
					?>
				</div>
				<div class="inputSearchDuplicata" style="margin-top: 55px">
					<?php
						echo $this->Search->input('duplicata', array('label' => 'Duplicata'));
					?>
				</div>
				<div id="msgFiltroParcela" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
				?>
			</section>

			<!------------------ FILTRO Do Parceiro ------------------>
			<section id="filtro-parceiro" class="coluna-direita">
				<div class="boxParceiro">
					<span>Dados do Parceiro de Negócio</span>
				</div>
			
				<div class="informacoesParceiro">
					
				<?php
					echo $this->Search->input('nome', array('label' => 'Nome:','class'=>'input-alinhamento tamanho-medio combo-autocomplete'));
					echo $this->Search->input('statusParceiro', array('type'=>'select','label' => 'Status:','class'=>'tamanho-medio input-alinhamento'));
				?>

				</div>
				<div id="msgFiltroParceiro" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
			</section>
			
			
			<footer>
				<?php echo $this->Form->submit('botao-filtrar.png',array('id'=>'quick-filtrar')); ?>
			</footer>	
			*/ ?>
		</div>
			
		<?php echo $this->Form->end(); ?>

	</fieldset>
		
	</section>
	
	<!-- CONSULTA -->
	
	<div class="areaTabela">
	
	<?php echo $this->element('paginador_superior'); ?>

	<div class="tabelas" id="contas">
		
		<table cellpadding="0" cellspacing="0">
		<tr>
			<th class="actions colunaConta">Ações</th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('data_inici'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('data_fim'); ?></th>
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
			<td><?php echo h($comoperacao['Comoperacao']['id']); ?>&nbsp;</td>
			<td><?php echo h($comoperacao['Comoperacao']['data_inici']); ?>&nbsp;</td>
			<td><?php echo h($comoperacao['Comoperacao']['data_fim']); ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->link($comoperacao['User']['id'], array('controller' => 'users', 'action' => 'view', $comoperacao['User']['id'])); ?>
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
