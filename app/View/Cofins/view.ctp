<div class="cofins view">
<h2><?php echo __('Cofin'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cofin['Cofin']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cofin['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $cofin['Produto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Situacaotribcofin'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cofin['Situacaotribcofin']['id'], array('controller' => 'situacaotribcofins', 'action' => 'view', $cofin['Situacaotribcofin']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipodecalculo'); ?></dt>
		<dd>
			<?php echo h($cofin['Cofin']['tipodecalculo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valorunitcofins'); ?></dt>
		<dd>
			<?php echo h($cofin['Cofin']['valorunitcofins']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aliq Cofins'); ?></dt>
		<dd>
			<?php echo h($cofin['Cofin']['aliq_cofins']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aliq Cofinsst'); ?></dt>
		<dd>
			<?php echo h($cofin['Cofin']['aliq_cofinsst']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cofin'), array('action' => 'edit', $cofin['Cofin']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cofin'), array('action' => 'delete', $cofin['Cofin']['id']), null, __('Are you sure you want to delete # %s?', $cofin['Cofin']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cofins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cofin'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribcofins'), array('controller' => 'situacaotribcofins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribcofin'), array('controller' => 'situacaotribcofins', 'action' => 'add')); ?> </li>
	</ul>
</div>
