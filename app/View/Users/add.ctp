<?php
	$this->start('css');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();
	
	$this->start('script');
	    echo $this->Html->script('users.js');
	    echo $this->Html->script('jquery-ui/jquery.ui.button.js');
	$this->end();

?>

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
			echo $this->Form->input('funcionario_id',array('type'=>'hidden','id'=>'funcionarioId'));
		?>
		
		<?php
			echo $this->Form->input('username',array('label'=>'Login<span class="campo-obrigatorio">*</span>:','id'=>'LoginUser','class'=>'tamanho-medio'));
			echo '<span id="msgLogin" class="Msg-tooltipDireita" style="display:none">Preencha o campo Login</span>';
			echo $this->Form->input('password',array('label'=>'Senha<span class="campo-obrigatorio">*</span>:','id'=>'senhaUser','type'=>'password','class'=>'tamanho-medio'));
			echo '<span id="msgSenha" class="Msg-tooltipDireita" style="display:none">Preencha o campo Senha</span>';
		?>
			
	</section>
	
	
	<section class="coluna-central">
		<?php
			echo $this->Form->input('role_id',array('label'=>'Tipo de Usuário<span class="campo-obrigatorio">*</span>:','id'=>'roleUser','class'=>'tamanho-medio'));
			echo '<span id="msgTipoUser" class="Msg-tooltipDireita" style="display:none">Preencha o campo Tipo de Usuário</span>';
		?>
	</section>
	
	<section class="coluna-direita">
		<?php	
			echo $this->Form->input('acesso',array('label'=>'Tipo de Acesso<span class="campo-obrigatorio">*</span>:','id'=>'senhaUser','class'=>'tamanho-medio','type'=>'select', 'options'=>array('INTERNO','EXTERNO')));
			echo '<span id="msgTipoAcesso" class="Msg-tooltipDireita" style="display:none">Preencha o campo Tipo de Acesso</span>';
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
