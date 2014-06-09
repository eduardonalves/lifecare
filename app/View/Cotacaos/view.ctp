<?php 
	$this->start('css');
		echo $this->Html->css('table');
	    echo $this->Html->css('compras');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		echo $this->Html->script('compras.js');
	$this->end();
	
	
	$this->start('modais');
	    echo $this->element('parceirodeNegoicos_add',array('modal'=>'add-parceiroFornecedor'));
	    echo $this->element('produtos_add',array('modal'=>'add-produtos'));
	    echo $this->element('categoria_add', array('modal'=>'add-categoria'));
	$this->end();
	
	function formatDateToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux['2'])){
			if(isset($dataAux['1'])){
				if(isset($dataAux['0'])){
					$data = $dataAux['2']."/".$dataAux['1']."/".$dataAux['0'];
				}
			}
		}else{
			$data= " / / ";
		}
		return $data;
	}
?>

<header>
    <?php echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

    <h1 class="menuOption41">Consulta de Cotação</h1>
</header>

<section>
	
	<header>Dados da Empresa</header>
	
	<!-- INFORMAÇÕES DA EMPRESA-->
		
		<section  class="coluna-esquerda">
			<?php
				echo $this->Form->input('Vazio.input',array('label'=>'Label:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>'','disabled'=>'disabled'));	
				echo $this->Form->input('Vazio.input',array('label'=>'Label:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>'','disabled'=>'disabled'));	
				echo $this->Form->input('Vazio.input',array('label'=>'Label:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>'','disabled'=>'disabled'));	
			?>
		</section>
		
		<section  class="coluna-central">
			<?php
				echo $this->Form->input('Vazio.input',array('label'=>'Label:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>'','disabled'=>'disabled'));	
				echo $this->Form->input('Vazio.input',array('label'=>'Label:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>'','disabled'=>'disabled'));	
				echo $this->Form->input('Vazio.input',array('label'=>'Label:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>'','disabled'=>'disabled'));	
			
			?>
		</section>
		
		<section  class="coluna-direita">
			<?php
				echo $this->Form->input('Vazio.input',array('label'=>'Label:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>'','disabled'=>'disabled'));	
				echo $this->Form->input('Vazio.input',array('label'=>'Label:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>'','disabled'=>'disabled'));	
				echo $this->Form->input('Vazio.input',array('label'=>'Label:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>'','disabled'=>'disabled'));	
			
			?>
		</section>
		
	<header>Dados da Cotação</header>
	
	<!-- INICIO COTAÇÕES -->
	<fieldset>
		<legend>Dados da Cotação</legend>
		<section class="coluna-esquerda">
			
			<?php
				//echo $this->Form->input('Comoperacao.user_id',array('type'=>'hidden','value'=>$userid));

				echo $this->Form->input('Comoperacao.data_inici',array('label'=>'Data de Início:','class'=>'tamanho-pequeno inputData borderZero','type'=>'text', 'value'=>h(formatDateToView($cotacao['Cotacao']['data_inici'])),'disabled'=>'disabled'));
				echo $this->Form->input('Comoperacao.forma_pagamento',array('type'=>'text','label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno desabilita borderZero', 'value'=>h($cotacao['Cotacao']['forma_pagamento']),'disabled'=>'disabled'));
			?>
			
		</section>
		
		<section class="coluna-central">
			
			<?php
				if($cotacao['Cotacao']['tipo'] == "COTACAO"){
					$tipoOperacao = "Cotação";
				}else{
					$tipoOperacao = "Pedido";
				}
				
				echo $this->Form->input('Comoperacao.data_fim',array('label'=>'Data de Fim:','class'=>'tamanho-pequeno inputData borderZero','type'=>'text','value'=>h(formatDateToView($cotacao['Cotacao']['data_fim'])),'disabled'=>'disabled')); 
				echo $this->Form->input('Comoperacao.prazo_pagamento',array('label'=>'Prazo de Pagamento:','class'=>'tamanho-pequeno borderZero','type'=>'text','value'=>$cotacao['Cotacao']['prazo_pagamento'],'disabled'=>'disabled'));


			?>
			
		</section>
		
		<section class="coluna-direita">

			<?php
				echo $this->Form->input('Comoperacao.prazo_entrega',array('label'=>'Prazo de Entrega:','class'=>'tamanho-pequeno borderZero','type'=>'text','value'=>$cotacao['Cotacao']['prazo_entrega'],'disabled'=>'disabled')); 
				echo $this->Form->input('Comoperacao.status',array('label'=>'Status:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$cotacao['Cotacao']['status'],'disabled'=>'disabled'));	
				
			?>

		</section>
	</fieldset>
	
	<!-- INICIO PRODUTOS -->
	<section class="coluna-Produto coluna-esquerda">
		<fieldset>		
			<legend>Produtos da Cotação</legend>
		<!-- $cotacao['Produto']['data_inici'])-->
			<section class="tabela_fornecedores_view">
				<table id="tbl_produtos" >
					<thead>
						<th>Produto nome</th>
						<th>Quantidade</th>									
						<th>Observação</th>									
					</thead>
					
					<?php 
						foreach($itens as $produtos){
							echo '<tr><td>'. $produtos['Produto']['nome'] .'</td>';
							echo '<td>'. $produtos['Comitensdaoperacao']['qtde'] .'</td>';
							echo '<td>'. $produtos['Comitensdaoperacao']['obs'] .'</td></tr>';
						}
					?>
				</table>
			</section>
		</fieldset>
	</section>
	
	<!-- INICIO FORNECEDOR -->	
	<section class="coluna-Fornecedor coluna-esquerda">
		<fieldset>		
			<legend>Fornecedores da Cotação</legend>
			<section class="tabela_fornecedores_view">
				<table id="tbl_fornecedores" >
					<thead>
						<th>Parceiro nome</th>
						<th style="width:130px;">CPF/CNPJ</th>								
					</thead>
					
					<?php 
						foreach($cotacao['Parceirodenegocio'] as $parceiro){
							echo '<tr><td>'. $parceiro['nome'] .'</td>';
							echo '<td>'. $parceiro['cpf_cnpj'] .'</td></tr>';
						}
					?>
				</table>
			</section>
		</fieldset>
	</section>
	
	
</section>

<footer>

	<?php
	
			echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
											'title'=>'Editar Cotação',
											'class'=>'bt-editar',
											'url'=>array('controller'=>'Cotacaos','action'=>'edit', $cotacao['Cotacao']['id'])));	
													 
	
	?>

</footer>

