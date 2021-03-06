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
	function converterMoeda(&$valorMoeda){
		$valorMoedaAux = explode('.' , $valorMoeda);
		if(isset ($valorMoedaAux[1])){
			$valorMoeda= "R$ ".$valorMoedaAux[0].','.$valorMoedaAux[1];
		}else{
			$valorMoeda = "R$ ".$valorMoedaAux[0].','.'00';
		}
		return $valorMoeda;
	}
	echo "<span class='success-flash'>SITUAÇÃO: ". $pedido['Pedido']['status'] ."</span>";
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
				echo $this->Form->input('Vazio.nomeEmpresa',array('value'=>$empresa['Empresa']['nome_fantasia'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Nome da Empresa:','type'=>'text','id'=>''));
				echo $this->Form->input('Vazio.telefone',array('value'=>$empresa['Empresa']['telefone'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Telefone:','type'=>'text','id'=>''));
				echo $this->Form->input('Vazio.uf',array('value'=>$empresa['Empresa']['uf'],'disabled'=>'disabled','class'=>'tamanho-pequeno borderZero','label'=>'UF:','type'=>'text','id'=>''));
			?>
		</section>
		
		<section  class="coluna-central">
			<?php
				echo $this->Form->input('Vazio.cnpj',array('value'=>$empresa['Empresa']['cnpj'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'CNPJ:','type'=>'text','id'=>''));
				echo $this->Form->input('Vazio.endereco',array('value'=>$empresa['Empresa']['endereco'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Endereço:','type'=>'text','id'=>''));
				echo $this->Form->input('Vazio.cidade',array('value'=>$empresa['Empresa']['cidade'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Cidade:','type'=>'text','id'=>''));
			?>
		</section>
		
		<section  class="coluna-direita">
			<?php
				echo $this->Form->input('Vazio.razao',array('value'=>$empresa['Empresa']['razao'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Razão:','type'=>'text','id'=>''));
				echo $this->Form->input('Vazio.complemento',array('value'=>$empresa['Empresa']['complemento'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Complemento:','type'=>'text','id'=>''));
				echo $this->Form->input('Vazio.bairro',array('value'=>$empresa['Empresa']['bairro'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Bairro:','type'=>'text','id'=>''));

			?>
		</section>
		
	<header>Dados do Fornecedor</header>
	
	<!-- INFORMAÇÕES DO FORNECEDOR-->
		
		<section  class="coluna-esquerda">
			<?php
				echo $this->Form->input('Vazio.input',array('label'=>'Nome:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$parceirodenegocio['Parceirodenegocio']['nome'],'disabled'=>'disabled'));	
				foreach($parceirodenegocio['Contato'] as $contato){
					echo $this->Form->input('Vazio.input',array('label'=>'E-mail:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$contato['email'],'disabled'=>'disabled','style'=>'display: none;'));
					echo "
					<div class='whiteSpace' style='min-width: 185px !important; font-size: 13px; margin: 12px 0px 0px 0px;'>
						<span title='".$contato['email']."'>".$contato['email']."</span>
					</div>";
				}
				
				foreach($parceirodenegocio['Endereco'] as $endereco){
					echo $this->Form->input('Vazio.input',array('label'=>'Tipo Endereço:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$endereco['tipo'],'disabled'=>'disabled'));	
					echo $this->Form->input('Vazio.input',array('label'=>'Número:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$endereco['numero'],'disabled'=>'disabled'));	
					echo $this->Form->input('Vazio.input',array('label'=>'Bairro:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$endereco['bairro'],'disabled'=>'disabled'));				
				}
				
			?>
		</section>
		
		<section  class="coluna-central">
			<?php
				echo $this->Form->input('Vazio.input',array('label'=>'CPF/CNPJ:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$parceirodenegocio['Parceirodenegocio']['cpf_cnpj'],'disabled'=>'disabled'));	

				foreach($parceirodenegocio['Contato'] as $contato){
					echo $this->Form->input('Vazio.input',array('label'=>'Telefone 1:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$contato['telefone1'],'disabled'=>'disabled'));	
				}
				
					foreach($parceirodenegocio['Endereco'] as $endereco){
					echo $this->Form->input('Vazio.input',array('label'=>'CEP:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$endereco['cep'],'disabled'=>'disabled'));	
					echo $this->Form->input('Vazio.input',array('label'=>'Cidade:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$endereco['cidade'],'disabled'=>'disabled'));	

				}
				
			
			?>
		</section>
		
		<section  class="coluna-direita">
			<?php
				echo $this->Form->input('Vazio.input',array('label'=>'Status:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$parceirodenegocio['Parceirodenegocio']['status'],'disabled'=>'disabled'));	
				foreach($parceirodenegocio['Contato'] as $contato){
					echo $this->Form->input('Vazio.input',array('label'=>'Telefone 2:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$contato['telefone2'],'disabled'=>'disabled'));	
				}
				
				foreach($parceirodenegocio['Endereco'] as $endereco){
					echo $this->Form->input('Vazio.input',array('label'=>'Logradouro:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$endereco['logradouro'],'disabled'=>'disabled'));	
					echo $this->Form->input('Vazio.input',array('label'=>'UF:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$endereco['uf'],'disabled'=>'disabled'));	
				
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

				echo $this->Form->input('Comoperacao.data_inici',array('label'=>'Data de Início:','class'=>'tamanho-medio inputData borderZero','type'=>'text', 'value'=>h(formatDateToView($pedido['Pedido']['data_inici'])),'disabled'=>'disabled'));
				echo $this->Form->input('Comoperacao.forma_pagamento',array('type'=>'text','label'=>'Forma de Pagamento:','class'=>'tamanho-medio desabilita borderZero', 'value'=>h($pedido['Pedido']['forma_pagamento']),'disabled'=>'disabled'));
			?>
			
		</section>
		
		<section class="coluna-central">
			
			<?php
				if($pedido['Pedido']['tipo'] == "COTACAO"){
					$tipoOperacao = "Cotação";
				}else{
					$tipoOperacao = "Pedido";
				}
				
				echo $this->Form->input('Comoperacao.prazo_pagamento',array('label'=>'Prazo de Pagamento:','class'=>'tamanho-medio borderZero','type'=>'text','value'=>$pedido['Pedido']['prazo_pagamento'],'disabled'=>'disabled'));
				echo $this->Form->input('Comoperacao.prazo_entrega',array('label'=>'Prazo de Entrega:','class'=>'tamanho-medio borderZero','type'=>'text','value'=>$pedido['Pedido']['prazo_entrega'],'disabled'=>'disabled')); 


			?>
			
		</section>
		
		<section class="coluna-direita">

			<?php
				echo $this->Form->input('Comoperacao.status',array('label'=>'Status:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$pedido['Pedido']['status'],'disabled'=>'disabled'));	
				echo $this->Form->input('Comoperacao.data_entrega',array('label'=>'Previsão de Entrega:','type'=>'text','class'=>'tamanho-medio inputData borderZero','value'=>h(formatDateToView($pedido['Pedido']['data_entrega'])),'disabled'=>'disabled'));	

			?>

		</section>
	</fieldset>
	
	<!-- INICIO PRODUTOS -->
				<table id="tbl_produtos" >
					<thead>
						<th>Produto nome</th>
						<th>Quantidade</th>									
						<th>Unidade</th>									
						<th>Valor Unitário</th>									
						<th>Valor Total</th>									
						<th>Observação</th>									
					</thead>
					
					<?php 
						foreach($itens as $produtos){
							echo '<tr><td>'. $produtos['Produto']['nome'] .'</td>';
							echo '<td>'. $produtos['Comitensdaoperacao']['qtde'] .'</td>';
							echo '<td>'. $produtos['Produto']['unidade'] .'</td>';
							echo '<td>';
								echo converterMoeda($produtos['Comitensdaoperacao']['valor_unit']);
							echo '</td>';
							echo '<td>';
								echo converterMoeda($produtos['Comitensdaoperacao']['valor_total']); 
							echo '</td>';
							echo '<td>'. $produtos['Comitensdaoperacao']['obs'] .'</td></tr>';
						}
					?>
				</table>


</section>

<footer>

</footer>

