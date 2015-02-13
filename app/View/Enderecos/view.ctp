<div class="enderecos view">
<h2><?php echo __('Endereco'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($endereco['Parceirodenegocio']['id'], array('controller' => 'parceirodenegocios', 'action' => 'view', $endereco['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logradouro'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['logradouro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Complemento'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['complemento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bairro'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['bairro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['cidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uf'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['uf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Altitude'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['altitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ponto Referencia'); ?></dt>
		<dd>
			<?php echo h($endereco['Endereco']['ponto_referencia']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Endereco'), array('action' => 'edit', $endereco['Endereco']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Endereco'), array('action' => 'delete', $endereco['Endereco']['id']), null, __('Are you sure you want to delete # %s?', $endereco['Endereco']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Enderecos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Endereco'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
