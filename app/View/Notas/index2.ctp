<div class="notas index">
	<h2><?php echo __('Notas'); ?></h2>
	<?php
		echo $this->Search->create();
		echo $this->Search->input('numeroNota', array('label' => 'Nota: '));
		//$opts= array('ENTRADA'=> 'ENTRADA', 'SAIDA' => 'SAIDA');
		echo $this->Search->input('notaTipoEntrada', array('type' => 'hidden'));
		//echo $this->Search->input('notaTipoSaida', array('label' => 'Saida: ', 'value' => 'SAIDA', 'type' =>'checkbox'));
		echo $this->Form->input('notaTipoEntrada', array(
		    'label' => ' ',
		    'type' => 'select',
		    'multiple' => 'checkbox',
		    'options' => array('ENTRADA' => 'ENTRADA', 'SAIDA' => 'SAIDA'),
		   // 'selected' => $selectedWarnings
		  )); 
		echo $this->Search->input('dataNota', array('label' => 'Data: '));
		echo "<br />";
		echo "<br />";
		echo "<br />";
		echo $this->Search->input('produtoNome', array('label' => 'Nome: '));
		echo $this->Search->input('codEAN', array('label' => 'Código EAN: '));
		echo $this->Search->input('produtoCategoria', array('label' => 'Categoria: '));
		echo "<br />";
		echo "<br />";
		echo $this->Search->input('numeroLote', array('label' => 'Lote: '));
		echo $this->Search->input('statusLote', array('label' => 'Status Validade: '));
		echo $this->Search->input('dataLote', array('label' => 'Data Lote: '));
		echo $this->Search->end(__('Filter', true)); 
	?>
	
	
	<?php
	//Inicio de consulta de Produtos
	if(isset($_GET['parametro'])){
		if($_GET['parametro'] == 'produtos'){
			
			
	?>
	<div class="tabelas" id="produtos">
		<table cellpadding="0" cellspacing="0">
			<tr>
					<th><?php echo $this->Paginator->sort('nome');?></th>
					<th><?php echo $this->Paginator->sort('codigoEan');?></th>
					<th><?php echo $this->Paginator->sort('estoque_minimo');?></th>
					<th><?php echo $this->Paginator->sort('estoque_desejado');?></th>
					<th><?php echo $this->Paginator->sort('estoque', 'Estoque');?></th>
					<th><?php echo $this->Paginator->sort('nivel', 'Nivel');?></th>				
			</tr>

			<?php foreach ($produtos as $produto): ?>
		
				<tr>
						<td><?php echo h($produto['Produto']['nome']); ?>&nbsp;</td>
						<td><?php echo h($produto['Produto']['codigoEan']); ?>&nbsp;</td>
						<td><?php echo h($produto['Produto']['estoque_minimo']); ?>&nbsp;</td>
						<td><?php echo h($produto['Produto']['estoque_desejado']); ?>&nbsp;</td>
						<td><?php echo h($produto['Produto']['estoque']); ?>&nbsp;</td>
						<td><?php echo h($produto['Produto']['nivel']); ?>&nbsp;</td>
					
				</tr>

			<?php endforeach; ?>
		</table>
		
		<p>
			<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
			?>	
		</p>
		<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
		</div>
	</div>	
	
	
	
	<?php
			
		}
	}
	//fim de Consulta de produtos
	?>

