<?php
	echo $this->Html->css('vendas.css');
	echo $this->Html->css('table.css');
	//echo $this->Html->css('PrintArea.css');
	//echo $this->Html->script('jquery.PrintArea.js');
	//echo $this->Html->script('funcoes_entrada.js');

	function convertMoeda(&$valorMoeda){
		$valorMoedaAux = explode('.' , $valorMoeda);
		if(isset ($valorMoedaAux[1])){
			$valorMoeda= "R$ ".$valorMoedaAux[0].','.$valorMoedaAux[1];
		}else{
			$valorMoeda = "R$ ".$valorMoedaAux[0].','.'00';
		}
		return $valorMoeda;
	}

	function converteData(&$dataVer){
		$auxData = explode('-', $dataVer);
		$dataVer = $auxData[2].'/'.$auxData[1].'/'.$auxData[0];
		return $dataVer;
	}
?>


<header>
	<?php echo $this->Html->image('titulo-saida.png', array('class' => 'saida-icon', 'alt' => 'Saida ', 'title' => 'Saida', 'border' => '0')); ?>
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption51" >Visualizar Venda</h1>

</header>

<section>
<!-- ###################################################################################################################################################################3 -->
	<section>
		<header id="titulo-header">Dados do Vendedor</header>
			<section class="coluna-esquerda">
				<div class="conteudo-linha-canto2">	
					<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><pclass="valor"><?php echo $findVenda['Vendedor']['nome']; ?></p></div>
				</div>
				
			</section>
		
			<section class="coluna-central">
			</section>
		
			<section class="coluna-direita">
			</section>
	</section>

<!-- ###################################################################################################################################################################3 -->
	<section>
		<header id="titulo-header">Dados do Cliente</header>
			
			<section class="coluna-esquerda">
				<div class="conteudo-linha-canto2">	
					<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><pclass="valor"><?php echo $cliente['Cliente']['nome']; ?></p></div>
				</div>
			</section>

			<section class="coluna-central">
				<div class="conteudo-linha-canto2">	
					<div class="linha"><?php echo $this->Html->Tag('p','CPF/CNPJ:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><pclass="valor"><?php echo $cliente['Cliente']['cpf_cnpj']; ?></p></div>
				</div>
			</section>

			<section class="coluna-direita">
			
			</section>

	</section>

<!-- ###################################################################################################################################################################3 -->
	<section>
		<header id="titulo-header">Produtos da Venda</header>
			
			<section id="creditos_header">
				<fieldset>	
					<legend>Valores de Crédito</legend>
					<ul>
						<?php
							if(count($cliente['Dadoscredito']) > 0){
								$creditoCliente = $cliente['Dadoscredito'][count($cliente['Dadoscredito'])-1]['limite'] - $cliente['Dadoscredito'][count($cliente['Dadoscredito'])-1]['limite_usado']; 
							}else{
								$creditoCliente = 0;
							}
						?>

						<li>Crédito do Cliente: &nbsp;R$&nbsp;<span><?php echo number_format($creditoCliente,2,',','.'); ?></span></li>
						<li>Valor Total da Venda: &nbsp;R$&nbsp;<span><?php echo number_format($findVenda['Venda']['valor_total'],2,',','.'); ?></span></li>
					</ul>			
				</fieldset>		
			</section>
			
			<table id="tabela-principal" cellpadding="0" cellspacing="0">
				<thead>					
					<th><?php echo ('Código'); ?></th>
					<th><?php echo ('Nome'); ?></th>
					<th><?php echo ('Und. Comercial'); ?></th>
					<th><?php echo ('Descrição'); ?></th>
					<th><?php echo ('Qtde'); ?></th>
					<th><?php echo ('V. Unitário'); ?></th>
					<th><?php echo ('V. Total'); ?></th>
					<th><?php echo ('Lote'); ?></th>
				</thead>
				
				<tbody>
					<?php foreach($findVenda['Produtoiten'] as $produtosLis){ ?>		
						<tr>
							<td><?php echo $produtosLis['id']; ?></td>
							<td><?php echo $produtosLis['produto_nome']; ?></td>
							<td><?php echo $produtosLis['produto_unidade']; ?></td>
							<td><?php echo $produtosLis['produto_descricao']; ?></td>
							<td><?php echo $produtosLis['qtde']; ?></td>
							<td><?php echo $produtosLis['valor_unitario']; ?></td>
							<td><?php echo $produtosLis['valor_total']; ?></td>			
							<td>
								<?php
									foreach($findVenda['Loteiten'] as $loteNome){
										if($produtosLis['produto_id'] == $loteNome['produto_id']){
											echo $loteNome['numerolote'] . "<br/>";
										}
									}
								
								?>		
							</td>
					<?php } ?>	
									
									
					</tr>	
				</tbody>
				
			</table>
	</section>
	<footer>
		<a class="menuLink" href='<?php echo $this->Html->url(array("controller"=>"Vendas","action"=>"index"),true);?>/?parametro=pedidos'>
			<?php 
				echo $this->Html->image('voltar.png', array('class' => 'bt-voltar', 'alt' => 'Voltar', 'title' => 'Voltar'));
			?>
		</a>			
	</footer>
</section>

