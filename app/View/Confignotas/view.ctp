<div class="confignotas view">
<h2><?php echo __('Confignota'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($confignota['User']['id'], array('controller' => 'users', 'action' => 'view', $confignota['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['parceirodenegocio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nota Fiscal'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['nota_fiscal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Total'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['valor_total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vb Icms'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['vb_icms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Icms'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['valor_icms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vb Cst'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['vb_cst']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor St'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['valor_st']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Frete'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['valor_frete']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Seguro'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['valor_seguro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Desconto'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['valor_desconto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Ipi'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['valor_ipi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Pis'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['valor_pis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('V Cofins'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['v_cofins']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Outros'); ?></dt>
		<dd>
			<?php echo h($confignota['Confignota']['valor_outros']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Confignota'), array('action' => 'edit', $confignota['Confignota']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Confignota'), array('action' => 'delete', $confignota['Confignota']['id']), null, __('Are you sure you want to delete # %s?', $confignota['Confignota']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Confignotas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Confignota'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
