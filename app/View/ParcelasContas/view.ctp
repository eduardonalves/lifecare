<div class="parcelasContas view">
<h2><?php echo __('Parcelas Conta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($parcelasConta['ParcelasConta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parcela'); ?></dt>
		<dd>
			<?php echo $this->Html->link($parcelasConta['Parcela']['id'], array('controller' => 'parcelas', 'action' => 'view', $parcelasConta['Parcela']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conta'); ?></dt>
		<dd>
			<?php echo $this->Html->link($parcelasConta['Conta']['id'], array('controller' => 'contas', 'action' => 'view', $parcelasConta['Conta']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Parcelas Conta'), array('action' => 'edit', $parcelasConta['ParcelasConta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Parcelas Conta'), array('action' => 'delete', $parcelasConta['ParcelasConta']['id']), null, __('Are you sure you want to delete # %s?', $parcelasConta['ParcelasConta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas Contas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcelas Conta'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contas'), array('controller' => 'contas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
	</ul>
</div>
