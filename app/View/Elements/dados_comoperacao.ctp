<section> <!---section Baixo--->	
<header class="">Dados de Operações</header>

<section class="coluna-Produto coluna-esquerda">
	<fieldset>
		<legend>Pedidos</legend>
		<section class="tabela_fornecedores">
			<table id="tbl_produtos" >
				<thead>			
					<th>Data Inicial</th>
					<th>Data Final</th>				
					<th>Prazo Entrega</th>
					<th>Prazo Pagamento</th>	
					<th>Status</th>	
				</thead>

				<?php
					/*
						foreach($itens as $produtos){
							echo '<tr><td>'. $produtos['Produto']['nome'] .'</td>';
							echo '<td>'. $produtos['Comitensdaoperacao']['qtde'] .'</td>';
							echo '<td>'. $produtos['Comitensdaoperacao']['obs'] .'</td></tr>';
						}
					*/
				?>
			</table>
		</section>
	</fieldset>
</section>

<section class="coluna-Fornecedor coluna-esquerda">
	<fieldset>		
		<legend>Cotações</legend>
		<section class="tabela_fornecedores">
			<table id="tbl_fornecedores" >
				<thead>
					<th>Data Inicial</th>
					<th>Data Final</th>				
					<th>Prazo Entrega</th>
					<th>Prazo Pagamento</th>	
					<th>Status</th>					
				</thead>
				
				<?php 
					/*
						foreach($comoperacao['Parceirodenegocio'] as $parceiro){
							echo '<tr><td>'. $parceiro['nome'] .'</td>';
							echo '<td>'. $parceiro['cpf_cnpj'] .'</td></tr>';
						}
					*/
				?>
						
			</table>
		</section>
	</fieldset>
</section>

<!--
<pre>
<?php
	print_r($operacoes);
?>
</pre>
-->
