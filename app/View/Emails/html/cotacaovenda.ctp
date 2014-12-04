<?php
	function converterMoeda(&$valorMoeda){
		$valorMoedaAux = explode('.' , $valorMoeda);
		if(isset ($valorMoedaAux[1])){
			$valorMoeda= "R$ ".$valorMoedaAux[0].','.$valorMoedaAux[1];
		}else{
			$valorMoeda = "R$ ".$valorMoedaAux[0].','.'00';
		}
		return $valorMoeda;
	}
?>
<div style="font-family:arial; background-color:#F9F9F9; border:2px solid #CCCCCC; margin:0 auto; min-height:300px; width:700px;">
	<header style="margin-top:10px; ">
		<p style="text-align:center;">
			<img src="http://lifecare.vento-consulting.com/img/login-title.png">
		</p>
		<p style="font-size:16px; margin:35px 10px; text-align:left;">
			<span style="font-size:20px; font-weight:bold;"><?php echo ($_SESSION['extraparams']['Mensagem']['empresa']);?></span>
			<br/>
			<?php echo ($_SESSION['extraparams']['Mensagem']['endereco']);?>,  - Telefone <?php echo ($_SESSION['extraparams']['Mensagem']['telefone']);?>
			<br/>
			<a style="text-decoration:none; color:inherit;" href="<?php echo ($_SESSION['extraparams']['Mensagem']['site']);?>"><?php echo ($_SESSION['extraparams']['Mensagem']['site']);?></a>
		</p>

		<p style="margin:35px 10px; text-align:left;">

			<?php echo ($_SESSION['extraparams']['Mensagem']['corpo']);?>
		</p>
	</header>
	
	<br/>
	
	<?php $dataInicio = date_create($_SESSION['extraparams']['Cotacaovenda']['data_inici']); ?>
	
	<div style="margin-left:10px; ">
		<table style="font-size:14px;">
			<tr>
				<td style="text-align:right; font-weight:bold;">Cliente: </td>
				<td><?php echo ' '. ($_SESSION['extraparams']['Parceirodenegocio'][0]['nome']);?></td>
			</tr>
			<tr>
				<td style="text-align:right; font-weight:bold;">CPF/CNPJ: </td>
				<td><?php echo ' '. ($_SESSION['extraparams']['Parceirodenegocio'][0]['cpf_cnpj']);?></td>
			</tr>
			<tr>
				<td style="text-align:right; font-weight:bold;">Tipo: </td>
				<td><?php echo ' '. ($_SESSION['extraparams']['Cotacaovenda']['tipo']);?></td>
			</tr>
			<tr>
				<td style="text-align:right; font-weight:bold;">Data: </td>
				<td><?php echo ' '. date_format($dataInicio, 'd/m/Y'); ?></td>
			</tr>
			<tr>
				<td style="text-align:right; font-weight:bold;">Forma de Pagamento: </td>
				<td><?php echo ' '. ($_SESSION['extraparams']['Cotacaovenda']['forma_pagamento']);?></td>
			</tr>
			<tr>
				<td style="text-align:right; font-weight:bold;">Prazo de Pagamento: </td>
				<td><?php echo ' '. ($_SESSION['extraparams']['Cotacaovenda']['prazo_pagamento']);?></td>
			</tr>
			<tr>
				<td style="text-align:right; font-weight:bold;">Valor Total: </td>
				<td><?php echo ' '. converterMoeda(($_SESSION['extraparams']['Cotacaovenda']['valor']));?></td>
			</tr>
		</table>
		
		<br/>
		
		<table>
			<tr>
				<td>Produto Nome</td>
				<td>Vl. Unit</td>
				<td>Quantidade</td>
				<td>Vl. Total</td>
				<td>Observação</td>
			</tr>

			<?php
				foreach(($_SESSION['extraparams']['Comitensdaoperacao']) as $produtos){
					echo '<tr>';
						echo '<td>'. $produtos['produtoNome'] .'</td>';
						echo '<td>'. $produtos['valor_unit'] .'</td>';
						echo '<td>'. $produtos['qtde'] .'</td>';
						echo '<td>'. $produtos['valor_total'] .'</td>';
						echo '<td>'. $produtos['obs'] .'</td>';
						
					echo '</tr>';
				}
			?>
		</table>
	
	</div>
</div>
