<div class="configparcelas view">
<h2><?php echo __('Configparcela'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($configparcela['Configparcela']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($configparcela['User']['id'], array('controller' => 'users', 'action' => 'view', $configparcela['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parcela'); ?></dt>
		<dd>
			<?php echo h($configparcela['Configparcela']['parcela']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Identificacao'); ?></dt>
		<dd>
			<?php echo h($configparcela['Configparcela']['identificacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Vencimento'); ?></dt>
		<dd>
			<?php echo h($configparcela['Configparcela']['data_vencimento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($configparcela['Configparcela']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Periodocritico'); ?></dt>
		<dd>
			<?php echo h($configparcela['Configparcela']['periodocritico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desconto'); ?></dt>
		<dd>
			<?php echo h($configparcela['Configparcela']['desconto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Banco'); ?></dt>
		<dd>
			<?php echo h($configparcela['Configparcela']['banco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agencia'); ?></dt>
		<dd>
			<?php echo h($configparcela['Configparcela']['agencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conta'); ?></dt>
		<dd>
			<?php echo h($configparcela['Configparcela']['conta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($configparcela['Configparcela']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Configparcela'), array('action' => 'edit', $configparcela['Configparcela']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Configparcela'), array('action' => 'delete', $configparcela['Configparcela']['id']), null, __('Are you sure you want to delete # %s?', $configparcela['Configparcela']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Configparcelas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configparcela'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
