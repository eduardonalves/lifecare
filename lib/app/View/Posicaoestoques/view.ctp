<div class="posicaoestoques view">
<h2><?php echo __('Posicaoestoque'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($posicaoestoque['Posicaoestoque']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($posicaoestoque['Posicaoestoque']['descricao']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Posicaoestoque'), array('action' => 'edit', $posicaoestoque['Posicaoestoque']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Posicaoestoque'), array('action' => 'delete', $posicaoestoque['Posicaoestoque']['id']), null, __('Are you sure you want to delete # %s?', $posicaoestoque['Posicaoestoque']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posicaoestoque'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lotes'), array('controller' => 'lotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lote'), array('controller' => 'lotes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Lotes'); ?></h3>
	<?php if (!empty($posicaoestoque['Lote'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Numero Lote'); ?></th>
		<th><?php echo __('Data Fabricacao'); ?></th>
		<th><?php echo __('Data Validade'); ?></th>
		<th><?php echo __('Fabricante'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($posicaoestoque['Lote'] as $lote): ?>
		<tr>
			<td><?php echo $lote['id']; ?></td>
			<td><?php echo $lote['produto_id']; ?></td>
			<td><?php echo $lote['numero_lote']; ?></td>
			<td><?php echo $lote['data_fabricacao']; ?></td>
			<td><?php echo $lote['data_validade']; ?></td>
			<td><?php echo $lote['fabricante']; ?></td>
			<td><?php echo $lote['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'lotes', 'action' => 'view', $lote['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'lotes', 'action' => 'edit', $lote['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'lotes', 'action' => 'delete', $lote['id']), null, __('Are you sure you want to delete # %s?', $lote['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Lote'), array('controller' => 'lotes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
