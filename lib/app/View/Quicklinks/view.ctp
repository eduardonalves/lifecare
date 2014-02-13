<div class="quicklinks view">
<h2><?php echo __('Quicklink'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quicklink['Quicklink']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quicklink['User']['id'], array('controller' => 'users', 'action' => 'view', $quicklink['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($quicklink['Quicklink']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($quicklink['Quicklink']['url']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quicklink'), array('action' => 'edit', $quicklink['Quicklink']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Quicklink'), array('action' => 'delete', $quicklink['Quicklink']['id']), null, __('Are you sure you want to delete # %s?', $quicklink['Quicklink']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Quicklinks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quicklink'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
