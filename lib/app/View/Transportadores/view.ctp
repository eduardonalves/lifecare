<div class="transportadores view">
<h2><?php echo __('Transportadore'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transportadore['Transportadore']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transportadore'), array('action' => 'edit', $transportadore['Transportadore']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transportadore'), array('action' => 'delete', $transportadore['Transportadore']['id']), null, __('Are you sure you want to delete # %s?', $transportadore['Transportadore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transportadores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transportadore'), array('action' => 'add')); ?> </li>
	</ul>
</div>
