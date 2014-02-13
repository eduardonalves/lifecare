<div class="fornecedores view">
<h2><?php echo __('Fornecedore'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($fornecedore['Fornecedore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($fornecedore['Fornecedore']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($fornecedore['Fornecedore']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($fornecedore['Fornecedore']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fornecedore'), array('action' => 'edit', $fornecedore['Fornecedore']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fornecedore'), array('action' => 'delete', $fornecedore['Fornecedore']['id']), null, __('Are you sure you want to delete # %s?', $fornecedore['Fornecedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fornecedores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fornecedore'), array('action' => 'add')); ?> </li>
	</ul>
</div>
