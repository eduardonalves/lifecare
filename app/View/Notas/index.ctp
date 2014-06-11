<?php
	$this->start('css');
		echo $this->Html->css('consulta');
		echo $this->Html->css('table');
		echo $this->Html->css('jquery-ui/jquery-ui.css');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	$this->end();
	
	$this->start('script');
		echo $this->Html->script('funcoes_consulta.js');
	$this->end();
	
	$this->start('modais');
		echo $this->element('config_produto', array('modal'=>'add-config_produto'));
		echo $this->element('config_lote', array('modal'=>'add-config_lote'));
		echo $this->element('config_entrasaida', array('modal'=>'add-config_entrasaida'));
		echo $this->element('quicklink_add', array('modal'=>'add-quicklink'));
	$this->end();
?>

<script>
    $(document).ready(function() {
		var usoPhp = '<?php ?>' ;
		var usoGet = '$_GET["ql"]';
    });
</script>

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
	<h1 class="menuOption21">Consultar</h1>
</header> <!---Fim header--->

<section> <!---section superior--->
	<header>Consultar por Produto, Lote e/ou Operação</header>

	<?php 
		$urlQuickLink = $this->Html->url( null, true );
		$urlQuickLink = $urlQuickLink.'?'.'parametro'.'='.$_GET['parametro'];
	?>

	<?php echo $this->Form->create('Quicklink');	 ?>

	<fieldset class="filtros">

		<?php
		    $_GET['ql'] = (isset($_GET['ql'])) ? $_GET['ql'] : '';
		    echo $this->Form->input('nome',array('required'=>'false','type'=>'select','label'=>'Pesquisa Rápida:','id'=>'quick-select', 'options' => $quicklinksList,'default' => $_GET['ql']));
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
			<!------------------ FILTRO DE PRODUTOS ------------------>
			<section id="filtro-protuto" class="coluna-esquerda">
				<span id="titulo-produto">Dados do Produto</span>
				
				<a href="add-config_produto" class="bt-showmodal">

					<?php echo $this->Html->image('botao-tabela-configuracao.png', array('id' => 'bt-configuração', 'alt' => 'Configuração produtos', 'title' => 'Configuração produtos')); ?>

				</a>
				
				<?php	
				    echo $this->Search->create();
				    echo $this->Search->input('produtoNome', array('label' => 'Nome:','class'=>'tamanho-medio produtos-alinhamento'));
				    echo $this->Search->input('codProd', array('label' => 'Código:','class'=>'tamanho-medio produtos-alinhamento'));
				    echo $this->Search->input('produtoCategoria', array('type'=>'select','label' => 'Categoria:','class'=>'tamanho-medio produtos-alinhamento'));
				    echo $this->Search->input('produtoNivel', array('type'=>'select','label' => 'Nível em Estoque:','class'=>'tamanho-medio produtos-alinhamento'));
				    //OBS.:ADICIONE O MODELO PARA O NÌVEL EM ESTOQUE, REPETI produtoCategoria só para aparecer na tela.
				?>

			</section>

			<!------------------ FILTRO DE LOTE ------------------>
			<section id="filtro-lote" class="coluna-central">
				
				<?php echo $this->Form->input('', array('label'=>array('id'=>'titulo-lote','text'=>'Dados do Lote'),'type'=>'checkbox', 'id' => 'checklote' , 'value' => 'lote')); ?>
				
				<a href="add-config_lote" class="bt-showmodal">

					<?php echo $this->Html->image('botao-tabela-configuracao.png', array('id' => 'bt-configuracao', 'alt' => 'Configuração de lote', 'title' => 'Configuração de lote')); ?>

				</a>
				
				<?php
					echo $this->Search->input('numeroLote', array('label' => 'Lote:','class'=>'tamanho-medio'));
					echo $this->Search->input('statusLote', array('type'=>'select','label' => 'Status Validade:','class'=>'tamanho-medio produtos-alinhamento'));
					echo $this->Search->input('dataLote', array('label' => 'Validade de:','class'=>'inputData'));
					
					echo $this->html->tag('span','a',array('class'=>'a-data'));
					echo $this->Search->input('estoqueLote', array('label' => 'Qtde Lote:','class'=>'tamanho-medio input-alinhamento'));
				?>
				
				<div id="msgFiltroLote" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
			</section>

			<!------------------ FILTRO DE ENTRADA E SAIDA ------------------>
			<section id="filtro-es" class="coluna-direita">
				
				<?php echo $this->Form->input('', array('label'=>array('id'=>'titulo-es','text'=>'Dados da Nota'),'type'=>'checkbox', 'id' => 'checkes' , 'value' => 'es')); ?>
				
				<a href="add-config_entrasaida" class="bt-showmodal">
					
					<?php echo $this->Html->image('botao-tabela-configuracao.png', array('id' => 'bt-configuracao', 'alt' => 'Configuração da Nota', 'title' => 'Configuração da Nota')); ?>
				
				</a>
				
				<?php
					echo $this->Search->input('notaTipoEntrada', array('type' => 'hidden'));
					echo $this->Form->input('notaTipoEntrada', array('label' => ' Tipo de Operação ','type' => 'select','class' => 'operacao','multiple' => 'checkbox','options' => array('ENTRADA' => 'ENTRADA', 'SAIDA' => 'SAIDA'),)); 
					echo $this->Search->input('numeroNota', array('label' => 'Nota:','class'=>'tamanho-medio')); 
					echo $this->Search->input('dataNota', array('label' => 'Data de:','class'=>'inputData'));
					echo $this->html->tag('span','a',array('class'=>'a-data-ES'));
				?>
				
				<div  id="msgFiltroES" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
			</section>

			<?php echo $this->Form->submit('botao-filtrar.png',array('id'=>'quick-filtrar')); ?>

		</div>

		<?php echo $this->Form->end(); ?>

	</fieldset>
</section>

<!------------------ CONSULTA DE PRODUTOS ------------------>
<div class="areaTabela">
	
	<?php
		//consulta de Produtos
		echo $this->element('tb-consulta-produtos');
	?>

	<?php
		//consulta ITENS do Produtos
		echo $this->element('tb-consulta-itensProduto');
	?>

	<?php
		//consulta Lote
		echo $this->element('tb-consulta-lotes');
	?>

	<?php
		//consulta ITENS do Lote
		echo $this->element('tb-consulta-itensLote');
	?>

</div>
