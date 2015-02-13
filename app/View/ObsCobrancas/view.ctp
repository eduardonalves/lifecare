<div class="obsCobrancas view">
<h2><?php echo __('Obs Cobranca'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($obsCobranca['ObsCobranca']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parcela'); ?></dt>
		<dd>
			<?php echo $this->Html->link($obsCobranca['Parcela']['id'], array('controller' => 'parcelas', 'action' => 'view', $obsCobranca['Parcela']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($obsCobranca['ObsCobranca']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obs'); ?></dt>
		<dd>
			<?php echo h($obsCobranca['ObsCobranca']['obs']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Obs Cobranca'), array('action' => 'edit', $obsCobranca['ObsCobranca']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Obs Cobranca'), array('action' => 'delete', $obsCobranca['ObsCobranca']['id']), null, __('Are you sure you want to delete # %s?', $obsCobranca['ObsCobranca']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Obs Cobrancas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obs Cobranca'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
	</ul>
</div>
