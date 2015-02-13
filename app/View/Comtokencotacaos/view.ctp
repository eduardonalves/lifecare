<div class="comtokencotacaos view">
<h2><?php echo __('Comtokencotacao'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comtokencotacao['Comtokencotacao']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comoperacao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comtokencotacao['Comoperacao']['id'], array('controller' => 'comoperacaos', 'action' => 'view', $comtokencotacao['Comoperacao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comtokencotacao['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $comtokencotacao['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comresposta'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comtokencotacao['Comresposta']['id'], array('controller' => 'comrespostas', 'action' => 'view', $comtokencotacao['Comresposta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Respondido'); ?></dt>
		<dd>
			<?php echo h($comtokencotacao['Comtokencotacao']['respondido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigoseguranca'); ?></dt>
		<dd>
			<?php echo h($comtokencotacao['Comtokencotacao']['codigoseguranca']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comtokencotacao'), array('action' => 'edit', $comtokencotacao['Comtokencotacao']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comtokencotacao'), array('action' => 'delete', $comtokencotacao['Comtokencotacao']['id']), null, __('Are you sure you want to delete # %s?', $comtokencotacao['Comtokencotacao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comtokencotacaos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comtokencotacao'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comrespostas'), array('controller' => 'comrespostas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comresposta'), array('controller' => 'comrespostas', 'action' => 'add')); ?> </li>
	</ul>
</div>
