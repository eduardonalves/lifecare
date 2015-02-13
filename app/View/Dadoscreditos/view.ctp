<div class="dadoscreditos view">
<h2><?php echo __('Dadoscredito'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dadoscredito['Dadoscredito']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dadoscredito['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $dadoscredito['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Limite'); ?></dt>
		<dd>
			<?php echo h($dadoscredito['Dadoscredito']['limite']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Limite Usado'); ?></dt>
		<dd>
			<?php echo h($dadoscredito['Dadoscredito']['limite_usado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Liberacao'); ?></dt>
		<dd>
			<?php echo h($dadoscredito['Dadoscredito']['data_liberacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Validade Limite'); ?></dt>
		<dd>
			<?php echo h($dadoscredito['Dadoscredito']['validade_limite']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($dadoscredito['Dadoscredito']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bloqueado'); ?></dt>
		<dd>
			<?php echo h($dadoscredito['Dadoscredito']['bloqueado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dadoscredito['User']['id'], array('controller' => 'users', 'action' => 'view', $dadoscredito['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dadoscredito'), array('action' => 'edit', $dadoscredito['Dadoscredito']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dadoscredito'), array('action' => 'delete', $dadoscredito['Dadoscredito']['id']), null, __('Are you sure you want to delete # %s?', $dadoscredito['Dadoscredito']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dadoscreditos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dadoscredito'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
