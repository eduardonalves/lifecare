<div class="comitensdaoperacaos view">
<h2><?php echo __('Comitensdaoperacao'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comitensdaoperacao['Comitensdaoperacao']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comoperacao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comitensdaoperacao['Comoperacao']['id'], array('controller' => 'comoperacaos', 'action' => 'view', $comitensdaoperacao['Comoperacao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comitensdaoperacao['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $comitensdaoperacao['Produto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Unit'); ?></dt>
		<dd>
			<?php echo h($comitensdaoperacao['Comitensdaoperacao']['valor_unit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qtde'); ?></dt>
		<dd>
			<?php echo h($comitensdaoperacao['Comitensdaoperacao']['qtde']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Total'); ?></dt>
		<dd>
			<?php echo h($comitensdaoperacao['Comitensdaoperacao']['valor_total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comitensdaoperacao['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $comitensdaoperacao['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comitensdaoperacao'), array('action' => 'edit', $comitensdaoperacao['Comitensdaoperacao']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comitensdaoperacao'), array('action' => 'delete', $comitensdaoperacao['Comitensdaoperacao']['id']), null, __('Are you sure you want to delete # %s?', $comitensdaoperacao['Comitensdaoperacao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comitensdaoperacaos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comitensdaoperacao'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
