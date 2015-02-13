<div class="contatos view">
<h2><?php echo __('Contato'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contato['Parceirodenegocio']['id'], array('controller' => 'parceirodenegocios', 'action' => 'view', $contato['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone1'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['telefone1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone2'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['telefone2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telfefone3'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['telfefone3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RedesSociais1'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['redesSociais1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RedesSociais2'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['redesSociais2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RedesSociais3'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['redesSociais3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RedesSociais4'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['redesSociais4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RedesSociais5'); ?></dt>
		<dd>
			<?php echo h($contato['Contato']['redesSociais5']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contato'), array('action' => 'edit', $contato['Contato']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contato'), array('action' => 'delete', $contato['Contato']['id']), null, __('Are you sure you want to delete # %s?', $contato['Contato']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contatos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contato'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
