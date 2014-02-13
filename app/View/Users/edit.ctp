<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('funcionario_id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('acesso');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Funcionarios'), array('controller' => 'funcionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Funcionario'), array('controller' => 'funcionarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configlotes'), array('controller' => 'configlotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configlote'), array('controller' => 'configlotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Confignotas'), array('controller' => 'confignotas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Confignota'), array('controller' => 'confignotas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configprodutos'), array('controller' => 'configprodutos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configproduto'), array('controller' => 'configprodutos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
