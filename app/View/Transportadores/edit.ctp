<header>

	<img src="/lifecare/img/titulo-cadastrar.png" id="cadastrar-titulo" alt="Cadastrar" title="Cadastrar" />
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	 <h1 class="menuOption62">Editar Transportador</h1>    
</header>

<section>


<header>Dados do Transportador</header>
		
	<section>
		<section>

				<?php echo $this->Form->create('Transportadore', array('action' => 'add')); ?>
				<?php 
					
					echo $this->Form->input('Transportadore.id');

					echo "<section class=\"coluna-esquerda\">";
					echo $this->Form->input('Transportadore.nome', array('class'=>'tamanho-medio', 'label' => array('text'=>'Nome:')));
					echo $this->Form->input('Transportadore.cnpj', array('class'=>'tamanho-medio', 'label' => array('text'=>'Cnpj:')));
					echo "</section>";

					echo "<section class=\"coluna-central\">";
					echo $this->Form->input('Transportadore.ie', array('class'=>'tamanho-medio', 'label' => array('text'=>'Inscrição Estadual:')));
					echo $this->Form->input('Transportadore.endereco', array('class'=>'tamanho-medio', 'label' => array('text'=>'Endereço:')));
					echo "</section>";

					echo "<section class=\"coluna-direita\">";
					echo $this->Form->input('Transportadore.cidade', array('class'=>'tamanho-medio', 'label' => array('text'=>'Cidade:')));
					echo $this->Form->input('Transportadore.uf', array('class'=>'tamanho-medio', 'label' => array('text'=>'UF:')));
					echo "</section>";
					
				?>
					
					<section class="coluna-esquerda" style="margin-top:30px;">

						<?php echo $this->Form->submit('botao-voltar.png', array('div'=>false)); ?>

					</section>
					
					<section class="coluna-direita" style="margin-top:30px;">
						
						<?php echo $this->Form->submit('botao-salvar.png'); ?>

					</section>

				<?php echo $this->Form->end(); ?>

		</section>

	</section>

</section>
<!-- 
<div class="transportadores form">
<?php echo $this->Form->create('Transportadore'); ?>
	<fieldset>
		<legend><?php echo __('Edit Transportadore'); ?></legend>
	<?php
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Transportadore.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Transportadore.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transportadores'), array('action' => 'index')); ?></li>
	</ul>
</div>
-->
