<div class="ipis view">
<h2><?php echo __('Ipi'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ipi['Ipi']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ipi['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $ipi['Produto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Situacaotribipi'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ipi['Situacaotribipi']['id'], array('controller' => 'situacaotribipis', 'action' => 'view', $ipi['Situacaotribipi']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classe Enquadramento'); ?></dt>
		<dd>
			<?php echo h($ipi['Ipi']['classe_enquadramento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cnpj Produtor'); ?></dt>
		<dd>
			<?php echo h($ipi['Ipi']['cnpj_produtor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo Selo'); ?></dt>
		<dd>
			<?php echo h($ipi['Ipi']['codigo_selo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qtd Selo'); ?></dt>
		<dd>
			<?php echo h($ipi['Ipi']['qtd_selo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipodecalculo'); ?></dt>
		<dd>
			<?php echo h($ipi['Ipi']['tipodecalculo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ipi'), array('action' => 'edit', $ipi['Ipi']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ipi'), array('action' => 'delete', $ipi['Ipi']['id']), null, __('Are you sure you want to delete # %s?', $ipi['Ipi']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ipis'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ipi'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribipis'), array('controller' => 'situacaotribipis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribipi'), array('controller' => 'situacaotribipis', 'action' => 'add')); ?> </li>
	</ul>
</div>
