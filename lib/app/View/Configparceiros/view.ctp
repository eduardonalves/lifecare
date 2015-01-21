<div class="configparceiros view">
<h2><?php echo __('Configparceiro'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($configparceiro['Configparceiro']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($configparceiro['Configparceiro']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cnpj'); ?></dt>
		<dd>
			<?php echo h($configparceiro['Configparceiro']['cnpj']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Endereco'); ?></dt>
		<dd>
			<?php echo h($configparceiro['Configparceiro']['endereco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($configparceiro['Configparceiro']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($configparceiro['User']['id'], array('controller' => 'users', 'action' => 'view', $configparceiro['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Configparceiro'), array('action' => 'edit', $configparceiro['Configparceiro']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Configparceiro'), array('action' => 'delete', $configparceiro['Configparceiro']['id']), null, __('Are you sure you want to delete # %s?', $configparceiro['Configparceiro']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Configparceiros'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configparceiro'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
