<div class="comitensrepostas view">
<h2><?php echo __('Comitensreposta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comitensreposta['Comitensreposta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comresposta'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comitensreposta['Comresposta']['id'], array('controller' => 'comrespostas', 'action' => 'view', $comitensreposta['Comresposta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comitensreposta['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $comitensreposta['Produto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Unit'); ?></dt>
		<dd>
			<?php echo h($comitensreposta['Comitensreposta']['valor_unit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qtde'); ?></dt>
		<dd>
			<?php echo h($comitensreposta['Comitensreposta']['qtde']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Total'); ?></dt>
		<dd>
			<?php echo h($comitensreposta['Comitensreposta']['valor_total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obs'); ?></dt>
		<dd>
			<?php echo h($comitensreposta['Comitensreposta']['obs']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comitensreposta'), array('action' => 'edit', $comitensreposta['Comitensreposta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comitensreposta'), array('action' => 'delete', $comitensreposta['Comitensreposta']['id']), null, __('Are you sure you want to delete # %s?', $comitensreposta['Comitensreposta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comitensrepostas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comitensreposta'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comrespostas'), array('controller' => 'comrespostas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comresposta'), array('controller' => 'comrespostas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
