
<h1> Responsaveis de Setores </h1>

<?php echo $this->Html->link('Add Novo',array('controller' => 'Responsavels', 'action' => 'add')); ?>

<table>
	<tr>
		<th>id</th>
		<th>Setor</th>
		<th>Nome</th>
		<th>E-mail</th>
		<th>Telefone 1</th>
		<th>Telefone 2 (CEL)</th>
	<tr>
	
	<tr>	
		<?php  foreach($responsaveis as $responsavel): ?>
				
				<td><?php echo $responsavel['Responsavel']['id']; ?></td>
				<td><?php echo $responsavel['Responsavel']['setor']; ?></td>
				<td><?php echo $responsavel['Responsavel']['nome']; ?></td>
				<td><?php echo $responsavel['Responsavel']['email']; ?></td>
				<td><?php echo $responsavel['Responsavel']['telefone1']; ?></td>
				<td><?php echo $responsavel['Responsavel']['telefone2']; ?></td>
				
		<?php endforeach; ?>
	</tr>
	
</table>



<pre>
	<?php
		//print_r($responsaveis);
	?>
</pre>
