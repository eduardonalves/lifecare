<div class="posicaoestoquesLotes view">
<h2><?php echo __('Posicaoestoques Lote'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($posicaoestoquesLote['PosicaoestoquesLote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lote'); ?></dt>
		<dd>
			<?php echo $this->Html->link($posicaoestoquesLote['Lote']['id'], array('controller' => 'lotes', 'action' => 'view', $posicaoestoquesLote['Lote']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Posicaoestoque'); ?></dt>
		<dd>
			<?php echo $this->Html->link($posicaoestoquesLote['Posicaoestoque']['id'], array('controller' => 'posicaoestoques', 'action' => 'view', $posicaoestoquesLote['Posicaoestoque']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qtde'); ?></dt>
		<dd>
			<?php echo h($posicaoestoquesLote['PosicaoestoquesLote']['qtde']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Posicaoestoques Lote'), array('action' => 'edit', $posicaoestoquesLote['PosicaoestoquesLote']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Posicaoestoques Lote'), array('action' => 'delete', $posicaoestoquesLote['PosicaoestoquesLote']['id']), null, __('Are you sure you want to delete # %s?', $posicaoestoquesLote['PosicaoestoquesLote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques Lotes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posicaoestoques Lote'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lotes'), array('controller' => 'lotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lote'), array('controller' => 'lotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posicaoestoques'), array('controller' => 'posicaoestoques', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posicaoestoque'), array('controller' => 'posicaoestoques', 'action' => 'add')); ?> </li>
	</ul>
</div>
