<header>

	<?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption53">Cadastrar Usuário</h1>
</header>

<section>
	<header>Dados do usuário</header>
	
	<!-- INICIO_SECTION SUPERIOR  --->
	<section class="coluna-esquerda">
		<?php	
			echo $this->Form->create('User');
			echo $this->Form->input('funcionario_id',array('label'=>'Funcionário:','id'=>'funcionarioId','type'=>'text','class'=>'tamanho-medio'));
			
			
		?>
	</section>
	
	
	<section class="coluna-central">
		<?php	
		
			echo $this->Form->input('username',array('label'=>'Login:','id'=>'LoginUser','class'=>'tamanho-medio'));
			
		?>
	</section>
	
	<section class="coluna-direita">
		<?php	
			echo $this->Form->input('password',array('label'=>'Senha:','id'=>'senhaUser','type'=>'password','class'=>'tamanho-medio'));
		?>
	</section>
	<!-- FIM SECTION SUPERIOR  --->
	
	
	
	
</section>

<footer>
	<?php
		echo $this->form->submit('botao-salvar.png',array('class'=>'','alt'=>'Salvar','title'=>'Salvar','id'=>'')); 
		echo $this->Form->end();	
	?>
</footer>
