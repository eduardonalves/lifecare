<div class="configlotes view">
<h2><?php echo __('Configlote'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($configlote['Configlote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($configlote['User']['id'], array('controller' => 'users', 'action' => 'view', $configlote['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Lote'); ?></dt>
		<dd>
			<?php echo h($configlote['Configlote']['numero_lote']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Fabricacao'); ?></dt>
		<dd>
			<?php echo h($configlote['Configlote']['data_fabricacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Validade'); ?></dt>
		<dd>
			<?php echo h($configlote['Configlote']['data_validade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fabricante'); ?></dt>
		<dd>
			<?php echo h($configlote['Configlote']['fabricante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estoque'); ?></dt>
		<dd>
			<?php echo h($configlote['Configlote']['estoque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($configlote['Configlote']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Configlote'), array('action' => 'edit', $configlote['Configlote']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Configlote'), array('action' => 'delete', $configlote['Configlote']['id']), null, __('Are you sure you want to delete # %s?', $configlote['Configlote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Configlotes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configlote'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
