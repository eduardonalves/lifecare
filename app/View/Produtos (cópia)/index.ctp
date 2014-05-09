<div class="produtos index">
	<h2><?php echo __('Produtos'); ?></h2>
	<?php
		echo $this->Search->create();
		echo $this->Search->input('filter1', array('label' => 'Nome: '));
		echo $this->Search->end(__('Filter', true)); 
	?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo'); ?></th>
			<th><?php echo $this->Paginator->sort('codigoEan'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('fabricante'); ?></th>
			<th><?php echo $this->Paginator->sort('composicao'); ?></th>
			<th><?php echo $this->Paginator->sort('Unidade'); ?></th>
			<th><?php echo $this->Paginator->sort('dosagem'); ?></th>
			<th><?php echo $this->Paginator->sort('estoque_minimo'); ?></th>
			<th><?php echo $this->Paginator->sort('estoque_desejado'); ?></th>
			<th><?php echo $this->Paginator->sort('periodocriticovalidade'); ?></th>
			<th><?php echo $this->Paginator->sort('tags'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('preco_custo'); ?></th>
			<th><?php echo $this->Paginator->sort('preco_venda'); ?></th>
			<th><?php echo $this->Paginator->sort('ativo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($produtos as $produto): ?>
	<tr>
		<td><?php echo h($produto['Produto']['id']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['codigoEan']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['nome']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['fabricante']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['composicao']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['Unidade']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['dosagem']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['estoque_minimo']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['estoque_desejado']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['periodocriticovalidade']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['tags']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['created']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['modified']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['preco_custo']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['preco_venda']); ?>&nbsp;</td>
		<td><?php echo h($produto['Produto']['ativo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $produto['Produto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $produto['Produto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $produto['Produto']['id']), null, __('Are you sure you want to delete # %s?', $produto['Produto']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Produto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Lotes'), array('controller' => 'lotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lote'), array('controller' => 'lotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtoitens'), array('controller' => 'produtoitens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produtoiten'), array('controller' => 'produtoitens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tributos'), array('controller' => 'tributos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tributo'), array('controller' => 'tributos', 'action' => 'add')); ?> </li>
	</ul>
</div>
