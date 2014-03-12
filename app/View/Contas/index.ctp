<?php
	$this->start('css');
		echo $this->Html->css('consulta_financeiro');
		echo $this->Html->css('table');
		echo $this->Html->css('jquery-ui/jquery-ui.css');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	$this->end();

	$this->start('script');
		//echo $this->Html->script('funcoes_consulta.js');
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
			$urlQuickLink = $urlQuickLink.'?'.'parametro'.'='.$_GET['parametro'];
		?>
	
	
		<?php
			echo $this->Form->input('nome',array('required'=>'false','type'=>'select','label'=>'Pesquisa Rápida:','id'=>'quick-select', 'options' => ''));
		?>
		
		<a href="add-quicklink" class="bt-showmodal">
			
			<?php	
				echo $this->Html->image('botao-adicionar2.png',array('id'=>'quick-salvar'));
			?>
		
		</a>	
			
		<div class="content-filtros">

			<!------------------ Dados da Movimentação ------------------>
			<section id="filtro-movimentacao" class="coluna-esquerda">
				<span id="titulo-movimentacao">Dados da Movimentação</span>
				
				<a href="add-config_movimentacao" class="bt-showmodal">
				
					<?php
						echo $this->Html->image('botao-tabela-configuracao.png', array('id' => 'bt-configuracao', 'alt' => 'Configuração Movimentação', 'title' => 'Configuração Movimentação'));
					?>
				
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
					echo $this->Search->input('data_emissao', array('label' => 'Emissão:','class'=>'forma-data', 'type' => 'text'));
					echo $this->html->tag('span','a',array('class'=>'a-data'));
					echo $this->Search->input('data_quitacao', array('label' => 'Validade:','class'=>'forma-data', 'type' => 'text'));
					echo $this->html->tag('span','a',array('class'=>'a-data'));
				?>
				
			</section>
			
			<!------------------ FILTRO Das Parcelas ------------------>
			<section id="filtro-parceiro" class="coluna-central">
				<div class="boxParcela">
					<?php
						echo $this->Form->input('', array('label'=>array('id'=>'','text'=>'Dados das Parcelas'),'type'=>'checkbox', 'id' => '' , 'value' => ''));
					?>
				</div>
				<a href="add-config_parcela" class="bt-showmodal">
				
					<?php
						echo $this->Html->image('botao-tabela-configuracao.png', array('id' => 'bt-configuracao', 'alt' => 'Configuração das Parcelas', 'title' => 'Configuração das Parcelas'));
					?>
					
				</a>
				<div class="informacoesParceiro">
				<?php
					echo $this->Form->input('valor', array('type'=>'text','label' => 'Valor:','class'=>'tamanho-medio input-alinhamento'));
					echo $this->Form->input('data_vencimento', array('type'=>'text','label' => 'Vencimento:','class'=>'forma-data'));
					echo $this->html->tag('span','a',array('class'=>'a-data'));
					
				?>
				</div>
				<div id="msgFiltroLote" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
			</section>

			<!------------------ FILTRO Do Parceiro ------------------>
			<section id="filtro-parcela" class="coluna-direita">
				<div class="boxParceiro">
					<?php
						echo $this->Form->input('', array('label'=>array('id'=>'','text'=>'Dados do Parceiro de Negócio'),'type'=>'checkbox', 'id' => '' , 'value' => ''));
					?>
				</div>
				<a href="add-config_parceiro" class="bt-showmodal">
				
					<?php
						echo $this->Html->image('botao-tabela-configuracao.png', array('id' => 'bt-configuracao', 'alt' => 'Configuração do Parceiro', 'title' => 'Configuração do Parceiro'));
					?>
					
				</a>
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
<?php
	//Inicio de consulta de Contas
	if(isset($_GET['parametro'])){
		if($_GET['parametro'] == 'contas'){
		?>
	
			<?php echo $this->element('paginador_superior');?>

			<div class="tabelas" id="contas">
				
				<table cellpadding="0" cellspacing="0">
					<?php 
					//Inicio da checagem das colunas de contas
					if(isset($configCont)){ ?>
						<tr>
								<th class="colunaConta">Ações</th>									
									 <?php 
									 
										foreach($configCont as $campo=>$campoLabel)
									 {
										 
										 echo "<th id=\"$campo\" class=\"colunaConta comprimentoMinimo $campo\">" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
										 
									 }

									 ?>

						</tr>

						<?php 

						foreach ($contas as $conta): 

						?>
					
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

						<?php 

						endforeach; ?>
				</table>
							
								<?php echo $this->element('paginador_inferior');?>
			</div>
						
						
				<?php
				}
		}
	}
	//fim de Consulta de contas
	
	?>	
	
	
	
	
<?php
	//Inicio de consulta de Parcelas
	if(isset($_GET['parametro'])){
		if($_GET['parametro'] == 'parcelas'){
		?>
	
			<?php echo $this->element('paginador_superior');?>

			<div class="tabelas" id="parcelas">
				
				<table cellpadding="0" cellspacing="0">
					<?php 
					//Inicio da checagem das colunas de parcelas
					if(isset($configparc)){ ?>
						<tr>
								<th class="colunaParcela">Ações</th>
									 <?php 
									 
										foreach($configparc as $campo=>$campoLabel)
									 {
										 
										 echo "<th id=\"$campo\" class=\"colunaParcela comprimentoMinimo $campo\">" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
										 
									 }

									 ?>

						</tr>

						<?php 

						foreach ($parcelas as $parcela): 

						?>
					
							<tr>
									<td class="actions">
										<?php echo $this->Html->image('botao-tabela-visualizar.png',array('title'=>'Visualizar','url'=>array('controller' => 'parcelas','action' => 'view', $parcela['Parcela']['id']))); ?>
										<?php echo $this->Html->image('botao-tabela-editar.png',array('title'=>'Editar','url'=>array('controller' => 'parcelas','action' => 'edit', $parcela['Parcela']['id']))); ?>
									</td>
									
									 <?php 

									foreach($configparc as $campo=>$campoLabel){							
											if($campo=="status"){
												echo "<td>" . $this->Html->image('semaforo-' . strtolower($parcela['Parcela']['status']) . '-12x12.png', array('alt' => '-'.$parcela['Parcela']['status'], 'title' => '-')) . "&nbsp;</td>";
												
											}else{
												
												echo "<td class=\"$campo\">" . $parcela['Parcela'][$campo] . "&nbsp;</td>";
											}
											
										}						
										
									?>
							</tr>

						<?php 

						endforeach; ?>
				</table>
							
								<?php echo $this->element('paginador_inferior');?>
			</div>
						
						
				<?php
				}
		}
	}
	//fim de Consulta de parcelas
	
	?>	
	

</div>
<br />
<br />
<br />
<br />