<?php

	//Inicio de consultas itens de produtos
	if(isset($_GET['parametro'])){
		if($_GET['parametro'] == 'itensdoproduto'){
			
			
	?>
	<div class="tabelas" id="itensdoproduto">
		<table cellpadding="0" cellspacing="0">
			<tr>
					<th><?php echo $this->Paginator->sort('Nota.tipo');?></th>
					<th><?php echo $this->Paginator->sort('Nota.nota_fiscal');?></th>
					<th><?php echo $this->Paginator->sort('Nota.data');?></th>
					<th><?php echo $this->Paginator->sort('Nota.valor_total', 'Total da nota');?></th>
					<th><?php echo $this->Paginator->sort('Nota.parceirodenegocio_id', 'Cliente/Fornecedor');?></th>
					<th><?php echo $this->Paginator->sort('Nota.valor_total','Valor Total');?></th>
					<th><?php echo $this->Paginator->sort('Produtoiten.qtde', 'Qtde');?></th>
					<th><?php echo $this->Paginator->sort('Produto.nome','Nome');?></th>
					<th><?php echo $this->Paginator->sort('Produto.codigoEan','Código Ean');?></th>
					<th><?php echo $this->Paginator->sort('Produto.estoque','Quantidade Atual');?></th>
					<th><?php echo $this->Paginator->sort('Produto.nivel','Nivel');?></th>
			</tr>

			<?php foreach ($produtoitens as $produtoiten): ?>
		
				<tr>
						<td><?php echo h($produtoiten['Nota']['tipo']); ?>&nbsp;</td>
						<td><?php echo h($produtoiten['Nota']['nota_fiscal']); ?>&nbsp;</td>
						<td><?php echo h($produtoiten['Nota']['data']); ?>&nbsp;</td>
						<td><?php echo h($produtoiten['Nota']['valor_total']); ?>&nbsp;</td>
						<td><?php echo $this->Html->link($produtoiten['Nota']['parceirodenegocio_id'], array('controller' =>'Parceirodenegocios', 'action' => 'view', $produtoiten['Nota']['parceirodenegocio_id'])); ?></td>
						<td><?php echo h($produtoiten['Nota']['valor_total']); ?>&nbsp;</td>
						<td><?php echo h($produtoiten['Produtoiten']['qtde']); ?>&nbsp;</td>
						<td><?php echo h($produtoiten['Produto']['nome']); ?>&nbsp;</td>
						<td><?php echo h($produtoiten['Produto']['codigoEan']); ?>&nbsp;</td>
						<td><?php echo h($produtoiten['Produto']['estoque']); ?>&nbsp;</td>
						<td><?php echo h($produtoiten['Produto']['nivel']); ?>&nbsp;</td>
				</tr>

			<?php endforeach; ?>
		</table>
		
		<p>
			<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
			?>	
		</p>
		<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
		</div>
	</div>	
	
	
	
	<?php
			
		}
	}
	//Fim de consultas de itens de  produtos
	?>

<?php

	//Inicio de consultas de Lotes
	if(isset($_GET['parametro'])){
		if($_GET['parametro'] == 'lotes'){
			
			
	?>
	<div class="tabelas" id="itensdoproduto">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th><?php echo $this->Paginator->sort('Produto.nome', 'Nome');?></th>
				<th><?php echo $this->Paginator->sort('Produto.codigoEan', 'Código Ean');?></th>
				<th><?php echo $this->Paginator->sort('Produto.unidade', 'Unidade');?></th>
				<th><?php echo $this->Paginator->sort('Produto.estoque', 'Qtd Atual');?></th>
				<th><?php echo $this->Paginator->sort('Produto.nivel', 'Nível');?></th>
				<th><?php echo $this->Paginator->sort('Lote.numero_lote', 'Número do Lote');?></th>
				<th><?php echo $this->Paginator->sort('Lote.data_validade', 'Validade');?></th>
				<th><?php echo $this->Paginator->sort('Lote.status', 'Status');?></th>

			</tr>

			<?php foreach ($lotes as $lote): ?>
		
				<tr>
					<td><?php echo h($lote['Produto']['nome']); ?>&nbsp;</td>
					<td><?php echo h($lote['Produto']['codigoEan']); ?>&nbsp;</td>
					<td><?php echo h($lote['Produto']['unidade']); ?>&nbsp;</td>
					<td>Qtde teste</td>
					<td>Nível teste</td>	
					<td><?php echo h($lote['Lote']['numero_lote']); ?>&nbsp;</td>	
					<td><?php echo h($lote['Lote']['data_validade']); ?>&nbsp;</td>	
					<td><?php echo h($lote['Lote']['status']); ?>&nbsp;</td>	
				</tr>

			<?php endforeach; ?>
		</table>
		
		<p>
			<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
			?>	
		</p>
		<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
		</div>
	</div>	
	
	
	
	<?php
			
		}
	}
	//Fim de consultas de lotes
	?>

