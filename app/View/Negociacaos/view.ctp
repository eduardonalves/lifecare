<div class="negociacaos view">
<h2><?php echo __('Negociacao'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($negociacao['Negociacao']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($negociacao['Negociacao']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obs'); ?></dt>
		<dd>
			<?php echo h($negociacao['Negociacao']['obs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($negociacao['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $negociacao['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cobranca'); ?></dt>
		<dd>
			<?php echo $this->Html->link($negociacao['Cobranca']['id'], array('controller' => 'cobrancas', 'action' => 'view', $negociacao['Cobranca']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($negociacao['Negociacao']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Negociacao'), array('action' => 'edit', $negociacao['Negociacao']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Negociacao'), array('action' => 'delete', $negociacao['Negociacao']['id']), null, __('Are you sure you want to delete # %s?', $negociacao['Negociacao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Negociacaos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Negociacao'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cobrancas'), array('controller' => 'cobrancas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cobranca'), array('controller' => 'cobrancas', 'action' => 'add')); ?> </li>
	</ul>
</div>
