<div class="configprodutos view">
<h2><?php echo __('Configproduto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($configproduto['User']['id'], array('controller' => 'users', 'action' => 'view', $configproduto['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fabricante'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['fabricante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Composicao'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['composicao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unidade'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['unidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dosagem'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['dosagem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estoque'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['estoque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estoque Minimo'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['estoque_minimo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estoque Desejado'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['estoque_desejado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nivel'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['nivel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Periodocriticovalidade'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['periodocriticovalidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tags'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['tags']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Preco Custo'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['preco_custo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Preco Venda'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['preco_venda']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['ativo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bloqueado'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['bloqueado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CodigoEan'); ?></dt>
		<dd>
			<?php echo h($configproduto['Configproduto']['codigoEan']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Configproduto'), array('action' => 'edit', $configproduto['Configproduto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Configproduto'), array('action' => 'delete', $configproduto['Configproduto']['id']), null, __('Are you sure you want to delete # %s?', $configproduto['Configproduto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Configprodutos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Configproduto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
