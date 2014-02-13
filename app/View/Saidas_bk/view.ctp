<div class="saidas view">
<h2><?php echo __('Saida'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($saida['Saida']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $saida['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($saida['Parceirodenegocio']['id'], array('controller' => 'parceirodenegocios', 'action' => 'view', $saida['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Saida'), array('action' => 'edit', $saida['Saida']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Saida'), array('action' => 'delete', $saida['Saida']['id']), null, __('Are you sure you want to delete # %s?', $saida['Saida']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Saidas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Saida'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
