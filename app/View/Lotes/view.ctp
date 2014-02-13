<div class="lotes view">
<h2><?php echo __('Lote'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($lote['Lote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($lote['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $lote['Produto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Lote'); ?></dt>
		<dd>
			<?php echo h($lote['Lote']['numero_lote']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Fabricacao'); ?></dt>
		<dd>
			<?php echo h($lote['Lote']['data_fabricacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Validade'); ?></dt>
		<dd>
			<?php echo h($lote['Lote']['data_validade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fabricante'); ?></dt>
		<dd>
			<?php echo h($lote['Lote']['fabricante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($lote['Lote']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lote'), array('action' => 'edit', $lote['Lote']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Lote'), array('action' => 'delete', $lote['Lote']['id']), null, __('Are you sure you want to delete # %s?', $lote['Lote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lotes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lote'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Loteitens'), array('controller' => 'loteitens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loteiten'), array('controller' => 'loteitens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques'), array('controller' => 'posicaoestoques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posicaoestoque'), array('controller' => 'posicaoestoques', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Loteitens'); ?></h3>
	<?php if (!empty($lote['Loteiten'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nota Id'); ?></th>
		<th><?php echo __('Lote Id'); ?></th>
		<th><?php echo __('Qtde'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($lote['Loteiten'] as $loteiten): ?>
		<tr>
			<td><?php echo $loteiten['id']; ?></td>
			<td><?php echo $loteiten['nota_id']; ?></td>
			<td><?php echo $loteiten['lote_id']; ?></td>
			<td><?php echo $loteiten['qtde']; ?></td>
			<td><?php echo $loteiten['tipo']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'loteitens', 'action' => 'view', $loteiten['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'loteitens', 'action' => 'edit', $loteiten['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'loteitens', 'action' => 'delete', $loteiten['id']), null, __('Are you sure you want to delete # %s?', $loteiten['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Loteiten'), array('controller' => 'loteitens', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Posicaoestoques'); ?></h3>
	<?php if (!empty($lote['Posicaoestoque'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($lote['Posicaoestoque'] as $posicaoestoque): ?>
		<tr>
			<td><?php echo $posicaoestoque['id']; ?></td>
			<td><?php echo $posicaoestoque['descricao']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'posicaoestoques', 'action' => 'view', $posicaoestoque['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'posicaoestoques', 'action' => 'edit', $posicaoestoque['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posicaoestoques', 'action' => 'delete', $posicaoestoque['id']), null, __('Are you sure you want to delete # %s?', $posicaoestoque['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Posicaoestoque'), array('controller' => 'posicaoestoques', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