<?php

	//Inicio de consultas de itens do Lotes
	if(isset($_GET['parametro'])){
		if($_GET['parametro'] == 'itensdolote'){
			
			
	?>
	<div class="tabelas" id="itensdoproduto">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th><?php echo $this->Paginator->sort('Nota.tipo', 'tipo');?></th>
				<th><?php echo $this->Paginator->sort('Nota.nota_fiscal', 'NF');?></th>
				<th><?php echo $this->Paginator->sort('Nota.data', 'data');?></th>
				<th><?php echo $this->Paginator->sort('Nota.data', 'valor_total');?></th>
				<th><?php echo $this->Paginator->sort('Nota.parceirodenegocio_id', 'Fornecedor/Cliente');?></th>
				<th><?php echo $this->Paginator->sort('Produtoiten.qtde', 'Qtde');?></th>
				<th><?php echo $this->Paginator->sort('Produtoiten.valor_unitario', 'R$ Unit');?></th>
				<th><?php echo $this->Paginator->sort('Produto.nome', 'nome');?></th>
				<th><?php echo $this->Paginator->sort('Produto.codigoEan', 'Cód EAN');?></th>
				<th><?php echo $this->Paginator->sort('Lote.qtde', 'Qtde');?></th>
				<th><?php echo $this->Paginator->sort('Lote.numero_lote', 'Número do lote');?></th>
				<th><?php echo $this->Paginator->sort('Lote.data_validade', 'Validade');?></th>
				<th><?php echo $this->Paginator->sort('Lote.status', 'Status');?></th>

			</tr>

			<?php foreach ($loteitens as $loteiten): ?>
		
				<tr>
					<td><?php echo h($loteiten['Nota']['tipo']); ?>&nbsp;</td>
					<td><?php echo h($loteiten['Nota']['nota_fiscal']); ?>&nbsp;</td>
					<td><?php echo h($loteiten['Nota']['data']); ?>&nbsp;</td>
					<td><?php echo h($loteiten['Nota']['valor_total']); ?>&nbsp;</td>
					<td><?php echo h($loteiten['Nota']['parceirodenegocio_id']); ?>&nbsp;</td>	
					<td><?php echo h($loteiten['Produtoiten']['qtde']); ?>&nbsp;</td>	
					<td><?php echo h($loteiten['Produtoiten']['valor_unitario']); ?>&nbsp;</td>	
					<td><?php echo h($loteiten['Produto']['nome']); ?>&nbsp;</td>
					<td><?php echo h($loteiten['Produto']['codigoEan']); ?>&nbsp;</td>	
					<td><?php echo h($loteiten['Loteiten']['qtde']); ?>&nbsp;</td>	
					<td><?php echo h($loteiten['Lote']['numero_lote']); ?>&nbsp;</td>		
					<td><?php echo h($loteiten['Lote']['data_validade']); ?>&nbsp;</td>	
					<td><?php echo h($loteiten['Lote']['status']); ?>&nbsp;</td>	
				</tr>

			<?php endforeach; ?>
		</table>

		<p>
			<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			));
			?>	
		</p>
		<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
		</div>
	</div>	
	
	
	
	<?php
			
		}
	}
	//Fim de consultas de itens do lote
	?>

<?php 
	$urlQuickLink= $this->Html->url( null, true );
	$urlQuickLink = $urlQuickLink.'?'.'parametro'.'='.$_GET['parametro']; 

?> 
	<div class="quicklinks form">
	<?php echo $this->Form->create('Quicklink'); ?>
		<fieldset>
			<legend><?php echo __('Add Quicklink'); ?></legend>
		<?php
			echo $this->Form->input('user_id');
			echo $this->Form->input('nome');
			echo $this->Form->input('url', array('value' => $urlQuickLink));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
	</div>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Nota'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Loteitens'), array('controller' => 'loteitens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loteiten'), array('controller' => 'loteitens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtoitens'), array('controller' => 'produtoitens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produtoiten'), array('controller' => 'produtoitens', 'action' => 'add')); ?> </li>
	</ul>
</div>
