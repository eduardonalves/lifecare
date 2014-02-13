<div class="itenstransps view">
<h2><?php echo __('Itenstransp'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($itenstransp['Itenstransp']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('QVol'); ?></dt>
		<dd>
			<?php echo h($itenstransp['Itenstransp']['qVol']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mod Frete'); ?></dt>
		<dd>
			<?php echo h($itenstransp['Itenstransp']['mod_frete']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Peso Liq'); ?></dt>
		<dd>
			<?php echo h($itenstransp['Itenstransp']['peso_liq']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Peso Bruto'); ?></dt>
		<dd>
			<?php echo h($itenstransp['Itenstransp']['peso_bruto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parceirodenegocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($itenstransp['Parceirodenegocio']['id'], array('controller' => 'parceirodenegocios', 'action' => 'view', $itenstransp['Parceirodenegocio']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Itenstransp'), array('action' => 'edit', $itenstransp['Itenstransp']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Itenstransp'), array('action' => 'delete', $itenstransp['Itenstransp']['id']), null, __('Are you sure you want to delete # %s?', $itenstransp['Itenstransp']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Itenstransps'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Itenstransp'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
	</ul>
</div>
