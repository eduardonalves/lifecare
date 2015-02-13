<header>

<?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

<h1 class="menuOption23">Editar Unidade Comercial</h1>

</header>


<section>
<header> Unidades Comerciais </header>
		
	<section>
		<section class="coluna_edit_unidade">
			<fieldset class="fieldSetUnidade">
				<legend>Editar Nome da Unidade</legend>	
				<?php
					echo $this->Form->create('Unidade',array('action'=>'edit'));
						echo $this->Form->input('id');
						echo $this->Form->input('nome',array('label'=>'Nome:','class'=>'tamanho-medio'));	
						echo $this->Form->input('abriviacao',array('label'=>'Abreviação:','class'=>'tamanho-pequeno'));	
						echo $this->form->submit('botao-salvar.png',array('class'=>'salvarUnidade')); 
					echo $this->Form->end();
				?>	
			</fieldset>
		</section>	
	</section>
	
