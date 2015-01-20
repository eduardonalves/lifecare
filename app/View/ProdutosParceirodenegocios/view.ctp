<div class="produtosParceirodenegocios view">
<h2><?php echo __('Produtos Parceirodenegocio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($produtosParceirodenegocio['ProdutosParceirodenegocio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($produtosParceirodenegocio['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $produtosParceirodenegocio['Produto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($produtosParceirodenegocio['Parceirodenegocio']['nome'], array('controller' => 'parceirodenegocios', 'action' => 'view', $produtosParceirodenegocio['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Produtos Parceirodenegocio'), array('action' => 'edit', $produtosParceirodenegocio['ProdutosParceirodenegocio']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Produtos Parceirodenegocio'), array('action' => 'delete', $produtosParceirodenegocio['ProdutosParceirodenegocio']['id']), null, __('Are you sure you want to delete # %s?', $produtosParceirodenegocio['ProdutosParceirodenegocio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos Parceirodenegocios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produtos Parceirodenegocio'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
