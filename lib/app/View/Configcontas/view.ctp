<div class="configcontas view">
<h2><?php echo __('Configconta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parcela'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['parcela']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Identificacao'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['identificacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Emissao'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['data_emissao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Vencimento'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['data_vencimento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['parceirodenegocio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Periodocritico'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['periodocritico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($configconta['Configconta']['user_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Configconta'), array('action' => 'edit', $configconta['Configconta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Configconta'), array('action' => 'delete', $configconta['Configconta']['id']), null, __('Are you sure you want to delete # %s?', $configconta['Configconta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Configcontas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configconta'), array('action' => 'add')); ?> </li>
	</ul>
</div>
