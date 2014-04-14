<div class="negociacaos view">
<h2><?php echo __('Negociacao'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($negociacao['Negociacao']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($negociacao['Negociacao']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obs'); ?></dt>
		<dd>
			<?php echo h($negociacao['Negociacao']['obs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($negociacao['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $negociacao['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($negociacao['Negociacao']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Negociacao'), array('action' => 'edit', $negociacao['Negociacao']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Negociacao'), array('action' => 'delete', $negociacao['Negociacao']['id']), null, __('Are you sure you want to delete # %s?', $negociacao['Negociacao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Negociacaos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Negociacao'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Parcelas'); ?></h3>
	<?php if (!empty($negociacao['Parcela'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Identificacao Documento'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Data Vencimento'); ?></th>
		<th><?php echo __('Data Pagamento'); ?></th>
		<th><?php echo __('Periodocritico'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Desconto'); ?></th>
		<th><?php echo __('Codigodebarras'); ?></th>
		<th><?php echo __('Parcela'); ?></th>
		<th><?php echo __('Banco'); ?></th>
		<th><?php echo __('Agencia'); ?></th>
		<th><?php echo __('Conta'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th><?php echo __('Comprovante'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Negociacao Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($negociacao['Parcela'] as $parcela): ?>
		<tr>
			<td><?php echo $parcela['id']; ?></td>
			<td><?php echo $parcela['identificacao_documento']; ?></td>
			<td><?php echo $parcela['descricao']; ?></td>
			<td><?php echo $parcela['data_vencimento']; ?></td>
			<td><?php echo $parcela['data_pagamento']; ?></td>
			<td><?php echo $parcela['periodocritico']; ?></td>
			<td><?php echo $parcela['valor']; ?></td>
			<td><?php echo $parcela['desconto']; ?></td>
			<td><?php echo $parcela['codigodebarras']; ?></td>
			<td><?php echo $parcela['parcela']; ?></td>
			<td><?php echo $parcela['banco']; ?></td>
			<td><?php echo $parcela['agencia']; ?></td>
			<td><?php echo $parcela['conta']; ?></td>
			<td><?php echo $parcela['obs']; ?></td>
			<td><?php echo $parcela['comprovante']; ?></td>
			<td><?php echo $parcela['status']; ?></td>
			<td><?php echo $parcela['user_id']; ?></td>
			<td><?php echo $parcela['negociacao_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'parcelas', 'action' => 'view', $parcela['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'parcelas', 'action' => 'edit', $parcela['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'parcelas', 'action' => 'delete', $parcela['id']), null, __('Are you sure you want to delete # %s?', $parcela['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
