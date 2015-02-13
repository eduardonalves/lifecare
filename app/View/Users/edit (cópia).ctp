<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('funcionario_id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('role_id');
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
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configcobrancas'), array('controller' => 'configcobrancas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configcobranca'), array('controller' => 'configcobrancas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configcontas'), array('controller' => 'configcontas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configconta'), array('controller' => 'configcontas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configlotes'), array('controller' => 'configlotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configlote'), array('controller' => 'configlotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Confignotas'), array('controller' => 'confignotas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Confignota'), array('controller' => 'confignotas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configparceiros'), array('controller' => 'configparceiros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configparceiro'), array('controller' => 'configparceiros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configparcelas'), array('controller' => 'configparcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configparcela'), array('controller' => 'configparcelas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Configprodutos'), array('controller' => 'configprodutos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configproduto'), array('controller' => 'configprodutos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Consultarprodutos'), array('controller' => 'consultarprodutos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Consultarproduto'), array('controller' => 'consultarprodutos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contas'), array('controller' => 'contas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dadoscreditos'), array('controller' => 'dadoscreditos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dadoscredito'), array('controller' => 'dadoscreditos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Negociacaos'), array('controller' => 'negociacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Negociacao'), array('controller' => 'negociacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Obs Cobrancas'), array('controller' => 'obs_cobrancas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obs Cobranca'), array('controller' => 'obs_cobrancas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quicklinks'), array('controller' => 'quicklinks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quicklink'), array('controller' => 'quicklinks', 'action' => 'add')); ?> </li>
	</ul>
</div>
