<div class="produtosTributos view">
<h2><?php echo __('Produtos Tributo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($produtosTributo['ProdutosTributo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($produtosTributo['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $produtosTributo['Produto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tributo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($produtosTributo['Tributo']['id'], array('controller' => 'tributos', 'action' => 'view', $produtosTributo['Tributo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Produtos Tributo'), array('action' => 'edit', $produtosTributo['ProdutosTributo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Produtos Tributo'), array('action' => 'delete', $produtosTributo['ProdutosTributo']['id']), null, __('Are you sure you want to delete # %s?', $produtosTributo['ProdutosTributo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos Tributos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produtos Tributo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tributos'), array('controller' => 'tributos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tributo'), array('controller' => 'tributos', 'action' => 'add')); ?> </li>
	</ul>
</div>
