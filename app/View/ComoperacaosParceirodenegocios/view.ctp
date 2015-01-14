<div class="comoperacaosParceirodenegocios view">
<h2><?php echo __('Comoperacaos Parceirodenegocio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comoperacaosParceirodenegocio['ComoperacaosParceirodenegocio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comoperacao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comoperacaosParceirodenegocio['Comoperacao']['id'], array('controller' => 'comoperacaos', 'action' => 'view', $comoperacaosParceirodenegocio['Comoperacao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comoperacaosParceirodenegocio['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $comoperacaosParceirodenegocio['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comoperacaos Parceirodenegocio'), array('action' => 'edit', $comoperacaosParceirodenegocio['ComoperacaosParceirodenegocio']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comoperacaos Parceirodenegocio'), array('action' => 'delete', $comoperacaosParceirodenegocio['ComoperacaosParceirodenegocio']['id']), null, __('Are you sure you want to delete # %s?', $comoperacaosParceirodenegocio['ComoperacaosParceirodenegocio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comoperacaos Parceirodenegocios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacaos Parceirodenegocio'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
