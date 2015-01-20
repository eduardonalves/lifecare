<div class="pagamentos view">
<h2><?php echo __('Pagamento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pagamento['Pagamento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Pagamento'); ?></dt>
		<dd>
			<?php echo h($pagamento['Pagamento']['tipo_pagamento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Parcela'); ?></dt>
		<dd>
			<?php echo h($pagamento['Pagamento']['numero_parcela']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conta'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pagamento['Conta']['id'], array('controller' => 'contas', 'action' => 'view', $pagamento['Conta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parcela'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pagamento['Parcela']['id'], array('controller' => 'parcelas', 'action' => 'view', $pagamento['Parcela']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Forma Pagamento'); ?></dt>
		<dd>
			<?php echo h($pagamento['Pagamento']['forma_pagamento']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pagamento'), array('action' => 'edit', $pagamento['Pagamento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pagamento'), array('action' => 'delete', $pagamento['Pagamento']['id']), null, __('Are you sure you want to delete # %s?', $pagamento['Pagamento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagamentos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagamento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contas'), array('controller' => 'contas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
	</ul>
</div>
