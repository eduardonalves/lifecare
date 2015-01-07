<div class="origems view">
<h2><?php echo __('Origem'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($origem['Origem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($origem['Origem']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($origem['Origem']['codigo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Origem'), array('action' => 'edit', $origem['Origem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Origem'), array('action' => 'delete', $origem['Origem']['id']), null, __('Are you sure you want to delete # %s?', $origem['Origem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Origems'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Origem'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Produtos'); ?></h3>
	<?php if (!empty($origem['Produto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Origem Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('CodigoEan'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('NomeComercial'); ?></th>
		<th><?php echo __('PrincipioAtivo'); ?></th>
		<th><?php echo __('Registro'); ?></th>
		<th><?php echo __('Corredor'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Fabricante'); ?></th>
		<th><?php echo __('Composicao'); ?></th>
		<th><?php echo __('Unidade'); ?></th>
		<th><?php echo __('Dosagem'); ?></th>
		<th><?php echo __('Estoque'); ?></th>
		<th><?php echo __('Estoque Minimo'); ?></th>
		<th><?php echo __('Estoque Desejado'); ?></th>
		<th><?php echo __('Reserva'); ?></th>
		<th><?php echo __('Disponivel'); ?></th>
		<th><?php echo __('Periodocriticovalidade'); ?></th>
		<th><?php echo __('Nivel'); ?></th>
		<th><?php echo __('Tags'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Preco Custo'); ?></th>
		<th><?php echo __('Preco Venda'); ?></th>
		<th><?php echo __('Ativo'); ?></th>
		<th><?php echo __('Bloqueado'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($origem['Produto'] as $produto): ?>
		<tr>
			<td><?php echo $produto['id']; ?></td>
			<td><?php echo $produto['origem_id']; ?></td>
			<td><?php echo $produto['codigo']; ?></td>
			<td><?php echo $produto['codigoEan']; ?></td>
			<td><?php echo $produto['nome']; ?></td>
			<td><?php echo $produto['nomeComercial']; ?></td>
			<td><?php echo $produto['principioAtivo']; ?></td>
			<td><?php echo $produto['registro']; ?></td>
			<td><?php echo $produto['corredor']; ?></td>
			<td><?php echo $produto['descricao']; ?></td>
			<td><?php echo $produto['fabricante']; ?></td>
			<td><?php echo $produto['composicao']; ?></td>
			<td><?php echo $produto['unidade']; ?></td>
			<td><?php echo $produto['dosagem']; ?></td>
			<td><?php echo $produto['estoque']; ?></td>
			<td><?php echo $produto['estoque_minimo']; ?></td>
			<td><?php echo $produto['estoque_desejado']; ?></td>
			<td><?php echo $produto['reserva']; ?></td>
			<td><?php echo $produto['disponivel']; ?></td>
			<td><?php echo $produto['periodocriticovalidade']; ?></td>
			<td><?php echo $produto['nivel']; ?></td>
			<td><?php echo $produto['tags']; ?></td>
			<td><?php echo $produto['created']; ?></td>
			<td><?php echo $produto['modified']; ?></td>
			<td><?php echo $produto['preco_custo']; ?></td>
			<td><?php echo $produto['preco_venda']; ?></td>
			<td><?php echo $produto['ativo']; ?></td>
			<td><?php echo $produto['bloqueado']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'produtos', 'action' => 'view', $produto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'produtos', 'action' => 'edit', $produto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'produtos', 'action' => 'delete', $produto['id']), null, __('Are you sure you want to delete # %s?', $produto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
