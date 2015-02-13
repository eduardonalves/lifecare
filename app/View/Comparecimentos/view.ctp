<div class="comparecimentos view">
<h2><?php echo __('Comparecimento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comparecimento['Comparecimento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Funcionario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comparecimento['Funcionario']['id'], array('controller' => 'funcionarios', 'action' => 'view', $comparecimento['Funcionario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($comparecimento['Comparecimento']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($comparecimento['Comparecimento']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comparecimento'), array('action' => 'edit', $comparecimento['Comparecimento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comparecimento'), array('action' => 'delete', $comparecimento['Comparecimento']['id']), null, __('Are you sure you want to delete # %s?', $comparecimento['Comparecimento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comparecimentos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comparecimento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Funcionarios'), array('controller' => 'funcionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Funcionario'), array('controller' => 'funcionarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
