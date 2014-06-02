<div class="atualizacaos view">
<h2><?php echo __('Atualizacao'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($atualizacao['Atualizacao']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($atualizacao['Atualizacao']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($atualizacao['Atualizacao']['data']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Atualizacao'), array('action' => 'edit', $atualizacao['Atualizacao']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Atualizacao'), array('action' => 'delete', $atualizacao['Atualizacao']['id']), null, __('Are you sure you want to delete # %s?', $atualizacao['Atualizacao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Atualizacaos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Atualizacao'), array('action' => 'add')); ?> </li>
	</ul>
</div>
