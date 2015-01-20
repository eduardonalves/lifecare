<div class="loteitens view">
<h2><?php echo __('Loteiten'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($loteiten['Loteiten']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nota'); ?></dt>
		<dd>
			<?php echo $this->Html->link($loteiten['Nota']['id'], array('controller' => 'notas', 'action' => 'view', $loteiten['Nota']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lote'); ?></dt>
		<dd>
			<?php echo $this->Html->link($loteiten['Lote']['id'], array('controller' => 'lotes', 'action' => 'view', $loteiten['Lote']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qtde'); ?></dt>
		<dd>
			<?php echo h($loteiten['Loteiten']['qtde']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Loteiten'), array('action' => 'edit', $loteiten['Loteiten']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Loteiten'), array('action' => 'delete', $loteiten['Loteiten']['id']), null, __('Are you sure you want to delete # %s?', $loteiten['Loteiten']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Loteitens'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loteiten'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lotes'), array('controller' => 'lotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lote'), array('controller' => 'lotes', 'action' => 'add')); ?> </li>
	</ul>
</div>
