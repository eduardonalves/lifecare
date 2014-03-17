<?php
	$this->start('css');
		echo $this->Html->css('consulta_financeiro');
		echo $this->Html->css('table');
		echo $this->Html->css('jquery-ui/jquery-ui.css');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('funcoes_financeiro.js');
	$this->end();

	$this->start('modais');
		echo $this->element('config_movimentacao', array('modal'=>'add-config_movimentacao'));
		echo $this->element('config_parceiro', array('modal'=>'add-config_parceiro'));
		echo $this->element('config_parcela', array('modal'=>'add-config_parcela'));
	$this->end();
?>

<?php
	if(isset($pageReload)){
		if($pageReload=='Reload'){
?>

<script type="text/javascript">
	$(document ).ready(function(){
		setTimeout(function(){
			location.reload();
		}, 2000);
	});
</script>

<?php
		}
	}
?>

<header> <!---header--->

	<?php echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->	
	<h1 class="menuOption31">Consultas</h1>

</header> <!---Fim header--->

<section> <!---section superior--->
	<header>Consulta por Movimentação e/ou Parceiro de Negócios</header>
	<fieldset class="filtros">

		<?php 
			$urlQuickLink = $this->Html->url( null, true );
			$urlQuickLink = $urlQuickLink;
		?>

		<?php echo $this->Form->input('nome',array('required'=>'false','type'=>'select','label'=>'Pesquisa Rápida:','id'=>'quick-select', 'options' => '')); ?>

		<a href="add-quicklink" class="bt-showmodal">

			<?php echo $this->Html->image('botao-adicionar2.png',array('id'=>'quick-salvar')); ?>

		</a>	

		<div class="content-filtros">

			<!------------------ Dados da Movimentação ------------------>
			<section id="filtro-movimentacao" class="coluna-esquerda">
				<span id="titulo">Dados da Movimentação</span>
				
				<a href="add-config_movimentacao" class="bt-showmodal">
				
					<?php echo $this->Html->image('botao-tabela-configuracao.png', array('id' => 'bt-configuracao', 'alt' => 'Configuração Movimentação', 'title' => 'Configuração Movimentação')); ?>
				
				</a>

				<?php	
					echo $this->Search->create();
					echo "<div class='tipoMovimentacao'>";	
					echo $this->Form->input('', array(
					    'type' => 'select',
					    'class' => 'operacao',
					    'multiple' => 'checkbox',
					    'options' => array('REECEBER' => 'Recebimento', 'PAGAR' => 'Pagamento'),   
					));
					//FAZER O JAVASCRIPT PARA RECEBER O TIPO DE MOVIMENTAÇÃO SEMELHANTE AO DE SELEÇÃO DE ENTRADA E SAIDA(CONSULTA ESTOQUE)
					echo $this->Search->input('tipoMovimentacao', array('type' => 'hidden'));
					echo "</div>";
					
					echo $this->Search->input('identificacao', array('label' => 'Número do Documento:','class'=>'tamanho-medio input-alinhamento'));
				?>

				<div class="inputSearchData">

					<?php
						echo $this->Search->input('data_emissao', array('label' => 'Emissão:','class'=>'', 'type' => 'text'));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
					?>

				</div>

				<div class="inputSearchData" >
					<?php
						echo $this->Search->input('data_quitacao', array('label' => 'Validade:','class'=>'', 'type' => 'text'));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
					?>
				</div>
			</section>

			<!------------------ FILTRO Das Parcelas ------------------>
			<section id="filtro-parceiro" class="coluna-central">
				<span id="titulo">Dados das Parcelas</span>

				<div class="formaPagamento">

					<?php echo $this->Search->input('forma_pagamento', array('label' => 'Forma de Pagamento:','class'=>'tamanho-medio input-alinhamento')); ?>

				</div>	
				<div class="inputSearchValor">

					<?php echo $this->Search->input('valor', array('type'=>'text','label' => 'Valor:','class'=>'tamanho-medio')); ?>

				</div>
				<div class="inputSearchData">

					<?php echo $this->Search->input('data_vencimento', array('type'=>'text','label' => 'Vencimento:','class'=>''));	?>

				</div>
				<div id="msgFiltroLote" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
			</section>

			<!------------------ FILTRO Do Parceiro ------------------>
			<section id="filtro-parcela" class="coluna-direita">
				<span id="titulo">Dados do Parceiro</span>

				<div class="informacoesParceiro">

					<?php
						echo $this->Search->input('nome', array('label' => 'Nome:','class'=>'tamanho-medio input-alinhamento'));
						echo $this->Search->input('cpf_cnpj', array('label' => 'CPF/CNPJ:','class'=>'tamanho-medio input-alinhamento'));
						echo $this->Search->input('statusParceiro', array('type'=>'select','label' => 'Status:','class'=>'tamanho-medio input-alinhamento'));
					?>

				</div>
				<div id="msgFiltroLote" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
			</section>

			<footer>

				<?php echo $this->Form->submit('botao-filtrar.png',array('id'=>'quick-filtrar')); ?>

			</footer>	
		</div>

		<?php echo $this->Form->end(); ?>

	</fieldset>	
</section>

<!------------------ CONSULTA ------------------>
<div class="areaTabela">

	<?php echo $this->element('paginador_superior');?>

	<div class="tabelas" id="contas">
		<table cellpadding="0" cellspacing="0">

			<?php
			//Inicio da checagem das colunas de contas
			if(isset($configCont)){ ?>
				<tr>
					<th class="colunaConta">Ações</th>

					<?php
						foreach($configCont as $campo=>$campoLabel){
							echo "<th id=\"$campo\" class=\"colunaConta comprimentoMinimo $campo\">" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
						}
					?>

				</tr>

				<?php foreach ($contas as $conta): ?>

					<tr>
						<td class="actions">

							<?php echo $this->Html->image('botao-tabela-visualizar.png',array('title'=>'Visualizar','url'=>array('controller' => 'contas','action' => 'view', $conta['Conta']['id']))); ?>
							<?php echo $this->Html->image('botao-tabela-editar.png',array('title'=>'Editar','url'=>array('controller' => 'contas','action' => 'edit', $conta['Conta']['id']))); ?>

						</td>

						<?php 
							foreach($configCont as $campo=>$campoLabel){
								if($campo=="status"){
									echo "<td>" . $this->Html->image('semaforo-' . strtolower($conta['Conta']['status']) . '-12x12.png', array('alt' => '-'.$conta['Conta']['status'], 'title' => '-')) . "&nbsp;</td>";
								}else{
									echo "<td class=\"$campo\">" . $conta['Conta'][$campo] . "&nbsp;</td>";
								}
							}
						?>
					
					</tr>
				
				<?php endforeach; ?>
		</table>

			<?php echo $this->element('paginador_inferior');?>
	
	</div>

		<?php
			}
			//fim de Consulta de contas
		?>	

</div>
