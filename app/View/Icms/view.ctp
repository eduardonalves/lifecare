<div class="icms view">
<h2><?php echo __('Icm'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($icm['Icm']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($icm['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $icm['Produto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modalidadebc'); ?></dt>
		<dd>
			<?php echo $this->Html->link($icm['Modalidadebc']['id'], array('controller' => 'modalidadebcs', 'action' => 'view', $icm['Modalidadebc']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modalidadebcst'); ?></dt>
		<dd>
			<?php echo $this->Html->link($icm['Modalidadebcst']['id'], array('controller' => 'modalidadebcsts', 'action' => 'view', $icm['Modalidadebcst']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Situacaotribicm'); ?></dt>
		<dd>
			<?php echo $this->Html->link($icm['Situacaotribicm']['id'], array('controller' => 'situacaotribicms', 'action' => 'view', $icm['Situacaotribicm']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aliq Icms'); ?></dt>
		<dd>
			<?php echo h($icm['Icm']['aliq_icms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Margemvaloradic'); ?></dt>
		<dd>
			<?php echo h($icm['Icm']['margemvaloradic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reducaobasecalcst'); ?></dt>
		<dd>
			<?php echo h($icm['Icm']['reducaobasecalcst']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precounitpautast'); ?></dt>
		<dd>
			<?php echo h($icm['Icm']['precounitpautast']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alq Icmsst'); ?></dt>
		<dd>
			<?php echo h($icm['Icm']['alq_icmsst']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Motivodesoneracao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($icm['Motivodesoneracao']['id'], array('controller' => 'motivodesoneracaos', 'action' => 'view', $icm['Motivodesoneracao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Percentualbcoppropria'); ?></dt>
		<dd>
			<?php echo h($icm['Icm']['percentualbcoppropria']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ufpgtoicmsst'); ?></dt>
		<dd>
			<?php echo h($icm['Icm']['ufpgtoicmsst']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Icm'), array('action' => 'edit', $icm['Icm']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Icm'), array('action' => 'delete', $icm['Icm']['id']), null, __('Are you sure you want to delete # %s?', $icm['Icm']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Icms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Icm'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modalidadebcs'), array('controller' => 'modalidadebcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modalidadebc'), array('controller' => 'modalidadebcs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modalidadebcsts'), array('controller' => 'modalidadebcsts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modalidadebcst'), array('controller' => 'modalidadebcsts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribicms'), array('controller' => 'situacaotribicms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribicm'), array('controller' => 'situacaotribicms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Motivodesoneracaos'), array('controller' => 'motivodesoneracaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motivodesoneracao'), array('controller' => 'motivodesoneracaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
