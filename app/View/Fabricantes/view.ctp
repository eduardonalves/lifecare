<div class="fabricantes view">
<h2><?php echo __('Fabricante'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($fabricante['Fabricante']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($fabricante['Fabricante']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($fabricante['Fabricante']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($fabricante['Fabricante']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fabricante'), array('action' => 'edit', $fabricante['Fabricante']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fabricante'), array('action' => 'delete', $fabricante['Fabricante']['id']), null, __('Are you sure you want to delete # %s?', $fabricante['Fabricante']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fabricantes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fabricante'), array('action' => 'add')); ?> </li>
	</ul>
</div>
