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

    <h1 class="menuOption41">Consulta do Pedido</h1>
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
		
	<header>Dados do Fornecedor</header>
	
	<!-- INFORMAÇÕES DA FOrnecedor-->
		
		<section  class="coluna-esquerda">
			<?php
				echo $this->Form->input('Vazio.input',array('label'=>'Nome:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$parceirodenegocio['Parceirodenegocio']['nome'],'disabled'=>'disabled'));	
				foreach($parceirodenegocio['Contato'] as $contato){
					echo $this->Form->input('Vazio.input',array('label'=>'E-mail:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$contato['email'],'disabled'=>'disabled'));	
				}
				
				foreach($parceirodenegocio['Endereco'] as $endereco){
					echo $this->Form->input('Vazio.input',array('label'=>'Tipo Endereço:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$endereco['tipo'],'disabled'=>'disabled'));	
					echo $this->Form->input('Vazio.input',array('label'=>'Número:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$endereco['numero'],'disabled'=>'disabled'));	
					echo $this->Form->input('Vazio.input',array('label'=>'Bairro:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$endereco['bairro'],'disabled'=>'disabled'));				

				}
				
			?>
		</section>
		
		<section  class="coluna-central">
			<?php
				echo $this->Form->input('Vazio.input',array('label'=>'CPF/CNPJ:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$parceirodenegocio['Parceirodenegocio']['cpf_cnpj'],'disabled'=>'disabled'));	

				foreach($parceirodenegocio['Contato'] as $contato){
					echo $this->Form->input('Vazio.input',array('label'=>'Telefone 1:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$contato['telefone1'],'disabled'=>'disabled'));	
				}
				
					foreach($parceirodenegocio['Endereco'] as $endereco){
					echo $this->Form->input('Vazio.input',array('label'=>'CEP:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$endereco['cep'],'disabled'=>'disabled'));	
					echo $this->Form->input('Vazio.input',array('label'=>'Cidade:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$endereco['cidade'],'disabled'=>'disabled'));	

				}
				
			
			?>
		</section>
		
		<section  class="coluna-direita">
			<?php
				echo $this->Form->input('Vazio.input',array('label'=>'Status:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$parceirodenegocio['Parceirodenegocio']['status'],'disabled'=>'disabled'));	
				foreach($parceirodenegocio['Contato'] as $contato){
					echo $this->Form->input('Vazio.input',array('label'=>'Telefone 2:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$contato['telefone2'],'disabled'=>'disabled'));	
				}
				
				foreach($parceirodenegocio['Endereco'] as $endereco){
					echo $this->Form->input('Vazio.input',array('label'=>'Logradouro:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$endereco['logradouro'],'disabled'=>'disabled'));	
					echo $this->Form->input('Vazio.input',array('label'=>'UF:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$endereco['uf'],'disabled'=>'disabled'));	
				
				}
				
			?>
		</section>
		
	<header>Dados do Pedido</header>
	
	<!-- INICIO COTAÇÕES -->
	<fieldset>
		<legend>Dados do Pedido</legend>
		<section class="coluna-esquerda">
			
			<?php
				//echo $this->Form->input('Comoperacao.user_id',array('type'=>'hidden','value'=>$userid));

				echo $this->Form->input('Comoperacao.data_inici',array('label'=>'Data de Início:','class'=>'tamanho-pequeno inputData borderZero','type'=>'text', 'value'=>h(formatDateToView($pedido['Pedido']['data_inici'])),'disabled'=>'disabled'));
				echo $this->Form->input('Comoperacao.forma_pagamento',array('type'=>'text','label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno desabilita borderZero', 'value'=>h($pedido['Pedido']['forma_pagamento']),'disabled'=>'disabled'));
			?>
			
		</section>
		
		<section class="coluna-central">
			
			<?php
				if($pedido['Pedido']['tipo'] == "COTACAO"){
					$tipoOperacao = "Cotação";
				}else{
					$tipoOperacao = "Pedido";
				}
				
				echo $this->Form->input('Comoperacao.data_fim',array('label'=>'Data de Fim:','class'=>'tamanho-pequeno inputData borderZero','type'=>'text','value'=>h(formatDateToView($pedido['Pedido']['data_fim'])),'disabled'=>'disabled')); 
				echo $this->Form->input('Comoperacao.prazo_pagamento',array('label'=>'Prazo de Pagamento:','class'=>'tamanho-pequeno borderZero','type'=>'text','value'=>$pedido['Pedido']['prazo_pagamento'],'disabled'=>'disabled'));


			?>
			
		</section>
		
		<section class="coluna-direita">

			<?php
				echo $this->Form->input('Comoperacao.prazo_entrega',array('label'=>'Prazo de Entrega:','class'=>'tamanho-pequeno borderZero','type'=>'text','value'=>$pedido['Pedido']['prazo_entrega'],'disabled'=>'disabled')); 
				echo $this->Form->input('Comoperacao.status',array('label'=>'Status:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$pedido['Pedido']['status'],'disabled'=>'disabled'));	
				
			?>

		</section>
	</fieldset>
	
	<!-- INICIO PRODUTOS -->
				<table id="tbl_produtos" >
					<thead>
						<th>Produto nome</th>
						<th>Quantidade</th>									
						<th>Unidade</th>									
						<th>Observação</th>									
					</thead>
					
					<?php 
						foreach($itens as $produtos){
							echo '<tr><td>'. $produtos['Produto']['nome'] .'</td>';
							echo '<td>'. $produtos['Comitensdaoperacao']['qtde'] .'</td>';
							echo '<td>'. $produtos['Produto']['unidade'] .'</td>';
							echo '<td>'. $produtos['Comitensdaoperacao']['obs'] .'</td></tr>';
						}
					?>
				</table>


</section>

<footer>

	<?php
	
			echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
											'title'=>'Editar Cotação',
											'class'=>'bt-editar',
											'url'=>array('controller'=>'Cotacaos','action'=>'edit', $pedido['Pedido']['id'])));	
													 
	
	?>

</footer>


