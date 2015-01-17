<?php
	
	$this->start('css');
		echo $this->Html->css('table');
	$this->end();	

?>

<header>

<?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

<h1 class="menuOption54">Gerenciar Cargos</h1>

</header>


<section>
<header> Cargos </header>
		
	<section>
		<section class="coluna-esquerda">
			<fieldset class="fieldSetUnidade" style="height:100px;width:390px;">
				<legend>Adicionar Novo</legend>	
				<?php
					echo $this->Form->create('Cargo');
						echo $this->Form->input('nome',array('label'=>'Nome:','class'=>'tamanho-medio'));	
						echo $this->Form->input('descricao',array('label'=>'Descrição:','class'=>'tamanho-medio','type'=>'textarea','style'=>'height:50px;'));	
						echo $this->form->submit('botao-salvar.png',array('class'=>'salvarUnidade','style'=>'margin-top: -22px;margin-right:-50px;clear:both;')); 
					echo $this->Form->end();
				?>	
			</fieldset>
		</section>	
	</section>
	
	<section>
		<table>
			<thead>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Deletar</th>
				<th>Editar</th>
			</thead>

			<?php foreach ($cargos as $cargo): ?>
			<tr>
				<td>
					<?php echo $cargo['Cargo']['nome'];?>
				</td>
				<td>
					<?php echo $cargo['Cargo']['descricao'];?>
				</td>
				<td>
				<?php echo $this->Html->link(
						   $this->Html->image('lixeira.png', array('alt' => 'Remover Cargo')),
															 array(
																'controller' => 'Cargos',
																'action' => 'delete', $cargo['Cargo']['id']),
															 array(
																'escape' => false,
																'confirm' => 'Deletar Este Cargo?'
															));
				?>
				</td>
				<td>
				<?php echo $this->Html->link(
						   $this->Html->image('botao-tabela-editar.png', array('alt' => 'Editar Cargo')),
															 array(
																'controller' => 'Cargos',
																'action' => 'edit', $cargo['Cargo']['id']),
															 array(
																'escape' => false,
																'confirm' => 'Editar Este Cargo?'
															));
					
				?>
				</td>
			</tr>
			<?php endforeach; ?>

		</table>
	</section>
</section>
