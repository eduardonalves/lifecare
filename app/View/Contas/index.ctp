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
					echo "</div>";
					echo $this->Form->input('identificacao', array('label' => 'Número do Documento:','class'=>'tamanho-medio input-alinhamento'));
					echo $this->Form->input('tipo', array('label' => 'Tipo:','class'=>'tamanho-medio input-alinhamento'));
					echo $this->Form->input('data_emissao', array('label' => 'Emissão:','class'=>'forma-data'));
					echo $this->html->tag('span','a',array('class'=>'a-data'));
					echo $this->Form->input('data_quitacao', array('label' => 'Validade:','class'=>'forma-data'));
					echo $this->html->tag('span','a',array('class'=>'a-data'));
				?>
				
			</section>

			<!------------------ FILTRO DE LOTE ------------------>
			<section id="filtro-parceiro" class="coluna-central">
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
					echo $this->Form->input('nome', array('label' => 'Nome:','class'=>'tamanho-medio input-alinhamento'));
					echo $this->Form->input('cpf_cnpj', array('label' => 'CPF/CNPJ:','class'=>'tamanho-medio input-alinhamento'));
					echo $this->Form->input('status', array('type'=>'select','label' => 'Status:','class'=>'tamanho-medio input-alinhamento'));
					
				?>
				</div>
				<div id="msgFiltroLote" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
			</section>
			
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
	
	
	

</div>
