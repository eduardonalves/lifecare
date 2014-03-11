<div class="configcontas view">
<h2><?php echo __('Configconta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Identificacao'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['identificacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Emissao'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['data_emissao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Quitacao'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['data_quitacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($configconta['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $configconta['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($configconta['User']['id'], array('controller' => 'users', 'action' => 'view', $configconta['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Configconta'), array('action' => 'edit', $configconta['Configconta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Configconta'), array('action' => 'delete', $configconta['Configconta']['id']), null, __('Are you sure you want to delete # %s?', $configconta['Configconta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Configcontas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configconta'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
