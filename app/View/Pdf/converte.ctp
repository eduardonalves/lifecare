<div style="font-family:arial; margin:0 auto; min-height:300px; width:700px;">
	<header style="margin-top:10px; ">
		<p style="font-size:16px; margin:35px 10px; text-align:left;">
			<span style="font-size:20px; font-weight:bold; color:#008000;"><?php echo ($_SESSION['extraparams']['Mensagem']['empresa']);?></span>
			<br/>
			<?php echo ($_SESSION['extraparams']['Mensagem']['endereco']);?>, RJ - Telefone <?php echo ($_SESSION['extraparams']['Mensagem']['telefone']);?>
			<br/>
			<a style="text-decoration:none; color:inherit;" href="<?php echo ($_SESSION['extraparams']['Mensagem']['site']);?>"><?php echo ($_SESSION['extraparams']['Mensagem']['site']);?></a>
			<br/>
			<br/>
			<span><?php echo ($_SESSION['extraparams']['Mensagem']['corpo']);?></span>
		</p>
	</header>
	
	<br/>
	
	<?php $dataInicio = date_create($_SESSION['extraparams']['Pedido']['data_inici']); ?>
	
	<div style="margin-left:10px; ">
		<table style="font-size:14px;">
			<tr>
				<td style="text-align:right; font-weight:bold;">Parceiro Nome: </td>
				<td><?php echo ' '. ($_SESSION['extraparams']['Parceirodenegocio'][0]['nome']);?></td>
			</tr>
			<tr>
				<td style="text-align:right; font-weight:bold;">CPF/CNPJ: </td>
				<td><?php echo ' '. ($_SESSION['extraparams']['Parceirodenegocio'][0]['cpf_cnpj']);?></td>
			</tr>
			<tr>
				<td style="text-align:right; font-weight:bold;">Tipo: </td>
				<td><?php echo ' '. ($_SESSION['extraparams']['Pedido']['tipo']);?></td>
			</tr>
			<tr>
				<td style="text-align:right; font-weight:bold;">Data de Início: </td>
				<td><?php echo ' '. date_format($dataInicio, 'd/m/Y'); ?></td>
			</tr>
			<tr>
				<td style="text-align:right; font-weight:bold;">Forma de Pagamento: </td>
				<td><?php echo ' '. ($_SESSION['extraparams']['Pedido']['forma_pagamento']);?></td>
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
</div>
<pre>
<?php print_r($_SESSION);?>
</pre>
