<div style="font-family:arial; margin:0 auto; min-height:300px; width:700px;">
	<header style="margin-top:10px; ">
		<p style="font-size:18px; margin:35px 10px; text-align:left;">
			<span style="font-size:22px; font-weight:bold;"><?php echo ($_SESSION['extraparams']['Mensagem']['empresa']);?></span>
			
			<br/>
			
			<?php echo ($_SESSION['extraparams']['Mensagem']['endereco']);?>, RJ - Telefone <?php echo ($_SESSION['extraparams']['Mensagem']['telefone']);?>
			
			<br/>
			
			<a style="text-decoration:none; color:inherit;" href="<?php echo ($_SESSION['extraparams']['Mensagem']['site']);?>"><?php echo ($_SESSION['extraparams']['Mensagem']['site']);?></a>
			
			<br/>
			<br/>
			
			<span style="color:#008000; margin-top:25px;" ><?php echo ($_SESSION['extraparams']['Mensagem']['corpo']);?></span>
		</p>
	</header>
	
	<br/>
	
	<?php
		$dataInicio = $_SESSION['extraparams']['Pedido']['data_inici'];
		$dataFim = $_SESSION['extraparams']['Pedido']['data_fim'];
	?>
	
	<table>
		<tr>
			<td>Parceiro Nome: <?php echo ($_SESSION['extraparams']['Parceirodenegocio'][0]['nome']);?></td>
			<td>CPF/CNPJ: <?php echo ($_SESSION['extraparams']['Parceirodenegocio'][0]['cpf_cnpj']);?></td>
			<td>Tipo: <?php echo ($_SESSION['extraparams']['Pedido']['tipo']);?></td>
		</tr>
		<tr>
			<td>Data de Início: <?php echo $dataInicio; ?></td>
			<td>Data de Fim: <?php echo $dataFim; ?></td>
			<td>Forma de Pagamento: <?php echo ($_SESSION['extraparams']['Pedido']['forma_pagamento']);?></td>
		</tr>
	</table>
	
	<br/>
	<br/>
	
	<table>
		<tr>
			<td>Produto Nome</td>
			<td>Quantidade</td>
			<td>Observação</td>
		</tr>

		<?php
			foreach(($_SESSION['extraparams']['Comitensdaoperacao']) as $produtos){
				echo '<tr>';
					echo '<td>'. $produtos['produtoNome'] .'</td>';
					echo '<td>'. $produtos['qtde'] .'</td>';
					echo '<td>'. $produtos['obs'] .'</td>';
				echo '</tr>';
			}
		?>
	</table>
</div>
