<div class="parcelas view">
<h2><?php echo __('Parcela'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Identificacao Documento'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['identificacao_documento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Vencimento'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['data_vencimento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Pagamento'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['data_pagamento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Periodocritico'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['periodocritico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desconto'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['desconto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigodebarras'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['codigodebarras']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parcela'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['parcela']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Banco'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['banco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agencia'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['agencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conta'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['conta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obs'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['obs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comprovante'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['comprovante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($parcela['Parcela']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($parcela['User']['id'], array('controller' => 'users', 'action' => 'view', $parcela['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Parcela'), array('action' => 'edit', $parcela['Parcela']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Parcela'), array('action' => 'delete', $parcela['Parcela']['id']), null, __('Are you sure you want to delete # %s?', $parcela['Parcela']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagamentos'), array('controller' => 'pagamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagamento'), array('controller' => 'pagamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pagamentos'); ?></h3>
	<?php if (!empty($parcela['Pagamento'])): ?>
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
	<?php foreach ($parcela['Pagamento'] as $pagamento): ?>
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
