<div class="pis view">
<h2><?php echo __('Pi'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pi['Pi']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Situacaotribpi'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pi['Situacaotribpi']['id'], array('controller' => 'situacaotribpis', 'action' => 'view', $pi['Situacaotribpi']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alq Pis'); ?></dt>
		<dd>
			<?php echo h($pi['Pi']['alq_pis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipodecalculo'); ?></dt>
		<dd>
			<?php echo h($pi['Pi']['tipodecalculo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pi['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $pi['Produto']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pi'), array('action' => 'edit', $pi['Pi']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pi'), array('action' => 'delete', $pi['Pi']['id']), null, __('Are you sure you want to delete # %s?', $pi['Pi']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pis'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pi'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribpis'), array('controller' => 'situacaotribpis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribpi'), array('controller' => 'situacaotribpis', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
	</ul>
</div>
