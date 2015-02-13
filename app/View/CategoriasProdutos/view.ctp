<div class="categoriasProdutos view">
<h2><?php echo __('Categorias Produto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoriasProduto['CategoriasProduto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriasProduto['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $categoriasProduto['Produto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriasProduto['Categoria']['id'], array('controller' => 'categorias', 'action' => 'view', $categoriasProduto['Categoria']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categorias Produto'), array('action' => 'edit', $categoriasProduto['CategoriasProduto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categorias Produto'), array('action' => 'delete', $categoriasProduto['CategoriasProduto']['id']), null, __('Are you sure you want to delete # %s?', $categoriasProduto['CategoriasProduto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias Produtos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categorias Produto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoria'), array('controller' => 'categorias', 'action' => 'add')); ?> </li>
	</ul>
</div>
