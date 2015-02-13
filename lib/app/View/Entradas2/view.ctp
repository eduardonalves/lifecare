<div class="entradas view">
<h2><?php echo __('Entrada'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entrada['Entrada']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entrada['Parceirodenegocio']['id'], array('controller' => 'parceirodenegocios', 'action' => 'view', $entrada['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
	<?php
		echo "<pre>";
			print_r($entrada);
		echo "</pre>";
	?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entrada'), array('action' => 'edit', $entrada['Entrada']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entrada'), array('action' => 'delete', $entrada['Entrada']['id']), null, __('Are you sure you want to delete # %s?', $entrada['Entrada']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entradas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entrada'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
