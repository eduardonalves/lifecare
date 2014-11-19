<?php
	$this->start('css');
		echo $this->Html->css('table');
	$this->end();
	
	function formatDateToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux['2'])){
			if(isset($dataAux['1'])){
				if(isset($dataAux['0'])){
					$data = $dataAux['2']."/".$dataAux['1']."/".$dataAux['0'];
				}
			}
		}
		return $data;
	}

?>

<header>
	<?php echo $this->Html->image('ico-separa-verde.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>
		
	<h1 class="menuOption26">Consulta Separação</h1>
</header>

<section>
	<header></header>
	
	<table>
		<thead>
			<tr>
				<td>Ações</td>
				<td>Código</td>
				<td>Cliente</td>
				<td>Data</td>
				<td>Vendedor</td>
				<td>Autorização</td>
				<td>Status</td>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach($comoperacaos as $operacao){ ?>
				<tr>
					
					<td>
						<?php 
							echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Produtos para Separar','title'=>'Visualizar Produtos para Separar','url'=>array('controller' => 'Comoperacaos','action' => 'viewsepara', $operacao['Comoperacao']['id']))); 
						?>
					</td>
					<td><?php echo $operacao['Comoperacao']['id'] ?></td>
					<td><?php if(!empty($operacao['Parceirodenegocio'][0]['nome'])){ echo $operacao['Parceirodenegocio'][0]['nome']; }?></td>
					<td><?php echo formatDateToView($operacao['Comoperacao']['data_inici']); ?></td>
					<td><?php if(!empty($operacao['Comoperacao']['vendedor_nome'])){ echo $operacao['Comoperacao']['vendedor_nome']; }?></td>
					<td><?php echo $operacao['Comoperacao']['autorizado_por'] ?></td>
					<td><?php echo $operacao['Comoperacao']['status_estoque'] ?></td>
				
				</tr>				
			<?php }?>
		</tbody>
		
	</table>
	
	
</section>

<div style="clear:both;"></div>
<pre>
	<?php
		print_r($comoperacaos);
	?>

</pre>
