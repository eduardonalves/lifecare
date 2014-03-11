<div class="contas view">
<h2><?php echo __('Conta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($conta['Conta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Identificacao'); ?></dt>
		<dd>
			<?php echo h($conta['Conta']['identificacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($conta['Conta']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($conta['Conta']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Emissao'); ?></dt>
		<dd>
			<?php echo h($conta['Conta']['data_emissao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Quitacao'); ?></dt>
		<dd>
			<?php echo h($conta['Conta']['data_quitacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagem'); ?></dt>
		<dd>
			<?php echo h($conta['Conta']['imagem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($conta['Conta']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($conta['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $conta['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Conta'), array('action' => 'edit', $conta['Conta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Conta'), array('action' => 'delete', $conta['Conta']['id']), null, __('Are you sure you want to delete # %s?', $conta['Conta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagamentos'), array('controller' => 'pagamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagamento'), array('controller' => 'pagamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pagamentos'); ?></h3>
	<?php if (!empty($conta['Pagamento'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipo Pagamento'); ?></th>
		<th><?php echo __('Numero Parcela'); ?></th>
		<th><?php echo __('Conta Id'); ?></th>
		<th><?php echo __('Parcela Id'); ?></th>
		<th><?php echo __('Forma Pagamento'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($conta['Pagamento'] as $pagamento): ?>
		<tr>
			<td><?php echo $pagamento['id']; ?></td>
			<td><?php echo $pagamento['tipo_pagamento']; ?></td>
			<td><?php echo $pagamento['numero_parcela']; ?></td>
			<td><?php echo $pagamento['conta_id']; ?></td>
			<td><?php echo $pagamento['parcela_id']; ?></td>
			<td><?php echo $pagamento['forma_pagamento']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pagamentos', 'action' => 'view', $pagamento['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pagamentos', 'action' => 'edit', $pagamento['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pagamentos', 'action' => 'delete', $pagamento['id']), null, __('Are you sure you want to delete # %s?', $pagamento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pagamento'), array('controller' => 'pagamentos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
