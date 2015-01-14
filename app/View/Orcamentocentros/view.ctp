<div class="orcamentocentros view">
<h2><?php echo __('Orcamentocentro'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orcamentocentro['Orcamentocentro']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Limite'); ?></dt>
		<dd>
			<?php echo h($orcamentocentro['Orcamentocentro']['limite']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Limite Usado'); ?></dt>
		<dd>
			<?php echo h($orcamentocentro['Orcamentocentro']['limite_usado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Periodo Inicial'); ?></dt>
		<dd>
			<?php echo h($orcamentocentro['Orcamentocentro']['periodo_inicial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Periodo Final'); ?></dt>
		<dd>
			<?php echo h($orcamentocentro['Orcamentocentro']['periodo_final']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Centrocusto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orcamentocentro['Centrocusto']['id'], array('controller' => 'centrocustos', 'action' => 'view', $orcamentocentro['Centrocusto']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Orcamentocentro'), array('action' => 'edit', $orcamentocentro['Orcamentocentro']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Orcamentocentro'), array('action' => 'delete', $orcamentocentro['Orcamentocentro']['id']), null, __('Are you sure you want to delete # %s?', $orcamentocentro['Orcamentocentro']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Orcamentocentros'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orcamentocentro'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Centrocustos'), array('controller' => 'centrocustos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Centrocusto'), array('controller' => 'centrocustos', 'action' => 'add')); ?> </li>
	</ul>
</div>
