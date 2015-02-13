<div class="configcobrancas view">
<h2><?php echo __('Configcobranca'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($configcobranca['Configcobranca']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($configcobranca['User']['id'], array('controller' => 'users', 'action' => 'view', $configcobranca['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Inicio'); ?></dt>
		<dd>
			<?php echo h($configcobranca['Configcobranca']['data_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Fim'); ?></dt>
		<dd>
			<?php echo h($configcobranca['Configcobranca']['data_fim']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Configcobranca'), array('action' => 'edit', $configcobranca['Configcobranca']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Configcobranca'), array('action' => 'delete', $configcobranca['Configcobranca']['id']), null, __('Are you sure you want to delete # %s?', $configcobranca['Configcobranca']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Configcobrancas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configcobranca'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
