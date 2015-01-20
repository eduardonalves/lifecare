<div class="tipodecontas view">
<h2><?php echo __('Tipodeconta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipodeconta['Tipodeconta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($tipodeconta['Tipodeconta']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipodeconta'), array('action' => 'edit', $tipodeconta['Tipodeconta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipodeconta'), array('action' => 'delete', $tipodeconta['Tipodeconta']['id']), null, __('Are you sure you want to delete # %s?', $tipodeconta['Tipodeconta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipodecontas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipodeconta'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contas'), array('controller' => 'contas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Contas'); ?></h3>
	<?php if (!empty($tipodeconta['Conta'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Centrocusto Id'); ?></th>
		<th><?php echo __('Tipodeconta Id'); ?></th>
		<th><?php echo __('Identificacao'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Data Emissao'); ?></th>
		<th><?php echo __('Data Quitacao'); ?></th>
		<th><?php echo __('Imagem'); ?></th>
		<th><?php echo __('Parcelas Atraso'); ?></th>
		<th><?php echo __('Parcelas Aberto'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Canceladopor'); ?></th>
		<th><?php echo __('Data Cancelamento'); ?></th>
		<th><?php echo __('Parceirodenegocio Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipodeconta['Conta'] as $conta): ?>
		<tr>
			<td><?php echo $conta['id']; ?></td>
			<td><?php echo $conta['user_id']; ?></td>
			<td><?php echo $conta['centrocusto_id']; ?></td>
			<td><?php echo $conta['tipodeconta_id']; ?></td>
			<td><?php echo $conta['identificacao']; ?></td>
			<td><?php echo $conta['descricao']; ?></td>
			<td><?php echo $conta['valor']; ?></td>
			<td><?php echo $conta['data_emissao']; ?></td>
			<td><?php echo $conta['data_quitacao']; ?></td>
			<td><?php echo $conta['imagem']; ?></td>
			<td><?php echo $conta['parcelas_atraso']; ?></td>
			<td><?php echo $conta['parcelas_aberto']; ?></td>
			<td><?php echo $conta['tipo']; ?></td>
			<td><?php echo $conta['status']; ?></td>
			<td><?php echo $conta['canceladopor']; ?></td>
			<td><?php echo $conta['data_cancelamento']; ?></td>
			<td><?php echo $conta['parceirodenegocio_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'contas', 'action' => 'view', $conta['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'contas', 'action' => 'edit', $conta['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contas', 'action' => 'delete', $conta['id']), null, __('Are you sure you want to delete # %s?', $conta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
